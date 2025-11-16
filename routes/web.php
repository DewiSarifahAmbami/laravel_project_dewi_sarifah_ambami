<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// User - Hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
});

Route::middleware('auth')->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('products', ProductController::class);
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout.get');

// In your web.php file, make sure the registration route is accessible to guests
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);

// Apply the 'admin' middleware only to routes that require admin access
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin-only routes here
    Route::get('/dashboard', function () {
        return view('home');
    })->name('home');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
