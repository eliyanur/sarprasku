@extends('layout_petugas.petugas')

@section('content')

<div class="p-6 space-y-6">

    <!-- HEADER -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Petugas</h1>
        <p class="text-gray-500 text-sm">Ringkasan aktivitas peminjaman hari ini</p>
    </div>

    <!-- CARD STATISTIK -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
            <p class="text-gray-500 text-sm">Total Alat</p>
            <h2 class="text-2xl font-bold text-indigo-600 mt-2">120</h2>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
            <p class="text-gray-500 text-sm">Peminjaman Hari Ini</p>
            <h2 class="text-2xl font-bold text-blue-600 mt-2">5</h2>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
            <p class="text-gray-500 text-sm">Peminjaman Aktif</p>
            <h2 class="text-2xl font-bold text-green-600 mt-2">12</h2>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
            <p class="text-gray-500 text-sm">Terlambat</p>
            <h2 class="text-2xl font-bold text-red-600 mt-2">2</h2>
        </div>

    </div>

    <!-- ALERT TERLAMBAT -->
    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-xl">
        <p class="text-red-700 font-semibold">⚠️ Ada 2 peminjaman yang terlambat dikembalikan!</p>
    </div>

    <!-- QUICK ACTION -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

        <a href="#" class="bg-indigo-500 text-white p-5 rounded-2xl shadow hover:bg-indigo-600 transition">
            ➕ Tambah Peminjaman
        </a>

        <a href="#" class="bg-green-500 text-white p-5 rounded-2xl shadow hover:bg-green-600 transition">
            ✔️ Konfirmasi Peminjaman
        </a>

        <a href="#" class="bg-blue-500 text-white p-5 rounded-2xl shadow hover:bg-blue-600 transition">
            🔁 Konfirmasi Pengembalian
        </a>

    </div>

    <!-- TABEL PEMINJAMAN TERBARU -->
    <div class="bg-white p-6 rounded-2xl shadow">

        <div class="flex justify-between items-center mb-4">
            <h2 class="font-semibold text-gray-700">Peminjaman Terbaru</h2>
            <a href="#" class="text-sm text-indigo-600 hover:underline">Lihat Semua</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Alat</th>
                        <th class="px-4 py-3">Tanggal Pinjam</th>
                        <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y">

                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">Ahmad</td>
                        <td class="px-4 py-3">Proyektor</td>
                        <td class="px-4 py-3">10 Feb 2026</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                Dipinjam
                            </span>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">Siti</td>
                        <td class="px-4 py-3">Kamera</td>
                        <td class="px-4 py-3">9 Feb 2026</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">
                                Terlambat
                            </span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

</div>

@endsection
