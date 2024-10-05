<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('todo.add_task');
})->name('home');

Route::post('add/task',[TodoController::class,'addTodo'])->name('add.todo');
Route::get('show/task',[TodoController::class,'showTodo'])->name('show.todo');
Route::get('/edit/{id}', [TodoController::class, 'editTodo'])->name('edit.todo');
Route::get('delete/task/{id}',[TodoController::class,'deleteTodo'])->name('delete.todo');
Route::get('/update-status/{id}/{status}', [TodoController::class, 'updateStatus'])->name('update.status');
Route::post('/update/task/{id}', [TodoController::class, 'updateTask'])->name('update.task');
