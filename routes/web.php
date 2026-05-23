<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 
use App\Models\MapLayer;

Route::get('/', function () {
    // Ambil data layer peta (marker, polygon, dsb) untuk FR01
    $mapLayers = MapLayer::with('destination')->where('is_visible', true)->get();
    return view('landing', compact('mapLayers'));
});

Route::resource('users', UserController::class);
