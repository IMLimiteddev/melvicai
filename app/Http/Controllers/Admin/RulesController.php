<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RulesController extends Controller
{
     public function ruleSingle()
    {
        $response = \Http::get('http://31.97.126.130:1000/docs/schworer/visualize');
        $data = $response->json();

        // dd($data);
        return view('admin.single_rule', compact('data'));  
    } 
}
