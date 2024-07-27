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
         $remember = $request->has('remember'); // Check if 'remember' field is present
        if (Auth::attempt($credentials, $remember)) {
            /** @var \App\Models\User */
            $user = Auth::user();
            $name = $user->name;

            if ($user->hasRole('admin')) {
                return redirect()->intended("/$name/dashboard");
            } elseif ($user->hasRole('homestay')) {
                return redirect()->intended("/$name/dashboard");
            } else {
                return redirect()->intended("/$name/dashboard");
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
