<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Uses the Vue Router for any route not defined before this
Route::resource('/tasks', TaskController::class);

Route::get('/{vue_capture?}', function() {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');

Route::post("/register", [AuthController::class,"register"]);
Route::post("/login", [AuthController::class,"login"]);



// Route::get('/user/{id}', [UserController::class, 'show']);


