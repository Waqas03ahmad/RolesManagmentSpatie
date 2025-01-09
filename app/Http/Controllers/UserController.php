<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('roles')->paginate(10); // Get users with their roles
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all(); // Get all roles
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:25',
            'email' => 'required',
            'password' => 'required|min:5',
            'role' => 'required|exists:roles,name', // Validate role
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role); // Assign role to user
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $roles = Role::all(); // Get all roles
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:25',
            'email' => 'required',
            'role' => 'required|exists:roles,name', // Validate role
        ]);

        // Update user details
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // If a password is provided, update it
        if ($request->password) {

            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        // Sync roles (this will replace the previous role with the new role)
        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete(); // Delete user
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
