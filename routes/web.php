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
    Route::post('nuevo-usuario', [UserController::class, 'store'])->name('users.store');
    Route::get('editar-usuario/{slug}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('editar-usuario/{slug}', [UserController::class, 'update'])->name('users.update');
    Route::put('editar-usuario/{slug}/contraseña', [UserController::class, 'updatePassword'])->name('user.password.update');
});



Auth::routes([
    'register' => false,
]);
