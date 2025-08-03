<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;
use App\Http\Middleware\Authenticate;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.auth.signin');
});

Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function () {
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login')->name('processLogin');
    Route::get('logout', 'logout')->name('logout');
});

Route::get('/login', function () {
    return view('pages.auth.signin');
})->name('auth.login');

Route::get('/getSession', function () {
    return session()->all();
});


Route::get('/dashboard', function(){
    return view('pages.dashboard.index');
})->middleware(Authenticate::class)->name('dashboard.index');

Route::resource('departement', DepartementController::class)->middleware([Authenticate::class, '1']);
