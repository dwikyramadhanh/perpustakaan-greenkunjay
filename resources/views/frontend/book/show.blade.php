@extends('frontend.templates.default')
@section('content')
<blockquote>
    <h5><b>Detail Buku</b></h5>
</blockquote>
<div class="row">
    <div class="card">
        <div class="card-image col s12 m3">
            <img src="{{ $book->getCover() }}" style="height: 100%;"><br>
        </div>
        <div class="card-stacked col s12 m9">
            <div class="card-content">
                <div class="card-title">
                    <h6 class="blue-text lighten-1">{{ $book->title }}</h6>
                    <hr>
                </div>
                <!-- Description -->
                <p>{{ $book->description }}</p><br>
                <hr>
                <p>
                    <b>Penulis: {{ $book->author->name }}</b><br>
                    <b>Jumlah: {{ $book->qty }}</b>
                </p><br>
                <form action="{{ route('book.borrow', $book) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn cyan lighten-1 right waves-effect waves-light" style="width: 100%">Pinjam Buku</button>
                </form>
            </div>
        </div>
    </div>
</div>
<blockquote>
    <h5><b>Buku lainnya dari <u>{{ $book->author->name }}...</u></b></h5>
</blockquote>
<div class="row">
    <!-- Relasi Author dengan Book (books = method pada model Author) -->
    <!-- ['book' => $book] = 'book' (variabel yang digunakan parameter) $book (sumber data)-->
    @foreach ($book->author->books->except($book->id)->shuffle()->take(4) as $book)
    @include('frontend.templates.components.card-book', ['book' => $book])
    @endforeach
</div>
@endsection
