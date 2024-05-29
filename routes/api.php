<?php

use App\Http\Controllers\AircraftController;
use App\Http\Controllers\AircraftSeatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\UserController;
use App\Models\Aircraft_seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/users', [UserController::class, 'getAllUsers']);
    Route::post('/aircrafts/save', [AircraftController::class, 'storeAircraft']);
    Route::get('/aircraft/getAll', [AircraftController::class, 'getAllAircraft']);
    Route::get('/aircraft/show/{aircraft}', [AircraftController::class, 'show']);
    Route::post('/rates/saveRate', [RateController::class, 'saveRate']);
    Route::get('/rates/getAll', [RateController::class, 'getAllRates']);
    Route::post('/targets/saveTarget', [TargetController::class, 'saveTarget']);
    Route::get('/targets/getAll', [TargetController::class, 'getAll']);
    Route::post('/aircraft_seat/saveAircraftSeat', [AircraftSeatController::class, 'saveAircraftSeat']);
    Route::get('/aircraftSeats/getByAircraft/{aircraft}', [AircraftSeatController::class, 'getSeatsByAircraft']);
});

Route::post('/user/login', [AuthController::class, 'login']);

Route::post('/user/storeUser', [UserController::class, 'storeUser']);
