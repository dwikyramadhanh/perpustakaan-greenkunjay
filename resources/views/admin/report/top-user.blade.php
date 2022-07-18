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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jumlah Peminjaman</th>
                                <th>Bergabung</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            // mengatasi nomor halaman pada pagination
                            $page = 1;
                                if(request()->has('page')) {
                                $page = request('page');
                                }
                                $no = (env('PAGINATION_ADMIN') * $page) - (env('PAGINATION_ADMIN') - 1);
                            @endphp
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->borrow_count }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

