<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssessorController;
use App\Http\Controllers\ApplicantController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::middleware('guest')->group(function (){
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    //Google OAuth Routes
    Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
});

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/assessors', [AdminController::class, 'indexAssessors'])->name('assessors.index');
    Route::get('/assessors/create', [AdminController::class, 'createAssessor'])->name('assessors.create');
    Route::post('/assessors', [AdminController::class, 'storeAssessor'])->name('assessors.store');

    Route::get('/applicants', [AdminController::class, 'indexApplicants'])->name('applicants.index');
    Route::get('/applications', [AdminController::class, 'listApplications'])->name('applications.index');
    Route::get('/applications/{application}', [AdminController::class, 'showApplication'])->name('applications.show');
    Route::post('/applications/{application}/approve', [AdminController::class, 'approveApplication'])->name('applications.approve');
    Route::post('/applications/{application}/reject', [AdminController::class, 'rejectApplication'])->name('applications.reject');
});

// Assessor Routes
Route::middleware(['auth', 'role:assessor'])->prefix('assessor')->name('assessor.')->group(function (){
    Route::get('/dashboard', [AssessorController::class, 'dashboard'])->name('dashboard');
});

// Applicant Routes
Route::middleware(['auth', 'role:applicant'])->prefix('applicant')->name('applicant.')->group(function (){
    Route::get('/dashboard', [ApplicantController::class, 'dashboard'])->name('dashboard');
 
    Route::get('/apply', [ApplicantController::class, 'create'])->name('apply.create');
    Route::post('/apply', [ApplicantController::class, 'store'])->name('apply.store');
    Route::get('/applications/{application}', [ApplicantController::class, 'show'])->name('applications.show')->whereNumber('application');
});