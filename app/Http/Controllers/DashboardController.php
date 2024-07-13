<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showAdminDashboardPage()
    {
        return view('dashboard.admin');
    }

    public function showHomestayDashboardPage()
    {
        return view('dashboard.homestay');
    }

    public function showUserDashboardPage()
    {
        return view('dashboard.user');
    }
}
