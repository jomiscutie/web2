<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
Route::post('/students', [StudentsController::class, 'store'])->name('students.store');
Route::put('/students/{id}', [StudentsController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentsController::class, 'destroy'])->name('students.destroy');
Route::resource('students', StudentsController::class);



Route::get('/', [StudentsController::class, 'index'])->name('std.index');
Route::post('/create-student', [StudentsController::class, 'newStudent'])->name('std.create');