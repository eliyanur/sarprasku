document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function () {

        const form = this.closest('.delete-form');

        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus data ini?',
            text: "Data pengguna akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });

    });
});