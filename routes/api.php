<?php
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;

use Illuminate\Support\Facades\Route;
 

// user
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);


// post
Route::get('/posts', [PostController::class, 'index']);
// Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{id}', [PostController::class, 'show']);