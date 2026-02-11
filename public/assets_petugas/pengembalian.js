function openReturnModal(id, namaAlat) {
    document.getElementById('modalReturn').classList.remove('hidden');
    document.getElementById('modal_id_peminjaman').value = id;
    document.getElementById('modal_nama_alat').value = namaAlat;

    document.getElementById('returnForm').action =
        "{{ route('petugas.peminjaman.kembalikan', ['id' => ':id']) }}".replace(':id', id);
}