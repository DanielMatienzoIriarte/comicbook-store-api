<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/', function () {
    return redirect(route('filament.admin.auth.login'));
})->name('login');
