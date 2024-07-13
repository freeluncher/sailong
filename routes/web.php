<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Authentication Route
Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});
Route::middleware(['auth', 'redirect.role.dashboard'])->get('/dashboard', function () {
    // This will never be reached as the middleware will handle the redirect
    return view('dashboard');
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('forgotPassword', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('forgotPassword', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

//Dashboard Route
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/admin', [DashboardController::class, 'showAdminDashboardPage'])->name('dashboard.admin');
});
Route::middleware(['auth', 'role:homestay'])->group(function () {
    Route::get('/dashboard/homestay', [DashboardController::class, 'showHomestayDashboardPage'])->name('dashboard.homestay');
});
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard/user', [DashboardController::class, 'showUserDashboardPage'])->name('dashboard.user');
});
