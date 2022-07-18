<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\BorrowHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);
        return view('frontend.book.index', [
            'books' => $books,
            'title' => 'Perpustakaan',
        ]);
    }

    public function show(Book $book)
    {
        return view('frontend.book.show', [
            'book' => $book,
            'title' => 'Perpustakaan | Detail Buku',
        ]);
    }

    public function borrow(Book $book, BorrowHistory $request)
    {
        // dd(auth()->user()->id);
        // user yang sudah login
        $user = auth()->user();
        if ($user->borrow()->IsStillBorrow($book->id)) {
            return redirect()->back()->with('toast', 'Anda sudah meminjam buku (' . $book->title . ')');
        }
        // mengurangi jumlah qty buku saat dipinjam
        if ($book->qty == 0) {
            return redirect()->back()->with('toast', 'Maaf, buku masih belum tersedia');
        } else {
            // attach = buku apa yang akan dipinjam
            $user->borrow()->attach($book);
            // Mengurangi jumlah qty pada buku
            $book->decrement('qty');
            // back() kembali ke halaman buku dipinjam
            return redirect()->back()->with('toast', 'Berhasil meminjam buku');
        }
    }

    public function read(Book $book)
    {
        // // Tiga
        $file = 'book.pdf';
        $path = 'assets/pdf/' . $file;
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $file . '"',
        ];
        return response()->file($path, $header);
        // $response = response()->file($path, $header);

        // return view('frontend.book.read', [
        //     'book' => $book,
        //     'title' => 'Perpustakaan | Baca Buku',
        // ]);
    }
}