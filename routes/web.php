<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [LoginController::class ,'showLoginForm']);

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/users/create', [UserController::class, 'create'])->middleware('auth');

Route::post('/users/create', [UserController::class, 'store'])->middleware('auth');

Route::post('/users/edit', [UserController::class, 'edit'])->middleware('auth')->name('users.edit');

Route::post('/users/destroy', [UserController::class, 'delete'])->middleware('auth')->name('users.destroy');