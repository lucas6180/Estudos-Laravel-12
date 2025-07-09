<?php

use App\Http\Controllers\Admin\LivroController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckIfIsAdmin;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('admin')
    ->group(function () {
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware(CheckIfIsAdmin::class);
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users/', [UserController::class, 'store'])->name('users.store');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/books/store', [LivroController::class, 'store'])->name('book.store');
        Route::get('/books/create', [LivroController::class, 'create'])->name('book.create');
    });
Route::middleware('auth')->prefix('books')->group(function () {
    Route::get('/index', [LivroController::class, 'index'])->name('books.index');
    Route::post('/cancelar/{livro}', [EmprestimoController::class, 'cancelarReservar'])->name('books.cancelar');
    Route::post('/reservar/{livro}', [EmprestimoController::class, 'reservar'])->name('books.reservar');
    Route::post('/curtir/{livro}', [LivroController::class, 'curtir'])->name('books.curtir');
});
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
