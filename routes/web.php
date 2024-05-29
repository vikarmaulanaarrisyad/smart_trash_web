<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SampahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['midleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('sampah', SampahController::class);
});
