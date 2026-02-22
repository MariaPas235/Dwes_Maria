<?php

use App\Http\Controllers\Api\V1\AnimalController;
use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

// Rutas públicas de Auth
Route::post('/login', [AuthController::class, 'login']);

Route::prefix('v1')->group(function () {
    
    // Ruta pública para ver animales (INDEX y SHOW)
    Route::get('animals', [AnimalController::class, 'index']);
    Route::get('animals/{animal}', [AnimalController::class, 'show']);

    // Rutas protegidas (STORE, UPDATE, DESTROY)
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('animals', [AnimalController::class, 'store']);
        Route::put('animals/{animal}', [AnimalController::class, 'update']);
        Route::delete('animals/{animal}', [AnimalController::class, 'destroy']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});