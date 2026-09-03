<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuration; 
use App\Models\Verb;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class ConfigurationController extends Controller
{
    public function indexConfig()
    {
        
        $configs = Configuration::all();
        return view('admin.config.index', compact('configs'));
    }

    public function configInitiate(Request $request)
    {

        $request->validate([
            'user_id' => [
                'nullable',
                'string',
                'max:255',
            ],

            'input_file' => [
                'required',
                
            ],

            'config_name' => [
                'required',
                'string',
                'max:255',
            ],
        ]);

        $file = $request->file('input_file');

        $fileName = $file->getClientOriginalName();

        $filePath = $file->storeAs(
            'config',
            $fileName,
            'public'
        );

        $configuration = Configuration::create([
            'user_id' => $request->user_id ?? auth()->id(),
            'file_name' => $fileName,
            'input_file_path' => $filePath,
            'config_name' => $request->config_name,
            'status' => 'draft',
            'process_stage'=> 'Initiated'
        ]);

        

        //check the process it wants to use either scan or direct and send it there 
        if ($request->action === 'scan') {

            return redirect()->route(
                'admin.scan-process-1',
                $configuration->id
            );

        }

        if ($request->action === 'direct') {

            return redirect()->route(
                'admin.direct-process-1',
                $configuration->id
            );
        }

        // Fallback
        return back()->with('error', 'Invalid action selected.');
    }

    // Scan before process Stage 1 
    public function scanProcess1(Request $request, $id = null)
    {
        $config = Configuration::findOrFail($id);

        $verbs = Verb::all();
   
        $storedPath = $config->input_file_path;

   
        $file = storage_path('app/public/' . $storedPath);

     
        $fileUrl = asset('storage/' . $storedPath);

        $baseUrl = config('services.rule_engine.base_url');

        // Make sure the file exists
        if (!file_exists($file)) {
            return redirect()
                ->route('admin.rule-service.index')
                ->with('error', 'Configuration PDF file was not found.');
        }

        try {

            $scanResponse = Http::timeout(300)
                ->attach(
                    'file',
                    file_get_contents($file),
                    $config->file_name
                )
                ->post("{$baseUrl}/docs/schworer/scan-pdf-1")
                ->throw();

            $scannedData = $scanResponse->json();

            $suggestResponse = Http::timeout(300)
                ->attach(
                    'file',
                    file_get_contents($file),
                    $config->file_name
                )
                ->post("{$baseUrl}/docs/schworer/suggest-config-2", [
                    'customer_name' => $request->input('customer_name'),
                ])
                ->throw();

            $suggestedData = $suggestResponse->json();


            $customerName = $suggestedData['Customer']
                ?? "null";


            $config->update([
                'scanned_data'   => $scannedData,
                'suggested_data' => $suggestedData,
                'process_stage' => 'Scanned and Suggestion Saved',
                'file_name'      => $config->file_name,
            ]);


        } catch (\Illuminate\Http\Client\RequestException $e) {

            Log::error('Rule engine API call failed', [
                'configuration_id' => $config->id,
                'error'            => $e->getMessage(),
                'response'         => $e->response?->json(),
            ]);

            return back()
                    ->with(
                        'error',
                        'Failed to process file: ' . $e->getMessage()
                    );
        }


        return redirect()
            ->route(
                'admin.scan-process-display',
                ['id' => $config->id]
            )
            ->with(
                'success',
                'Scanned results saved successfully!'
            );
    }

    // Display scanned results
    public function scanProcessDisplay(Request $request, $id = null)
    {
        $config = Configuration::findOrFail($id);

        $verbs = Verb::all();

        return view('admin.config.scan-process-display', [
            'result' => $config,
            'verbs' => $verbs,
            'id' => $config->id,
        ]);
    }

    // Scan before process Stage 2
    public function scanProcess2(Request $request, $id = null)
    {

        $config = Configuration::findOrFail($id);

        $request->validate([
            'payload' => 'required',
        ]);

        $storedPath = $config->input_file_path;
        $file = storage_path('app/public/' . $storedPath);

        $originalName = $config->file_name;


        if (!file_exists($file)) {

            return back()->with(
                'error',
                'Configuration file could not be found.'
            );
        }

        $payload = $request->input('payload');

        if (is_string($payload)) {

            $payload = json_decode($payload, true);

            if (json_last_error() !== JSON_ERROR_NONE) {

                return back()->with(
                    'error',
                    'Invalid configuration JSON payload.'
                );
            }
        }

        $baseUrl = config('services.rule_engine.base_url');

        try {

            $response = Http::timeout(300)
                ->attach(
                    'file',
                    file_get_contents($file),
                    $originalName
                )
                ->post(
                    "{$baseUrl}/docs/schworer/new-rule-3",
                    [
                        'config' => json_encode($payload),
                    ]
                );

            if (!$response->successful()) {

                Log::error('Rule engine configuration processing failed', [
                    'configuration_id' => $config->id,
                    'status'            => $response->status(),
                    'response'          => $response->body(),
                ]);

                return back()->with(
                    'error',
                    'Failed to process file. Rule engine returned status: '
                    . $response->status()
                );
            }


            $data = $response->json();

            $filename = $data['Mapped_txt_file'] ?? null;

            if (!$filename) {

                throw new \Exception(
                    'Mapped_txt_file was not returned by the API.'
                );
            }

            $downloadUrl =
                "{$baseUrl}/download/output_file/"
                . rawurlencode($filename);


            $txtResponse = Http::timeout(300)
                ->get($downloadUrl);


            if (!$txtResponse->successful()) {

                throw new \Exception(
                    'Failed to download TXT file. Status: '
                    . $txtResponse->status()
                );
            }


            $storagePath = 'config/' . $filename;

            $fullStoragePath =
                storage_path('app/public/' . $storagePath);



            $directory = dirname($fullStoragePath);

            if (!is_dir($directory)) {

                mkdir($directory, 0755, true);
            }

            file_put_contents(
                $fullStoragePath,
                $txtResponse->body()
            );


            $config->update([
                'configured_data'   => $data,
                'output_file_path'  => $storagePath,
                'status'            => 'active',
                'process_stage'   => 'Scanned Processed and Saved.'
            ]);


            return view('admin.download', [
                'response'     => $data,
                'originalName' => $originalName,
                'id'           => $config->id,
            ]);


        } catch (\Throwable $e) {

            Log::error('Configuration Stage 2 failed', [
                'configuration_id' => $config->id,
                'error'            => $e->getMessage(),
                'line'             => $e->getLine(),
                'file'             => $e->getFile(),
            ]);


            return back()->with(
                'error',
                'Failed to process configuration: '
                . $e->getMessage()
            );
        }
    }

    // Direct process stage 1
    public function directProcess1(Request $request, $id = null)
    {
        $config = Configuration::findOrFail($id);

        $verbs = Verb::all();

        $storedPath = $config->input_file_path;

  
        $filePath = storage_path('app/public/' . $storedPath);

    
        if (!file_exists($filePath)) {
            return redirect()
                ->route('admin.configurations.index')
                ->with('error', 'Configuration PDF file was not found.');
        }

        $fileUrl = asset('storage/' . $storedPath);

        return view('admin.config.direct-process-1', [
            'data' => $config,
            'fileUrl' => $fileUrl,
            'verbs' => $verbs
        ]);
    }

    // Direct process stage 2
    public function directProcess2(Request $request, $id = null)
    {

        $config = Configuration::findOrFail($id);

        $request->validate([
            'payload' => 'required',
        ]);

        $storedPath = $config->input_file_path;
        $file = storage_path('app/public/' . $storedPath);

        $originalName = $config->file_name;


        if (!file_exists($file)) {

            return back()->with(
                'error',
                'Configuration file could not be found.'
            );
        }

        $payload = $request->input('payload');

        if (is_string($payload)) {

            $payload = json_decode($payload, true);

            if (json_last_error() !== JSON_ERROR_NONE) {

                return back()->with(
                    'error',
                    'Invalid configuration JSON payload.'
                );
            }
        }

        $baseUrl = config('services.rule_engine.base_url');

        //Save for later work.

        //Next task is persisting the save data over the javascript 
        
        if ($request->input('action')=="save"){

            $config->update([
                    'configured_data'   => $payload,
                    'status'            => 'draft',
                    'process_stage'     => 'Saved not processed yet.'
                ]);
                
            return back();
        }

        try {

            $response = Http::timeout(300)
                ->attach(
                    'file',
                    file_get_contents($file),
                    $originalName
                )
                ->post(
                    "{$baseUrl}/docs/schworer/new-rule-3",
                    [
                        'config' => json_encode($payload),
                    ]
                );

            if (!$response->successful()) {
                // dd($response->status(), $response->body());

                Log::error('Rule engine configuration processing failed', [
                    'configuration_id' => $config->id,
                    'status'            => $response->status(),
                    'response'          => $response->body(),
                ]);

                return back()->with(
                    'error',
                    'Failed to process file. Rule engine returned status: '
                    . $response->status()
                );
            }


            $data = $response->json();

            $filename = $data['Mapped_txt_file'] ?? null;

            // dd($filename);

            if (!$filename) {

                throw new \Exception(
                    'Mapped_txt_file was not returned by the API.'
                );
            }

            $downloadUrl =
                "{$baseUrl}/download/output_file/"
                . rawurlencode($filename);


            $txtResponse = Http::timeout(300)
                ->get($downloadUrl);


            if (!$txtResponse->successful()) {

                throw new \Exception(
                    'Failed to download TXT file. Status: '
                    . $txtResponse->status()
                );
            }


            $storagePath = 'config/' . $filename;

            $fullStoragePath =
                storage_path('app/public/' . $storagePath);



            $directory = dirname($fullStoragePath);

            if (!is_dir($directory)) {

                mkdir($directory, 0755, true);
            }

            file_put_contents(
                $fullStoragePath,
                $txtResponse->body()
            );


            $config->update([
                'configured_data'   => $data['Submitted_config_json'],
                'validation_data'   => $data['Validation_Warnings'],
                'output_file_path'  => $storagePath,
                'status'            => 'active',
                'process_stage'     => 'Directly Processed and Saved.',
                'filename'          => $filename,

            ]);


            // return view('admin.download', [
            //     'response'     => $data,
            //     'originalName' => $originalName,
            //     'id'           => $config->id,
            // ]);

            return redirect()->route(
                'admin.final-process',
                ['id' => $config->id]
            )->with('success', 'Configuration processed successfully.');


        } catch (\Throwable $e) {

            Log::error('Configuration Stage 2 failed', [
                'configuration_id' => $config->id,
                'error'            => $e->getMessage(),
                'line'             => $e->getLine(),
                'file'             => $e->getFile(),
            ]);


            return back()->with(
                'error',
                'Failed to process configuration: '
                . $e->getMessage()
            );
        }
    }
    

    //Final page
    public function finalProcess($id = null){

   
        $config = Configuration::findOrFail($id);

        return view('admin.config.final-process', [
            'response'     => $config->configured_data,
            'originalName' => $config->file_name,
            'id'           => $config->id,
        ]);


    }



}
