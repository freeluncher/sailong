<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showUserDashboardPage()
    {
        return view('user.dashboard');
    }
    public function profile($name)
    {
        return view('user.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_photo_url')) {
            $path = $request->file('profile_photo_url')->store('profile_photos', 'public');
            $user->profile_photo_url = '/storage/' . $path;
        }

        $user->save();

        return redirect()->route('user.profile', ['name' => $user->name])->with('success', 'Profile updated successfully');
    }


    public function bookings()
    {
        return view('user.bookings');
    }
}
