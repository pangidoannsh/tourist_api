<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TouristController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/profile', [AuthController::class, 'editProfile']);
    Route::get('/profile', [AuthController::class, 'profile']);

    Route::get("tourist", [TouristController::class, 'index']);
    Route::post("tourist", [TouristController::class, 'store']);
    Route::post("tourist/{id}", [TouristController::class, 'update']);
    Route::delete("tourist/{id}", [TouristController::class, 'destroy']);
});
Route::get("public/tourist", [TouristController::class, 'indexPublic']);
Route::get("tourist/{id}", [TouristController::class, 'show']);
