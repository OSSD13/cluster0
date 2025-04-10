<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleAccess;
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
use App\Http\Controllers\MemberListController;
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

use App\Http\Controllers\EmailController;

// ****************************************************************************************************** //
// Login
Route::get('', [LoginController::class, 'index'])->name('login');
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
    Route::get('/login/success', [HomeController::class, 'tester'])->name('home');
});

// Tester
Route::middleware(['web', 'auth', 'role:Tester'])->group(function () {

});

// วิธีการตั้งชื่อ url Route menu/submenu/การทำงานอื่นๆ (add, edit)
// ****************************************************************************************************** //
// Every one can use
Route::get('/myprofile', [ProfileController::class,'myProfile'])->name('myprofile');
Route::get('/change-password', [ProfileController::class,'changePassword'])->name('change.password');
// ****************************************************************************************************** //
// View Summary Points
Route::get('/dash-team-performance', [TeamPerformanceController::class,'card'])->name('team.performance');
Route::get('/dash-overview', [DashboardController::class, 'tester'])->name('overview');
// ****************************************************************************************************** //
// Minor case
Route::get('/minorcase', [MinorcaseController::class,'index'])->name('minorcase');
Route::get('/minorcase-add', [MinorcaseController::class,'add'])->name('addminorcase');
Route::get('/minorcase-edit-{id}', [MinorcaseController::class, 'edit'])->name('editminorcase');
Route::post('/minorcase/store', [MinorcaseController::class,'store'])->name('storeMinorcase');
Route::post('/minorcase/{id}', [MinorcaseController::class, 'update'])->name('minorcase.update');
Route::get('/api/members/{teamId}', [MinorcaseController::class, 'getMembersByTeam']);
Route::put('/minorcase-{id}', [MinorcaseController::class, 'delete'])->name('minorcase.delete');
// ****************************************************************************************************** //
// Backlog
Route::get('/backlog', [BacklogController::class, 'index'])->name('backlog');
Route::get('/backlog-add', [BacklogController::class, 'add'])->name('addbacklog');
Route::post('/backlog-store', [BacklogController::class, 'store'])->name('backlog.store');
Route::get('/backlog-edit', [BacklogController::class, 'edit'])->name('backlog-edit');
Route::put('/backlog-update/{id}', [BacklogController::class, 'update'])->name('backlog.update');
Route::delete('/backlog/{id}', [BacklogController::class, 'destroy'])->name('deletebacklog');
Route::get('/members/{teamId}', [BacklogController::class, 'getMembersByTeam']);
Route::get('/api/members/{teamId}', [BacklogController::class, 'getMembersByTeam']);
Route::get('/backlog/create', [BacklogController::class, 'create'])->name('backlog.create');
Route::post('/backlog', [BacklogController::class, 'store'])->name('backlog.store');
// ****************************************************************************************************** //
// Extra Points
Route::post('/extrapoint-update/{id}', [ExtrapointController::class, 'update'])->name('updateExtraPoint');
Route::get('/extrapoint', [ExtrapointController::class, 'index'])->name('extraPoint');
Route::get('/extrapoint-add', [ExtrapointController::class, 'add'])->name('createExtraPoint');
Route::post('/extrapoint-edit', [ExtrapointController::class, 'edit'])->name('editExtraPoint');
Route::post('/extrapoint/store', [ExtrapointController::class, 'store'])->name('storeExtraPoint');
Route::delete('/extrapoint-delete/{id}', [ExtrapointController::class, 'delete'])->name('deleteExtraPoint');

// ****************************************************************************************************** //
// Teams Managment
Route::get('/team', [TeamManagementController::class,'index'])->name('team');
Route::get('/team-add', [TeamManagementController::class,'add'])->name('team.add');
Route::get('/team-edit{id}', [TeamManagementController::class,'edit'])->name('team.edit');
Route::put('/team-update{id}',[TeamManagementController::class,'update'])->name('team.update');
Route::post('/team-create', [TeamManagementController::class, 'store'])->name('team.create');
Route::delete('/team-delete{id}', [TeamManagementController::class, 'delete'])->name('team.delete');

