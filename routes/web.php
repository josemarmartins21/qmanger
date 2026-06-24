<?php

use App\Http\Controllers\CreateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/', HomeController::class)->name('home');
    Route::get('/index', IndexController::class)->name('index');
    Route::get('/create', CreateController::class)->name('create');
    Route::resource('users', UserController::class)->middleware(['auth', 'can:admin'])->middleware(['auth', 'can:super-admin']);

    Route::view('settings', 'settings')->name('settings');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
