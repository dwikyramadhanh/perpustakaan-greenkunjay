@extends('frontend.templates.default')
@section('carousel')
@endsection
@section('content')
<div class="row">
    <blockquote>
        <h5>
            <b>Koleksi Buku</b>
        </h5>
    </blockquote>
    <p>
        Koleksi buku yang bisa anda baca & pinjam!
    </p>
    @foreach ($books as $book)
    @include('frontend.templates.components.card-book', ['book' => $book])
    @endforeach
</div>
<!-- Selain menggunakan links() bisa juga menggunakan render() -->
{{ $books->links('vendor.pagination.materialize') }}
@endsection
