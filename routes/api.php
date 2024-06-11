<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ChapterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/users/{id}/verify-email', [AuthController::class, 'verifyEmail']);
Route::get('/kursus', [CourseController::class, 'index']);
Route::get('/kursus/{id}', [CourseController::class, 'show']);
Route::post('/kursus', [CourseController::class, 'tambah']);
Route::delete('/kursus/{id}', [CourseController::class, 'hapus']);
Route::post('/chapter', [ChapterController::class, 'tambah']);
Route::delete('/chapter/{id}', [ChapterController::class, 'hapus']);
Route::get('/chapter-kursus/{id}', [CourseController::class, 'chapter']);
Route::get('/detil-kursus/{id}', [UserCourseController::class, 'students']);
Route::get('/user-course/{userId}/{courseId}', [UserCourseController::class, 'index']);
Route::get('/user-course/{userId}', [UserCourseController::class, 'user']);
Route::get('/students', [AuthController::class, 'all_user']);
Route::get('/users', [AuthController::class, 'all']);
Route::post('/user-course', [UserCourseController::class, 'add']);