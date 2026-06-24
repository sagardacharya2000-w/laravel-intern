<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Teacher\TeacherDashboardController;
use App\Http\Controllers\Teacher\SubjectController;
use App\Http\Controllers\Teacher\QuestionSetController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Teacher\ExamAccessController;


Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    // Teacher Dashboard
    Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])
         ->name('teacher.dashboard');

    // Teacher Subjects — full CRUD
    Route::prefix('teacher/subjects')->name('teacher.subjects.')->group(function () {
        Route::get('/', [SubjectController::class, 'index'])->name('index');
        Route::get('/create', [SubjectController::class, 'create'])->name('create');
        Route::post('/', [SubjectController::class, 'store'])->name('store');
        Route::get('/{subject}/edit', [SubjectController::class, 'edit'])->name('edit');
        Route::put('/{subject}', [SubjectController::class, 'update'])->name('update');
        Route::delete('/{subject}', [SubjectController::class, 'destroy'])->name('destroy');
    });

    // Teacher Question Sets — full CRUD (replaced placeholder)
    Route::prefix('teacher/question-sets')->name('teacher.question-sets.')->group(function () {
        Route::get('/', [QuestionSetController::class, 'index'])->name('index');
        Route::get('/create', [QuestionSetController::class, 'create'])->name('create');
        Route::post('/', [QuestionSetController::class, 'store'])->name('store');
        Route::get('/{questionSet}/edit', [QuestionSetController::class, 'edit'])->name('edit');
        Route::put('/{questionSet}', [QuestionSetController::class, 'update'])->name('update');
        Route::delete('/{questionSet}', [QuestionSetController::class, 'destroy'])->name('destroy');
    });


Route::prefix('teacher/exam-access')->name('teacher.exam-access.')->group(function () {

    Route::get('/',                  [ExamAccessController::class, 'index'])->name('index');

    Route::get('/create',            [ExamAccessController::class, 'create'])->name('create');

    Route::post('/',                 [ExamAccessController::class, 'store'])->name('store');

    Route::get('/{examAccess}/edit', [ExamAccessController::class, 'edit'])->name('edit');

    Route::put('/{examAccess}',      [ExamAccessController::class, 'update'])->name('update');

    Route::delete('/{examAccess}',   [ExamAccessController::class, 'destroy'])->name('destroy');
});

    // Student routes
    Route::get('/student', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/student/courses', [StudentController::class, 'courses'])->name('student.courses');
    Route::get('/student/exams', [StudentController::class, 'exams'])->name('student.exams');
    Route::get('/student/results', [StudentController::class, 'result'])->name('student.result');
    Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');
});
