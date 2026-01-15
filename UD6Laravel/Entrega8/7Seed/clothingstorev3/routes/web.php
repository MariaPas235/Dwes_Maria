<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClothingItemController;
use App\Http\Controllers\UserController;

//you can define a route for each method instead
Route::get('/', function () {
    return view('home'); // simple home with menu
});
Route::resource('clothing-items', ClothingItemController::class);
Route::resource('users', UserController::class);