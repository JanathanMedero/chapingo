<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

Auth::routes([
    'register' => false,
]);
