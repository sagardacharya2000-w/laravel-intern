<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Student
Route::get('/student', [StudentController::class, 'dashboard'])->name('student.dashboard');
Route::get('/student/courses', [StudentController::class, 'courses'])->name('student.courses');
Route::get('/student/exams', [StudentController::class, 'exams'])->name('student.exams');
Route::get('/student/results', [StudentController::class, 'result'])->name('student.result');
Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');
