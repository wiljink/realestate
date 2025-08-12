<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomAuthController;

// Custom login/register
Route::get('/login', [CustomAuthController::class, 'showLogin'])->name('custom.login');
Route::post('/login', [CustomAuthController::class, 'login'])->name('custom.login.submit');
Route::post('/register', [CustomAuthController::class, 'register'])->name('custom.register');
Route::post('/logout', [CustomAuthController::class, 'logout'])->name('custom.logout');

// Admin dashboard
Route::middleware(['auth', 'role:admin'])->group(function () {
Route::get('/admin/dashboard', function () {
return view('admin.dashboard');
})->name('admin.dashboard');
});

// Agent dashboard
Route::middleware(['auth', 'role:agent'])->group(function () {
Route::get('/agent/dashboard', function () {
return view('agent.dashboard');
})->name('agent.dashboard');
});
