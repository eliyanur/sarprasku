@extends('layout_user.user')
@section('pageTitle', 'Riwayat Peminjaman & Pengembalian')

@section('content')

<div class="p-6 space-y-6">

    <!-- NOTIFIKASI BLOCKED USER -->
    @if(auth()->user()->is_blocked)
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded-lg">
        Akun Anda diblokir karena ada barang rusak atau hilang. Tidak bisa melakukan peminjaman baru.
    </div>
    @endif

    <!-- TABLE RIWAYAT -->
    <div class="bg-white rounded-2xl shadow-xl p-6">
        <table id="riwayatTable" class="display w-full text-sm">
            <thead>
                <tr class="bg-indigo-50 text-indigo-700">
                    <th>Nama Alat</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Kondisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjaman as $item)
                <tr class="hover:bg-gray-50">
                    <td>{{ $item->alat->nama_alat }}</td>
                    <td class="text-center">{{ $item->jumlah }}</td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali }}</td>
                    <td>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full
                            @if($item->status == 'pending') bg-yellow-100 text-yellow-700
                            @elseif($item->status == 'disetujui') bg-green-100 text-green-700
                            @elseif($item->status == 'ditolak') bg-red-100 text-red-700
                            @elseif($item->status == 'dikembalikan') bg-blue-100 text-blue-700
                            @elseif($item->status == 'terlambat') bg-orange-100 text-orange-700
                            @elseif($item->status == 'rusak' || $item->status == 'hilang') bg-red-200 text-red-800
                            @else bg-gray-100 text-gray-700
                            @endif">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td>
                        @if($item->status == 'dikembalikan')
                            Baik
                        @elseif($item->status == 'rusak')
                            Rusak
                        @elseif($item->status == 'hilang')
                            Hilang
                        @else
                            -
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#riwayatTable').DataTable({
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
    });
</script>
@endpush
