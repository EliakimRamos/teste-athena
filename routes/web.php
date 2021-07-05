<?php

use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Auth/Login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/dashboard/{message?}/{status?}',[UserController::class, 'index'])->name('dashboard');
    Route::get('/register', [UserController::class, 'create'])->name('register');
    Route::get('/user/{id}/edit', [UserController::class, 'show'])->name('user.edit');
    Route::post('/user/{id}/edit', [UserController::class, 'update'])->name('user.edit');
    Route::post('/register', [UserController::class, 'store'])->name('store');
    Route::post('users/{id}', [UserController::class, 'delete'])->name('delete');
});


