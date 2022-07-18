<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

class ReportController extends Controller
{
    public function topBook() {
        // borrowed (Book Model)
        // withCount = menghitung jumlah dipinjam
        $books = Book::withCount('borrowed')
                ->with('author') // menangani n+1
                // Karena menggunakan withCount pada ReportController maka kita otomatis mempunyai field {relation}_count yang didalam kasus berarti borrowed_count.
                ->orderBy('borrowed_count', 'desc')   
                ->paginate(env('PAGINATION_ADMIN'));
        return view('admin.report.top-book',[
            'books' => $books,
        ]);
    }

    public function topUser() {
        $users = User::withCount('borrow')
            ->orderBy('borrow_count', 'desc')
            ->paginate(env('PAGINATION_ADMIN'));
        return view('admin.report.top-user', [
            'users' => $users
        ]);
    }
}