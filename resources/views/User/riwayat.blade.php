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
                    @php
                        $terlambatHari = 0;

                        if ($item->status == 'disetujui' 
                            && $item->tanggal_kembali < date('Y-m-d')) {

                            $terlambatHari = \Carbon\Carbon::parse($item->tanggal_kembali)
                                                ->diffInDays(\Carbon\Carbon::today());
                        }
                    @endphp

                    @if($item->status == 'dikembalikan')
                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">
                            Dikembalikan
                        </span>

                    @elseif($terlambatHari > 0)
                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">
                            Terlambat
                        </span>
                        <small class="text-xs text-red-500 block">
                            Terlambat {{ $terlambatHari }} hari
                        </small>

                    @elseif($item->status == 'pending')
                        <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-sm">
                            Pending
                        </span>

                    @else
                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">
                            Disetujui
                        </span>
                    @endif
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
