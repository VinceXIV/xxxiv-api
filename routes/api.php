<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// User
Route::post('/login', [AuthController::class, 'login']);


// Course
Route::get('/courses', [CourseController::class, 'index'])->middleware('auth:sanctum');
Route::get('/courses/{id}', [CourseController::class, 'show'])->middleware('auth:sanctum');
Route::post('/courses', [CourseController::class, 'create'])->middleware('auth:sanctum');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->middleware('auth:sanctum');
Route::patch('/courses/{id}', [CourseController::class, 'update'])->middleware('auth:sanctum');