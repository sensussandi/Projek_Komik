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
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\CheckBanned;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/cek-login', function () {
    return dd(session()->all());
});

Route::middleware(['web'])->group(function () {
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout.link');


Route::middleware(['auth', CheckBanned::class])->group(function () {
    Route::get('/user/home', [HomeController::class, 'index'])->name('user.dashboard');

Route::get('/user/home', function () {
    return view('home');
})->middleware('auth')->name('user.dashboard');

// User Routes
Route::get('/comics', [ComicController::class, 'index'])->name('comics.index');
Route::get('/user/kategori/{genre}', [KategoriController::class, 'show'])->name('kategori.show');
Route::get('/user/populer', [PopulerController::class, 'index'])->name('populer');

// Admin Routes
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');

// Tambah Komik
Route::get('/admin/create', [KomikController::class, 'create'])->name('komik.create');
Route::post('/admin/store', [KomikController::class, 'store'])->name('store');

// Edit Komik
Route::get('/admin/komik/{id}/edit', [KomikController::class, 'edit'])->name('komik.edit');
Route::put('/admin/komik/{id}', [KomikController::class, 'update'])->name('komik.update');

// Hapus Komik
Route::delete('/admin/komik/{id}', [KomikController::class, 'destroy'])->name('komik.destroy');

// User Management
Route::post('/admin/users/{id}/ban', [UserController::class, 'ban'])->name('admin.users.ban');
Route::get('/admin/editAdmin/{id}/edit', [UserController::class, 'edit'])->name('admin.editAdmin.edit');
Route::put('/admin/editAdmin/{id}', [UserController::class, 'update'])->name('admin.editAdmin.update');

// Menampilkan form request reset password
Route::get('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Mengirim email reset password
Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Menampilkan form ubah password
Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Proses reset password
Route::post('/reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');


Route::get('/chapter/{id}', function($id) {
    return "Chapter ID: " . $id;
})->name('chapter.show');


    Route::get('/comics', [ComicController::class, 'index'])->name('comics.index');


    Route::get('/chapter/{id}', function($id) {
        return "Chapter ID: " . $id;
    })->name('chapter.show');
});

