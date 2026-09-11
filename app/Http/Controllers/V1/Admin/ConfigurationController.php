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
    // public function scanProcess2(Request $request, $id = null)
// {
//     // Allow this PHP request to run for up to 10 minutes
//     set_time_limit(600);

//     Log::info('SCAN PROCESS 2 STARTED', [
//         'configuration_id' => $id,
//         'time' => now()->toDateTimeString(),
//     ]);

//     $config = Configuration::findOrFail($id);

//     Log::info('CONFIGURATION LOADED', [
//         'configuration_id' => $config->id,
//     ]);

//     $request->validate([
//         'payload' => 'required',
//     ]);

//     Log::info('REQUEST VALIDATION PASSED', [
//         'configuration_id' => $config->id,
//     ]);

//     $storedPath = $config->input_file_path;
//     $file = storage_path('app/public/' . $storedPath);

//     $originalName = $config->file_name;

//     Log::info('INPUT FILE CHECK', [
//         'configuration_id' => $config->id,
//         'file' => $file,
//         'original_name' => $originalName,
//         'exists' => file_exists($file),
//         'size' => file_exists($file) ? filesize($file) : null,
//     ]);

//     if (!file_exists($file)) {

//         Log::error('INPUT FILE NOT FOUND', [
//             'configuration_id' => $config->id,
//             'file' => $file,
//         ]);

//         return back()->with(
//             'error',
//             'Configuration file could not be found.'
//         );
//     }

//     $payload = $request->input('payload');

//     if (is_string($payload)) {

//         $payload = json_decode($payload, true);

//         if (json_last_error() !== JSON_ERROR_NONE) {

//             Log::error('INVALID CONFIGURATION JSON', [
//                 'configuration_id' => $config->id,
//                 'json_error' => json_last_error_msg(),
//             ]);

//             return back()->with(
//                 'error',
//                 'Invalid configuration JSON payload.'
//             );
//         }
//     }

//     $baseUrl = config('services.rule_engine.base_url');

//     Log::info('RULE ENGINE URL LOADED', [
//         'configuration_id' => $config->id,
//         'base_url' => $baseUrl,
//     ]);

//     // SAVE ONLY
//     if ($request->input('action') == "save") {

//         Log::info('SAVE ACTION STARTED', [
//             'configuration_id' => $config->id,
//         ]);

//         $config->update([
//             'configured_data' => $payload,
//             'status' => 'draft',
//             'process_stage' => 'Saved not processed yet.'
//         ]);

//         Log::info('SAVE ACTION COMPLETED', [
//             'configuration_id' => $config->id,
//         ]);

//         return back();
//     }

//     try {

//         /*
//         |--------------------------------------------------------------------------
//         | RULE ENGINE PROCESSING
//         |--------------------------------------------------------------------------
//         */

//         Log::info('RULE ENGINE REQUEST STARTED', [
//             'configuration_id' => $config->id,
//             'started_at' => now()->toDateTimeString(),
//         ]);

//         $processStart = microtime(true);

//         $response = Http::connectTimeout(30)
//             ->timeout(600)
//             ->attach(
//                 'file',
//                 file_get_contents($file),
//                 $originalName
//             )
//             ->post(
//                 "{$baseUrl}/docs/schworer/new-rule-3",
//                 [
//                     'config' => json_encode($payload),
//                 ]
//             );

//         $processDuration = round(
//             microtime(true) - $processStart,
//             2
//         );

//         Log::info('RULE ENGINE RESPONSE RECEIVED', [
//             'configuration_id' => $config->id,
//             'status' => $response->status(),
//             'successful' => $response->successful(),
//             'duration_seconds' => $processDuration,
//             'response_size' => strlen($response->body()),
//         ]);

//         if (!$response->successful()) {

//             Log::error('RULE ENGINE CONFIGURATION PROCESSING FAILED', [
//                 'configuration_id' => $config->id,
//                 'status' => $response->status(),
//                 'response' => $response->body(),
//                 'duration_seconds' => $processDuration,
//             ]);

//             return back()->with(
//                 'error',
//                 'Failed to process file. Rule engine returned status: '
//                 . $response->status()
//             );
//         }

//         /*
//         |--------------------------------------------------------------------------
//         | PARSE RULE ENGINE RESPONSE
//         |--------------------------------------------------------------------------
//         */

//         Log::info('PARSING RULE ENGINE RESPONSE', [
//             'configuration_id' => $config->id,
//         ]);

//         $data = $response->json();

//         Log::info('RULE ENGINE RESPONSE PARSED', [
//             'configuration_id' => $config->id,
//             'has_mapped_txt_file' => isset($data['Mapped_txt_file']),
//             'has_validation_warnings' => isset($data['Validation_Warnings']),
//             'has_submitted_config' => isset($data['Submitted_config_json']),
//         ]);

//         $filename = $data['Mapped_txt_file'] ?? null;

//         if (!$filename) {

//             Log::error('MAPPED TXT FILE NOT RETURNED', [
//                 'configuration_id' => $config->id,
//                 'response_keys' => array_keys($data ?? []),
//             ]);

//             throw new \Exception(
//                 'Mapped_txt_file was not returned by the API.'
//             );
//         }

//         Log::info('MAPPED TXT FILE RECEIVED', [
//             'configuration_id' => $config->id,
//             'filename' => $filename,
//         ]);

//         /*
//         |--------------------------------------------------------------------------
//         | DOWNLOAD GENERATED TXT FILE
//         |--------------------------------------------------------------------------
//         */

//         $downloadUrl =
//             "{$baseUrl}/download/output_file/"
//             . rawurlencode($filename);

