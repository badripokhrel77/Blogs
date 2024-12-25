<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

Route::get('/',[BlogController::class,'index']);

Route::get('/home',[BlogController::class,'index']);


Route::get('/create', [BlogController::class, 'create']);
// Route::post('/blogs', [BlogController::class, 'store']);

Route::get('/user',[UserController::class,'index']);

Route::resource('blogs', BlogController::class);