@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                    <h5></h5>
                    </div>
                    <div class="col-6">
                        
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered" style="width: 100%">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Jumlah Buku</th>
                                <th>Total Dipinjam</th>
                                <th>Penulis</th>
                                <th>Cover</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $page = 1;
                                if(request()->has('page')) {
                                    $page = request('page');
                                }
                                $no = (env('PAGINATION_ADMIN') * $page) - (env('PAGINATION_ADMIN') - 1);
                            @endphp
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td>{{ $book->qty }}</td>
                                    <td>{{ $book->borrowed_count }}</td>
                                    <td>{{ $book->author->name }}</td>
                                    <td>
                                        <img src="{{ $book->getCover() }}" height="150px" width="100px" alt="{{ $book->title }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end"> 
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
