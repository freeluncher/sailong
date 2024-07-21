<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function edit($roleId)
    {
        $role = Role::findById($roleId);
        $permissions = Permission::all();
        return view('admin.roles.permissions', compact('role', 'permissions'));
    }

    public function update(Request $request, $roleId)
    {
        $role = Role::findById($roleId);
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            if ($request->has('permissions') && in_array($permission->id, $request->permissions)) {
                $role->givePermissionTo($permission);
            } else {
                $role->revokePermissionTo($permission);
            }
        }

        return redirect()->route('roles.index')->with('success', 'Permissions updated successfully');
    }
}
