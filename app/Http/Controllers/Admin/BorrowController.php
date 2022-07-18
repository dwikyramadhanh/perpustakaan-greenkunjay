<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BorrowHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function borrows()
    {
        // cara 1
        // where('returned_at', null) = menampilkan hanya buku yang sedang dipinjam (yang dikembalikan tidak ditampilkan)
        // return datatables()->eloquent(BorrowHistory::query()->where('returned_at', null))
        return datatables()->eloquent(BorrowHistory::query()->with('user', 'book')->IsBorrowed())
            ->addColumn('user', function(BorrowHistory $model) {
                return $model->user->name;
            })
            ->addColumn('book_title', function (BorrowHistory $model) {
                return $model->book->title;
            })
            ->addColumn('action', 'admin.borrow.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->toJson();
    }
    public function index() {
        $borrowData = BorrowHistory::paginate();
        return view('admin.borrow.index', [
            'data' => $borrowData,
            'title' => 'Perpustakaan | Peminjaman Buku'
        ]);
    }
    public function returnBook(Request $request, BorrowHistory $borrowHistory) {
        $borrowHistory->update([
            'returned_at' => Carbon::now()->addDays(3),
            'admin_id' => auth()->id(),
        ]);
        // menambahkan kembali jumlah buku yang sudah dikembalikan
        $borrowHistory->book()->increment('qty');
        return redirect()->back()->with('success', 'Buku dikembalikan');
    }
}