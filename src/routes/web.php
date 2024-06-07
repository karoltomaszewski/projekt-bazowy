<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

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

Route::middleware(['auth'])->group(function () {

    // ADMIN TOOL
    Route::middleware(['permission:admin_tool_access'])->group(function () {
        Route::get("/admin", [AdminDashboardController::class, 'index'])->name('admin');
        Route::get("/admin/users", [AdminUsersController::class, 'index'])->name('admin.users');
        Route::get("/admin/users/{id}", [AdminUsersController::class, 'show'])->name('admin.users.show');
        Route::get("/admin/roles_and_permissions", [PermissionsController::class, 'index'])->name('admin.permissions');
        Route::get("/admin/roles/{id}", [PermissionsController::class, 'index'])->name('admin.roles.show');
    });

    Route::get("/", [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/register', [LoginController::class, 'showRegister'])->name('showRegister');
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::post('/register', [LoginController::class, 'register'])->name('register');
});
