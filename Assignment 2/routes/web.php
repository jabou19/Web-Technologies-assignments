<?php

use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\HomeController;
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


/*
|-----------------------------------------------------------------------
| Task 1 Authorization.
| You can modify the accessibility of your routes for different users here
|-----------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('register', [HomeController::class, 'register'])->name('register');
Route::post('register', [HomeController::class, 'doRegister'])->name('doRegister');
Route::get('login', [HomeController::class, 'login'])->name('login');
Route::post('login', [HomeController::class, 'doLogin'])->name('doLogin');
Route::get('logout', [HomeController::class, 'logout'])->name('logout');


Route::group(['prefix' => 'adoptions', 'as' => 'adoptions.'], function ()
{
    Route::get('create', [AdoptionController::class, 'create'])->middleware('auth')->name('create');
    Route::post('/', [AdoptionController::class, 'store'])->middleware('auth')->name('store');
    Route::get('mine', [AdoptionController::class, 'mine'])->name('mine');
    Route::post('{adoption}/adopt', [AdoptionController::class, 'adopt'])->name('adopt');
    Route::get('{adoption}', [AdoptionController::class, 'show'])->name('show');
    Route::delete('{adoption}/adopt', [AdoptionController::class, 'destroy'])->name('destroy');
});
