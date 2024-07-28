<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

// Route::get('/todo', function () {
//     // dd("Hits");
//     return Inertia::render('components/ToDoPage');
// })->name('todo');
Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');

Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
Route::put('/todos/{id}', [TodoController::class, 'update'])->name('todos.update');

Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.delete');

