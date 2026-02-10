@extends('layout_admin.admin')
@section('pageTitle', 'Detail Data Alat')

@section('content')
<div class="w-full max-w-xl mx-auto px-4 sm:px-0">

    <div class="bg-white rounded-2xl shadow-lg p-6 sm:p-8">

        <!-- HEADER -->
        <div class="mb-6">
            <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                Detail Data Alat
            </h2>
            <p class="text-sm text-slate-500 mt-1">
                Informasi lengkap alat yang dipilih
            </p>
        </div>

        <!-- CONTENT -->
        <div class="space-y-4 text-sm">

            <!-- ITEM -->
            <div class="flex justify-between items-center border-b pb-3">
                <span class="text-slate-500">Nama Alat</span>
                <span class="font-semibold text-slate-800">
                    {{ $alat->nama_alat }}
                </span>
            </div>

            <div class="flex justify-between items-center border-b pb-3">
                <span class="text-slate-500">Kategori</span>
                <span class="font-medium text-slate-700">
                    {{ $alat->kategori->nama_kategori ?? '-' }}
                </span>
            </div>

            <div class="flex justify-between items-center border-b pb-3">
                <span class="text-slate-500">Jumlah Total</span>
                <span class="font-medium text-slate-700">
                    {{ $alat->jumlah_total }}
                </span>
            </div>

            <div class="flex justify-between items-center border-b pb-3">
                <span class="text-slate-500">Jumlah Tersedia</span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                    {{ $alat->jumlah_tersedia > 0 
                        ? 'bg-green-100 text-green-700' 
                        : 'bg-red-100 text-red-700' }}">
                    {{ $alat->jumlah_tersedia }}
                </span>
            </div>

            <div class="flex justify-between items-center">
                <span class="text-slate-500">Kondisi</span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                    {{ $alat->kondisi === 'baik'
                        ? 'bg-indigo-100 text-indigo-700'
                        : 'bg-orange-100 text-orange-700' }}">
                    {{ ucfirst($alat->kondisi) }}
                </span>
            </div>

        </div>

        <!-- ACTION -->
        <div class="pt-6 flex justify-end">
            <a href="{{ route('admin.alat.index') }}"
               class="inline-flex items-center gap-2
                      px-5 py-2.5 bg-indigo-600 text-white
                      rounded-xl text-sm font-semibold
                      hover:bg-indigo-700 transition">
                ← Kembali
            </a>
        </div>

    </div>
</div>
@endsection
