<div class="row">
    <div class="col d-flex justify-content-center" style="margin: 0 auto">
        <button href="{{ route('admin.borrow.return', $model) }}" class="btn btn-info btn-sm text-center" id="return">
            Pengembalian buku
        </button>
    </div>
</div>
<!-- CDN sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('button#return').on('click', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        Swal.fire({
            title: 'Ingin melakukan pengembalian buku?'
            , text: 'Pastikan bahwa tanggal pengembalian sudah di benar!'
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Ya, Benar data sudah di check'
            , cancelButtonText: 'Tidak, Batal'
        , }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('returnForm').action = href;
                document.getElementById('returnForm').submit();
                Swal.fire(
                    'Berhasil!'
                    , 'Buku sudah dikembalikan.'
                    , 'success'
                , )
            }
        });
    });

</script>
