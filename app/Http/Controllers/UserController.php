<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUserDashboardPage()
    {
        return view('user.dashboard');
    }
}