<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
