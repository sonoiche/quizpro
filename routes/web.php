<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['student.validation'])->name('home');

Route::middleware(['auth:web'])->group(function () {
    Route::prefix('admin')->middleware('can:admin-only')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('sections', SectionController::class);
        Route::resource('students', StudentController::class);
    });
    
    Route::resource('account', AccountController::class);
    
    require __DIR__.'/teacher.php';
    require __DIR__.'/student.php';
});