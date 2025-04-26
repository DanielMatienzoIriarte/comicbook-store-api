<?php

use App\Http\Controllers\Api\ComicBookCategoryController;
use App\Http\Controllers\Api\ComicBookController as ApiBookController;
use App\Http\Controllers\Api\UserAuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function() {
    Route::get('',);
});

Route::prefix('user')->group(function() {
    Route::post('/login', [UserAuthController::class, 'login'])
    ->name('user.login');
    Route::get('/{id}', [UserController::class, 'getById'])
        ->name('user.getById');
    Route::post('/', [UserController::class, 'post'])
        ->name('user.post');
    Route::get('/logout', [UserAuthController::class, 'logout'])
        ->name('user.logout');
});

Route::prefix('/books')->group(function() {

    Route::get('/all', [ApiBookController::class, 'getLastBooks'])
        ->name('books.all');
    Route::get('/', [ApiBookController::class, 'paginate'])
        ->name('books.paginate');
    Route::get('/categories', [ComicBookCategoryController::class, 'get'])
        ->name('categories.all');
    Route::get('/by-category/{id}', [ApiBookController::class, 'getByCategory'])
        ->name('categories.allBooks');
});
