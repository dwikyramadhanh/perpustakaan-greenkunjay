<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BorrowHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDataBooks()
    {
        // cara 1 menangani n+1
        // return datatables()->eloquent(Book::query()->with('author'))
        return datatables()->eloquent(Book::query()->with('author'))
            ->addColumn('author', function(Book $model){
                return $model->author->name;
            })
            ->editColumn('cover', function(Book $model) {
                return '<img src="' . $model->getCover() . '" height="150px" width="100px">';
            })
            ->addColumn('action', 'admin.book.action')
            ->rawColumns(['cover', 'action'])
            ->addIndexColumn()
            ->toJson();
    } 
    
    public function index()
    {
        $dataBook = Book::paginate();
        return view('admin.book.index', [
            'title' => 'Perpustakaan | Data Buku',
            'data' => $dataBook,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create', [
            'authors'=> Author::orderBy('name', 'ASC')->get(),
            'title' => 'Perpustakaan | Tambah Data Buku',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $cover = null; 
        if($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('assets/covers');
        } else {
            $cover = $request->no_cover;
        }
        Book::create([
            'author_id' => $request->author_id,
            'title' => $request->title,
            'description' => $request->description,
            'cover' => $cover,
            'qty' => $request->qty,
        ]);
        return redirect()->route('admin.book.index')->with('success', 'Data buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.book.edit', [
            'authors'=> Author::orderBy('name', 'ASC')->get(),
            'book' => $book,
            'title' => 'Perpustakaan | Edit Buku',  
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $cover = $book->cover;
        if ($request->hasFile('cover')) {
            if($cover == 'assets/no-cover/no-cover.png') {
                $cover = $request->file('cover')->store('assets/covers');
            } else {
                // Menghapus cover buku sebelumnya
                Storage::delete($book->cover);
                $cover = $request->file('cover')->store('assets/covers');
            }
        }
        $book->update([
            'author_id' => $request->author_id,
            'title' => $request->title,
            'description' => $request->description,
            'cover' => $cover,
            'qty' => $request->qty,
        ]);
        return redirect()->route('admin.book.index')->with('info', 'Data buku berhasil diupdate');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book )
    {
        // Menghapus gambar cover yang ada di assets/covers
        if ($book->cover) {
            // Fungsi menghapus cover buku sebelumnya
            Storage::delete($book->cover);
        }
        $book->delete();
        return redirect()->route('admin.book.index')->with('danger', 'Data buku berhasil dihapus');
    }
}