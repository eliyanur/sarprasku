@extends('layout_user.user')
@section('pageTitle', 'Daftar Alat')

@section('content')

{{-- FILTER --}}
<form method="GET" class="mb-6 flex flex-col sm:flex-row gap-3">
    <select name="kategori" class="w-full sm:w-64 rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500">
        <option value="Semua" {{ $kategori == 'Semua' ? 'selected' : '' }}>Semua Kategori</option>
        @foreach ($data_kategori as $kat)
            <option value="{{ $kat->nama_kategori }}" {{ $kategori == $kat->nama_kategori ? 'selected' : '' }}>
                {{ $kat->nama_kategori }}
            </option>
        @endforeach
    </select>

    <button class="px-5 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">Filter</button>
</form>

{{-- LIST ALAT --}}
@if ($alat->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($alat as $item)
            <div class="bg-white rounded-2xl shadow-md border border-slate-100 
                        overflow-hidden hover:shadow-xl hover:-translate-y-1 
                        transition-all duration-300">

                {{-- GAMBAR --}}
                <div class="h-56 bg-slate-100 overflow-hidden">
                    <img src="{{ asset('storage/' . $item->gambar) }}"
                        alt="alat"
                        class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>

                {{-- ISI --}}
                <div class="p-5">
                    <h3 class="font-semibold text-slate-800 text-lg mb-1">
                        {{ $item->nama_alat }}
                    </h3>

                    <p class="text-sm text-slate-500">
                        {{ $item->kategori->nama_kategori ?? '-' }}
                    </p>

                    <div class="mt-3 flex items-center justify-between">
                        <p class="text-sm">
                            Stok:
                            <span class="font-semibold {{ $item->jumlah_tersedia > 0 ? 'text-green-600' : 'text-red-500' }}">
                                {{ $item->jumlah_tersedia > 0 ? $item->jumlah_tersedia : 'Habis' }}
                            </span>
                        </p>

                        @if ($item->jumlah_tersedia > 0)
                            <span class="text-xs px-3 py-1 bg-green-100 text-green-700 rounded-full">
                                Tersedia
                            </span>
                        @else
                            <span class="text-xs px-3 py-1 bg-red-100 text-red-600 rounded-full">
                                Habis
                            </span>
                        @endif
                    </div>

                    {{-- AKSI --}}
                    <div class="mt-4">
                        @if ($item->jumlah_tersedia > 0)
                            <button 
                                onclick="openModal(
                                    '{{ $item->id }}',
                                    '{{ $item->nama_alat }}',
                                    '{{ $item->jumlah_tersedia }}'
                                )"
                                class="block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
                                Pinjam Alat
                            </button>
                        @else
                            <button disabled
                                class="w-full px-4 py-2 bg-slate-200 text-slate-500 rounded-xl cursor-not-allowed">
                                Tidak Tersedia
                            </button>
                        @endif
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@else
    <div class="text-center py-12 text-slate-500">
        Tidak ada alat tersedia
    </div>
@endif

@endsection
{{-- MODAL PEMINJAMAN --}}
<div id="modalPinjam"
    class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white w-full max-w-md p-6 rounded-2xl shadow-xl relative">

        <h2 class="text-lg font-semibold mb-4">Form Peminjaman</h2>

        <form action="{{ route('user.peminjaman.store') }}" method="POST">
            @csrf

            <input type="hidden" name="id_alat" id="modal_id_alat">

            <div class="mb-4">
                <label class="text-sm text-slate-600">Nama Alat</label>
                <input type="text"
                    id="modal_nama_alat"
                    class="w-full border rounded-xl p-2 bg-slate-100"
                    readonly>
            </div>

            <div class="mb-4">
                <label class="text-sm text-slate-600">Jumlah Pinjam</label>
                <input type="number"
                    name="jumlah"
                    id="modal_jumlah"
                    min="1"
                    class="w-full border rounded-xl p-2"
                    required>
            </div>

            <div class="mb-4">
                <label class="text-sm text-slate-600">Tanggal Kembali</label>
                <input type="date"
                    name="tanggal_kembali"
                    class="w-full border rounded-xl p-2"
                    required>
            </div>

            <div class="flex justify-end gap-3">
                <button type="button"
                    onclick="closeModal()"
                    class="px-4 py-2 bg-gray-400 text-white rounded-xl">
                    Batal
                </button>

                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
                    Ajukan
                </button>
            </div>

        </form>
    </div>
</div>
