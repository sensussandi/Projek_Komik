<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleController;
<<<<<<< HEAD
use App\Http\Controllers\Admin\KomikController;
=======
use App\Http\Controllers\ComicController;
use App\Http\Controllers\HomeController;
>>>>>>> 1f910787eb8d85e71d366edfbda977c498a9d31b


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

<<<<<<< HEAD
Route::get('/user/dashboard', function () {
    return 'Selamat datang User!';
})->middleware('auth')->name('user.dashboard');
=======
Route::get('/user/home', function () {
    return view('home');
})->middleware('auth')->name('user.dashboard');


Route::get('/comics', [ComicController::class, 'index'])->name('comics.index');
Route::get('/user/home', [HomeController::class, 'index'])->middleware('auth')->name('user.dashboard');

Route::get('/chapter/{id}', function($id) {
    return "Chapter ID: " . $id;
})->name('chapter.show');
>>>>>>> 1f910787eb8d85e71d366edfbda977c498a9d31b
