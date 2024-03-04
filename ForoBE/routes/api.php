<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ThreadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CommentController::class)->group(function () {
    Route::get('/comments', 'index');
    Route::post('/comment', 'store');
    Route::get('/comment/{id}', 'show');
    Route::put('/comment/{id}', 'update');
    Route::delete('/comment/{id}', 'delete');
});

Route::controller(ThreadController::class)->group(function () {
    Route::get('/threads', 'index');
    Route::post('/thread', 'store');
    Route::get('/thread/{id}', 'show');
    Route::put('/thread/{id}', 'update');
    Route::delete('/thread/{id}', 'delete');
});
