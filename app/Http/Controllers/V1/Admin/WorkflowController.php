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

            'status' => 'active',
            'usage_count' => 0,
            'user_identifier' => '001',
        ]);

        return back()->with(
            'success',
            'Workflow created successfully.'
        );
    }

    // public function indexWorkflow()
    // {
    //     $configs = Configuration::all();
    //     $workflowConnectors = WorkflowConnector::all();
    //     $workflows = Workflow::all();
    //     return view('admin.workflow.index', compact('configs', 'workflowConnectors', 'workflows'));
    // }




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

    // public function workareaSave(Request $request)
    // {
    //     dd($request->all());
    // }

    public function workflowSave(Request $request)
    {
        $request->validate([
            'workflows' => 'required|array|min:1',
            'workflows.*.input_connector_id' => 'required|exists:workflow_connectors,id',
            'workflows.*.configuration_id' => 'required|exists:configurations,id',
            'workflows.*.output_connector_id' => 'required|exists:workflow_connectors,id',
        ]);

        // return response()->json([
        //         'success' => false,
        //         'message' => $request->workflows,
        //         // 'error' => $e->getMessage(),
        //         // 'line' => $e->getLine(),
        //         // 'file' => $e->getFile(),
        //     ], 500);

        DB::beginTransaction();

        try {

            /*
            * Generate ONE batch for this entire save operation.
            */
            $batch = 'WF_' . now()->format('YmdHis') . '_' . strtoupper(
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

                    'status' => 'active',
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
}
