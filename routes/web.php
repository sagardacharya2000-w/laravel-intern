<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Teacher\TeacherDashboardController;
use App\Http\Controllers\Teacher\SubjectController;
use App\Http\Controllers\StudentController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Teacher
    Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])
         ->name('teacher.dashboard');

    Route::prefix('teacher/subjects')->name('teacher.subjects.')->group(function () {
        Route::get('/', [SubjectController::class, 'index'])->name('index');
        Route::get('/create', [SubjectController::class, 'create'])->name('create');
        Route::post('/', [SubjectController::class, 'store'])->name('store');
        Route::get('/{subject}/edit', [SubjectController::class, 'edit'])->name('edit');
        Route::put('/{subject}', [SubjectController::class, 'update'])->name('update');
        Route::delete('/{subject}', [SubjectController::class, 'destroy'])->name('destroy');
    });

    Route::get('/teacher/question-sets', function () {
        return 'Question Sets page coming soon';
    })->name('teacher.question-sets.index');

    Route::get('/teacher/exam-access', function () {
        return 'Exam Access page coming soon';
    })->name('teacher.exam-access.index');


    // Student
    Route::get('/student', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/student/courses', [StudentController::class, 'courses'])->name('student.courses');
    Route::get('/student/exams', [StudentController::class, 'exams'])->name('student.exams');
    Route::get('/student/results', [StudentController::class, 'result'])->name('student.result');
    Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');
});
