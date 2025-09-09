<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layout.app');
// });

Route::get('/signin', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/signin', [AuthController::class, 'process'])->name('auth.process')->middleware('guest');


Route::get('/', [TodoController::class, 'index'])->name('todo.index')->middleware('auth');
Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create')->middleware('auth');


Route::get('/helo/{name}', [TestController::class, 'index']);
