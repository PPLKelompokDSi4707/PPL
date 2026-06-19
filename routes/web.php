<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\UserController;

Route::get('/', [DestinationController::class, 'index'])->name('landing');
Route::get('/search', [DestinationController::class, 'search'])->name('destinations.search');
Route::get('/destinations/{id}', [DestinationController::class, 'show'])->name('destinations.detail');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/bookmarks', [\App\Http\Controllers\BookmarkController::class, 'index'])->name('bookmarks.index');
    Route::post('/destinations/{id}/bookmark', [\App\Http\Controllers\BookmarkController::class, 'toggle'])->name('bookmarks.toggle');
    Route::post('/destinations/{id}/review', [\App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');
});

Route::middleware(['auth', \App\Http\Middleware\IsAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('destinations', \App\Http\Controllers\AdminDestinationController::class);
    
    Route::get('/environment', [\App\Http\Controllers\AdminEnvironmentController::class, 'index'])->name('environment.index');
    Route::get('/environment/{destination}/edit', [\App\Http\Controllers\AdminEnvironmentController::class, 'edit'])->name('environment.edit');
    Route::put('/environment/{destination}', [\App\Http\Controllers\AdminEnvironmentController::class, 'update'])->name('environment.update');
});

Route::resource('users', UserController::class);
