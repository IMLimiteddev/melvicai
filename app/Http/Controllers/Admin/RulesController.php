<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Mapping;
use App\Models\TempMappping;
use Illuminate\Support\Facades\Http;
use App\Models\Verb;
use App\Models\ScannedSuggestedResult;

use Illuminate\Support\Facades\Log;

use Illuminate\Http\UploadedFile;


class RulesController extends Controller
{
        public function modifyMapping($id = null)
        {

            // dd('got here');
            // dd($id);

            $data = Mapping::where('id', $id)->first();

            $creators = Mapping::where('parent_id', $id)->get();

            $data = $data->submitted_json;

            // dd($data);
            // $data = json_decode($data->submitted_json, true); 
            // $response = \Http::timeout(300)->
            // connectTimeout(300)->
            // get('http://31.97.126.130:1000/docs/schworer/visualize');
            // $data = $response->json();

            $fileUrl = null;
            // dd($data);

            return view('admin.modify_mapping', compact('data', 'fileUrl', 'creators'));  
        } 


        public function ruleQuery(Request $request)
        {
            $request->validate([
                'file' => 'required|file|mimes:pdf,txt,csv,xlsx|max:2048'
            ]);

            $file = $request->file('file');

       
            $extension = $file->getClientOriginalExtension();

            
            $fileName = 'upload_' . time() . '.' . $extension;

            
            $path = $file->storeAs('uploads', $fileName, 'public');

            
            $fileUrl = asset('storage/' . $path);

            
            $response = \Http::attach(
                'file',
                'config',
                file_get_contents($file),
                $file->getClientOriginalName()
            )->put("http://31.97.126.130:1000/docs/schworer/visualize");

            $data = $response->successful() ? $response->json() : [];

            // dd($data);

            return view('admin.single_rule', compact('data', 'fileUrl'));
        }

        // public function ruleSend(Request $request)
        // {
        //     $mapping = $request->input('mapping');

        //     $headerMapping = [];

        //     foreach ($mapping as $item) {

                
        //         $logic = '';

        //         if ($item['type'] === 'D') {
        //             $logic = 'Default: ' . $item['logic'];
        //         } elseif ($item['type'] === 'E') {
        //             $logic = '';
        //         } elseif ($item['type'] === 'T') {
        //             $logic = $item['logic'];
        //         }

        //         $headerMapping[] = [
        //             "Col"    => (int) $item['col'],
        //             "Field"  => $item['field'],
        //             "Logic"  => $logic,
        //             "Type"   => $item['type'],
        //             "Output" => $item['output'],
        //         ];
        //     }

        //     $payload = [
        //         "Header_Mapping" => $headerMapping
        //     ];

        //     return response()->json($payload);

        //     // ✅ PLACEHOLDER API CALL
            
        //     // $response = Http::post('https://example.com/api/endpoint', $payload);
        //     // return back()->with('success', 'Mapping prepared and ready to send!');
        // }

        //New rule creation function from shakira
        public function newRule(Request $request)
        {
            try {

                $pdfPath = public_path('D & M KG-Motor-elero-ja-soft-NHK.pdf');

                $request->files->set(
                    'file',
                    new UploadedFile(
                        $pdfPath,
                        'D & M KG-Motor-elero-ja-soft-NHK.pdf',
                        'application/pdf',
                        null,
                        true
                    )
                );

                $request->validate([
                    'file' => 'required|file|mimes:pdf'
                ]);

                $file = $request->file('file');

                $originalName = $file->getClientOriginalName();

                // ----------------------------
                // Hardcoded config for testing
                // ----------------------------
                $config = [
                    "Summary" => [
                        "Customer" => "SchwörerHaus",
                        "Order_ID" => "N/A"
                    ],
                    "Header_Mapping" => [
                        [
                            "Col" => 1,
                            "Field_name" => "KD-Auftrag:",
                            "Ifs" => [
                                [
                                    "If" => "KD-Auftrag: Contain 68970",
                                    "Then" => "Add Oberstetten"
                                ]
                            ],
                            "Else" => ""
                        ]
                    ],
                    "Positions_Mapping" => [
                        [
                            "Position_ID" => "0",
                            "Mapping" => [
                                [
                                    "Col" => 1,
                                    "Field_name" => "Bestellun",
                                    "Ifs" => [
                                        [
                                            "If" => "Bestellun Contain 6870",
                                            "Then" => "Add 1122"
                                        ]
                                    ],
                                    "Else" => ""
                                ]
                            ]
                        ]
                    ]
                ];

                $response = Http::timeout(300)
                    ->attach(
                        'file',
                        file_get_contents($file->getRealPath()),
                        $originalName
                    )
                    ->post(
                        'http://76.13.131.17:32775/docs/schworer/new-rule-3',
                        [
                            'config' => json_encode($config)
                        ]
                    );

                if (!$response->successful()) {

                    dd([
                        'status' => $response->status(),
                        'response' => $response->body(),
                        'json' => $response->json()
                    ]);

                }

                $data = $response->json();

                return view('admin.download', [
                    'response' => $data,
                    'originalName' => $originalName
                ]);

            } catch (\Throwable $e) {

                dd([
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ]);

            }
        }

