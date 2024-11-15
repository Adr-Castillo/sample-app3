<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;

Route::middleware(["auth:sanctum"])->group(function() {
    // Route::resource('/tasks', TaskController::class);
});

