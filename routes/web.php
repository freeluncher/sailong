<?php

use App\Http\Controllers\CuisineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomestayController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\LandingPageController;
use App\Http\Controllers\Admin\CrudUserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\Admin\AccommodationController as AdminAccommodationController;
use App\Http\Controllers\Admin\AdminCuisineController;
use App\Http\Controllers\AccommodationController;

Route::get('/', function () {
    $activePage = \App\Models\LandingPage::where('is_active', true)->first();

    if ($activePage) {
        return view('landing-page', ['landingPage' => $activePage]);
    } else {
        return view('welcome'); // Default page if no landing page is active
    }
});
Route::get('/landing-page/{id}', [LandingPageController::class, 'show'])->name('landing-page.show');
Route::post('landing-pages/{landingPage}/activate', [LandingPageController::class, 'activate'])->name('landing-pages.activate');
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('destinations/{destination}', [DestinationController::class, 'show'])->name('destinations.show');
Route::get('/accommodations', [AccommodationController::class, 'index'])->name('public-accommodations.index');
Route::get('accommodations/{accommodation}', [AccommodationController::class, 'show'])->name('public-accommodations.show');
Route::get('/tours', [TourController::class, 'index'])->name('tours.index');
Route::get('tours/{tour}', [TourController::class, 'show'])->name('tours.show');
Route::get('/cuisines', [CuisineController::class, 'index'])->name('cuisines.index');
Route::get('cuisines/{cuisine}', [CuisineController::class, 'show'])->name('cuisines.show');

/*------------------------------------------------------------------------------------------------------------------------------------------------
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
})->name('dashboard');

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
    Route::resource('admin/users', CrudUserController::class);
    Route::resource('admin/roles', RoleController::class);
    Route::resource('admin/permissions', PermissionController::class);
    Route::get('admin/roles/{role}/permissions', [RolePermissionController::class, 'edit'])->name('roles.permissions.edit');
    Route::post('admin/roles/{role}/permissions', [RolePermissionController::class, 'update'])->name('roles.permissions.update');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::resource('admin/landing-pages', LandingPageController::class);
    //Route untuk Admin Destinations
    Route::get('/admin/destinations', [DestinationController::class, 'manage'])->name('admin.destinations.manage');
    Route::get('/admin/destinations/create', [DestinationController::class, 'create'])->name('admin.destinations.create');
    Route::post('/admin/destinations', [DestinationController::class, 'store'])->name('admin.destinations.store');
    Route::get('/admin/destinations/{destination}/edit', [DestinationController::class, 'edit'])->name('admin.destinations.edit');
    Route::put('/admin/destinations/{destination}', [DestinationController::class, 'update'])->name('admin.destinations.update');
    Route::delete('/admin/destinations/{destination}', [DestinationController::class, 'destroy'])->name('admin.destinations.destroy');
    // Route untuk Admin Accommodations
    Route::resource('admin/accommodations', AdminAccommodationController::class);
    // Route untuk Admin Cuisines
    Route::get('/admin/cuisines/', [AdminCuisineController::class, 'index'])->name('admin.cuisines.index');
    Route::get('/admin/cuisines/{id}/edit', [AdminCuisineController::class, 'edit'])->name('admin.cuisines.edit');
    Route::put('/admin/cuisines/{id}', [AdminCuisineController::class, 'update'])->name('admin.cuisines.update');
});

//<----------- Homestay Route -------------->
Route::middleware(['auth', 'role:homestay', 'PreventBackHistory'])->group(function () {
    Route::get('/homestay/dashboard', [HomestayController::class, 'showHomestayDashboardPage'])->name('homestay.dashboard');
    Route::get('/homestay/reservations', [HomestayController::class, 'reservations'])->name('homestay.reservations');
    Route::get('/homestay/settings', [HomestayController::class, 'settings'])->name('homestay.settings');
    Route::get('/homestay/profile', [HomestayController::class, 'profile'])->name('homestay.profile');
    Route::put('/homestay/profile', [HomestayController::class, 'updateProfile'])->name('homestay.updateProfile');
});
//<----------- User Route -------------->
Route::middleware(['auth', 'role:user', 'PreventBackHistory'])->group(function () {
    Route::get('/{name}/dashboard', [UserController::class, 'showUserDashboardPage'])->name('user.dashboard');
    Route::get('/{name}/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::put('/{name}/profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
    Route::get('/{name}/bookings', [UserController::class, 'bookings'])->name('user.bookings');
});