        public function ruleSend(Request $request)
        {
            $request->validate([
                'file' => 'required|file|mimes:pdf,txt,csv,xlsx|max:2048'
            ]);

            // dd('got here');

            $file = $request->file('file');


            $originalName = $file->getClientOriginalName();

            $file->storeAs(
                'uploaded_mappings',
                $originalName,
                'public'
            );

            $data = json_decode($request->payload, true);

            //  dd($data);

            $summaryMapping   = $data['Summary'] ?? [];
            $headerMapping    = $data['Header_Mapping'] ?? [];
            $colorMapping     = $data['Panzer_Color_Mapping'] ?? [];
            $positionsMapping = $data['Positions_Mapping'] ?? [];

            // Rebuild logic
            foreach ($headerMapping as &$item) {
                if ($item['Type'] === 'D') {
                    $item['Logic'] = 'Default: ' . $item['Logic'];
                } elseif ($item['Type'] === 'E') {
                    $item['Logic'] = '';
                }
            }

            $payload = [
                "Summary" => $summaryMapping,
                "Header_Mapping" => $headerMapping,
                "Panzer_Color_Mapping" => $colorMapping,
                "Positions_Mapping" => $positionsMapping
            ];

            // dd($file, $payload);

            try {

                $response = \Http::timeout(300)
                ->connectTimeout(300)
                ->attach(
                    'file',
                    file_get_contents($file),
                    $file->getClientOriginalName()
                )->put(
                    "http://31.97.126.130:1000/docs/schworer/visualize",

                    [
                        'config' => json_encode($payload) 
                    ]
                );

                if ($response->successful()) {

                    $data= $response->json();

                    $filename = $data['Submitted_config_file'] ?? null;

                    if (!$filename) {
                        return back()->withErrors('Submitted config file not found in response.');
                    }

                    $fileUrl = "http://31.97.126.130:1000/download/output_file/" . rawurlencode($filename);

                    $fileResponse = Http::timeout(120)->get($fileUrl);

                    if (!$fileResponse->successful()) {
                        return back()->withErrors('Could not read submitted config JSON file.');
                    }

                    $jsonContent = $fileResponse->body();

                    $submittedJson = json_decode($jsonContent, true);

                    if (json_last_error() !== JSON_ERROR_NONE) {
                        return back()->withErrors('Invalid JSON file content.');
                    }
                    
                
                    $pass_id =TempMappping::create(
                        
                        [
                            'mapping_id' => "temp_" . uniqid().rand(1000,9999),
                            'customer' => $data['Mapping_report']['Summary']['Customer'] ?? null,
                            'processed_file' => $data['Processed_file'] ?? null,
                            'generated_text_file' => $data['Generated_text_file'] ?? null,
                            'generated_json_file' => $data['Submitted_config_file'] ?? null,
                            'parsed_structure_file' => $data['Parsed_structure_file'] ?? null,
                            'user_id' => auth()->id(),
                            'response_data' => $data,
                            'submitted_json' => $submittedJson,
                            'pdf' => $originalName,
                            
                        ]
                    );
                    

                    return redirect()->route('admin.temp_mappings', $pass_id->id);
                    // return view('admin.sec_rule', compact('data'));

                    // return response()->json([
                    //     'status' => true,
                    //     'data' => $response->json()
                    // ]);
                }

                return response()->json([
                    'status' => false,
                    'error' => $response->body()
                ], $response->status());

            } catch (\Throwable $th) {

                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage(),
                    'payload' => $payload
                ], 500);
            }
        }

        public function tempMapping($id = null)
        {
            $mapping = TempMappping::findOrFail($id);

            $id = $mapping->id;

            $data= $mapping->response_data; 

            // dd($id);

            return view('admin.temp_mappings', compact('data', 'id', 'mapping')); 
        }

        public function saveMapping($id= null)
        {

        // dd($id);
            $mapping = TempMappping::where('id', $id)->first();

            // $mapping->status = 'active';
            // $mapping->save();

            Mapping::create([
                'mapping_id' => "SH-" . uniqid().rand(10,999),
                'parent_id' => $id,
                'customer' => $mapping->customer,
                'customer_id' => "SH",
                'processed_file' => $mapping->processed_file,
                'generated_text_file' => $mapping->generated_text_file,
                'generated_json_file' => $mapping->generated_json_file,
                'parsed_structure_file' => $mapping->parsed_structure_file,
                'user_id' => $mapping->user_id,
                'response_data' => $mapping->response_data,
                'submitted_json' => $mapping->submitted_json,
            ]);

            return redirect()->route('admin.customers.single', ['id' => $mapping->customer])->with('success', 'Mapping saved successfully!');
        }

        public function addCustomerMapping($id = null, $new = null)
        {

            $data = Mapping::where('id', $id)->first();

            $verbs = Verb::all();

            $creators = Mapping::where('parent_id', $id)->get();

            $data = $data->submitted_json;

             $fileUrl = null;



             if ($new=='new') {
                return view('admin.add_new_customer_mapping', compact('data', 'creators', 'fileUrl', 'verbs'));
             }

            return view('admin.add_existing_customer_mapping', compact('data', 'creators', 'fileUrl', 'verbs'));
        }

        // public function downloadOutputFile($filename)
        // {
        //     $url = 'http://76.13.131.17:32775/download/output_file/' . rawurlencode($filename);

        //     $response = Http::timeout(300)->get($url);

        //     if (!$response->successful()) {
        //         return back()->withErrors([
        //             'download' => 'Unable to download the generated file.'
        //         ]);
        //     }

        //     return response($response->body(), 200)
        //         ->header('Content-Type', $response->header('Content-Type', 'application/octet-stream'))
        //         ->header('Content-Disposition', 'attachment; filename="' . basename($filename) . '"');
        // }

       public function downloadOutputFile($filename)
        {
            // dd($filename, $id);
            // find the scanned suggested result by id and save the filename to the txt_file column
            // if ($id) {
            //     $result = ScannedSuggestedResult::findOrFail($id);

            //     $result->txt_file = $filename;
            //     $result->save();
            // }

           
            return redirect()->away(
                'http://76.13.131.17:32775/download/output_file/' . rawurlencode($filename)
            );
        }


        //the new rule service index page

        public function configIndex()
        {

         return view('admin.rule-service.index');

        }

        public function scanPdf()
        {

         return view('admin.rule-service.scan-pdf');

        }
     
        // public function displayScannedResults(Request $request)
        // {
        //     $data = $request->input('data');
        //     $fileUrl = $request->input('fileUrl');

        //      $verbs = Verb::all();

        //     return view('admin.rule-service.display-scanned-results', compact('data', 'fileUrl', 'verbs'));
        // }


        public function displayScannedResults($id)
        {
            $result = ScannedSuggestedResult::findOrFail($id);

            $verbs = Verb::all();
        
            return view('admin.rule-service.display-scanned-results', [
                'result' => $result,
                'verbs' => $verbs,
                'id'=> $id
            ]);
        }



        //Number one in the scanning process
        public function saveScanResults(Request $request)
        {

            // dd($request->all());

            // $pdfPath = public_path('D & M KG-Motor-elero-ja-soft-NHK.pdf');

            $request->validate([
                // 'file' => 'required|file|mimes:pdf,txt,csv,xlsx|max:2048',
                'customer_name' => 'nullable|string|max:255',
            ]);

            $file = $request->file('file');

            $storedPath = $file->store('scans', 'public'); 
            $fileUrl = Storage::disk('public')->url($storedPath);

            // $txtPath = $file->store('scans', 'public'); 
            // $txtFileUrl = Storage::disk('public')->url($txtPath);

            $baseUrl = config('services.rule_engine.base_url'); // e.g. http://76.13.131.17:32775

            try {
              
                $scanResponse = Http::timeout(300)->attach(
                        'file', file_get_contents($file->getRealPath()), $file->getClientOriginalName()
                    )
                    ->post("{$baseUrl}/docs/schworer/scan-pdf-1")
                    ->throw();

                $scannedData = $scanResponse->json();
                
                // dd($scannedData);
                
                $suggestResponse = Http::timeout(300)
                    ->attach('file', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
                    ->post("{$baseUrl}/docs/schworer/suggest-config-2", [
                        'customer_name' => $request->input('customer_name'),
                    ])
                    ->throw();

                $suggestedData = $suggestResponse->json();

                // dd($suggestedData);

            } catch (\Illuminate\Http\Client\RequestException $e) {
                Log::error('Rule engine API call failed', [
                    'error' => $e->getMessage(),
                    'response' => $e->response?->json(),
                ]);

                return redirect()
                    ->route('admin.rule-service.index')
                    ->with('error', 'Failed to scan file: ' . $e->getMessage());
            }

            $customerName = $suggestedData['Customer'] ?? $request->input('customer');

            $result = ScannedSuggestedResult::create([
                'scanned_data'    => $scannedData,
                'suggested_data'  => $suggestedData,
                'file_url'        => $fileUrl,
                'customer_name'   => $customerName,
                'file_name'       => $file->getClientOriginalName(),
                // 'txt_file'        => $txtFileUrl,
            ]);

            return redirect()
                 ->route('admin.rule-service.display-scanned-results', ['id' => $result->id])
                ->with('success', 'Scanned results saved successfully!');
        }

        //Number two in the scanning process
       public function createAfterScan(Request $request, $id = null)
        {
            try {

                $request->validate([
                    'file' => 'required|file|mimes:pdf',
                    'payload' => 'required'
                ]);

                $file = $request->file('file');

                $originalName = $file->getClientOriginalName();

                $config = $request->input('payload');

                if (is_string($config)) {
                    $config = json_decode($config, true);
                }

                $response = Http::timeout(300)
                    ->attach(
                        'file',
                        file_get_contents($file->getRealPath()),
                        $originalName
                    )
                    ->post(
                        'http://76.13.131.17:32775/docs/schworer/new-rule-3',
                        [
                            'config' => json_encode($config)
                        ]
                    );

                if (!$response->successful()) {

                    dd([
                        'status' => $response->status(),
                        'response' => $response->body(),
                        'json' => $response->json()
                    ]);

                }

                $data = $response->json();

                $filename = $data['Mapped_txt_file'] ?? null;

                if (!$filename) {
                    throw new \Exception('Mapped_txt_file was not returned by the API.');
                }

                $downloadUrl = 'http://76.13.131.17:32775/download/output_file/' . rawurlencode($filename);

                /*
                |--------------------------------------------------------------------------
                | Download TXT file and save it to Laravel storage
                |--------------------------------------------------------------------------
                */

                $txtResponse = Http::timeout(300)->get($downloadUrl);

                if (!$txtResponse->successful()) {
                    throw new \Exception(
                        'Failed to download TXT file. Status: ' . $txtResponse->status()
                    );
                }

                // Save the file in storage/app/public/scanned/
                $storagePath = 'scanned/' . $filename;

                Storage::disk('public')->put(
                    $storagePath,
                    $txtResponse->body()
                );

                /*
                |--------------------------------------------------------------------------
                | Save filename/path to scanned suggested result
                |--------------------------------------------------------------------------
                */

                if ($id) {
                    $result = ScannedSuggestedResult::findOrFail($id);

                    $result->txt_file = $storagePath;

                    $result->save();
                }

                return view('admin.download', [
                    'response' => $data,
                    'originalName' => $originalName,
                    'id' => $id
                ]);

            } catch (\Throwable $e) {

                dd([
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ]);

            }
        }

        public function useConfigPage($id= null){

            return view('admin.rule-service.use-config', [
                'id'=> $id
            ]);

        }

        public function useConfig(Request $request, $id = null)
        {
            try {

                $request->validate([
                    'file' => 'required|file|mimes:pdf',
                ]);

                $file = $request->file('file');

                $originalName = $file->getClientOriginalName();

                /*
                |--------------------------------------------------------------------------
                | Get suggested configuration
                |--------------------------------------------------------------------------
                */

                $result = ScannedSuggestedResult::findOrFail($id);

                $config = $result->suggested_data;

                // suggested_data may be stored as JSON string
                if (is_string($config)) {
                    $config = json_decode($config, true);
                }

                // Make sure decoding worked
                if (!is_array($config)) {
                    throw new \Exception(
                        'Invalid suggested_data. Expected a JSON object.'
                    );
                }

                /*
                |--------------------------------------------------------------------------
                | IMPORTANT
                |--------------------------------------------------------------------------
                | suggested_data contains something like:
                |
                | {
                |     "Message": "...",
                |     "Customer": "...",
                |     "Filename": "...",
                |     "Suggested_config": {
                |         "Summary": {...},
                |         "Header_Mapping": [...],
                |         "Positions_Mapping": [...]
                |     }
                | }
                |
                | The Python API expects Suggested_config itself.
                |--------------------------------------------------------------------------
                */

                if (isset($config['Suggested_config'])) {
                    $config = $config['Suggested_config'];
                }

                /*
                |--------------------------------------------------------------------------
                | Validate config structure
                |--------------------------------------------------------------------------
                */

                if (
                    !isset($config['Summary']) ||
                    !isset($config['Header_Mapping']) ||
                    !isset($config['Positions_Mapping'])
                ) {
                    throw new \Exception(
                        'Invalid config structure. Summary, Header_Mapping and Positions_Mapping are required.'
                    );
                }

                /*
                |--------------------------------------------------------------------------
                | Send PDF + configuration to processing API
                |--------------------------------------------------------------------------
                */

                $response = Http::timeout(300)
                    ->attach(
                        'file',
                        file_get_contents($file->getRealPath()),
                        $originalName
                    )
                    ->post(
                        'http://76.13.131.17:32775/docs/schworer/new-rule-3',
                        [
                            'config' => json_encode(
                                $config,
                                JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
                            )
                        ]
                    );

                /*
                |--------------------------------------------------------------------------
                | Check API response
                |--------------------------------------------------------------------------
                */

                if (!$response->successful()) {

                    dd([
                        'status' => $response->status(),
                        'response' => $response->body(),
                        'json' => $response->json(),

                        // Very useful for checking what was actually sent
                        'config_sent' => $config,
                    ]);
                }

                /*
                |--------------------------------------------------------------------------
                | Get API response
                |--------------------------------------------------------------------------
                */

                $data = $response->json();

                $filename = $data['Mapped_txt_file'] ?? null;

                if (!$filename) {
                    throw new \Exception(
                        'Mapped_txt_file was not returned by the API.'
                    );
                }

                /*
                |--------------------------------------------------------------------------
                | Download TXT file
                |--------------------------------------------------------------------------
                */

                $downloadUrl =
                    'http://76.13.131.17:32775/download/output_file/' .
                    rawurlencode($filename);

                $txtResponse = Http::timeout(300)->get($downloadUrl);

                if (!$txtResponse->successful()) {

                    throw new \Exception(
                        'Failed to download TXT file. Status: ' .
                        $txtResponse->status()
                    );
                }

                /*
                |--------------------------------------------------------------------------
                | Save TXT file
                |--------------------------------------------------------------------------
                */

                $storagePath = 'scanned/' . $filename;

                Storage::disk('public')->put(
                    $storagePath,
                    $txtResponse->body()
                );

                /*
                |--------------------------------------------------------------------------
                | Save TXT path to ScannedSuggestedResult
                |--------------------------------------------------------------------------
                */

                $result->txt_file = $storagePath;
                $result->save();

                /*
                |--------------------------------------------------------------------------
                | Return download page
                |--------------------------------------------------------------------------
                */

                return view('admin.download', [
                    'response' => $data,
                    'originalName' => $originalName,
                    'id' => $id
                ]);

            } catch (\Throwable $e) {

                dd([
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile()
                ]);
            }
        }

        public function processSuggested(Request $request, $id)
        {
            try {

                $request->validate([
                    'file' => 'required|file|mimes:pdf',
                ]);

               

                $result = ScannedSuggestedResult::findOrFail($id);

             

                $config = $result->suggested_data;

                // Decode JSON if stored as string
                if (is_string($config)) {
                    $config = json_decode($config, true);
                }

                if (!is_array($config)) {

                    return response()->json([
                        'success' => false,
                        'message' => 'Invalid suggested_data format.'
                    ], 422);
                }


                if (isset($config['Suggested_config'])) {
                    $config = $config['Suggested_config'];
                }

                /*
                |--------------------------------------------------------------------------
                | Validate configuration
                |--------------------------------------------------------------------------
                */

                if (
                    !isset($config['Summary']) ||
                    !isset($config['Header_Mapping']) ||
                    !isset($config['Positions_Mapping'])
                ) {

                    return response()->json([
                        'success' => false,
                        'message' => 'Invalid configuration structure.',
                        'required' => [
                            'Summary',
                            'Header_Mapping',
                            'Positions_Mapping'
                        ]
                    ], 422);
                }

             
                $file = $request->file('file');

                $originalName = $file->getClientOriginalName();

           

                $response = Http::timeout(300)
                    ->attach(
                        'file',
                        file_get_contents($file->getRealPath()),
                        $originalName
                    )
                    ->post(
                        'http://76.13.131.17:32775/docs/schworer/new-rule-3',
                        [
                            'config' => json_encode(
                                $config,
                                JSON_UNESCAPED_UNICODE |
                                JSON_UNESCAPED_SLASHES
                            )
                        ]
                    );

           
                if (!$response->successful()) {

                    return response()->json([
                        'success' => false,
                        'message' => 'Document processor failed.',
                        'status' => $response->status(),
                        'response' => $response->json() ?? $response->body()
                    ], 502);
                }

            

                $data = $response->json();

                $filename = $data['Mapped_txt_file'] ?? null;

                if (!$filename) {

                    return response()->json([
                        'success' => false,
                        'message' => 'Mapped_txt_file was not returned by processor.',
                        'processor_response' => $data
                    ], 502);
                }

                /*
                |--------------------------------------------------------------------------
                | Download generated TXT
                |--------------------------------------------------------------------------
                */

                $downloadUrl =
                    'http://76.13.131.17:32775/download/output_file/' .
                    rawurlencode($filename);

                $txtResponse = Http::timeout(300)->get($downloadUrl);

                if (!$txtResponse->successful()) {

                    return response()->json([
                        'success' => false,
                        'message' => 'Failed to download generated TXT file.',
                        'status' => $txtResponse->status()
                    ], 502);
                }

                /*
                |--------------------------------------------------------------------------
                | Save generated TXT
                |--------------------------------------------------------------------------
                */

                $storagePath = 'scanned/' . $filename;

                Storage::disk('public')->put(
                    $storagePath,
                    $txtResponse->body()
                );

                /*
                |--------------------------------------------------------------------------
                | Update suggested result
                |--------------------------------------------------------------------------
                */

                $result->txt_file = $storagePath;
                $result->save();

           
                return response()->json([
                    'success' => true,

                    'message' => 'Document processed successfully.',

                    'id' => $result->id,

                    'original_file' => $originalName,

                    'mapped_file' => $filename,

                    'txt_file' => $storagePath,

                    'download_url' => Storage::disk('public')
                        ->url($storagePath),

                    /*
                    * This is useful to the mail processor.
                    * It contains the actual generated TXT content.
                    */
                    'txt_content' => $txtResponse->body(),

                    'processor_response' => $data
                ], 200);

            } catch (\Throwable $e) {

                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                    'line' => $e->getLine()
                ], 500);
            }
        }
}
