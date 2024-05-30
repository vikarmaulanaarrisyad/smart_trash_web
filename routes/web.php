<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\SampahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['midleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/sampah/data', [SampahController::class, 'data'])->name('sampah.data');
    Route::resource('sampah', SampahController::class);

    Route::get('history/data', [HistoryController::class, 'data'])->name('history.data');
    Route::resource('history', HistoryController::class);
});
