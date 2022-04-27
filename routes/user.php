<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->prefix('users')->as('users.')->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::get('dashboard', 'dashboard')->name('dashboard');
    });
});