//         Log::info('TXT DOWNLOAD STARTED', [
//             'configuration_id' => $config->id,
//             'download_url' => $downloadUrl,
//         ]);

//         $downloadStart = microtime(true);

//         $txtResponse = Http::connectTimeout(30)
//             ->timeout(600)
//             ->get($downloadUrl);

//         $downloadDuration = round(
//             microtime(true) - $downloadStart,
//             2
//         );

//         Log::info('TXT DOWNLOAD RESPONSE RECEIVED', [
//             'configuration_id' => $config->id,
//             'status' => $txtResponse->status(),
//             'successful' => $txtResponse->successful(),
//             'duration_seconds' => $downloadDuration,
//             'response_size' => strlen($txtResponse->body()),
//         ]);

//         if (!$txtResponse->successful()) {

//             Log::error('TXT DOWNLOAD FAILED', [
//                 'configuration_id' => $config->id,
//                 'status' => $txtResponse->status(),
//                 'duration_seconds' => $downloadDuration,
//             ]);

//             throw new \Exception(
//                 'Failed to download TXT file. Status: '
//                 . $txtResponse->status()
//             );
//         }

//         /*
//         |--------------------------------------------------------------------------
//         | SAVE GENERATED FILE
//         |--------------------------------------------------------------------------
//         */

//         Log::info('SAVING GENERATED TXT FILE', [
//             'configuration_id' => $config->id,
//             'filename' => $filename,
//         ]);

//         $storagePath = 'config/' . $filename;

//         $fullStoragePath =
//             storage_path('app/public/' . $storagePath);

//         $directory = dirname($fullStoragePath);

//         if (!is_dir($directory)) {

//             Log::info('CREATING OUTPUT DIRECTORY', [
//                 'configuration_id' => $config->id,
//                 'directory' => $directory,
//             ]);

//             mkdir($directory, 0755, true);
//         }

//         file_put_contents(
//             $fullStoragePath,
//             $txtResponse->body()
//         );

//         Log::info('GENERATED TXT FILE SAVED', [
//             'configuration_id' => $config->id,
//             'storage_path' => $storagePath,
//             'full_path' => $fullStoragePath,
//             'file_exists' => file_exists($fullStoragePath),
//             'file_size' => file_exists($fullStoragePath)
//                 ? filesize($fullStoragePath)
//                 : null,
//         ]);

//         /*
//         |--------------------------------------------------------------------------
//         | UPDATE DATABASE
//         |--------------------------------------------------------------------------
//         */

//         Log::info('DATABASE UPDATE STARTED', [
//             'configuration_id' => $config->id,
//         ]);

//         $config->update([
//             'configured_data'   => $data['Submitted_config_json'],
//             'validation_data'   => $data['Validation_Warnings'],
//             'output_file_path'  => $storagePath,
//             'status'            => 'active',
//             'process_stage'     => 'Scanned Processed and Saved.',
//             'filename'          => $filename,
//         ]);

//         Log::info('DATABASE UPDATE COMPLETED', [
//             'configuration_id' => $config->id,
//             'status' => $config->status,
//             'process_stage' => $config->process_stage,
//             'output_file_path' => $config->output_file_path,
//             'filename' => $config->filename,
//         ]);

//         /*
//         |--------------------------------------------------------------------------
//         | REDIRECT
//         |--------------------------------------------------------------------------
//         */

//         Log::info('ABOUT TO REDIRECT TO FINAL PROCESS', [
//             'configuration_id' => $config->id,
//             'route' => 'admin.final-process',
//             'route_parameters' => [
//                 'id' => $config->id,
//             ],
//             'time' => now()->toDateTimeString(),
//         ]);

//         $redirectUrl = route(
//             'admin.final-process',
//             ['id' => $config->id]
//         );

//         Log::info('FINAL PROCESS URL GENERATED', [
//             'configuration_id' => $config->id,
//             'redirect_url' => $redirectUrl,
//         ]);

//         dd(here);

//         Log::info('RETURNING REDIRECT RESPONSE', [
//             'configuration_id' => $config->id,
//             'time' => now()->toDateTimeString(),
//         ]);

//         // return redirect($redirectUrl)
//         //     ->with(
//         //         'success',
//         //         'Configuration processed successfully.'
//         //     );

//         return response()->json([
//             'success' => true,
//             'configuration_id' => $config->id,
//             'message' => 'Processing completed successfully.',
//         ]);

//     } catch (\Throwable $e) {

//         Log::error('CONFIGURATION STAGE 2 FAILED', [
//             'configuration_id' => $config->id ?? $id,
//             'error' => $e->getMessage(),
//             'line' => $e->getLine(),
//             'file' => $e->getFile(),
//             'trace' => $e->getTraceAsString(),
//             'time' => now()->toDateTimeString(),
//         ]);

//         return back()->with(
//             'error',
//             'Failed to process configuration: '
//             . $e->getMessage()
//         );
//     }
// }

    public function scanProcess2(Request $request, $id = null){dd('here');}

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
    // public function finalProcess($id = null){

   
    //     $config = Configuration::findOrFail($id);

    //     return view('admin.config.final-process', [
    //         'response'     => $config->configured_data,
    //         'originalName' => $config->file_name,
    //         'id'           => $config->id,
    //         'configuration'=> $config,
    //         'validation'=>$config->validation_data
    //         // 'txt_name' => $config->
    //     ]);


    // }

    public function finalProcess($id = null)
    {
        return response()->json([
            'success' => true,
            'message' => 'Final process page reached',
            'id' => $id,
        ]);
    }



}
