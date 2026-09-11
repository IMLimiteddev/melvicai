<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuration; 
use App\Models\Verb;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Jobs\ProcessConfigurationJob;


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

    public function finalProcessStatus($id)
    {
        $config = Configuration::findOrFail($id);

        return response()->json([
            'id' => $config->id,
            'status' => $config->status,
            
        ]);
    }

    // Scan before process Stage 2
    public function scanProcess2(Request $request, $id = null)
    {
        $config = Configuration::findOrFail($id);

        $request->validate([
            'payload' => 'required',
        ]);

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

        /*
        |--------------------------------------------------------------------------
        | SAVE ONLY
        |--------------------------------------------------------------------------
        */

        if ($request->input('action') == 'save') {

            $config->update([
                'configured_data' => $payload,
                'status' => 'draft',
                'process_stage' => 'Saved not processed yet.',
            ]);

            return back();
        }

        /*
        |--------------------------------------------------------------------------
        | START BACKGROUND PROCESSING
        |--------------------------------------------------------------------------
        */

        $config->update([
            'status' => 'inactive',
            'process_stage' => 'Processing configuration...',
        ]);

        /*
        |--------------------------------------------------------------------------
        | DISPATCH QUEUE
        |--------------------------------------------------------------------------
        */

        ProcessConfigurationJob::dispatch(
            $config->id,
            $payload
        );

        /*
        |--------------------------------------------------------------------------
        | GO IMMEDIATELY TO FINAL PAGE
        |--------------------------------------------------------------------------
        */

        return redirect()->route(
            'admin.final-process',
            ['id' => $config->id]
        );
    }

    // public function scanProcess2(Request $request, $id = null){dd('here');}

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

        $payload = $request->input('payload');

        /*
        |--------------------------------------------------------------------------
        | Decode JSON payload
        |--------------------------------------------------------------------------
        */

        if (is_string($payload)) {

            $payload = json_decode($payload, true);

            if (json_last_error() !== JSON_ERROR_NONE) {

                return back()->with(
                    'error',
                    'Invalid configuration JSON payload.'
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | SAVE ONLY
        |--------------------------------------------------------------------------
        |
        | If the user is only saving the configuration, do not dispatch
        | the processing job.
        |
        */

        if ($request->input('action') === 'save') {

            $config->update([
                'configured_data' => $payload,
                'status'          => 'draft',
                'process_stage'   => 'Saved not processed yet.',
            ]);

            return back();
        }


        /*
        |--------------------------------------------------------------------------
        | Make sure the input file exists
        |--------------------------------------------------------------------------
        */

        $storedPath = $config->input_file_path;

        $file = storage_path(
            'app/public/' . $storedPath
        );

        if (!file_exists($file)) {

            return back()->with(
                'error',
                'Configuration file could not be found.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Mark as INACTIVE
        |--------------------------------------------------------------------------
        |
        | Your application only uses:
        |
        | draft    = saved but not processed
        | inactive = processing / not finished
        | active   = processing finished
        |
        */

        $config->update([
            'configured_data' => $payload,
            'status'          => 'inactive',
            'process_stage'   => 'Processing configuration...',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Send processing to the queue
        |--------------------------------------------------------------------------
        */

        ProcessConfigurationJob::dispatch(
            $config->id,
            $payload
        );


        /*
        |--------------------------------------------------------------------------
        | Immediately send the user to the final process page
        |--------------------------------------------------------------------------
        |
        | The browser does NOT wait for the rule engine.
        |
        */

        return redirect()->route(
            'admin.final-process',
            ['id' => $config->id]
        );
    }
    

    //Final page
    public function finalProcess($id = null){

   
        $config = Configuration::findOrFail($id);

        return view('admin.config.final-process', [
            'response'     => $config->configured_data,
            'originalName' => $config->file_name,
            'id'           => $config->id,
            'configuration'=> $config,
            'validation'=>$config->validation_data
            // 'txt_name' => $config->
        ]);


    }

    // public function finalProcess($id = null)
    // {
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Final process page reached',
    //         'id' => $id,
    //     ]);
    // }



}
