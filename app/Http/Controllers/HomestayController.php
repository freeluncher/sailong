<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomestayController extends Controller
{
      public function showHomestayDashboardPage()
    {
        return view('homestay.dashboard');
    }
}