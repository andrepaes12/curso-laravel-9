<?php

use App\Http\Controllers\{
    UserController
};
use App\Http\Controllers\Admin\CommentController;
use Illuminate\Support\Facades\Route;

// UserController = Controlador; 'index' = método; name = alias
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');

// rotas com parâmetros devem ser inseridas por último na sequência do recurso (path)
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

// CommentController
Route::get('/users/{id}/comments', [CommentController::class, 'index'])->name('comments.index');
Route::get('/users/{id}/comments/create', [CommentController::class, 'create'])->name('comments.create');
Route::post('/users/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/users/{user_id}/comments/{id}', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
