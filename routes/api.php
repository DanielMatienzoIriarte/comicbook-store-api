<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::prefix('admin')->group(function() {
    Route::get('',);
});
Route::post('/user', [UserController::class, 'Post'])
    ->name('user.post');
