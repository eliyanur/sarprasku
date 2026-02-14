@extends('layout_petugas.petugas')

@section('content')
<div class="p-4 sm:p-6 space-y-6">

    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-800">
                <i class="fa-solid fa-gauge-high text-indigo-600 mr-2"></i>
                Dashboard Petugas
            </h1>
            <p class="text-gray-500 text-sm">Ringkasan aktivitas peminjaman hari ini</p>
        </div>
    </div>

    <!-- CARD STATISTIK -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Alat</p>
                    <h2 class="text-2xl font-bold text-indigo-600 mt-2">120</h2>
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
                    <h2 class="text-2xl font-bold text-blue-600 mt-2">5</h2>
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
                    <h2 class="text-2xl font-bold text-green-600 mt-2">12</h2>
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
                    <h2 class="text-2xl font-bold text-red-600 mt-2">2</h2>
                </div>
                <div class="text-red-500 text-3xl">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- ALERT TERLAMBAT -->
    <div class="bg-red-50 border border-red-200 border-l-4 border-red-500 p-4 rounded-xl flex items-center gap-3">
        <i class="fa-solid fa-circle-exclamation text-red-600 text-lg"></i>
        <p class="text-red-700 text-sm sm:text-base font-medium">
            Ada 2 peminjaman yang terlambat dikembalikan!
        </p>
    </div>

    <!-- QUICK ACTION -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

        <a href="#"
           class="flex items-center gap-4 bg-indigo-500 text-white p-5 rounded-2xl shadow hover:bg-indigo-600 transition">
            <i class="fa-solid fa-plus text-2xl"></i>
            <span class="font-semibold">Tambah Peminjaman</span>
        </a>

        <a href="#"
           class="flex items-center gap-4 bg-green-500 text-white p-5 rounded-2xl shadow hover:bg-green-600 transition">
            <i class="fa-solid fa-circle-check text-2xl"></i>
            <span class="font-semibold">Konfirmasi Peminjaman</span>
        </a>

        <a href="#"
           class="flex items-center gap-4 bg-blue-500 text-white p-5 rounded-2xl shadow hover:bg-blue-600 transition">
            <i class="fa-solid fa-rotate text-2xl"></i>
            <span class="font-semibold">Konfirmasi Pengembalian</span>
        </a>

    </div>

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
