@extends('admin.templates.default')
@section('content')
<div class="card">
    <div class="card-header bg-black"></div>
    <div class="card-body">
        <form action="{{ route('admin.book.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <!-- Judul Buku -->
            <div class="mb-3">
                <label for="inputBookTitle" class="form-label">Judul Buku</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputBookTitle" placeholder="Masukkan judul buku" value="{{ old('title', $book->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Deskripsi Buku -->
            <div class="mb-3">
                <label for="inputDescription" class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="inputDescription" cols="30" rows="5" placeholder="Deskripsi buku">{{ old('description', $book->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Penulis -->
            <div class="mb-3">
                <label for="inputAuthorId" class="form-label">Penulis</label><br>
                <select name="author_id" id="inputAuthorId" class="form-control select2">
                    @foreach ($authors as $author)
                    @if (old('author_id'))
                    <option value="{{ $author->id }}" @if(old('author_id')== $author->id) selected @endif>{{ $author->name }}</option>
                    @else
                    <option value="{{ $author->id }}" @if ($author->id == $book->author_id) selected @endif>
                    {{ $author->name }}
                    </option>
                    @endif
                    @endforeach
                </select>
                @error('author_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Cover -->
            <div class="mb-3">
                <label for="inputCover" class="form-label">Cover</label><br>
                @if ($book->cover)
                <img src="{{$book->getCover() }}" class="img-preview img-fluid mb-1" style="width: 150px; height: 200px;">
                @else
                <img src="{{asset('assets/dist/img/no-cover.png')}}" class="img-preview img-fluid mb-1" style="width: 150px; height: 200px;">
                @endif
                <input type="file" name="cover" class="form-control-file @error('cover') is-invalid @enderror" id="inputCover" onchange="previewImage()">
                @error('cover')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Jumlah Buku -->
            <div class="mb-3">
                <label for="inputQty" class="form-label">Jumlah Buku</label>
                <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror" id="inputQty" placeholder="Masukkan jumlah buku" value="{{ old('qty', $book->qty) }}">
                @error('qty')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary btn-sm">
            </div>
        </form>
    </div>
</div>
@endsection
@push('select2css')
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $('.select2').select2();
</script>
<script src="{{ asset('assets/plugins/image-preview.js') }}"></script>
@endpush
