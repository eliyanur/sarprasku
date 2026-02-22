@extends('layout_petugas.petugas')
@section('pageTitle', 'Laporan')

@section('content')
<div class="p-4 md:p-6 space-y-6">

    {{-- HEADER + FILTER --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

        <form method="GET" 
              class="flex flex-col sm:flex-row gap-3 bg-white p-4 rounded-2xl shadow-sm w-full lg:w-auto">

            <div class="flex flex-col w-full sm:w-auto">
                <label class="text-xs text-gray-500 mb-1">Dari</label>
                <input type="date" name="tanggal_awal"
                       class="border rounded-xl p-2 focus:ring-2 focus:ring-indigo-400 w-full">
            </div>

            <div class="flex flex-col w-full sm:w-auto">
                <label class="text-xs text-gray-500 mb-1">Sampai</label>
                <input type="date" name="tanggal_akhir"
                       class="border rounded-xl p-2 focus:ring-2 focus:ring-indigo-400 w-full">
            </div>

            <button 
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded-xl transition w-full sm:w-auto">
                Tampilkan
            </button>
        </form>

    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">

        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
            <p class="text-xs text-gray-500 uppercase tracking-wide">Total</p>
            <p class="text-2xl font-bold text-indigo-600 mt-1">{{ $total }}</p>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
            <p class="text-xs text-gray-500 uppercase tracking-wide">Dikembalikan</p>
            <p class="text-2xl font-bold text-green-600 mt-1">{{ $dikembalikan }}</p>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
            <p class="text-xs text-gray-500 uppercase tracking-wide">Terlambat</p>
            <p class="text-2xl font-bold text-red-500 mt-1">{{ $terlambat }}</p>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
            <p class="text-xs text-gray-500 uppercase tracking-wide">Rusak</p>
            <p class="text-2xl font-bold text-orange-500 mt-1">{{ $rusak }}</p>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
            <p class="text-xs text-gray-500 uppercase tracking-wide">Hilang</p>
            <p class="text-2xl font-bold text-red-600 mt-1">{{ $hilang }}</p>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
            <p class="text-xs text-gray-500 uppercase tracking-wide">User Diblokir</p>
            <p class="text-2xl font-bold text-purple-600 mt-1">{{ $blocked }}</p>
        </div>

    </div>

    {{-- EXPORT BUTTON --}}
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('petugas.laporan.pdf') }}" 
           class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-full text-sm shadow transition">
           Cetak PDF
        </a>

        <a href="{{ route('petugas.laporan.excel') }}" 
           class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-full text-sm shadow transition">
           Export Excel
        </a>
    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-2xl shadow p-4 md:p-6">
        <div class="overflow-x-auto">
            <table id="laporanTable" class="display nowrap w-full text-xs md:text-sm">

                <thead class="bg-indigo-50 text-indigo-700 text-xs uppercase">
                    <tr>
                        <th class="p-3 text-left">Nama</th>
                        <th class="p-3 text-left">Alat</th>
                        <th class="p-3 text-left">Tgl Pinjam</th>
                        <th class="p-3 text-left">Tgl Kembali</th>
                        <th class="p-3 text-left">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $item)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="p-3">{{ $item->user->name }}</td>
                        <td class="p-3">{{ $item->alat->nama_alat }}</td>
                        <td class="p-3">{{ $item->tanggal_pinjam }}</td>
                        <td class="p-3">{{ $item->tanggal_kembali }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 text-xs rounded-full bg-gray-100">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
@push('scripts')
<script>
$(document).ready(function () {
    $('#laporanTable').DataTable({
        responsive: true,
        pageLength: 5,
        lengthChange: false,
        autoWidth: false,
        ordering: true,
        language: {
            search: "",
            searchPlaceholder: "Cari data...",
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
