<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->paginate(10); // Get roles with their permissions
        return view('role-permissions.index', compact('roles'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all(); // Get all permissions
        return view('role-permissions.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'permissions' => 'array|nullable', // Validate as an array (nullable if no permissions are selected)
        ]);

        $role->syncPermissions($request->permissions); // Sync permissions
        return redirect()->route('role-permissions.index')->with('success', 'Permissions updated successfully.');
    }
}
