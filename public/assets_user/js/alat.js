document.addEventListener('DOMContentLoaded', function () {

    window.openModal = function(id, nama, stok) {
        document.getElementById('modalPinjam').classList.remove('hidden');
        document.getElementById('modal_id_alat').value = id;
        document.getElementById('modal_nama_alat').value = nama;

        const jumlahInput = document.getElementById('modal_jumlah');
        jumlahInput.value = 1;
        jumlahInput.dataset.max = stok; // simpan stok untuk validasi
    }

    window.closeModal = function() {
        document.getElementById('modalPinjam').classList.add('hidden');
    }

    // =========================
    // VALIDASI SEBELUM SUBMIT
    // =========================
    const form = document.querySelector('#modalPinjam form');

    if (form) {
        form.addEventListener('submit', function(e) {

            const jumlahInput = document.getElementById('modal_jumlah');
            const jumlah = parseInt(jumlahInput.value);
            const maxStok = parseInt(jumlahInput.dataset.max);

            if (isNaN(jumlah) || jumlah <= 0) {
                e.preventDefault();

                Swal.fire({
                    icon: 'warning',
                    title: 'Jumlah tidak valid!',
                    text: 'Minimal pinjam 1 alat',
                    confirmButtonColor: '#3085d6'
                });

                return;
            }

            if (jumlah > maxStok) {
                e.preventDefault();

                Swal.fire({
                    icon: 'error',
                    title: 'Stok Tidak Cukup!',
                    text: 'Stok tersedia hanya ' + maxStok,
                    confirmButtonColor: '#d33'
                });

                return;
            }

        });
    }

    // =========================
    // FLASH MESSAGE
    // =========================
    if (window.flashData?.success) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: window.flashData.success,
            confirmButtonColor: '#3085d6',
            timer: 2000,
            showConfirmButton: false
        });
    }

    if (window.flashData?.error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: window.flashData.error,
            confirmButtonColor: '#d33'
        });
    }

});
