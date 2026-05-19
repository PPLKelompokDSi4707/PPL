<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 

Route::get('/', function () {
    return view('landing');
});

Route::resource('users', UserController::class); 
