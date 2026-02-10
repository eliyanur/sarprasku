@extends('layout_user.user')
@section('pageTitle', 'Daftar Alat')

@section('content')

{{-- FILTER --}}
<form method="GET" class="mb-6 flex flex-col sm:flex-row gap-3">
    <select name="kategori"
        class="w-full sm:w-64 rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500">
        <option value="Semua">Semua Kategori</option>
        @foreach ($data_kategori as $kat)
            <option value="{{ $kat->nama_kategori }}"
                {{ $kategori == $kat->nama_kategori ? 'selected' : '' }}>
                {{ $kat->nama_kategori }}
            </option>
        @endforeach
    </select>

    <button
        class="px-5 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
        Filter
    </button>
</form>

{{-- LIST ALAT --}}
@if ($alat->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach ($alat as $item)
            <div class="bg-white rounded-2xl shadow-sm border overflow-hidden hover:shadow-md transition">

                {{-- GAMBAR --}}
                <div class="h-40 bg-blue-50 flex items-center justify-center">
                    <img src="{{ asset('assets/alat.png') }}"
                        alt="alat"
                        class="h-24 object-contain">
                </div>

                {{-- ISI --}}
                <div class="p-4">
                    <h3 class="font-semibold text-slate-800 text-lg">
                        {{ $item->nama_alat }}
                    </h3>

                    <p class="text-sm text-slate-500 mt-1">
                        Kategori: {{ $item->kategori->nama_kategori ?? '-' }}
                    </p>

                    <p class="text-sm mt-2">
                        Stok:
                        <span class="font-medium {{ $item->stok > 0 ? 'text-green-600' : 'text-red-500' }}">
                            {{ $item->stok > 0 ? $item->stok : 'Habis' }}
                        </span>
                    </p>

                    {{-- AKSI --}}
                    <div class="mt-4">
                        @if ($item->stok > 0)
                            <a href="#"
                               class="block text-center px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
                                Pinjam Alat
                            </a>
                        @else
                            <button disabled
                                class="w-full px-4 py-2 bg-slate-300 text-slate-500 rounded-xl cursor-not-allowed">
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
