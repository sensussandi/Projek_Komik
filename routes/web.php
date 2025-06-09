<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleController;

use App\Http\Controllers\ComicController;
use App\Http\Controllers\HomeController;



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

Route::get('/komik/tambah', [KomikController::class, 'create'])->name('komik.create');
Route::post('/komik/simpan', [KomikController::class, 'store'])->name('komik.store');



Route::get('/admin/dashboard', function () {
    return 'Selamat datang Admin!';
})->middleware('auth')->name('admin.dashboard');


Route::get('/user/home', function () {
    return view('home');
})->middleware('auth')->name('user.dashboard');


Route::get('/comics', [ComicController::class, 'index'])->name('comics.index');
Route::get('/user/home', [HomeController::class, 'index'])->middleware('auth')->name('user.dashboard');

Route::get('/chapter/{id}', function($id) {
    return "Chapter ID: " . $id;
})->name('chapter.show');

