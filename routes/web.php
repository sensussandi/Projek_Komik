<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\KomikController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PopulerController;
use App\Http\Controllers\AdminDashboardController;


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

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    


Route::get('/user/home', function () {
    return view('home');
})->middleware('auth')->name('user.dashboard');


Route::get('/comics', [ComicController::class, 'index'])->name('comics.index');
Route::get('/komik/{id}', [ComicController::class, 'show'])->name('komik.show');

Route::get('/user/home', [HomeController::class, 'index'])->middleware('auth')->name('user.dashboard');
Route::get('/user/kategori/{genre}', [KategoriController::class, 'show'])->name('kategori.show');
Route::get('/user/populer', [PopulerController::class, 'index'])->name('populer');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/create', [KomikController::class, 'create'])->name('create');
Route::post('/admin/store', [KomikController::class, 'store'])->name('store');



Route::get('/chapter/{id}', function($id) {
    return "Chapter ID: " . $id;
})->name('chapter.show');

    Route::get('/user/home', function () {
        return view('home');
    })->name('user.dashboard');

    Route::get('/comics', [ComicController::class, 'index'])->name('comics.index');

    Route::get('/user/home', [HomeController::class, 'index'])->name('user.dashboard');

    Route::get('/chapter/{id}', function($id) {
        return "Chapter ID: " . $id;
    })->name('chapter.show');
});

