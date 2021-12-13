<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('nuevo-usuario', [UserController::class, 'create'])->name('users.create');
});



Auth::routes([
    'register' => false,
]);
