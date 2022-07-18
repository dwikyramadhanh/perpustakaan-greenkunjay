@extends('admin.templates.default')
@section('content')
<div class="card">
    <div class="card-header bg-black"></div>
    <div class="card-body">
        <form action="{{ route('admin.author.update', $author) }}" method="POST">
            @csrf 
            @method("PUT")
            <!-- Input nama penulis -->
            <div class="mb-3">
                <label for="inputNameAuthor" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputNameAuthor" placeholder="Masukkan nama penulis" value="{{ old('name', $author->name)}}">
                @error('name')
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
