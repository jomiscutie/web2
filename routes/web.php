<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AuthController::class, 'index'])->name('auth.index');
Route::get('/stud-list', [StudentsController::class, 'index'])->name('std.index');
Route::post('/create-student', [StudentsController::class, 'Store'])->name('std.create');
Route::delete('/del-studs/{id}', [StudentsController::class, 'destroy'])->name('std.destroy');
Route::put('/edit-studs/{id}', [StudentsController::class, 'edit'])->name('std.edit');
Route::post('/logout', [AuthController::class, 'logoutUser'])->name('logout');

Route::get('/register', [AuthController::class, 'registerView'])->name('auth.register');
Route::get('/login', [AuthController::class, 'loginView'])->name('auth.login');
Route::post('/user-registration', [AuthController::class, 'registerUser'])->name('registration');
Route::post('/user-login', [AuthController::class, 'loginUser'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');