<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 
use App\Models\MapLayer;

Route::get('/', function () {
    // Ambil data layer peta (marker, polygon, dsb) untuk FR01
    $mapLayers = MapLayer::with('destination')->where('is_visible', true)->get();
    $featuredDestinations = \App\Models\Destination::limit(3)->get();
    return view('landing', compact('mapLayers', 'featuredDestinations'));
});

Route::get('/search', [\App\Http\Controllers\DestinationController::class, 'search'])->name('destinations.search');
Route::get('/destinations/{id}', [\App\Http\Controllers\DestinationController::class, 'show'])->name('destinations.detail');

Route::resource('users', UserController::class);
