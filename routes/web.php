<?php

use App\Http\Controllers\CreateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/', HomeController::class)->name('home');
    Route::get('/index', IndexController::class)->name('index');
    Route::get('/create', CreateController::class)->name('create');
    
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');

    Route::middleware(['auth', 'can:access-admin'])->group(function() {
/*         Route::get('users', [UserController::class, 'index']);
        Route::get('users/{user}', [UserController::class, 'edit']);
        Route::post('users', [UserController::class, 'update']);
        Route::get('users/create', [UserController::class, 'create']);
        Route::post('users', [UserController::class, 'store']);
        Route::delete('users/{user}', [UserController::class, 'destroy']); */

        Route::resource('users', UserController::class)->except(['show']);

    });


    Route::view('settings', 'settings')->name('settings');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
