@extends('frontend.templates.default')
@section('content')
<div class="row">
    <div class="col s12 m12">
        <blockquote>
            <h5><b>{{ $book->title }}</b></h5>
        </blockquote>
        <iframe src="{{ asset('assets/pdf/book.pdf') }}" frameborder="0" type="application/pdf" style="width: 100%; height: 600px"></iframe>
    </div>
</div>
@endsection

