@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h5>Data Buku: {{ $data->total() }}</h5>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('admin.book.create') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus-circle"></i></a>
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
                                <th>Penulis</th>
                                <th>Cover</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="" method="POST" id="deleteForm">
    @csrf
    @method("DELETE")
    <input type="submit" value="Delete" style="display: none">
</form>
@endsection

<!-- DataTables -->
@push('datatables')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@push('scripts')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<!-- Bootstrap notify -->
<script src="{{ asset('assets/plugins/bs-notify.min.js') }}"></script>
<!-- Alerts -->
@include('admin.templates.partials.alerts')
<!-- DataTable -->
<script>
    $(function() {
        $('#dataTable').DataTable({
            processing: true, 
            serverSide: true, 
            ajax: '{{ route('admin.book.data') }}',
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'title'},
                { data: 'description'},
                { data: 'qty'},
                { data: 'author'},
                { data: 'cover', orderable: false},
                { data: 'action', orderable: false},
            ]
        });
    });
</script>
@endpush
