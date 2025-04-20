<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ComicBookController;

use App\Http\Controllers\Api\ComicBookController as ApiBookController;

Route::get('/', function () {
    return redirect(route('filament.admin.auth.login'));
})->name('login');

Route::get('/book/all/{limit}', [ComicBookController::class, 'getLastBooks'])
    ->name('book.all.limit');
Route::get('/books?page={page}', [ApiBookController::class, 'paginate'])
    ->name('books.paginate');