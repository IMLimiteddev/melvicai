<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Mapping;
use App\Models\TempMappping;
use Illuminate\Support\Facades\Http;
use App\Models\Verb;

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
                        'http://76.13.131.17:32775/docs/schworer/new-rule',
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

             dd($data);

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
            return redirect()->away(
                'http://76.13.131.17:32775/download/output_file/' . rawurlencode($filename)
            );
        }
     
}
