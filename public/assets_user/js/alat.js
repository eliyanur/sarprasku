document.addEventListener('DOMContentLoaded', function () {

    window.openModal = function(id, nama, stok) {
        document.getElementById('modalPinjam').classList.remove('hidden');
        document.getElementById('modal_id_alat').value = id;
        document.getElementById('modal_nama_alat').value = nama;
        document.getElementById('modal_jumlah').setAttribute('max', stok);
    }

    window.closeModal = function() {
        document.getElementById('modalPinjam').classList.add('hidden');
    }

});
