<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;

// Login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Google Login
Route::get('/auth/google', [LoginController::class, 'googleLogin'])->name('auth.google');
Route::get('/auth/google-callback', [LoginController::class, 'googleAuthentication'])->name('auth.google-callback');

// Register
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/register/2', [RegisterController::class, 'step2']);
Route::post('/register/step1', [RegisterController::class, 'registerStep1'])->name('step1');
Route::post('/register/step2', [RegisterController::class, 'registerStep2'])->name('step2');
Route::get('/pending', [RegisterController::class, 'pendingPage'])->name('pending');

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home');