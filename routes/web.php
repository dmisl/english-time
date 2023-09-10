<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\ActiveController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Home

Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Login + Registration

Route::middleware(['guest'])
->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login.index');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');

    Route::get('register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
});

// Admin account

Route::prefix('admin')
->middleware('admin')
->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.index');
    Route::get('logout', [UserController::class, 'logout'])->name('admin.logout');
    Route::resource('course', CourseController::class);
    Route::resource('active', ActiveController::class);
    Route::resource('access', AccessController::class);
    Route::get('completedtasks', [TaskController::class, 'completed'])->name('task.homework');
    Route::prefix('course')
    ->group(function () {
        Route::resource('{course}/lesson', LessonController::class);
        Route::resource('{course}/lesson/{lesson}/task', TaskController::class);
        Route::get('{user_id}/{course}/lesson/{lesson}/task/{task}/completed', [TaskController::class, 'showcompleted'])->name('task.completed');
    });
});

// User account

Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
Route::prefix('user')
->middleware('active')
->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('course/{course}', [CourseController::class, 'show'])->name('user.course.show');
    Route::prefix('course')
    ->group(function () {
        Route::get('{course}/lesson/{lesson}/show', [LessonController::class, 'show'])->name('user.lesson.show');
        Route::get('{course}/lesson/{lesson}/task/{task}/show', [TaskController::class, 'show'])->name('user.task.show');
        Route::post('check', [TaskController::class, 'check'])->name('task.check');
        Route::get('{user_id}/{course}/lesson/{lesson}/task/{task}/completed', [TaskController::class, 'showcompleted'])->name('user.task.completed');
    });
});

// Fallback

Route::fallback(function () {
    session(['alert' => 'Ваш аккаунт не активований адміністратором, ви не можете перейти по цій адресі']);
    return redirect()->route('home.index');
});
