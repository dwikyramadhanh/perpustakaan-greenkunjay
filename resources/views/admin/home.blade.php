@extends('admin.templates.default')
@section('content')
<div class="row justify-content-md-center mr-2 ml-2">
    <!-- Penulis -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $author->total() }}</h3>
                <p>Penulis</p>
            </div>
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
        </div>
    </div>
    <!-- Buku -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $book->total() }}</h3>
                <p>Buku</p>
            </div>
            <div class="icon">
                <i class="fas fa-book"></i>
            </div>
        </div>
    </div>
    <!-- User -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $user->total()-1 }}</h3>
                <p>User</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>
    <!-- Jumlah Peminjaman -->
    <div class="col-lg-3 col-6 text-white">
        <div class="small-box bg-warning">
            <div class="inner text-white">
                <h3>{{ $borrow->total() }}</h3>
                <p>Peminjaman</p>
            </div>
            <div class="icon">
                <i class="fas fa-file"></i>
            </div>
        </div>
    </div>
</div>
@endsection
