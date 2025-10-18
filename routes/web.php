<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\Settings\User\UserController;
use App\Http\Controllers\Admin\Settings\Settings\SettingController;
use App\Http\Controllers\Admin\Settings\Branch\BranchController;
use App\Http\Controllers\Admin\Settings\DashboardController;
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

        // Users CRUD
        Route::resource('users', UserController::class)->except(['show']);

        // Branches CRUD
        Route::resource('branches', BranchController::class)->except(['show']);

        // Settings Page
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    });
});
