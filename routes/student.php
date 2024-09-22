<?php

use App\Http\Controllers\Student\ClassroomController;
use App\Http\Controllers\Student\ExamController;
use App\Http\Controllers\Student\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('student')->middleware('can:student-only')->group(function () {
    Route::resource('accounts', UserController::class);
    Route::resource('classrooms', ClassroomController::class);
    Route::resource('exams', ExamController::class);
});