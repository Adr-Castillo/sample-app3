<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\toDoListController;

Route::post('/saveTask', action: [toDoListController::class, 'saveTask'])->name('saveTask');
