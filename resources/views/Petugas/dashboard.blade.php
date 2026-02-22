@extends('layout_petugas.petugas')

@section('content')
<div class="p-4 sm:p-6 space-y-6">

    <!-- CARD STATISTIK -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Alat</p>
                    <h2 class="text-2xl font-bold text-indigo-600 mt-2">{{ $totalAlat }}</h2>
                </div>
                <div class="text-indigo-500 text-3xl">
                    <i class="fa-solid fa-toolbox"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Peminjaman Hari Ini</p>
                    <h2 class="text-2xl font-bold text-blue-600 mt-2">{{ $hariIni }}</h2>
                </div>
                <div class="text-blue-500 text-3xl">
                    <i class="fa-solid fa-calendar-day"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Peminjaman Aktif</p>
                    <h2 class="text-2xl font-bold text-green-600 mt-2">{{ $aktif }}</h2>
                </div>
                <div class="text-green-500 text-3xl">
                    <i class="fa-solid fa-hand-holding"></i>
                </div>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Terlambat</p>
                    <h2 class="text-2xl font-bold text-red-600 mt-2">{{ $terlambat }}</h2>
                </div>
                <div class="text-red-500 text-3xl">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- ALERT TERLAMBAT -->
    @if($terlambat > 0)
    <div class="bg-red-50 border border-red-200 border-l-4 border-red-500 p-4 rounded-xl flex items-center gap-3">
        <i class="fa-solid fa-circle-exclamation text-red-600 text-lg"></i>
        <p class="text-red-700 text-sm sm:text-base font-medium">
            Ada {{ $terlambat }} peminjaman yang terlambat dikembalikan!
        </p>
    </div>
    @endif


    <!-- TABEL PEMINJAMAN TERBARU -->
    <div class="bg-white p-4 sm:p-6 rounded-2xl shadow">

        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 mb-4">
            <h2 class="font-semibold text-gray-700">
                <i class="fa-solid fa-clock-rotate-left text-indigo-500 mr-2"></i>
                Peminjaman Terbaru
            </h2>
            <a href="#" class="text-sm text-indigo-600 hover:underline">
                Lihat Semua
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-[600px] w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Alat</th>
                        <th class="px-4 py-3">Tanggal Pinjam</th>
                        <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
@foreach($terbaru as $item)
<tr class="hover:bg-gray-50">
    <td class="px-4 py-3">{{ $item->user->name }}</td>
    <td class="px-4 py-3">{{ $item->alat->nama_alat }}</td>
    <td class="px-4 py-3">
        {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}
    </td>
    <td class="px-4 py-3">

        @if($item->status == 'disetujui')
            <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                Dipinjam
            </span>

        @elseif($item->status == 'ditolak')
            <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">
                Ditolak
            </span>

        @elseif($item->status == 'pending')
            <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                Pending
            </span>

        @else
            <span class="px-3 py-1 text-xs rounded-full bg-blue-50 text-gray-700">
                {{ ucfirst($item->status) }}
            </span>
        @endif

    </td>
</tr>
@endforeach
</tbody>

            </table>
        </div>

    </div>

</div>

@endsection