// ****************************************************************************************************** //
// Members Managment
Route::get('memberlist', [MemberListController::class, 'index'])->name('memberlist');

Route::get('memberlist-edit{id}', [MemberListController::class, 'edit'])->name('memberlist.edit');

Route::get('memberlist-delete{id}', [MemberListController::class, 'delete'])->name('memberlist.delete');

Route::post('memberlist-update{id}', [MemberListController::class, 'update'])->name('memberlist.update');

Route::get('memberlist-insert', [MemberListController::class, 'dropdowngetData'])->name('memberlist.insert');

Route::post('memberlist-add', [MemberListController::class, 'add'])->name('memberlist.add');
// ****************************************************************************************************** //
// Settings
Route::get('/setting-default-password', [UserController::class,'defaultConfiguration'])->name('setting.default.password');
Route::post('/setting-save-config', [UserController::class, 'saveConfiguration']);
Route::get('/setting-access-control', [UserController::class, 'manageUser'])->name('setting.manage.user');
Route::post('/setting-delete-user', [UserController::class, 'deleteUser'])->name('setting.delete.user');
Route::post('/setting-update-role', [UserController::class, 'updateRole'])->name('setting.update.role');
Route::post('/setting-update-team', [UserController::class, 'updateTeam'])->name('setting.update.team');
Route::post('/setting-reset-password', [UserController::class, 'resetPassword'])->name('setting.reset.password');
// ****************************************************************************************************** //
// Report
Route::get('/report', [ReportController::class, 'index'])->name('report');
Route::get('/report-generate', [ReportController::class, 'reportGenerate'])->name('report.generate');
Route::post('/report-generate', [ReportController::class, 'reportGenerate'])->name('step2');

// ****************************************************************************************************** //
// History
Route::get('/setting-revision-history', [RevisionHistoryController::class, 'index'])->name('revision.history');
Route::get('/review-performance-history', [PerformanceHistoryController::class, 'index'])->name('performance.history');
// ****************************************************************************************************** //
// Trello Configuration
Route::get('/setting-trello-config', [TrelloConfigurationController::class, 'index'])->name('trello.config');
Route::get('/setting-trello-configAPI', [TrelloConfigurationController::class, 'api'])->name('trello.api');
Route::get('/setting-trello-configList', [TrelloConfigurationController::class, 'list'])->name('trello.list');

Route::get('/setting-trello-configAPI-edit-{id}', [TrelloConfigurationController::class, 'editAPI'])->name('trello.editApi.edit');
Route::post('/setting-trello-configAPI-update/{id}', [TrelloConfigurationController::class, 'updateAPI'])->name('trello.editApi.update');
Route::get('/setting-trello-list-edit-{id}', [TrelloConfigurationController::class, 'editList'])->name('trello.editList.edit');
Route::post('/setting-trello-list-edit/{id}', [TrelloConfigurationController::class, 'updateList'])->name('trello.editList.update');

Route::post('/setting-trello-configAPI', [TrelloConfigurationController::class, 'createAPI'])->name('trello.api.create');
Route::post('/setting-trello-configList', [TrelloConfigurationController::class, 'createList'])->name('trello.list.create');
Route::get('/setting-trello-configAPI-delete/{id}', [TrelloConfigurationController::class, 'deleteAPI'])->name('trello.api.delete');
Route::get('/setting-trello-configList-delete/{id}', [TrelloConfigurationController::class, 'deleteList'])->name('trello.list.delete');
// ****************************************************************************************************** //
// Test
Route::get('/test-fetch-cards', [TeamPerformanceController::class, 'testTrelloApi']);

Route::get('/dash-team-performance-card', [TeamPerformanceController::class,'showCard'])->name('team.performance');

