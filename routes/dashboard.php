<?php
use App\Http\Controllers\AppController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ExperienceController;
use App\Http\Controllers\Dashboard\EducationController;
use App\Http\Controllers\Dashboard\SkillController;
use App\Http\Controllers\Dashboard\LanguageController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\MessageController;
use App\Http\Controllers\Dashboard\SettingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::prefix('dashboard')->middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('experiences', ExperienceController::class);
    Route::resource('educations', EducationController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('languages', LanguageController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('messages', MessageController::class);
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

});

