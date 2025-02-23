<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\LoginController;

Route::get('/', [ArticlesController::class, 'index'])->name('articles.index');

Route::get('/articles/create', [ArticlesController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticlesController::class, 'store'])->name('articles.store');

Route::get('/articles/{id}', [ArticlesController::class, 'show'])->name('articles.show');
Route::delete('/suparticles/{id}', [ArticlesController::class, 'destroy'])->name('articles.destroy');
Route::get('/modarticles/{id}/edit', [ArticlesController::class, 'edit'])->name('articles.edit');
Route::put('/modarticles/{id}', [ArticlesController::class, 'update'])->name('articles.update');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/da', [ArticlesController::class, 'dashboard'])->name('articles.dashboard');
