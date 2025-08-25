<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomAuthController;
use \App\Http\Controllers\Admin\DashboardController;
use \App\Http\Controllers\Admin\AgentController;
use \App\Http\Controllers\Admin\ProjectController;
use \App\Http\Controllers\Admin\SalesController;
use \App\Http\Controllers\Admin\PropertyController;
use \App\Http\Controllers\Admin\IncentiveController;
use \App\Http\Controllers\Admin\CollectionController;
use \App\Http\Controllers\Admin\CommissionController;
use \App\Http\Controllers\Admin\LeaderboardController;




// Custom login/register
Route::get('/login', [CustomAuthController::class, 'showLogin'])->name('custom.login');
Route::post('/login', [CustomAuthController::class, 'login'])->name('custom.login.submit');
Route::post('/register', [CustomAuthController::class, 'register'])->name('custom.register');
//Route::post('/logout', [CustomAuthController::class, 'logout'])->name('custom.logout');
Route::match(['get', 'post'], '/logout', [CustomAuthController::class, 'logout'])->name('custom.logout');


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


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/agents', [AgentController::class, 'index'])->name('admin.agents');
    Route::get('/projects', [ProjectController::class, 'index'])->name('admin.projects');
    Route::get('/properties', [PropertyController::class, 'index'])->name('admin.properties');
    Route::get('/sales', [SalesController::class, 'index'])->name('admin.sales');
    Route::get('/collections', [CollectionController::class, 'index'])->name('admin.collections');
    Route::get('/commission', [CommissionController::class, 'index'])->name('admin.commission');
    Route::get('/incentives', [IncentiveController::class, 'index'])->name('admin.incentives');
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('admin.leaderboard');
});
