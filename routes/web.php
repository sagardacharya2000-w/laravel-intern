<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

//Student Dashboard
Route::redirect('/student', '/student/dashboard');
Route::get('/student/dashboard',[StudentController::class, 'dashboard'])->name("student.dashboard");
Route::get('/student/courses',[StudentController::class, 'courses'])->name("student.courses");
Route::get('/student/exams',[StudentController::class, 'exams'])->name("student.exams");
Route::get('/student/results',[StudentController::class, 'result'])->name("student.result");
Route::get('/student/profile',[StudentController::class, 'profile'])->name("student.profile");
