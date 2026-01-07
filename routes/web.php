<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);
Route::post('/todo', [TodoController::class, 'store']);
Route::put('/todo/{id}', [TodoController::class, 'toggle']);
Route::delete('/todo/{id}', [TodoController::class, 'destroy']);
Route::put('/todo/update/{id}', [TodoController::class, 'update']);
