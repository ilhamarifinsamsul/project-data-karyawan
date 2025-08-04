<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\KaryawanCotroller;
use App\Http\Middleware\Authenticate;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Container\Attributes\Auth;

app('router')->aliasMiddleware('auth.role', Authenticate::class);

Route::get('/', function () {
    return view('pages.auth.signin');
});

Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function () {
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login')->name('processLogin');
    Route::get('logout', 'logout')->name('logout');
});

// // Alias untuk default Laravel redirect
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // ← untuk middleware redirect

Route::get('/login', function () {
    return view('pages.auth.signin');
})->name('auth.login');

Route::get('/getSession', function () {
    return session()->all();
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(Authenticate::class)->name('dashboard.index');


// Route::get('/dashboard', function(){
//     return view('pages.dashboard.index');
// })->middleware(Authenticate::class)->name('dashboard.index');

Route::middleware('auth.role:Super Admin')->group(function () {
    Route::resource('departement', DepartementController::class);
});

Route::middleware('auth.role:Super Admin|Admin')->prefix('karyawan')->name('karyawan.')->group(function () {
    Route::controller(KaryawanCotroller::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
});

Route::controller(ProfileController::class)
    ->middleware(Authenticate::class)
    ->prefix('profile')
    ->name('profile.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit-password', 'editPassword')->name('edit-password');
        Route::post('/update-password', 'updatePassword')->name('update-password');
    });



