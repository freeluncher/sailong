<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateHomestayProfileRequest;
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

    public function updateProfile(UpdateHomestayProfileRequest $request)
    {
        $homestay = Auth::user();

        $homestay->name = $request->name;
        $homestay->email = $request->email;

        if ($request->password) {
            $homestay->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_photo_url')) {
            // Hapus file lama jika ada dan diganti
            if ($homestay->profile_photo_url && \Storage::disk('public')->exists(str_replace('/storage/', '', $homestay->profile_photo_url))) {
                \Storage::disk('public')->delete(str_replace('/storage/', '', $homestay->profile_photo_url));
            }
            $path = $request->file('profile_photo_url')->store('profile_photos', 'public');
            $homestay->profile_photo_url = '/storage/' . $path;
        }

        $homestay->save();

        return redirect()->route('homestay.profile')->with('success', 'Profile updated successfully');
    }

}
