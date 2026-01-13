<?php

use Illuminate\Support\Facades\Route;

// Import the UserController
use App\Http\Controllers\UserController;

// Define a route for the UserController index method
Route::get('/users', [UserController::class, 'index']);