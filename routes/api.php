<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::get('/me', [UserController::class, 'me']);

    Route::get('/my/courses', [CourseUserController::class, 'index']);
    Route::post('/my/courses/{course}/add', [CourseUserController::class, 'add']);
    Route::post('/my/courses/{course}/remove', [CourseUserController::class, 'remove']);

    Route::get('/courses/{course}', [CourseController::class, 'show']);
    Route::patch('/courses/{course}', [CourseController::class, 'update']);
});
