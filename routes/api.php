<?php

use App\Http\Controllers\groupTaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->group(function () {
});

Route::middleware([\App\Http\Middleware\Authenticator::class])->group(function () {
    Route::resource('group', groupTaskController::class);
});

Route::resource('user', UserController::class);

Route::get('testee', [UserController::class, 'teste']);

Route::post('/login', [UserController::class, 'login']);
