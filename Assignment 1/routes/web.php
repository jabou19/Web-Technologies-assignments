<?php


use Illuminate\Support\Facades\Route;

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


Route::get('/',[\App\Http\Controllers\MainController::class,'index'])->name('home');
Route::get('/departments',[\App\Http\Controllers\DepartmentController::class,'index'])->name('departments');
Route::get("/departments/create",[\App\Http\Controllers\DepartmentController::class,'create'])->name('create');
Route::post('/departments',[\App\Http\Controllers\DepartmentController::class,'store'])->name('store');
Route::get('/departments/{department}',[\App\Http\Controllers\DepartmentController::class,'show'])->name('show');
Route::get('/departments/{department}/edit',[App\Http\Controllers\DepartmentController::class ,'edit'])->name('edit');

Route::put('/departments/{department}',[\App\Http\Controllers\DepartmentController::class,'update'])->name('update');
Route::delete('/departments/{department}',[\App\Http\Controllers\DepartmentController::class,'destroy'])->name('destroy');



Route::get('/courses',[\App\Http\Controllers\CourseController::class,'index'])->name('courses');
Route::get('/courses/create',[\App\Http\Controllers\CourseController::class,'create'])->name('create.course');
Route::post('/courses',[\App\Http\Controllers\CourseController::class,'store'])->name('store.course');
Route::get('/courses/{course}',[\App\Http\Controllers\CourseController::class,'show'])->name('show.course');
Route::get('/courses/{course}/edit',[\App\Http\Controllers\CourseController::class,'edit'])->name('edit.course');
Route::put('/courses/{course}',[\App\Http\Controllers\CourseController::class,'update'])->name('update.course');
Route::delete('/courses/{course}',[\App\Http\Controllers\CourseController::class,'destroy'])->name('destroy.course');
