<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class , 'index']) ->name('personal.index');
Route::get('/contact', [AppController::class , 'contact']) ->name('personal.contact');
Route::post('/contact', [AppController::class , 'storeMessage']) ->name('personal.contact.store');
Route::get('/projects', [AppController::class , 'projects']) ->name('personal.projects');
Route::get('/resume', [AppController::class , 'resume']) ->name('personal.resume');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
