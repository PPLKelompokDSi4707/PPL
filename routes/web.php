<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\MapLayer;

Route::get('/', [\App\Http\Controllers\DestinationController::class, 'index'])->name('home');

Route::get('/search', [\App\Http\Controllers\DestinationController::class, 'search'])->name('destinations.search');

Route::get('/destinations/{id}', [\App\Http\Controllers\DestinationController::class, 'show'])->name('destinations.detail');

Route::resource('users', UserController::class);