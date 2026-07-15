<?php

use App\Http\Controllers\app\AccountController;
use App\Http\Controllers\app\ContactController;
use App\Http\Controllers\app\JoinAccountContactController;
use App\Http\Controllers\app\PlanController;
use App\Http\Controllers\app\SignatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::resource('plans', PlanController::class)->except(['show']);
    Route::resource('contacts', ContactController::class)->except(['show']);
    Route::resource('accounts', AccountController::class);
    Route::resource('signatures', SignatureController::class);
    Route::patch('signatures/{signature}/suspend', [SignatureController::class, 'suspendSignature'])->name('signatures.suspend');

    Route::get('join-account-contact/{account}', [JoinAccountContactController::class, 'form'])
    ->name('join.contact');
    Route::post('join-account-contact', [JoinAccountContactController::class, 'join'])
    ->name('join');

    Route::post('unjoin-account-contact', [JoinAccountContactController::class, 'unJoin'])
    ->name('unJoin');

    Route::get('/', HomeController::class)->name('home');
    
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');

   


    Route::view('settings', 'settings')->name('settings');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 Route::middleware(['auth', 'can:access-admin'])->group(function() {
    Route::resource('users', UserController::class)->except('create');
});

require __DIR__.'/auth.php';
