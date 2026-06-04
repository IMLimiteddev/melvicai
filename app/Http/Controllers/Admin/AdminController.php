<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Mapping;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('admin.users');
    }

    public function rolesPerm()
    {
        return view('admin.roles-perm');
    }


    // navigate to the customers page
    public function customers()
    {
        $customers = Customer::all();
        return view('admin.customers', compact('customers'));
    }
    
    public function customerSingle($id = null)
    {
        $mappings = Mapping::where('customer', $id)->get();
        return view('admin.customer_mapping_list', compact('mappings'));
    }
}
