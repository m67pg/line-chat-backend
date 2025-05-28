<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/messages', [MessageController::class, 'index']);
Route::middleware('auth:sanctum')->post('/messages', [MessageController::class, 'store']);

Route::post('/login', [AuthController::class, 'login']);
