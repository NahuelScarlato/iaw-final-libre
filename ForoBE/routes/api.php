<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ThreadController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('cors')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/logout', [AuthController::class, 'logout']);

        Route::controller(CommentController::class)->group(function () {
            Route::post('/comment', 'store');
            Route::put('/comment/{id}', 'update');
        });

        Route::controller(ThreadController::class)->group(function () {
            Route::get('/threads', 'index');
            Route::post('/thread', 'store');
            Route::get('/thread/{id}', 'show');
            Route::put('/thread/{id}', 'update');
        });
    });
});

