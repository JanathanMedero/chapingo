<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('nuevo-usuario', [UserController::class, 'create'])->name('users.create');
    Route::post('nuevo-usuario', [UserController::class, 'store'])->name('users.store');
    Route::get('editar-usuario/{slug}/moderador', [UserController::class, 'edit'])->name('users.edit');
    Route::put('editar-usuario/{slug}', [UserController::class, 'update'])->name('users.update');
    Route::put('editar-usuario/{slug}/contraseña', [UserController::class, 'updatePassword'])->name('user.password.update');
    Route::delete('eliminar-usuario/{slug}/moderador', [UserController::class, 'destroy'])->name('user.delete');

    //AdminUsersController
    Route::get('administrators', [AdminUsersController::class, 'index'])->name('adminUser.index');
    Route::get('editar-usuario/{slug}/administrador/', [AdminUsersController::class, 'edit'])->name('adminUser.edit');
    Route::delete('eliminar-usuario/{slug}/administrador', [AdminUsersController::class, 'destroy'])->name('admin.delete');

});



Auth::routes([
    'register' => false,
]);
