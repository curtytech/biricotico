<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $base = Str::of($validated['name'])->lower()->slug('-');
    $slug = (string) $base;
    $i = 1;
    while (User::where('slug', $slug)->exists()) {
        $slug = (string) $base.'-'.$i;
        $i++;
    }

    $user = User::create([
        'name' => $validated['name'],
        'slug' => $slug,
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => 'user',
    ]);

    return redirect()->route('users.show', $user->slug);
})->name('register.store');

Route::get('/', [PageController::class, 'home'])->name('users.home');
Route::get('/{user:slug}', [PageController::class, 'show'])->name('users.show');