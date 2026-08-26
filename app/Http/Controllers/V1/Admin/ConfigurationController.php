<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuration; 

class ConfigurationController extends Controller
{
    public function configIndex()
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
                'string',
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
        ]);

        //check the process it wants to use either scan or direct and send it there 

        return back();
    }
}
