@extends('layout_petugas.petugas')
@section('title', 'Data Peminjaman')

@section('content')
<div class="p-6 space-y-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Data Peminjaman</h1>
            <p class="text-sm text-gray-500">Kelola dan konfirmasi peminjaman alat</p>
        </div>
    </div>

    <!-- FILTER BUTTON -->
    <div class="flex gap-3 flex-wrap">
        @php $status = request('status'); @endphp

        <a href="{{ route('petugas.peminjaman') }}"
           class="px-4 py-2 rounded-xl text-sm font-medium transition
           {{ !$status ? 'bg-indigo-500 text-white shadow-md' : 'bg-gray-100 hover:bg-gray-200' }}">
            Semua
        </a>

        <a href="{{ route('petugas.peminjaman', ['status' => 'pending']) }}"
           class="px-4 py-2 rounded-xl text-sm font-medium transition
           {{ $status == 'pending' ? 'bg-yellow-500 text-white shadow-md' : 'bg-yellow-100 text-yellow-700 hover:bg-yellow-200' }}">
            Menunggu
        </a>

        <a href="{{ route('petugas.peminjaman', ['status' => 'disetujui']) }}"
           class="px-4 py-2 rounded-xl text-sm font-medium transition
           {{ $status == 'disetujui' ? 'bg-green-500 text-white shadow-md' : 'bg-green-100 text-green-700 hover:bg-green-200' }}">
            Dipinjam
        </a>

        <a href="{{ route('petugas.peminjaman', ['status' => 'terlambat']) }}"
           class="px-4 py-2 rounded-xl text-sm font-medium transition
           {{ $status == 'terlambat' ? 'bg-red-500 text-white shadow-md' : 'bg-red-100 text-red-700 hover:bg-red-200' }}">
            Terlambat
        </a>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl shadow-xl p-6">
        <table id="peminjamanTable" class="display w-full text-sm">
            <thead>
                 <tr class="bg-indigo-50 text-indigo-700">
                    <th>Nama</th>
                    <th>Alat</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjaman as $item)
                <tr>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->alat->nama_alat }}</td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali }}</td>
                    <td>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full
                            @if($item->status == 'pending') bg-yellow-100 text-yellow-700
                            @elseif($item->status == 'disetujui') bg-green-100 text-green-700
                            @elseif($item->status == 'terlambat') bg-red-100 text-red-700
                            @else bg-gray-100 text-gray-700
                            @endif">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td class="space-x-2">
                       @if($item->status == 'pending')
                        <form action="{{ route('petugas.peminjaman.setujui', $item->id) }}" method="POST" class="inline">
                            @csrf
                            <button class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white text-xs rounded-lg transition">
                                Setujui
                            </button>
                        </form>

                        <form action="{{ route('petugas.peminjaman.tolak', $item->id) }}" method="POST" class="inline">
                            @csrf
                            <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-xs rounded-lg transition">
                                Tolak
                            </button>
                        </form>
                       @endif

                       @if($item->status == 'disetujui')
                        <button
                            class="btn-return px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded-lg"
                            data-id="{{ $item->id }}"
                            data-nama="{{ $item->alat->nama_alat }}">
                            Kembalikan
                        </button>
                       @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- MODAL PENGEMBALIAN --}}
<div id="modalReturn" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white w-full max-w-md p-6 rounded-2xl shadow-xl relative">
        <h2 class="text-lg font-semibold mb-4">Pengembalian Alat</h2>
        <form id="returnForm" method="POST">
            @csrf
            <input type="hidden" name="peminjaman_id" id="modal_id_peminjaman">
            <div class="mb-4">
                <label class="text-sm text-slate-600">Nama Alat</label>
                <input type="text" id="modal_nama_alat" class="w-full border rounded-xl p-2 bg-slate-100" readonly>
            </div>
            <div class="mb-4">
                <label class="text-sm text-slate-600">Kondisi Alat</label>
                <select name="kondisi" required class="w-full border rounded-xl p-2">
                    <option value="">-- Pilih Kondisi --</option>
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                    <option value="hilang">Hilang</option>
                </select>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeReturnModal()" class="px-4 py-2 bg-gray-400 text-white rounded-xl">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">Kembalikan</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    // Modal functions
    function openReturnModal(id, namaAlat) {
        document.getElementById('modalReturn').classList.remove('hidden');
        document.getElementById('modal_id_peminjaman').value = id;
        document.getElementById('modal_nama_alat').value = namaAlat;
        document.getElementById('returnForm').action = `/petugas/peminjaman/kembalikan/${id}`;
    }

    function closeReturnModal() {
        document.getElementById('modalReturn').classList.add('hidden');
    }

    $(document).ready(function () {
        // Inisialisasi DataTable
        var table = $('#peminjamanTable').DataTable({
            responsive: true,
            pageLength: 5,
            lengthChange: true,
            autoWidth: false,
            language: {
                lengthMenu: "Tampilkan _MENU_ data",
                search: "Cari:",
                zeroRecords: "Data tidak ditemukan",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                paginate: {
                    previous: "‹",
                    next: "›"
                }
            }
        });

        // Event delegation tombol kembalikan
        $('#peminjamanTable').on('click', '.btn-return', function() {
            const id = $(this).data('id');
            const namaAlat = $(this).data('nama');
            openReturnModal(id, namaAlat);
        });
    });
</script>
@endpush
