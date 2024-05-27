<?php

use App\Http\Controllers\AircraftController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/users', [UserController::class, 'getAllUsers']);
    Route::post('/aircrafts/save', [AircraftController::class, 'storeAircraft']);
    Route::get('/aircraft/getAll', [AircraftController::class, 'getAllAircraft']);
    Route::get('/aircraft/show/{aircraft}', [AircraftController::class, 'show']);
    Route::post('/rates/saveRate', [RateController::class, 'saveRate']);
});

Route::post('/user/login', [AuthController::class, 'login']);

Route::post('/user/storeUser', [UserController::class, 'storeUser']);
