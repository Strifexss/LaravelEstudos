<?php

use App\Http\Controllers\groupTaskController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->group(function () {
});

Route::resource('group', groupTaskController::class);

Route::resource('user', userController::class);

Route::post('/login', [userController::class, 'login']);
