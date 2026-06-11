<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\AuthController;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
