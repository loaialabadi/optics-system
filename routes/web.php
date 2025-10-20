<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\Settings\User\UserController;
use App\Http\Controllers\Admin\Settings\Settings\SettingController;
use App\Http\Controllers\Admin\Settings\Branch\BranchController;
use App\Http\Controllers\Admin\Settings\DashboardController;
use App\Http\Controllers\Admin\Supplier\SupplierController;
use App\Http\Controllers\Admin\Doctor\DoctorController;

use App\Http\Middleware\CheckLogin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --------------------
// Login / Logout
// --------------------
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// --------------------
// Protected Routes (with middleware)
// --------------------
Route::middleware([CheckLogin::class])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/branchs', [DashboardController::class, 'branch'])->name('branch.index');
        Route::get('/workshop', [DashboardController::class, 'workshop'])->name('workshop.index');

        // Users CRUD
        Route::resource('users', UserController::class)->except(['show']);

        // Branches CRUD
        Route::resource('branches', BranchController::class)->except(['show']);

        // Settings Page
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    });



    Route::prefix('branch')->name('branch.')->middleware([CheckLogin::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('branch.dashboard');
    })->name('dashboard.index');
});

Route::prefix('workshop')->name('workshop.')->middleware([CheckLogin::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('workshop.dashboard');
    })->name('dashboard.index');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('suppliers', App\Http\Controllers\Admin\Supplier\SupplierController::class);
});

Route::resource('doctors', \App\Http\Controllers\Admin\Doctor\DoctorController::class)->names('admin.doctors');

});
