<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\ExamController;
use App\Http\Controllers\Teacher\StudentController;
use App\Http\Controllers\Teacher\ClassroomController;


Route::prefix('teacher')->middleware('can:teacher-only')->group(function () {
    Route::resource('classrooms', ClassroomController::class);
    Route::resource('students', StudentController::class);
    Route::resource('exams', ExamController::class);
});