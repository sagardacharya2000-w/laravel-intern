<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Teacher\TeacherDashboardController;
use App\Http\Controllers\Teacher\SubjectController;
use App\Http\Controllers\Teacher\QuestionSetController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Teacher\ExamAccessController;



Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
 Route::get('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');


// Teacher routes
Route::middleware(['auth', 'role:teacher', 'isActive'])->group(function () {

    Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])
        ->name('teacher.dashboard');

    Route::get('/teacher/profile', [TeacherController::class, 'profile'])
        ->name('teacher.profile');
    Route::put('/teacher/profile', [TeacherController::class, 'updateProfile'])
        ->name('teacher.profile.update');
    Route::put('/teacher/profile/password', [TeacherController::class, 'updatePassword'])
        ->name('teacher.profile.password');

    Route::prefix('teacher/subjects')->name('teacher.subjects.')->group(function () {
        Route::get('/', [SubjectController::class, 'index'])->name('index');
        Route::get('/create', [SubjectController::class, 'create'])->name('create');
        Route::post('/', [SubjectController::class, 'store'])->name('store');
        Route::get('/{subject}/edit', [SubjectController::class, 'edit'])->name('edit');
        Route::put('/{subject}', [SubjectController::class, 'update'])->name('update');
        Route::delete('/{subject}', [SubjectController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('teacher/question-sets')->name('teacher.question-sets.')->group(function () {
        Route::get('/', [QuestionSetController::class, 'index'])->name('index');
        Route::get('/create', [QuestionSetController::class, 'create'])->name('create');
        Route::post('/', [QuestionSetController::class, 'store'])->name('store');
        Route::get('/{questionSet}/edit', [QuestionSetController::class, 'edit'])->name('edit');
        Route::put('/{questionSet}', [QuestionSetController::class, 'update'])->name('update');
        Route::delete('/{questionSet}', [QuestionSetController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('teacher/exam-access')->name('teacher.exam-access.')->group(function () {
        Route::get('/', [ExamAccessController::class, 'index'])->name('index');
        Route::get('/create', [ExamAccessController::class, 'create'])->name('create');
        Route::post('/', [ExamAccessController::class, 'store'])->name('store');
        Route::get('/{examAccess}/edit', [ExamAccessController::class, 'edit'])->name('edit');
        Route::put('/{examAccess}', [ExamAccessController::class, 'update'])->name('update');
        Route::delete('/{examAccess}', [ExamAccessController::class, 'destroy'])->name('destroy');
    });
});

// Student routes
Route::middleware(['auth', 'role:student', 'isActive'])->group(function () {
    Route::get('/student', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/student/courses', [StudentController::class, 'courses'])->name('student.courses');
    Route::post('/student/courses/enroll', [StudentController::class, 'enroll'])->name('student.courses.enroll');
    Route::get('/student/exams', [StudentController::class, 'exams'])->name('student.exams');
    Route::get('/student/results', [StudentController::class, 'result'])->name('student.result');
    Route::get('/student/results/{attempt}/analysis', [StudentController::class, 'resultAnalysis'])
    ->name('student.result.analysis');

    Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');
    Route::put('/student/profile', [StudentController::class, 'updateProfile'])->name('student.profile.update');
    Route::put('/student/profile/password', [StudentController::class, 'updatePassword'])->name('student.profile.password');

    Route::get('/student/exam-taking/{examAccess}', [StudentController::class, 'examTaking'])
        ->name('student.exam-taking');
    Route::post('/student/exam-taking/{examAccess}/submit', [StudentController::class, 'submitExam'])
        ->name('student.exam-taking.submit');
    Route::get('/student/plans', [PaymentController::class, 'plans'])->name('student.plans');
    Route::post('/student/subscribe/{plan}', [PaymentController::class, 'subscribe'])->name('student.subscribe');

});
