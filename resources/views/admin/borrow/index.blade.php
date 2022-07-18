@extends('admin.templates.default')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered text-center" style="width: 100%">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="" method="POST" id="returnForm">
    @csrf
    @method("PUT")
    <input type="submit" value="Return" style="display: none">
</form>
@endsection

@push('datatables')
    <!-- DataTables -->
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
            ajax: '{{ route('admin.borrow.data') }}',
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false }, 
                { data: 'user'},
                { data: 'book_title'},
                { data: 'created_at', orderable: false, 'render': function (data) {
                    var date = new Date(data);
                    var month = date.getMonth() + 1;  
                    return date.getDate() + "-" + (month.length > 1 ? month : "0" + month) + "-" + date.getFullYear();
                    }
                },
                { data: 'updated_at', orderable: false, 'render': function (data) {
                    var date = new Date(data);
                    var month = date.getMonth() + 1;
                    var numberOfDaysToAdd = 5; // menambahkan 5 hari dari waktu hari ini
                    var dd = date.setDate(date.getDate() + numberOfDaysToAdd);
                    return date.getDate(dd) + "-" + (month.length > 1 ? month : "0" + month) + "-" + date.getFullYear();
                }
                },
                { data: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endpush
