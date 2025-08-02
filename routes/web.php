<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('departement', DepartementController::class);
