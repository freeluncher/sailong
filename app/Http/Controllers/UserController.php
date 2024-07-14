<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUserDashboardPage()
    {
        return view('user.dashboard');
    }
    public function profile()
    {
        return view('user.profile');
    }

    public function bookings()
    {
        return view('user.bookings');
    }
}
