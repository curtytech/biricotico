<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/', [PageController::class, 'home'])->name('users.home');
Route::get('/{user:slug}', [PageController::class, 'show'])->name('users.show');