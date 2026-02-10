@extends('layout_admin.admin')

@section('content')

<!-- PAGE TITLE -->
<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">Dashboard Admin</h1>
    <p class="text-slate-500 text-sm mt-1">
        Ringkasan aktivitas peminjaman alat
    </p>
</div>

<!-- STATISTIC CARDS -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

    <!-- TOTAL -->
    <div class="p-6 rounded-3xl bg-gradient-to-br from-indigo-500 via-indigo-600 to-indigo-700 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm opacity-80">Total Peminjaman</p>
                <h2 class="text-3xl font-bold mt-1">120</h2>
            </div>
            <i class="fa-solid fa-file-lines text-3xl opacity-70"></i>
        </div>
        <p class="text-xs mt-4 text-indigo-100">+12% dari bulan lalu</p>
    </div>

    <!-- MENUNGGU -->
    <div class="p-6 rounded-3xl bg-gradient-to-br from-sky-500 via-sky-600 to-sky-700 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm opacity-80">Menunggu Persetujuan</p>
                <h2 class="text-3xl font-bold mt-1">8</h2>
            </div>
            <i class="fa-solid fa-hourglass-half text-3xl opacity-70"></i>
        </div>
        <p class="text-xs mt-4 text-sky-100">Perlu tindakan admin</p>
    </div>

    <!-- DISETUJUI -->
    <div class="p-6 rounded-3xl bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm opacity-80">Disetujui</p>
                <h2 class="text-3xl font-bold mt-1">92</h2>
            </div>
            <i class="fa-solid fa-circle-check text-3xl opacity-70"></i>
        </div>
        <p class="text-xs mt-4 text-blue-100">Sedang dipinjam</p>
    </div>

    <!-- SELESAI -->
    <div class="p-6 rounded-3xl bg-gradient-to-br from-cyan-500 via-cyan-600 to-cyan-700 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm opacity-80">Selesai</p>
                <h2 class="text-3xl font-bold mt-1">20</h2>
            </div>
            <i class="fa-solid fa-box-archive text-3xl opacity-70"></i>
        </div>
        <p class="text-xs mt-4 text-cyan-100">Alat telah dikembalikan</p>
    </div>

</div>


<!-- CONTENT GRID -->
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    <!-- CHART -->
    <div class="xl:col-span-2 bg-white rounded-3xl p-6 shadow">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-slate-700">Statistik Peminjaman</h3>
            <span class="text-xs text-slate-400">Bulanan</span>
        </div>

        <div
            class="h-72 rounded-2xl
                   bg-gradient-to-r from-indigo-100 to-purple-100
                   flex items-center justify-center
                   text-slate-500 font-medium">
            Chart Area (Dummy)
        </div>
    </div>

    <!-- RECENT ACTIVITY -->
    <div class="bg-white rounded-3xl p-6 shadow">
        <h3 class="font-semibold text-slate-700 mb-4">
            Peminjaman Terbaru
        </h3>

        <ul class="space-y-4 text-sm">
            <li class="flex justify-between items-center">
                <span class="font-medium text-slate-600">Ahmad</span>
                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-600 text-xs">
                    Menunggu
                </span>
            </li>

            <li class="flex justify-between items-center">
                <span class="font-medium text-slate-600">Siti</span>
                <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-600 text-xs">
                    Disetujui
                </span>
            </li>

            <li class="flex justify-between items-center">
                <span class="font-medium text-slate-600">Budi</span>
                <span class="px-3 py-1 rounded-full bg-green-100 text-green-600 text-xs">
                    Selesai
                </span>
            </li>

            <li class="flex justify-between items-center">
                <span class="font-medium text-slate-600">Ani</span>
                <span class="px-3 py-1 rounded-full bg-green-100 text-green-600 text-xs">
                    Selesai
                </span>
            </li>
        </ul>
    </div>

</div>

@endsection

