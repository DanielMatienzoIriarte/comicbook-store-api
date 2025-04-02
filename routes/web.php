<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ComicBookController;

Route::get('/', function () {
    return redirect(route('filament.admin.auth.login'));
})->name('login');

Route::get('/book/all/{limit}', [ComicBookController::class, 'getLastBooks'])
    ->name('book.all.limit');
