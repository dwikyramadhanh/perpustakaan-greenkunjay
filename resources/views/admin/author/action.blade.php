<div class="row">
    <div class="col-6">
        <a href="{{ route('admin.author.edit', $model) }}" class="btn btn-warning btn-sm text-white float-right"><i class="fas fa-edit fa-fw"></i></a>
    </div>
    <div class="col-6">
        <button href="{{ route('admin.author.destroy', $model) }}" class="btn btn-danger btn-sm float-left" id="delete">
            <i class="fas fa-trash-alt fa-fw"></i>
        </button>
    </div>
</div>
<!-- CDN sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('button#delete').on('click', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
            title: 'Anda yakin menghapus data ini?',
            text: "Data yang sudah dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33', 
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Tidak, Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').action = href;
                document.getElementById('deleteForm').submit();
                Swal.fire(
                    'Terhapus!',
                    'Data berhasil dihapus.',
                    'success',
                )
            }
        });
    });
</script>
