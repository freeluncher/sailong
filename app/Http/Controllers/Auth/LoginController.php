<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;



class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            /** @var \App\Models\User */
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
            } elseif ($user->hasRole('homestay')) {
                return redirect()->intended(RouteServiceProvider::HOMESTAY_HOME);
            } else {
                return redirect()->intended(RouteServiceProvider::USER_HOME);
            }
        }
        return back()->withErrors(['email' => 'Email atau password yang anda gunakan salah']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
