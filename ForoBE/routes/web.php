<?php

use App\Http\Controllers\Api\ThreadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(ThreadController::class)->group(function () {
    Route::get('/threads', 'adminIndex')->name('threads');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/users', 'adminIndex')->name('users');
    Route::patch('/user/{id}', 'adminBan')->name('user.ban');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
