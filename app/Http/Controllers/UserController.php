<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfileRequest;
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

    public function updateProfile(UpdateUserProfileRequest $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_photo_url')) {
            // Hapus file lama jika ada dan diganti
            if ($user->profile_photo_url && \Storage::disk('public')->exists(str_replace('/storage/', '', $user->profile_photo_url))) {
                \Storage::disk('public')->delete(str_replace('/storage/', '', $user->profile_photo_url));
            }
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
