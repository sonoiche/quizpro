<?php

use App\Http\Controllers\Student\ClassroomController;
use App\Http\Controllers\Student\ExamController;
use App\Http\Controllers\Student\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('student')->middleware(['student_validation'])->group(function () {
    Route::get('accounts/{id}/edit', [UserController::class, 'edit'])->name('accounts.edit');
    Route::resource('classrooms', ClassroomController::class);
    Route::resource('exams', ExamController::class);
});

Route::prefix('student')->group(function () {
    Route::get('accounts/{year_level}', [UserController::class, 'show']);
    Route::put('accounts/{id}', [UserController::class, 'update']);
});