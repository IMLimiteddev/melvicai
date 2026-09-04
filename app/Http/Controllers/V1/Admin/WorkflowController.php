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

    public function indexWorkflow()
    {
        $configs = Configuration::all();
        $workflowConnectors = WorkflowConnector::all();
        $workflows = Workflow::all();
        return view('admin.workflow.index', compact('configs', 'workflowConnectors', 'workflows'));
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
        $request->validate([ 
            'name' => 'required|string|max:255', 
            'type' => 'required|in:input,output', ]);
    
        WorkflowConnector::create([ 'name' => $request->name, 'type' => $request->type, ]); 
        return back()->with('success', 'Connector created successfully.'); 
    
    }
}
