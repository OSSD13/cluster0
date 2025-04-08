<?php

use Illuminate\Support\Facades\Route;
// Auth
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
// Every one can use
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
// Report
use App\Http\Controllers\ReportController;
// Teams
use App\Http\Controllers\TeamManagementController;
// Users
use App\Http\Controllers\UserController;
// Points
use App\Http\Controllers\MinorcaseController;
use App\Http\Controllers\BacklogController;
use App\Http\Controllers\ExtrapointController;
// View Summary Points
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeamPerformanceController;
// History
use App\Http\Controllers\PerformanceHistoryController;
use App\Http\Controllers\RevisionHistoryController;
// Trello
use App\Http\Controllers\TrelloConfigurationController;

// ****************************************************************************************************** //
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
// ****************************************************************************************************** //

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

// วิธีการตั้งชื่อ url Route menu/submenu/การทำงานอื่นๆ (add, edit)
// ****************************************************************************************************** //
// Every one can use
Route::get('/myprofile', [ProfileController::class,'myProfile']);
Route::get('/change-password', [ProfileController::class,'changePassword']);
// ****************************************************************************************************** //
// View Summary Points
Route::get('/dash-team-performance', [TeamPerformanceController::class,'card']);
Route::get('/dash-overview', [DashboardController::class, 'tester']);
// ****************************************************************************************************** //
// Minor case
Route::get('/minorcase', [MinorcaseController::class,'index'])->name('Minorcase');
Route::get('/minorcase-add', [MinorcaseController::class,'add'])->name('addminorcase');
Route::get('/minorcase-edit', [MinorcaseController::class,'edit'])->name('editminorcase');
// ****************************************************************************************************** //
// Backlog
Route::get('/backlog', [BacklogController::class,'index'])->name('backlog');
Route::get('/backlog-add', [BacklogController::class,'add'])->name('addbacklog');
Route::get('/backlog-edit', [BacklogController::class,'edit'])->name('editbacklog');
// ****************************************************************************************************** //
// Extra Points
Route::get('/extrapoint', [ExtrapointController::class, 'index'])->name('extrapoint');
Route::get('/extrapoint-add', [ExtrapointController::class, 'add'])->name('createExtrapoint');
Route::get('/extrapoint-edit', [ExtrapointController::class, 'edit'])->name('editExtrapoint');

Route::post('/extrapoint/store', [ExtrapointController::class, 'store'])->name('storeExtrapoint');

Route::put('/extrapoint/delete/{id}', [ExtrapointController::class, 'delete'])->name('deleteExtrapoint');
Route::put('/extrapoint/edit/{id}', [ExtrapointController::class, 'edit'])->name('editExtrapoint');
// ****************************************************************************************************** //
// Teams Managment
Route::get('/team', [TeamManagementController::class,'index']);
Route::get('/team-add', [TeamManagementController::class,'add']);
Route::get('/team-edit', [TeamManagementController::class,'edit']);
// ****************************************************************************************************** //
// Members Managment
//Route::get('/member', [UserController::class,'']);
//Route::get('/member-add', [UserController::class,'']);
//Route::get('/member-edit', [UserController::class,'']);
// ****************************************************************************************************** //
// Settings
Route::get('/setting-default-password', [UserController::class,'defaultConfiguration']);
Route::post('/setting-save-config', [UserController::class, 'saveConfiguration']);
Route::get('/setting-manage-user', [UserController::class,'manageUser']);
Route::post('/setting-update-role', [UserController::class, 'updateRole'])->name('setting.update.role');
// ****************************************************************************************************** //
// Report
Route::get('/report', [ReportController::class, 'index']);
Route::get('/report-generate', [ReportController::class, 'reportGenerate']);
// ****************************************************************************************************** //
// History
Route::get('/setting-revision-history', [RevisionHistoryController::class, 'index'])->name('revisionHistory');
Route::get('/review-performance-history', [PerformanceHistoryController::class, 'index'])->name('performancehistory');
// ****************************************************************************************************** //
// Trello Configuration
Route::get('/setting-trello-config', [TrelloConfigurationController::class, 'index'])->name('trelloConfiguration');
Route::get('/setting-trello-configAPI', [TrelloConfigurationController::class, 'api'])->name('trelloConfigurationAPI');
Route::get('/setting-trello-configList', [TrelloConfigurationController::class, 'list'])->name('trelloConfigurationList');
// ****************************************************************************************************** //
// Test
Route::get('/test-fetch-cards', [TeamPerformanceController::class, 'testTrelloApi']);
Route::get('/test-alert' , function () {
    return view('exampleAlert');
});
