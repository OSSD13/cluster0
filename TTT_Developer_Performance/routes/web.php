<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MinorcaseController;
use App\Http\Controllers\CreateMinorcaseController;
// Login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// With Google
Route::get('/auth/google', [LoginController::class, 'googleLogin'])->name('auth.google');
Route::get('/auth/google-callback', [LoginController::class, 'googleAuthentication'])->name('auth.google-callback');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::prefix('register')->group(function () {
    Route::get('/2', [RegisterController::class, 'step2']);
    Route::post('/step1', [RegisterController::class, 'registerStep1'])->name('step1');
    Route::post('/step2', [RegisterController::class, 'registerStep2'])->name('step2');
    Route::get('/pending', [RegisterController::class, 'pendingPage'])->name('pending');

    // With Google
    Route::post('/google/2', [RegisterController::class, 'googleAuthenticationStep2'])->name('register.google.2');
    Route::get('/google/view', [RegisterController::class, 'registerWithGooglePage']);
});

// Test view
Route::prefix('test')->group(function () {
    Route::get('/login/success', [HomeController::class, 'index'])->name('home');
});

// Developer
Route::prefix('dev')->group(function () {

});

// Tester
Route::prefix('tester')->group(function () {

});

// Report
Route::get('/report', [ReportController::class, 'index']);

Route::get('/myprofile', [ProfileController::class,'myProfile']);
Route::get('/changepassword', [ProfileController::class,'changePassword']);

Route::get('/minorcase', [MinorcaseController::class,'index']);
Route::get('/addminorcase', [CreateMinorcaseController::class,'index']);

Route::get('/manageUser', function () {
    return view('pages.manageUser');
});
