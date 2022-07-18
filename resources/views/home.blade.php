@extends('frontend.templates.default')
@section('content')
<blockquote>
    <h5>Hallo <b> {{ auth()->user()->name }}</b>, berikut buku yang bisa kamu baca.</h5>
</blockquote>
@foreach ($books as $book)

<div class="row card-custom">
    <div class="card">
        <div class="card-image col s12 m3">
            <img src="{{ $book->getCover() }}" style="height: 100%;">
            <a href="{{ route('book.read', $book) }}" class="btn cyan lighten-1 waves-effect waves-light" style="width: 100%">Baca</a>
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
                </p><br>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
