<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BorrowController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/author/data', [AuthorController::class, 'showDataAuthors'])->name('author.data');
Route::get('/book/data', [BookController::class, 'showDataBooks'])->name('book.data');
Route::get('/borrow/data', [BorrowController::class, 'borrows'])->name('borrow.data');
/*  Cara satu untuk author route
Route::get('/author', [AuthorController::class, 'index'])->name('author.index');
Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
Route::post('/author', [AuthorController::class, 'store'])->name('author.store');
Route::get('/author/{author}/edit', [AuthorController::class, 'edit'])->name('author.edit');
Route::put('/author/{author}', [AuthorController::class, 'update'])->name('author.update');
Route::delete('/author/{author}', [AuthorController::class, 'destroy'])->name('author.destroy');
*/
// Cara dua untuk author route
Route::resource('author', AuthorController::class);
Route::resource('book', BookController::class);

Route::get('borrow', [BorrowController::class, 'index'])->name('borrow.index');
Route::put('borrow/{borrowHistory}/return}', [BorrowController::class, 'returnBook'])->name('borrow.return');

Route::get('report/top-book', [ReportController::class, 'topBook'])->name('report.top-book');
Route::get('report/top-user', [ReportController::class, 'topUser'])->name('report.top-user');