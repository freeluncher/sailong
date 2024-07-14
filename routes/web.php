<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomestayController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\LandingPageController;


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
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::get('/admin/landing-pages/index', [LandingPageController::class, 'index'])->name('admin.landing-pages.index');
    Route::get('/admin/landing-pages/index/create', [LandingPageController::class, 'create'])->name('admin.landing-pages.create');
    Route::get('/admin/landing-pages/index/edit', [LandingPageController::class, 'edit'])->name('admin.landing-pages.edit');
    Route::post('/admin/landing-pages/index/destroy', [LandingPageController::class, 'destroy'])->name('admin.landing-pages.destroy');
    Route::post('/admin/landing-pages/index/store', [LandingPageController::class, 'store'])->name('admin.landing-pages.store');
    Route::resource('admin/landing-pages', LandingPageController::class);

});
//<----------- Homestay Route -------------->
Route::middleware(['auth', 'role:homestay', 'PreventBackHistory'])->group(function () {
    Route::get('/homestay/dashboard', [HomestayController::class, 'showHomestayDashboardPage'])->name('homestay.dashboard');
    Route::get('/homestay/reservations', [HomestayController::class, 'reservations'])->name('homestay.reservations');
    Route::get('/homestay/settings', [HomestayController::class, 'settings'])->name('homestay.settings');
});
//<----------- User Route -------------->
Route::middleware(['auth', 'role:user', 'PreventBackHistory'])->group(function () {
    Route::get('/{name}/dashboard', [UserController::class, 'showUserDashboardPage'])->name('user.dashboard');
    Route::get('/{name}/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/{name}/bookings', [UserController::class, 'bookings'])->name('user.bookings');
});