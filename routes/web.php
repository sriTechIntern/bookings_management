<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;


// Route::view('/', 'welcome');

// Route::view('/', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::get('/',[PropertyController::Class, 'index'])
    // ->middleware(['auth','verified'])
    ->name('dashboard');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
