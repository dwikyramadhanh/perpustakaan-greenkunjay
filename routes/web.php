<?php

use App\Http\Controllers\Frontend\BookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;
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

Route::get('/', [BookController::class, 'index'])->name('homepage');
Route::get('/book/{book}', [BookController::class, 'show'])->name('book.show')->middleware('auth', 'role:user');
Route::post('/book/{book}/borrow', [BookController::class, 'borrow'])->name('book.borrow')->middleware('auth', 'role:user');
Route::get('/book/{book}/read', [BookController::class, 'read'])->name('book.read')->middleware('auth', 'role:user');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth', 'role:user');