<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});
Route::get('/dashboard', function() {
    return view('/dashboard');
});
Route::view('/dashboard', 'dashboard');
// Route::get('/student', [StudentController::class, 'index']);


// Route::get('/student/{id}', [StudentController::class, 'show']);
// Route::get('/student-edit/{id}', [StudentController::class, 'edit']);
// Route::put('/student/{id}', [StudentController::class, 'update']);
// Route::delete('/student-delete/{id}', [StudentController::class, 'delete']);
// Route::get('/student-deleted', [StudentController::class, 'deleted']);
// Route::get('/student-destroy/{id}', [StudentController::class, 'destroy']);
// Route::get('/student-create', [StudentController::class, 'create']);
// Route::post('/student-in', [StudentController::class, 'store']);
// Route::get('/class', [ClassController::class, 'index']);
// Route::get('/class/{id}', [ClassController::class, 'show']);
// Route::get('/extracuricullar', [ExtracuricullarController::class, 'index']);
// Route::get('/extracuricullar/{id}', [ExtracuricullarController::class, 'show']);
// Route::get('/about', function() {
//     return view('about', ['name' => 'Ikhdan Maghfuron', 'profesi' => 'Software Developer']);
// });
// Route::get('/teacher', [TeacherController::class, 'index']);
// Route::get('/teacher/{id}', [TeacherController::class, 'show']);
Route::prefix('user')->group(function() {
    Route::get('/profile', function() {
        return 'ini adalah halaman profile';
    });
    Route::get('/edit', function() {
        return 'ini adalah edit profile';
    });
    Route::get('/detail/{id}', function($id) {
        return 'ini adalah detail profile'.$id;
    });

});