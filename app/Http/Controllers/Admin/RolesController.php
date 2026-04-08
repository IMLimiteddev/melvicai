<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function mkRole(Request $request)
    {
        $request->validate([
        'role' => 'required|string|max:255'
        ]);

         try {
            Role::create([
                'name' => $request->role
            ]);

            return back()->with('success', 'Role created successfully');

            } catch (\Spatie\Permission\Exceptions\RoleAlreadyExists $e) {

                return back()->with('warning', 'Role already exists');

            } catch (\Exception $e) {

                return back()->with('error', 'Something went wrong');

            }
        
    }

    public function mkPermission(Request $request)
    {
        $request->validate([
        'permission' => 'required|string|max:255'
        ]);

         try {
            Permission::create([
                'name' => $request->permission
            ]);

            return back()->with('success', 'Permission created successfully');

            } catch (\Spatie\Permission\Exceptions\PermissionAlreadyExists $e) {

                return back()->with('warning', 'Permission already exists');

            } catch (\Exception $e) {

                return back()->with('error', 'Something went wrong');

            }
        
    }   
}
