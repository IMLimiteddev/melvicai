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
            'Workflow(s) created successfully.'
        );
    }

    public function indexWorkflow()
    {
        $configs = Configuration::all();

        $workflowConnectors = WorkflowConnector::all();

        $workflows = Workflow::all()
            ->groupBy('batch')
            ->map(function ($batch) {

                $first = $batch->first();

                // Keep the existing batch-level data
                $first->setAttribute(
                    'inputs',
                    $batch->pluck('input_name')->filter()->values()
                );

                $first->setAttribute(
                    'outputs',
                    $batch->pluck('output_name')->filter()->values()
                );

                // NEW:
                // Keep every individual workflow/configuration
                // under the same batch.
                $first->setAttribute(
                    'workflow_items',
                    $batch->values()
                );

                return $first;
            })
            ->values();

        return view(
            'admin.workflow.index',
            compact(
                'configs',
                'workflowConnectors',
                'workflows'
            )
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
            'batch_name' => 'nullable|string|max:100|unique:workflows,batch',
            'workflows' => 'required|array|min:1',
            'workflows.*.input_connector_id' => 'required|exists:workflow_connectors,id',
            'workflows.*.configuration_id' => 'required|string',
            'workflows.*.output_connector_id' => 'required|exists:workflow_connectors,id',
        ]);

        \Log::info('WORKFLOW SAVE REQUEST', [
            'workflows' => $request->workflows,
        ]);

        DB::beginTransaction();

        try {

            if (empty($request->batch_name)) {

                $batch = 'WF_' . strtoupper(
                    Str::random(6)
                );

            } else {

                $batch = trim($request->batch_name);

                if (Workflow::where('batch', $batch)->exists()) {

                    return response()->json([
                        'success' => false,
                        'message' => 'This batch name already exists. Please choose another name.',
                    ], 422);
                }
            }


            foreach ($request->workflows as $workflowData) {

                /*
                * Make sure the connectors are correct.
                */
                $inputConnector = WorkflowConnector::where(
                    'id',
                    $workflowData['input_connector_id']
                )
                    ->where('type', 'input')
                    ->firstOrFail();


                $outputConnector = WorkflowConnector::where(
                    'id',
                    $workflowData['output_connector_id']
                )
                    ->where('type', 'output')
                    ->firstOrFail();


                /*
                * Convert:
                *
                * "20,22,24"
                *
                * into:
                *
                * [20, 22, 24]
                */
                $configurationIds = array_filter(
                    array_map(
                        'trim',
                        explode(',', $workflowData['configuration_id'])
                    )
                );


                /*
                * Create one workflow for EACH configuration.
                */
                foreach ($configurationIds as $configurationId) {

                    $configuration = Configuration::findOrFail(
                        $configurationId
                    );


                    \Log::info('CREATING WORKFLOW', [
                        'batch' => $batch,
                        'input_connector_id' => $inputConnector->id,
                        'configuration_id' => $configuration->id,
                        'configuration_name' => $configuration->config_name,
                        'output_connector_id' => $outputConnector->id,
                    ]);


                    $workflow = Workflow::create([
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


                    \Log::info('WORKFLOW CREATED', [
                        'workflow_id' => $workflow->id,
                        'batch' => $workflow->batch,
                        'input_connector_id' => $workflow->input_connector_id,
                        'configuration_id' => $workflow->configuration_id,
                        'output_connector_id' => $workflow->output_connector_id,
                    ]);
                }
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

    public function activateConfiguration(Request $request)
    {
        $request->validate([
            'batch' => 'required|string',
        ]);

        // dd($request->all());

        $batch = $request->batch;


        /*
        |--------------------------------------------------------------------------
        | GET ALL WORKFLOWS IN THE BATCH
        |--------------------------------------------------------------------------
        */

        $workflows = Workflow::where(
            'batch',
            $batch
        )->get();


        if ($workflows->isEmpty()) {
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Activation failed: No workflows were found for this batch.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | LOOP THROUGH EACH WORKFLOW
        |--------------------------------------------------------------------------
        */

        foreach ($workflows as $workflow) {

            /*
            |--------------------------------------------------------------------------
            | GET THIS WORKFLOW'S CONFIGURATION
            |--------------------------------------------------------------------------
            */

            $configuration = Configuration::findOrFail(
                $workflow->configuration_id
            );


            /*
            |--------------------------------------------------------------------------
            | GET INPUT CONNECTOR
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
            | GET OUTPUT CONNECTOR
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
            | CHECK INPUT CONNECTOR
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
            | CHECK OUTPUT CONNECTOR
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
            | GET INPUT NAMES
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

            //the use of this return id is to make the setupEmailActivation go straing to the oAuth
                return $this->setupEmailActivation(
                    $workflow,
                    $configuration,
                    $inputConnectors,
                    $outputConnectors
                );

                // continue;
            }


            /*
            |--------------------------------------------------------------------------
            | DEVICE UPLOAD WORKFLOW
            |--------------------------------------------------------------------------
            */

            if (in_array('device-upload', $inputNames)) {

                $this->setupDeviceUploadActivation(
                    $workflow,
                    $configuration,
                    $inputConnectors,
                    $outputConnectors
                );

                continue;
            }


            /*
            |--------------------------------------------------------------------------
            | UNSUPPORTED INPUT CONNECTOR
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


        /*
        |--------------------------------------------------------------------------
        | ALL WORKFLOWS PROCESSED
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->back()
            ->with(
                'success',
                'Workflow batch activated successfully.'
            );
    }

    // This should handle Email to all outputs connectors 
    private function setupEmailActivation(
                $workflow,
                $configuration,
                $inputConnectors,
                $outputConnectors
                ) {
                \Log::info('EMAIL ACTIVATION: STARTED', [
                    'workflow_id' => $workflow->id,
                    'configuration_id' => $configuration->id,
                    'batch' => $workflow->batch,
                ]);

                /*
                |--------------------------------------------------------------------------
                | Validate INPUT connector credentials
                |--------------------------------------------------------------------------
                */

                \Log::info('EMAIL ACTIVATION: STARTING INPUT CREDENTIAL VALIDATION', [
                    'input_connector_count' => $inputConnectors->count(),
                ]);

                foreach ($inputConnectors as $connector) {

                    \Log::info('EMAIL ACTIVATION: CHECKING INPUT CONNECTOR', [
                        'connector_id' => $connector->id,
                        'connector_name' => $connector->name,
                    ]);

                    if (
                        strtolower($connector->name) === 'email' &&
                        (
                            empty($connector->account_email) ||
                            empty($connector->email_client_id) ||
                            empty($connector->email_client_secret)
                        )
                    ) {
                        \Log::error('EMAIL ACTIVATION: INPUT CONNECTOR CREDENTIALS FAILED', [
                            'connector_id' => $connector->id,
                            'connector_name' => $connector->name,
                            'has_account_email' => !empty($connector->account_email),
                            'has_client_id' => !empty($connector->email_client_id),
                            'has_client_secret' => !empty($connector->email_client_secret),
                        ]);

                        return redirect()
                            ->back()
                            ->with(
                                'error',
                                'Activation failed: Input connector "' .
                                $connector->name .
                                '" is missing email credentials.'
                            );
                    }

                    \Log::info('EMAIL ACTIVATION: INPUT CONNECTOR PASSED', [
                        'connector_id' => $connector->id,
                        'connector_name' => $connector->name,
                    ]);
                }

                \Log::info('EMAIL ACTIVATION: INPUT CREDENTIAL VALIDATION PASSED');


                /*
                |--------------------------------------------------------------------------
                | Validate OUTPUT connector email
                |--------------------------------------------------------------------------
                */

                \Log::info('EMAIL ACTIVATION: STARTING OUTPUT EMAIL VALIDATION', [
                    'output_connector_count' => $outputConnectors->count(),
                ]);

                foreach ($outputConnectors as $connector) {

                    \Log::info('EMAIL ACTIVATION: CHECKING OUTPUT CONNECTOR', [
                        'connector_id' => $connector->id,
                        'connector_name' => $connector->name,
                    ]);

                    if (empty($connector->account_email)) {

                        \Log::error('EMAIL ACTIVATION: OUTPUT CONNECTOR VALIDATION FAILED', [
                            'connector_id' => $connector->id,
                            'connector_name' => $connector->name,
                        ]);

                        return redirect()
                            ->back()
                            ->with(
                                'error',
                                'Activation failed: Output connector "' .
                                $connector->name .
                                '" does not have an email address.'
                            );
                    }

                    \Log::info('EMAIL ACTIVATION: OUTPUT CONNECTOR PASSED', [
                        'connector_id' => $connector->id,
                        'connector_name' => $connector->name,
                    ]);
                }

                \Log::info('EMAIL ACTIVATION: OUTPUT EMAIL VALIDATION PASSED');


                /*
                |--------------------------------------------------------------------------
                | Authenticate INPUT connectors
                |--------------------------------------------------------------------------
                */

                \Log::info('EMAIL ACTIVATION: STARTING INPUT CONNECTOR AUTHENTICATION');

                try {

                    \Log::info('EMAIL ACTIVATION: LOADING GMAIL SERVICE');

                    $gmailService = app(
                        \App\Services\WorkflowGmailService::class
                    );

                    \Log::info('EMAIL ACTIVATION: GMAIL SERVICE LOADED SUCCESSFULLY');

                    foreach ($inputConnectors as $connector) {

                        \Log::info('EMAIL ACTIVATION: CHECKING CONNECTOR FOR GMAIL AUTHENTICATION', [
                            'connector_id' => $connector->id,
                            'connector_name' => $connector->name,
                        ]);

                        if (strtolower($connector->name) !== 'email') {

                            \Log::info('EMAIL ACTIVATION: CONNECTOR SKIPPED - NOT EMAIL', [
                                'connector_id' => $connector->id,
                                'connector_name' => $connector->name,
                            ]);

                            continue;
                        }

                        \Log::info('EMAIL ACTIVATION: EMAIL CONNECTOR FOUND', [
                            'connector_id' => $connector->id,
                            'connector_name' => $connector->name,
                            'has_refresh_token' => !empty($connector->refresh_token),
                        ]);

                        /*
                        |--------------------------------------------------------------------------
                        | No refresh token yet
                        |--------------------------------------------------------------------------
                        */

                        if (empty($connector->refresh_token)) {

                            \Log::warning('EMAIL ACTIVATION: NO REFRESH TOKEN FOUND', [
                                'connector_id' => $connector->id,
                                'connector_name' => $connector->name,
                            ]);

                            session([
                                'pending_activation' => [
                                    'configuration_id' => $configuration->id,
                                    'batch'            => $workflow->batch,
                                ],
                            ]);

                            \Log::info('EMAIL ACTIVATION: PENDING ACTIVATION SESSION CREATED', [
                                'configuration_id' => $configuration->id,
                                'batch' => $workflow->batch,
                            ]);

                            \Log::info('EMAIL ACTIVATION: REQUESTING GOOGLE AUTHORIZATION URL');

                            $authUrl = $gmailService->authorizeGmail(
                                $connector
                            );

                            \Log::info('EMAIL ACTIVATION: GOOGLE AUTHORIZATION URL GENERATED', [
                                'connector_id' => $connector->id,
                            ]);

                            \Log::info('EMAIL ACTIVATION: REDIRECTING TO GOOGLE AUTHORIZATION');

                            // dd('here');
                            return redirect()->away($authUrl);
                        }

                        /*
                        |--------------------------------------------------------------------------
                        | Authenticate existing Gmail token
                        |--------------------------------------------------------------------------
                        */

                        \Log::info('EMAIL ACTIVATION: REFRESH TOKEN FOUND', [
                            'connector_id' => $connector->id,
                            'connector_name' => $connector->name,
                        ]);

                        \Log::info('EMAIL ACTIVATION: AUTHENTICATING EXISTING GMAIL TOKEN');

                        try {

                            $gmailService->authenticateConnector(
                                $connector
                            );

                            \Log::info('EMAIL ACTIVATION: GMAIL AUTHENTICATION PASSED', [
                                'connector_id' => $connector->id,
                                'connector_name' => $connector->name,
                            ]);

                        } catch (\Throwable $e) {

                            \Log::error('EMAIL ACTIVATION: GMAIL AUTHENTICATION FAILED', [
                                'connector_id' => $connector->id,
                                'connector_name' => $connector->name,
                                'error' => $e->getMessage(),
                                'file' => $e->getFile(),
                                'line' => $e->getLine(),
                            ]);

                            /*
                            |--------------------------------------------------------------------------
                            | Existing refresh token may be expired/revoked.
                            | Send user through Google authorization again.
                            |--------------------------------------------------------------------------
                            */

                            \Log::warning('EMAIL ACTIVATION: MARKING GMAIL TOKEN AS ERROR', [
                                'connector_id' => $connector->id,
                            ]);

                            $connector->token_status = 'token_error';
                            $connector->status = 'error';
                            $connector->save();

                            \Log::info('EMAIL ACTIVATION: CONNECTOR ERROR STATUS SAVED', [
                                'connector_id' => $connector->id,
                                'token_status' => $connector->token_status,
                                'status' => $connector->status,
                            ]);

                            session([
                                'pending_activation' => [
                                    'configuration_id' => $configuration->id,
                                    'batch'            => $workflow->batch,
                                ],
                            ]);

                            \Log::info('EMAIL ACTIVATION: PENDING ACTIVATION SESSION CREATED FOR RE-AUTHORIZATION', [
                                'configuration_id' => $configuration->id,
                                'batch' => $workflow->batch,
                            ]);

                            \Log::info('EMAIL ACTIVATION: REQUESTING GOOGLE RE-AUTHORIZATION URL');

                            $authUrl = $gmailService->authorizeGmail(
                                $connector
                            );

                            \Log::info('EMAIL ACTIVATION: GOOGLE RE-AUTHORIZATION URL GENERATED', [
                                'connector_id' => $connector->id,
                            ]);

                            \Log::info('EMAIL ACTIVATION: REDIRECTING TO GOOGLE RE-AUTHORIZATION');

                            \Log::info('EMAIL ACTIVATION: REDIRECT RESPONSE PREPARED', [
                                'auth_url' => $authUrl,
                                'redirect_status' => 302,
                            ]);

                            return redirect()->away($authUrl);


                            // dd('here');
                            \Log::info('EMAIL ACTIVATION: REDIRECTING TO GOOGLE RE-AUTHORIZATION', [
                                'auth_url' => $authUrl,
                            ]);

                            // return response()->json([
                            //     'success' => true,
                            //     'redirect_url' => $authUrl,
                            // ]);
                        }
                    }

                } catch (\Throwable $e) {

                    \Log::error('EMAIL ACTIVATION: AUTHENTICATION STAGE FAILED', [
                        'workflow_id' => $workflow->id,
                        'configuration_id' => $configuration->id,
                        'batch' => $workflow->batch,
                        'error' => $e->getMessage(),
                        'file' => $e->getFile(),
                        'line' => $e->getLine(),
                    ]);

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

                \Log::info('EMAIL ACTIVATION: ALL GMAIL AUTHENTICATION CHECKS PASSED', [
                    'workflow_id' => $workflow->id,
                    'configuration_id' => $configuration->id,
                    'batch' => $workflow->batch,
                ]);

                \Log::info('EMAIL ACTIVATION: SETTING WORKFLOW STATUS TO ACTIVE', [
                    'workflow_id' => $workflow->id,
                ]);

                $workflow->status = 'active';
                $workflow->pair_code = 'EM_IN-EM_OUT';
                $workflow->save();

                \Log::info('EMAIL ACTIVATION: WORKFLOW STATUS SAVED', [
                    'workflow_id' => $workflow->id,
                    'status' => $workflow->status,
                ]);

                \Log::info('EMAIL ACTIVATION: COMPLETED SUCCESSFULLY', [
                    'workflow_id' => $workflow->id,
                    'configuration_id' => $configuration->id,
                    'batch' => $workflow->batch,
                ]);

                $inputConnector = \App\Models\WorkflowConnector::find(
                    $workflow->input_connector_id
                );

                if (!$inputConnector || empty($inputConnector->account_email)) {

                    \Log::error('EMAIL ACTIVATION: INPUT EMAIL NOT FOUND', [
                        'workflow_id' => $workflow->id,
                        'input_connector_id' => $workflow->input_connector_id,
                    ]);

                } else {

                 $pdfPath = 'D & M KG-Motor-elero-ja-soft-NHK.pdf';
                    \Illuminate\Support\Facades\Mail::to(
                        $inputConnector->account_email
                    )->send(
                        new \App\Mail\WorkflowActivationTestMail(
                            $pdfPath
                        )
                    );

                    \Log::info('EMAIL ACTIVATION: TEST PDF EMAIL SENT', [
                        'workflow_id' => $workflow->id,
                        'recipient' => $inputConnector->account_email,
                        'pdf' => $pdfPath,
                    ]);
                }

                alert()->success(
                    'Success',
                    'Email workflow activated successfully and is now being monitored.'
                );

                return redirect()->route('admin.index.workflow');
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

    // This should handle LocalUpload to all outputs connectors
    private function setupDeviceUploadActivation($workflow,$configuration,$inputConnectors,$outputConnectors) 
    {

            $workflow->status = 'active';
            $workflow->pair_code = 'DU_IN-DD_OUT';
            $workflow->save();

            // return redirect()
            //     ->route('admin.index.workflow')
            //     ->with(
            //         'success',
            //         'Device upload workflow activated successfully click on the use parameter to use.'
            //     );
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

            // if ($pendingActivation) {

            //     return redirect()
            //         ->route('admin.index.workflow')
            //         ->with(
            //             'success',
            //             'Gmail account authorized successfully. Please activate the workflow again to continue testing.'
            //         );
            // }

            if ($pendingActivation) {

                return $this->activateConfiguration(
                    new Request([
                        'batch' => $pendingActivation['batch'],
                    ])
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


   
    public function useParameterView($pair_code = null, $batch = null, $config_id = null)
    {
        if ($pair_code === 'DU_IN-DD_OUT') {

            return $this->du_in_dd_out(
                $config_id,
                $batch
            );
        }

        if ($pair_code === 'EM_IN-EM_OUT') {

            return $this->em_in_em_out(
                $config_id,
                $batch
            );
        }

    }

    private function du_in_dd_out($configID, $batch)
    {
        
 
        $workflow = Workflow::where('configuration_id', $configID)
            ->where('batch', $batch)
            ->firstOrFail();


        $configuration = Configuration::findOrFail(
            $workflow->configuration_id
        );

        

        return view(
            'admin.workflow.use_parameters.DU_IN-DD_OUT',
            compact('configuration', 'workflow')
        );
    }

    
}
