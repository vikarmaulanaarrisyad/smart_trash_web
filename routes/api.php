<?php

use App\Http\Controllers\API\ApiSampahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('sampah', ApiSampahController::class);
