<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\TouristController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/profile', [AuthController::class, 'editProfile']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/change-password', [AuthController::class, 'changePassword']);

    Route::post("tourist", [TouristController::class, 'store']);
    Route::post("tourist/{id}", [TouristController::class, 'update']);
    Route::delete("tourist/{id}", [TouristController::class, 'destroy']);

    Route::get("/favorite", [FavoriteController::class, 'index']);
    Route::post("/favorite/{id}", [FavoriteController::class, 'store']);
    Route::delete("/favorite/{id}", [FavoriteController::class, 'delete']);
});

Route::get("tourist", [TouristController::class, 'index']);
Route::get("public/tourist", [TouristController::class, 'indexPublic']);
Route::get("tourist/{id}", [TouristController::class, 'show']);
