<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/login', [PageController::class, 'login'])->name('login');
