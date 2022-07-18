<?php

namespace App\Http\Controllers;

use App\Models\BorrowHistory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // menggunakan method borrow pada model USER (sudah beralasi dengan borrow_history)
        // auth()->user() = user yang sudah login
        $books = auth()->user()->borrow;
        // dd($books);
        return view('home', [
            'books' => $books,
            'title' => 'Perpustakaan | Datar Buku',
        ]);
    }
}