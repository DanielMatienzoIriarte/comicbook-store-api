<?php

use App\Http\Controllers\Api\ComicBookController as ApiBookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserAuthController;

Route::prefix('admin')->group(function() {
    Route::get('',);
});

Route::post('/user/login', [UserAuthController::class, 'login'])
    ->name('user.login');
Route::get('/user/{id}', [UserController::class, 'getById'])
    ->name('user.getById');
Route::post('/user', [UserController::class, 'post'])
    ->name('user.post');
Route::get('/user/logout', [UserAuthController::class, 'logout'])
    ->name('user.logout');
Route::get('/book', [ApiBookController::class, 'getAll'])
    ->name('books.all');