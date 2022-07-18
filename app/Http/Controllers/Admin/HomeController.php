<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\BorrowHistory;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $authorData = Author::paginate();
        $bookData = Book::paginate();
        $userData = User::paginate();
        $borrowData = BorrowHistory::paginate();
        return view('admin.home', [
            'author' => $authorData,
            'book' => $bookData,
            'user' => $userData,
            'borrow' => $borrowData,
            'title' => 'Perpustakaan | Dashboard Admin',
        ]);
    }
}