<?php

use Illuminate\Support\Facades\Route;

Route::middleware('redirect.if.auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\MainController::class, 'home'])->name('home');
    Route::get('/login', [\App\Http\Controllers\MainController::class, 'login'])->name('login');
    Route::post('/register', [\App\Http\Controllers\MainController::class, 'register'])->name('register');
    Route::get('/authorize/{token}', [\App\Http\Controllers\MainController::class, 'authorize'])->name('authorize');
});

Route::get('/link', [\App\Http\Controllers\MainController::class, 'link'])->name('link');

Route::middleware(['auth', 'user.expired'])->group(function () {
    Route::get('/page', [\App\Http\Controllers\MainController::class, 'page'])->name('page');
    Route::post('/deactivate', [\App\Http\Controllers\MainController::class, 'deactivate'])->name('deactivate');
    Route::post('/refresh', [\App\Http\Controllers\MainController::class, 'refresh'])->name('refresh');
    Route::post('/lucky', [\App\Http\Controllers\MainController::class, 'lucky'])->name('lucky');
    Route::get('/history', [\App\Http\Controllers\MainController::class, 'history'])->name('history');
});

