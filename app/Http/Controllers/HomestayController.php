<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomestayController extends Controller
{
      public function showHomestayDashboardPage()
    {
        return view('homestay.dashboard');
    }
     public function reservations()
    {
        return view('homestay.reservations');
    }

    public function settings()
    {
        return view('homestay.settings');
    }
        public function profile()
    {
        return view('homestay.profile');
    }

    public function updateProfile(Request $request)
    {
        $homestay = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $homestay->id,
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $homestay->name = $request->name;
        $homestay->email = $request->email;

        if ($request->password) {
            $homestay->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_photo_url')) {
            $path = $request->file('profile_photo_url')->store('profile_photos', 'public');
            $homestay->profile_photo_url = '/storage/' . $path;
        }

        $homestay->save();

        return redirect()->route('homestay.profile')->with('success', 'Profile updated successfully');
    }

}
