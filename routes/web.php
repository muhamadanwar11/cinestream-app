<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [MovieController::class, 'index'])->name('dashboard');
    Route::get('/search', [MovieController::class, 'search'])->name('movies.search');
    Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movies.show');

    // Watchlist Routes
    Route::get('/watchlist', [MovieController::class, 'watchlist'])->name('watchlist.index');
    Route::post('/watchlist', [MovieController::class, 'store'])->name('watchlist.store');
    Route::patch('/watchlist/{movie}', [MovieController::class, 'update'])->name('watchlist.update');
    Route::delete('/watchlist/{movie}', [MovieController::class, 'destroy'])->name('watchlist.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');

        // User CRUD
        Route::get('/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('users.index');
        Route::get('/users/create', [\App\Http\Controllers\AdminController::class, 'createUser'])->name('users.create');
        Route::post('/users', [\App\Http\Controllers\AdminController::class, 'storeUser'])->name('users.store');
        Route::get('/users/{user}/edit', [\App\Http\Controllers\AdminController::class, 'editUser'])->name('users.edit');
        Route::put('/users/{user}', [\App\Http\Controllers\AdminController::class, 'updateUser'])->name('users.update');
        Route::patch('/users/{user}/role', [\App\Http\Controllers\AdminController::class, 'updateRole'])->name('users.update-role');
        Route::delete('/users/{user}', [\App\Http\Controllers\AdminController::class, 'destroyUser'])->name('users.destroy');
    });
});

require __DIR__ . '/auth.php';
