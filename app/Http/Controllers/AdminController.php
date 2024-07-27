<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
        public function showAdminDashboardPage()
    {
        return view('admin.dashboard');
    }

    public function settings()
    {
        return view('admin.settings');
    }
        public function profile()
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {
    $admin = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
        'password' => 'nullable|string|min:8|confirmed',
        'profile_photo_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $admin->name = $request->name;
    $admin->email = $request->email;

    if ($request->password) {
        $admin->password = Hash::make($request->password);
    }

    if ($request->hasFile('profile_photo_url')) {
        $path = $request->file('profile_photo_url')->store('profile_photos', 'public');
        $admin->profile_photo_url = '/storage/' . $path;
    }

    $admin->save();

    return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
    }

}
