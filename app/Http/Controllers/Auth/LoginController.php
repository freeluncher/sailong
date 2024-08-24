<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // Check if 'remember' field is present

        if (Auth::attempt($credentials, $remember)) {
            /** @var \App\Models\User */
            $user = Auth::user();
            $name = $user->name;

            if ($user->hasRole('admin')) {
                return redirect()->intended("/admin/dashboard");
            } elseif ($user->hasRole('homestay')) {
                return redirect()->intended("/$name/dashboard");
            } else {
                return redirect()->intended("/$name/dashboard");
            }
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang anda gunakan salah',
        ])->withInput($request->except('password'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}