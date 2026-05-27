<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 
use App\Models\MapLayer;

Route::get('/', [\App\Http\Controllers\DestinationController::class, 'index'])->name('home');

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/search', [\App\Http\Controllers\DestinationController::class, 'search'])->name('destinations.search');
Route::get('/destinations/{id}', [\App\Http\Controllers\DestinationController::class, 'show'])->name('destinations.detail');

Route::middleware('auth')->group(function () {
    Route::post('/destinations/{id}/bookmark', [\App\Http\Controllers\BookmarkController::class, 'toggle'])->name('bookmarks.toggle');
});

Route::resource('users', UserController::class);
