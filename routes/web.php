<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\KomikController;


Route::get('/', function () {
    return view('auth.login');
});


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/komik/tambah', [KomikController::class, 'create'])->name('komik.create');
    Route::post('/komik/tambah', [KomikController::class, 'store'])->name('komik.store');
     Route::get('/komik', [KomikController::class, 'index'])->name('komik.index');
});


Route::get('/admin/dashboard', function () {
    return 'Selamat datang Admin!';
})->middleware('auth')->name('admin.dashboard');

Route::get('/user/dashboard', function () {
    return 'Selamat datang User!';
})->middleware('auth')->name('user.dashboard');