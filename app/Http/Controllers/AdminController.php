<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
        public function showAdminDashboardPage()
    {
        return view('admin.dashboard');
    }
    public function users()
    {
        $users = User::with('roles')->get();
        return view('admin.users', compact('users'));
    }
     public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.create', compact('roles','permissions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' =>'required|array',
            'permissions' => 'array',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->syncRoles($request->roles);
        $user->syncPermissions($request->permissions ?? []);
        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }
    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.edit', compact('user','roles','permissions'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'roles' => 'required|array',
            'permissions' => 'array',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);
        $user->syncRoles($request->roles);
        $user->syncPermissions($request->permissions ?? []);
        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }
     public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}