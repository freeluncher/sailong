<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;


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
}
