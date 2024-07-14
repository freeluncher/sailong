<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomestayController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});
/*
|------------------------------------------------------------------------------------------------------------------------------------------------
| Authentication Route
|------------------------------------------------------------------------------------------------------------------------------------------------
*/
//<----------- Login & Register Route -------------->
Route::middleware(['guest', 'PreventBackHistory'])->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

//<----------- Prevent Back History -------------->
Route::middleware(['auth', 'redirect.role.dashboard'])->get('/dashboard', function () {
    // This will never be reached as the middleware will handle the redirect
    return view('dashboard');
});

//<----------- Logout Route -------------->
Route::middleware(['auth', 'PreventBackHistory'])->group(
    function () {
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    }
);

//<----------- Forgot Password Route -------------->
Route::get('forgotPassword', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('forgotPassword', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

/*
|------------------------------------------------------------------------------------------------------------------------------------------------
| Role Route
|------------------------------------------------------------------------------------------------------------------------------------------------
*/

//<----------- Admin Route -------------->
Route::middleware(['auth', 'role:admin', 'PreventBackHistory'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'showAdminDashboardPage'])->name('admin.dashboard');
});
//<----------- Homestay Route -------------->
Route::middleware(['auth', 'role:homestay', 'PreventBackHistory'])->group(function () {
    Route::get('/homestay/dashboard', [HomestayController::class, 'showHomestayDashboardPage'])->name('homestay.dashboard');
});
//<----------- User Route -------------->
Route::middleware(['auth', 'role:user', 'PreventBackHistory'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'showUserDashboardPage'])->name('user.dashboard');
});
