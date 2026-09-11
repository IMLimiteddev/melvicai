<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuration; 
use App\Models\Verb;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Workflow;
use App\Models\WorkflowConnector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class WorkflowController extends Controller
{
    public function workflowInitiate(Request $request)
    {
        $request->validate([
            'input_connector_id' => 'nullable|string',
            'output_connector_id' => 'nullable|string',
            'configuration_id' => 'required|exists:configurations,id',
        ]);

        // Find configuration
        $configuration = Configuration::findOrFail($request->configuration_id);

        // Find input connector
        $inputConnector = null;

        if ($request->filled('input_connector')) {
            $inputConnector = WorkflowConnector::findOrFail(
                $request->input_connector
            );
        }

        // Find output connector
        $outputConnector = null;

        if ($request->filled('output_connector')) {
            $outputConnector = WorkflowConnector::findOrFail(
                $request->output_connector
            );
        }

        // Create workflow
        $workflow = Workflow::create([
            'input_connector_id' => $inputConnector?->id,
            'input_name' => $inputConnector?->name,

            'output_connector_id' => $outputConnector?->id,
            'output_name' => $outputConnector?->name,

            'configuration_id' => $configuration->id,
            'config_name' => $configuration->config_name,

            'status' => 'inactive',
            'usage_count' => 0,
            'user_identifier' => '001',
        ]);

        return back()->with(
            'success',
            'Workflow created successfully.'
        );
    }


    public function indexWorkflow()
    {
        $configs = Configuration::all();

        $workflowConnectors = WorkflowConnector::all();

        $workflows = Workflow::all()
            ->groupBy('batch')
            ->map(fn ($batch) => $batch->first()->setAttribute(
                'inputs',
                $batch->pluck('input_name')->filter()->values()
            )->setAttribute(
                'outputs',
                $batch->pluck('output_name')->filter()->values()
            )->setAttribute(
            'configuration_id',
            $batch->first()->configuration_id
            ))
            ->values();

            // dd($workflows);

        return view(
            'admin.workflow.index',
            compact('configs', 'workflowConnectors', 'workflows')
        );
    }

    public function manageConnector()
    {
        // $configs = Configuration::all();
        $connectors = WorkflowConnector::all();
        // $workflows = Workflow::all();
        return view('admin.workflow.manage-connectors', compact('connectors'));
    }
    
    


   public function storeConnector(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:input,output',
            'account_email' => 'nullable|string|email',
            'email_client_id' => 'nullable|string',
            'email_client_secret' => 'nullable|string',
        ]);

        $connector = WorkflowConnector::create([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'account_email' => $validated['account_email'] ?? null,
            'email_client_id' => $validated['email_client_id'] ?? null,
            'email_client_secret' => $validated['email_client_secret'] ?? null,
            'status' => 'inactive',
        ]);

        // If called from JavaScript/AJAX, return JSON
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Connector created successfully.',
                'connector' => $connector,
            ], 201);
        }

        // If called from a normal form submission, redirect back
        return back()->with(
            'success',
            'Connector created successfully.'
        );
    }

    public function workarea()
    {
        $workflows = Workflow::all();
        $connectors = WorkflowConnector::all();
        $configs = Configuration::all();
        return view('admin.workflow.workarea', compact('workflows', 'connectors', 'configs'));
    }

   
    public function workflowUpdate(Request $request)
    {
        $request->validate([
            'batch' => 'required|string',
            'configuration_id' => 'required|exists:configurations,id',

            'input_connectors' => 'nullable|array',
            'input_connectors.*' => 'nullable|string',

            'output_connectors' => 'nullable|array',
            'output_connectors.*' => 'nullable|string',
        ]);

        DB::beginTransaction();

        $config = Configuration::findOrFail($request->configuration_id);

        try {

            $batch = $request->batch;

            $inputs = array_values(
                array_filter($request->input('input_connectors', []))
            );

            $outputs = array_values(
                array_filter($request->input('output_connectors', []))
            );

            /*
            |--------------------------------------------------------------------------
            | Get existing workflow rows
            |--------------------------------------------------------------------------
            */

            $workflows = Workflow::where('batch', $batch)
                ->orderBy('id')
                ->get();

            if ($workflows->isEmpty()) {
                return back()->with('error', 'Workflow batch not found.');
            }

            /*
            |--------------------------------------------------------------------------
            | Number of rows required
            |--------------------------------------------------------------------------
            */

            $requiredRows = max(
                count($inputs),
                count($outputs)
            );

            /*
            |--------------------------------------------------------------------------
            | Update existing rows
            |--------------------------------------------------------------------------
            */

            for ($i = 0; $i < $requiredRows; $i++) {

                if (isset($workflows[$i])) {

                    $workflow = $workflows[$i];

                } else {

                    /*
                    | Create another row when the user added
                    | more connectors than currently exist.
                    */

                    $workflow = new Workflow();

                    $workflow->batch = $batch;

                    /*
                    | Copy the other workflow information from
                    | the first row of this batch.
                    */

                    $firstWorkflow = $workflows->first();

                    $workflow->config_name = $firstWorkflow->config_name ?? null;
                    $workflow->status = $firstWorkflow->status ?? null;
                    $workflow->usage_count = $firstWorkflow->usage_count ?? 0;
                    $workflow->user_identifier = $firstWorkflow->user_identifier ?? null;
                }

                $workflow->configuration_id = $config->id;
                
                $workflow->config_name = $config->config_name;

                $workflow->input_name = $inputs[$i] ?? null;

                $workflow->output_name = $outputs[$i] ?? null;

                $workflow->save();
            }

            /*
            |--------------------------------------------------------------------------
            | Remove rows that are no longer needed
            |--------------------------------------------------------------------------
            */

            if ($workflows->count() > $requiredRows) {

                $idsToDelete = $workflows
                    ->slice($requiredRows)
                    ->pluck('id');

                Workflow::whereIn('id', $idsToDelete)->delete();
            }

            DB::commit();

            return redirect()
                ->back()
                ->with('success', 'Workflow updated successfully.');

        } catch (\Throwable $e) {

            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Failed to update workflow: ' . $e->getMessage());
        }
    }

    public function workflowSave(Request $request)
    {
        $request->validate([
            'workflows' => 'required|array|min:1',
            'workflows.*.input_connector_id' => 'required|exists:workflow_connectors,id',
            'workflows.*.configuration_id' => 'required|exists:configurations,id',
            'workflows.*.output_connector_id' => 'required|exists:workflow_connectors,id',
        ]);


        DB::beginTransaction();

        try {

            /*
            * Generate ONE batch for this entire save operation.
            */
            $batch = 'WF_'. strtoupper(
                Str::random(6)
            );

            foreach ($request->workflows as $workflowData) {

                /*
                * Make sure the connector types are correct.
                */
                $inputConnector = WorkflowConnector::where('id', $workflowData['input_connector_id'])
                    ->where('type', 'input')
                    ->firstOrFail();

                $outputConnector = WorkflowConnector::where('id', $workflowData['output_connector_id'])
                    ->where('type', 'output')
                    ->firstOrFail();

                $configuration = Configuration::findOrFail(
                    $workflowData['configuration_id']
                );

                /*
                * Create ONE database record for this
                * Input -> Configuration -> Output chain.
                */
                Workflow::create([
                    'batch' => $batch,

                    'input_connector_id' => $inputConnector->id,
                    'input_name' => $inputConnector->name,

                    'configuration_id' => $configuration->id,
                    'config_name' => $configuration->config_name,

                    'output_connector_id' => $outputConnector->id,
                    'output_name' => $outputConnector->name,

                    'status' => 'inactive',
                    'usage_count' => 0,
                    'user_identifier' => auth()->id(),
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Workflow saved successfully.',
                'batch' => $batch,
                'count' => count($request->workflows),
            ]);

        } catch (\Throwable $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Unable to save workflow.' . $e->getMessage(),
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ], 500);
        }
    }

    public function workflowSingle(Request $request, $id = null)
    {
        $workflow = Workflow::where('id', $id)->firstOrFail();

        $batch = Workflow::where('batch', $workflow->batch)
            ->orderBy('id')
            ->get();

        $workflow->setAttribute(
            'inputs',
            $batch->pluck('input_name')
                ->filter(fn ($value) => !is_null($value) && $value !== '')
                ->values()
                ->toArray()
        );

        $workflow->setAttribute(
            'outputs',
            $batch->pluck('output_name')
                ->filter(fn ($value) => !is_null($value) && $value !== '')
                ->values()
                ->toArray()
        );

        $workflowConnectors = WorkflowConnector::all();

        $configs = Configuration::all();

        return view(
            'admin.workflow.single',
            compact(
                'workflow',
                'workflowConnectors',
                'configs'
            )
        );
    }
    //mine
    public function connectorSuggestions(Request $request)
    {
        $type = $request->type;

        // Call your existing Gemini service here...

        return response()->json([
            'suggestions' => $type === 'input'
                ? ['PDF Input', 'Email Input', 'File Upload Input']
                : ['PDF Output', 'Email Output', 'Configuration Output']
        ]);
    }


    public function updateConnector(Request $request, $id)
    {
        $connector = WorkflowConnector::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'account_email' => 'nullable|email|max:255',
            'email_client_id' => 'nullable|string|max:255',
            'email_client_secret' => 'nullable|string|max:255',
            'type' => 'required|string|in:input,output',
        ]);

        $connector->update([
            'name' => $validated['name'],
            'account_email' => $validated['account_email'] ?? null,
            'email_client_id' => $validated['email_client_id'] ?? null,
            'email_client_secret' => $validated['email_client_secret'] ?? null,
            'type' => $validated['type'],
        ]);

        return redirect()
            ->back()
            ->with('success', 'Connector updated successfully.');
    }

    public function deleteConnector($id)
    {
        $connector = WorkflowConnector::findOrFail($id);

        $connector->delete();

        return redirect()
            ->back()
            ->with('success', 'Connector deleted successfully.');
    }

    // public function activateConfiguration(Request $request)
    // {
    //     /*
    //     |--------------------------------------------------------------------------
    //     | Validate request
    //     |--------------------------------------------------------------------------
    //     */

    //     $request->validate([
    //         'configuration_id' => 'required|integer',
    //         'batch'            => 'required|string',
    //     ]);

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Request values
    //     |--------------------------------------------------------------------------
    //     */

    //     $configurationId = $request->configuration_id;
    //     $batch           = $request->batch;

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Get configuration
    //     |--------------------------------------------------------------------------
    //     */

    //     $configuration = Configuration::findOrFail($configurationId);

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Get workflow
    //     |--------------------------------------------------------------------------
    //     */

    //     $workflow = Workflow::where(
    //         'batch',
    //         $batch
    //     )->firstOrFail();

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Get INPUT connectors
    //     |--------------------------------------------------------------------------
    //     */

    //     $inputConnectorIds = is_array($workflow->input_connector_id)
    //         ? $workflow->input_connector_id
    //         : json_decode($workflow->input_connector_id, true);

    //     if (!is_array($inputConnectorIds)) {
    //         $inputConnectorIds = [
    //             $workflow->input_connector_id
    //         ];
    //     }

    //     $inputConnectors = WorkflowConnector::whereIn(
    //         'id',
    //         array_filter($inputConnectorIds)
    //     )
    //         ->where('type', 'input')
    //         ->get();

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Get OUTPUT connectors
    //     |--------------------------------------------------------------------------
    //     */

    //     $outputConnectorIds = is_array($workflow->output_connector_id)
    //         ? $workflow->output_connector_id
    //         : json_decode($workflow->output_connector_id, true);

    //     if (!is_array($outputConnectorIds)) {
    //         $outputConnectorIds = [
    //             $workflow->output_connector_id
    //         ];
    //     }

    //     $outputConnectors = WorkflowConnector::whereIn(
    //         'id',
    //         array_filter($outputConnectorIds)
    //     )
    //         ->where('type', 'output')
    //         ->get();

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Make sure input connectors exist
    //     |--------------------------------------------------------------------------
    //     */

    //     if ($inputConnectors->isEmpty()) {
    //         return redirect()
    //             ->back()
    //             ->with(
    //                 'error',
    //                 'Activation failed: No input connector was found for this workflow.'
    //             );
    //     }

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Make sure output connectors exist
    //     |--------------------------------------------------------------------------
    //     */

    //     if ($outputConnectors->isEmpty()) {
    //         return redirect()
    //             ->back()
    //             ->with(
    //                 'error',
    //                 'Activation failed: No output connector was found for this workflow.'
    //             );
    //     }

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Validate INPUT connector credentials
    //     |--------------------------------------------------------------------------
    //     */

    //     foreach ($inputConnectors as $connector) {

    //         if (
    //             strtolower($connector->name) === 'email' &&
    //             (
    //                 empty($connector->account_email) ||
    //                 empty($connector->email_client_id) ||
    //                 empty($connector->email_client_secret)
    //             )
    //         ) {
    //             return redirect()
    //                 ->back()
    //                 ->with(
    //                     'error',
    //                     'Activation failed: Input connector "' .
    //                     $connector->name .
    //                     '" is missing email credentials.'
    //                 );
    //         }
    //     }

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Validate OUTPUT connector email
    //     |--------------------------------------------------------------------------
    //     */

    //     foreach ($outputConnectors as $connector) {

    //         if (empty($connector->account_email)) {
    //             return redirect()
    //                 ->back()
    //                 ->with(
    //                     'error',
    //                     'Activation failed: Output connector "' .
    //                     $connector->name .
    //                     '" does not have an email address.'
    //                 );
    //         }
    //     }

    //     /*
    //     |--------------------------------------------------------------------------
    //     | Authenticate INPUT connectors
    //     |--------------------------------------------------------------------------
    //     */

    //     try {

    //         $gmailService = app(
    //             \App\Services\WorkflowGmailService::class
    //         );

    //         foreach ($inputConnectors as $connector) {

    //             if (strtolower($connector->name) !== 'email') {
    //                 continue;
    //             }

    //             /*
    //             |--------------------------------------------------------------------------
    //             | No refresh token yet
    //             |--------------------------------------------------------------------------
    //             */

    //             if (empty($connector->refresh_token)) {

    //                 session([
    //                     'pending_activation' => [
    //                         'configuration_id' => $configurationId,
    //                         'batch'            => $batch,
    //                     ],
    //                 ]);

    //                 $authUrl = $gmailService->authorizeGmail(
    //                     $connector
    //                 );

    //                 return redirect()->away($authUrl);
    //             }

    //             /*
    //             |--------------------------------------------------------------------------
    //             | Authenticate existing Gmail token
    //             |--------------------------------------------------------------------------
    //             */

    //             try {

    //                 $gmailService->authenticateConnector(
    //                     $connector
    //                 );

    //             } catch (\Throwable $e) {

    //                 /*
    //                 |--------------------------------------------------------------------------
    //                 | Existing refresh token may be expired/revoked.
    //                 | Send user through Google authorization again.
    //                 |--------------------------------------------------------------------------
    //                 */

    //                 $connector->token_status = 'token_error';
    //                 $connector->status = 'error';
    //                 $connector->save();

    //                 session([
    //                     'pending_activation' => [
    //                         'configuration_id' => $configurationId,
    //                         'batch'            => $batch,
    //                     ],
    //                 ]);

    //                 $authUrl = $gmailService->authorizeGmail(
    //                     $connector
    //                 );

    //                 return redirect()->away($authUrl);
    //             }
    //         }

    //         } catch (\Throwable $e) {

    //             return redirect()
    //                 ->back()
    //                 ->with(
    //                     'error',
    //                     'Activation failed: ' . $e->getMessage()
    //                 );
    //         }



    //         /*
    //         |--------------------------------------------------------------------------
    //         | Gmail authentication successful
    //         | Activate workflow and perform first email check
    //         |--------------------------------------------------------------------------
    //         */


    //         // $gmailService = app(\App\Services\WorkflowGmailService::class);

    //         $workflow->status = 'active';
    //         $workflow->save();

    //         return redirect()
    //             ->route('admin.index.workflow')
    //             ->with(
    //                 'success',
    //                 'Workflow activated successfully and is now being monitored.'
    //             );

    //     /*
    //     |--------------------------------------------------------------------------
    //     | TEMPORARY TEST POINT
    //     |--------------------------------------------------------------------------
    //     |
    //     | If Gmail authentication succeeds, stop here for now.
    //     | We will add output-email testing next.
    //     |
    //     */

    //     dd([
    //         'configuration'   => $configuration,
    //         'workflow'        => $workflow,
    //         'input_connectors' => $inputConnectors,
    //         'output_connectors' => $outputConnectors,
    //         'message'         => 'Gmail authentication successful.',
    //     ]);
    // }

   public function activateConfiguration(Request $request)
   {
        /*
        |--------------------------------------------------------------------------
        | Validate request
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'configuration_id' => 'required|integer',
            'batch'            => 'required|string',
        ]);

        // dd($request->all());
        /*
        |--------------------------------------------------------------------------
        | Request values
        |--------------------------------------------------------------------------
        */

        $configurationId = $request->configuration_id;
        $batch           = $request->batch;

        /*
        |--------------------------------------------------------------------------
        | Get configuration
        |--------------------------------------------------------------------------
        */

        $configuration = Configuration::findOrFail($configurationId);

        /*
        |--------------------------------------------------------------------------
        | Get workflow
        |--------------------------------------------------------------------------
        */

        $workflow = Workflow::where(
            'batch',
            $batch
        )->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Get INPUT connectors
        |--------------------------------------------------------------------------
        */

        $inputConnectorIds = is_array($workflow->input_connector_id)
            ? $workflow->input_connector_id
            : json_decode($workflow->input_connector_id, true);

        if (!is_array($inputConnectorIds)) {
            $inputConnectorIds = [
                $workflow->input_connector_id
            ];
        }

        $inputConnectors = WorkflowConnector::whereIn(
            'id',
            array_filter($inputConnectorIds)
        )
            ->where('type', 'input')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Get OUTPUT connectors
        |--------------------------------------------------------------------------
        */

        $outputConnectorIds = is_array($workflow->output_connector_id)
            ? $workflow->output_connector_id
            : json_decode($workflow->output_connector_id, true);

        if (!is_array($outputConnectorIds)) {
            $outputConnectorIds = [
                $workflow->output_connector_id
            ];
        }

        $outputConnectors = WorkflowConnector::whereIn(
            'id',
            array_filter($outputConnectorIds)
        )
            ->where('type', 'output')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Make sure input connectors exist
        |--------------------------------------------------------------------------
        */

        if ($inputConnectors->isEmpty()) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Activation failed: No input connector was found for this workflow.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Make sure output connectors exist
        |--------------------------------------------------------------------------
        */

        if ($outputConnectors->isEmpty()) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Activation failed: No output connector was found for this workflow.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Determine INPUT connector
        |--------------------------------------------------------------------------
        */

        $inputNames = $inputConnectors
            ->pluck('name')
            ->map(function ($name) {
                return strtolower(trim($name));
            })
            ->values()
            ->toArray();

        /*
        |--------------------------------------------------------------------------
        | EMAIL WORKFLOW
        |--------------------------------------------------------------------------
        */

        if (in_array('email', $inputNames)) {

        // dd($inputNames);
            return $this->setupEmailActivation(
                $workflow,
                $configuration,
                $inputConnectors,
                $outputConnectors
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DEVICE UPLOAD WORKFLOW
        |--------------------------------------------------------------------------
        */

        if (in_array('device-upload', $inputNames)) {

            return $this->setupDeviceUploadActivation(
                $workflow,
                $configuration,
                $inputConnectors,
                $outputConnectors
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Unsupported INPUT connector
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->back()
            ->with(
                'error',
                'Activation failed: Unsupported input connector "' .
                ($inputConnectors->first()->name ?? 'Unknown') .
                '".'
            );
    }

    private function setupEmailActivation(
            $workflow,
            $configuration,
            $inputConnectors,
            $outputConnectors
        ) {
            /*
            |--------------------------------------------------------------------------
            | Validate INPUT connector credentials
            |--------------------------------------------------------------------------
            */

            foreach ($inputConnectors as $connector) {

                if (
                    strtolower($connector->name) === 'email' &&
                    (
                        empty($connector->account_email) ||
                        empty($connector->email_client_id) ||
                        empty($connector->email_client_secret)
                    )
                ) {
                    return redirect()
                        ->back()
                        ->with(
                            'error',
                            'Activation failed: Input connector "' .
                            $connector->name .
                            '" is missing email credentials.'
                        );
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Validate OUTPUT connector email
            |--------------------------------------------------------------------------
            */

            foreach ($outputConnectors as $connector) {

                if (empty($connector->account_email)) {
                    return redirect()
                        ->back()
                        ->with(
                            'error',
                            'Activation failed: Output connector "' .
                            $connector->name .
                            '" does not have an email address.'
                        );
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Authenticate INPUT connectors
            |--------------------------------------------------------------------------
            */

            try {

                $gmailService = app(
                    \App\Services\WorkflowGmailService::class
                );

                foreach ($inputConnectors as $connector) {

                    if (strtolower($connector->name) !== 'email') {
                        continue;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | No refresh token yet
                    |--------------------------------------------------------------------------
                    */

                    if (empty($connector->refresh_token)) {

                        session([
                            'pending_activation' => [
                                'configuration_id' => $configuration->id,
                                'batch'            => $workflow->batch,
                            ],
                        ]);

                        $authUrl = $gmailService->authorizeGmail(
                            $connector
                        );

                        return redirect()->away($authUrl);
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Authenticate existing Gmail token
                    |--------------------------------------------------------------------------
                    */

                    try {

                        $gmailService->authenticateConnector(
                            $connector
                        );

                    } catch (\Throwable $e) {

                        /*
                        |--------------------------------------------------------------------------
                        | Existing refresh token may be expired/revoked.
                        | Send user through Google authorization again.
                        |--------------------------------------------------------------------------
                        */

                        $connector->token_status = 'token_error';
                        $connector->status = 'error';
                        $connector->save();

                        session([
                            'pending_activation' => [
                                'configuration_id' => $configuration->id,
                                'batch'            => $workflow->batch,
                            ],
                        ]);

                        $authUrl = $gmailService->authorizeGmail(
                            $connector
                        );

                        return redirect()->away($authUrl);
                    }
                }

            } catch (\Throwable $e) {

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'Activation failed: ' . $e->getMessage()
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | Gmail authentication successful
            |--------------------------------------------------------------------------
            |
            | DO NOT process the email here.
            | The scheduler handles email processing.
            |--------------------------------------------------------------------------
            */

            $workflow->status = 'active';
            $workflow->save();

            return redirect()
                ->route('admin.index.workflow')
                ->with(
                    'success',
                    'Email workflow activated successfully and is now being monitored.'
                );
        }


    

    
        public function authorizeGmail($id)
    {
        try {

            $connector = WorkflowConnector::findOrFail($id);

            $gmailService = app(
                \App\Services\WorkflowGmailService::class
            );

            $authUrl = $gmailService->authorizeGmail(
                $connector
            );

            return redirect()->away($authUrl);

        } catch (\Throwable $e) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Gmail authorization failed: ' .
                    $e->getMessage()
                );
        }
    }

    private function setupDeviceUploadActivation($workflow,$configuration,$inputConnectors,$outputConnectors) 
    {

            $workflow->status = 'active';
            $workflow->save();

            return redirect()
                ->route('admin.index.workflow')
                ->with(
                    'success',
                    'Device upload workflow activated successfully click on the use parameter to use.'
                );
    }

    
    public function useParameterView($config_id = null)
   
    {

            $configuration = Configuration::findOrFail($config_id);

            return view(
                'admin.workflow.use_parameter',
                compact('configuration')
            );

    }

    public function useParameterProcessConfig(Request $request, $config_id = null)
    {
        try {

            /*
            |--------------------------------------------------------------------------
            | Validate uploaded PDF
            |--------------------------------------------------------------------------
            */

            $request->validate([
                'file' => 'required|file|mimes:pdf',
            ]);


            /*
            |--------------------------------------------------------------------------
            | Get configuration
            |--------------------------------------------------------------------------
            */

            $configuration = Configuration::findOrFail($config_id);


            /*
            |--------------------------------------------------------------------------
            | Get configured_data
            |--------------------------------------------------------------------------
            */

            $config = $configuration->configured_data;

            // Decode JSON if stored as string
            if (is_string($config)) {
                $config = json_decode($config, true);
            }

            if (!is_array($config)) {

                return redirect()
                    ->back()
                    ->with('error', 'Invalid configured_data format.');
            }


            /*
            |--------------------------------------------------------------------------
            | Remove configuration wrapper if present
            |--------------------------------------------------------------------------
            */

            if (isset($config['Configured_config'])) {
                $config = $config['Configured_config'];
            }


            /*
            |--------------------------------------------------------------------------
            | Validate configuration structure
            |--------------------------------------------------------------------------
            */

            if (
                !isset($config['Summary']) ||
                !isset($config['Header_Mapping']) ||
                !isset($config['Positions_Mapping'])
            ) {

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'Invalid configuration structure. Summary, Header Mapping and Positions Mapping are required.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | Get uploaded PDF
            |--------------------------------------------------------------------------
            */

            $file = $request->file('file');

            $originalName = $file->getClientOriginalName();


            /*
            |--------------------------------------------------------------------------
            | Send PDF + configured_data to processor
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
                            JSON_UNESCAPED_UNICODE |
                            JSON_UNESCAPED_SLASHES
                        )
                    ]
                );


            /*
            |--------------------------------------------------------------------------
            | Check processor response
            |--------------------------------------------------------------------------
            */

            if (!$response->successful()) {

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'Document processor failed. Please try again.'
                    );
            }


            $data = $response->json();


            /*
            |--------------------------------------------------------------------------
            | Get generated TXT filename
            |--------------------------------------------------------------------------
            */

            $filename = $data['Mapped_txt_file'] ?? null;

            if (!$filename) {

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'The document was processed, but no generated TXT file was returned.'
                    );
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

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'The document was processed, but the generated TXT file could not be downloaded.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | Save generated TXT using Laravel Storage
            |--------------------------------------------------------------------------
            */

            $storagePath =
                'configurations/' .
                $configuration->id .
                '/' .
                $filename;

            Storage::disk('public')->put(
                $storagePath,
                $txtResponse->body()
            );


            /*
            |--------------------------------------------------------------------------
            | Save output path to configuration
            |--------------------------------------------------------------------------
            */

            $configuration->output_file_path = $storagePath;
            $configuration->save();


            /*
            |--------------------------------------------------------------------------
            | Create Laravel download URL
            |--------------------------------------------------------------------------
            */

            $localDownloadUrl = Storage::disk('public')
                ->url($storagePath);


            /*
            |--------------------------------------------------------------------------
            | Return to the same page with notification
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->back()
                ->with('success', 'Document processed successfully.')
                ->with('processed_file', $originalName)
                ->with('mapped_file', $filename)
                ->with('download_url', $localDownloadUrl)
                ->with('configuration_id', $configuration->id);


        } catch (\Throwable $e) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Unable to process the document: ' . $e->getMessage()
                );
        }
    }

    public function gmailCallback(Request $request)
    {
        try {

            $gmailService = app(
                \App\Services\WorkflowGmailService::class
            );

            $connector = $gmailService->gmailCallback(
                $request
            );

            /*
            |--------------------------------------------------------------------------
            | Check whether activation was waiting for this authorization
            |--------------------------------------------------------------------------
            */

            $pendingActivation = session(
                'pending_activation'
            );

            session()->forget('pending_activation');

            if ($pendingActivation) {

                return redirect()
                    ->route('admin.index.workflow')
                    ->with(
                        'success',
                        'Gmail account authorized successfully. Please activate the workflow again to continue testing.'
                    );
            }

            return redirect()
                ->route('admin.index.workflow')
                ->with(
                    'success',
                    'Gmail account connected successfully.'
                );

        } catch (\Throwable $e) {

            return redirect()
                ->route('admin.index.workflow')
                ->with(
                    'error',
                    'Gmail authorization failed: ' .
                    $e->getMessage()
                );
        }
    }

    
}
