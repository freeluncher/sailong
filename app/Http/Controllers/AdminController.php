<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateAdminProfileRequest;

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

    public function updateProfile(UpdateAdminProfileRequest $request)
    {
        $admin = Auth::user();

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->password) {
            $admin->password = \Hash::make($request->password);
        }

        if ($request->hasFile('profile_photo_url')) {
            // Hapus file lama jika ada dan diganti
            if ($admin->profile_photo_url && \Storage::disk('public')->exists(str_replace('/storage/', '', $admin->profile_photo_url))) {
                \Storage::disk('public')->delete(str_replace('/storage/', '', $admin->profile_photo_url));
            }
            $path = $request->file('profile_photo_url')->store('profile_photos', 'public');
            $admin->profile_photo_url = '/storage/' . $path;
        }

        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
    }

}
