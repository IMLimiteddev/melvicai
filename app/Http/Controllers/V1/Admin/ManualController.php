<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workflow;
use App\Models\WorkflowConnector;
use App\Models\Configuration; 
use App\Models\Verb;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\ManualProcessor;

class ManualController extends Controller
{
    public function manualIndex() 
    {

        $workflow= Workflow::where('subject', 'MANUAL')->get();

        return view ('admin.processors.manual_index', compact('workflow'));
    }

    public function manualProcess(Request $request, $download_ready = null) 
    {

        // dd($request->all());

       $request->validate([
            'files' => 'required|array',
            'files.*' => 'file|mimes:pdf,txt|max:10240',
        ]);

        $route = 'http://76.13.131.17:32776';

        $batch = Str::random(5) . Str::random(5) . "CB";

        // dd($request->all());
        

        foreach ($request->file('files') as $f) {

            $file = $f;

            $originalFileName = $file->getClientOriginalName();
            $orgExtension = $file->getClientOriginalExtension();

            $uniqueName = 'IandM_' . rand(100000, 999999) . '.' . $orgExtension;

            $path = $file->storeAs(
                '/public/manual_processor_uploads',
                $uniqueName
            );

            $fullPath = Storage::disk('local')->path($path);

            // $fullPath = storage_path('app/' . $path);

            $response = Http::attach(
                'files',
                file_get_contents($fullPath),
                $uniqueName
            )->post($route . '/process_multiple_files');


            if ($response->successful()) {

                // Log into DB
                $upload = new ManualProcessor();

                $upload->file_name = $uniqueName;
                $upload->path = 'manual_processor_uploads/' . $uniqueName;
                $upload->batch = $batch;

                $upload->save();


                $data = $response->json();


                foreach ($data['output_files'] as $output) {

                    // Collect all TXT files automatically
                    $txtFiles = [];

                    foreach ($output as $key => $value) {

                        if (str_starts_with($key, 'txt') && !empty($value)) {
                            $txtFiles[] = $key . '=' . $value;
                        }
                    }

                    // Save TXT files as:
                    // txt=file.txt|txtb=file2.txt|txtl=file12.txt
                    $upload->txt_files = implode('|', $txtFiles);

                    $upload->excel = $output['excel'] ?? null;
                    $upload->pdf = $output['pdf'] ?? null;
                    $upload->base_file = $output['base_filename'] ?? null;
                    $upload->original_name = $originalFileName;

                    $upload->save();
                }


                $files = $data['output_files'];

                foreach ($files as $filename) {

                    $downloadables = [];

                    foreach ($filename as $key => $value) {

                        // Automatically include TXT files
                        if (str_starts_with($key, 'txt') && !empty($value)) {
                            $downloadables[] = $value;
                        }

                        // Include other output files
                        if (
                            in_array($key, ['excel', 'pdf']) &&
                            !empty($value)
                        ) {
                            $downloadables[] = $value;
                        }
                    }


                    foreach ($downloadables as $d) {

                        $downloadUrl = $route . "/download/output_file/{$d}";

                        $fileResponse = Http::get($downloadUrl);

                        if ($fileResponse->successful()) {

                            Storage::disk('local')->put(
                                "public/manual_processor_converted/{$d}",
                                $fileResponse->body()
                            );
                        }
                    }


                    $upload->status = 'converted';
                    $upload->save();
                }

            } else {


                return back();
            }
        }
        
        alert()->success('Success', 'Processed successfully');
        return redirect()->route('manual.download.page', $batch);
    }

    public function manualDownload($batch)
    {
        $batchCode = $batch;

        $batch = ManualProcessor::where('batch', $batchCode)->get();

        return view(
            'admin.processors.manual_download',
            compact('batch', 'batchCode')
        );
    }


    public function aiIndex()
    {

        $workflow = Workflow::where('subject', 'DEFAULT')->first();

        $configuration = Configuration::findOrFail(
            $workflow->configuration_id
        );

        return view(
            'admin.workflow.use_parameters.DU_IN-DD_OUT',
            compact('configuration', 'workflow')
        );
    }

}
