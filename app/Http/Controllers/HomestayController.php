<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}