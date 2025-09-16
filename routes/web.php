<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Todo2Controller;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layout.app');
// });

Route::get('/signin', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/signin', [AuthController::class, 'process'])->name('auth.process')->middleware('guest');
Route::post('/signout', LogoutController::class)->name('logout')->middleware('auth');
Route::get('/signout', function () {
    return redirect()->route('todo.index');
});


Route::get('/', [TodoController::class, 'index'])->name('todo.index')->middleware('auth');
Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create')->middleware('auth');
Route::post('/todo/store', [TodoController::class, 'store'])->name('todo.store')->middleware('auth');
Route::delete('/todo/hapus/{id}', [TodoController::class, 'destroy'])->name('todo.destroy')->middleware('auth');
Route::get('/todo/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit')->middleware('auth');
Route::put('/todo/update/{id}', [TodoController::class, 'update'])->name('todo.update')->middleware('auth');
Route::get('/todo/detail/{id}', [TodoController::class, 'show'])->name('todo.show')->middleware('auth');


Route::get('/helo/{name}', [TestController::class, 'index']);
