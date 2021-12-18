<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\RedactorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('blog', [HomeController::class, 'blog'])->name('blog');
Route::get('blog/noticia/{slug}', [BlogController::class, 'show'])->name('blog.show');

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

    //Redactor
    Route::get('redactors', [RedactorController::class, 'index'])->name('redactor.index');
    Route::get('editar-usuario/{slug}/redactor/', [RedactorController::class, 'edit'])->name('redactorUser.edit');
    Route::delete('eliminar-usuario/{slug}/redactor', [RedactorController::class, 'destroy'])->name('redactorUser.delete');

    //Notices
    Route::get('noticias', [NoticeController::class, 'index'])->name('notice.index');
    Route::get('nueva-noticia', [NoticeController::class, 'create'])->name('notice.create');
    Route::post('nueva-noticia/creada', [NoticeController::class, 'store'])->name('notice.store');
    Route::get('editar-noticia/{slug}', [NoticeController::class, 'edit'])->name('notice.edit');
    Route::put('noticia/{slug}/actualizada', [NoticeController::class, 'update'])->name('notice.update');
    Route::delete('noticia/{slug}/imagen-eliminada', [NoticeController::class, 'deleteImage'])->name('notice.deleteImage');
    Route::delete('noticia/{slug}/eliminada', [NoticeController::class, 'destroy'])->name('notice.destroy');

    //avatars
    Route::post('user/{slug}/avatar/store', [AvatarController::class, 'store'])->name('avatar.store');

});



Auth::routes([
    'register' => false,
]);
