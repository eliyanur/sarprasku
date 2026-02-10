@extends('layout_admin.admin')
@section('pageTitle', 'Edit Data Alat')

@section('content')
<div class="w-full max-w-xl mx-auto px-4 sm:px-0">

    <div class="bg-white rounded-2xl shadow p-6 sm:p-8">

        <h2 class="text-xl sm:text-2xl font-bold text-slate-800 mb-6">
            Edit Data Alat
        </h2>

        <form action="{{ route('admin.alat.update', $alat) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-slate-700">
                    Nama Alat
                </label>
                <input type="text" name="nama_alat"
                    value="{{ $alat->nama_alat }}"
                    class="w-full mt-1 rounded-xl border border-slate-300
                           focus:border-indigo-500 focus:ring focus:ring-indigo-200
                           text-sm px-4 py-2.5">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">
                    Kategori
                </label>
                <select name="kategori_id"
                    class="w-full mt-1 rounded-xl border border-slate-300
                           focus:border-indigo-500 focus:ring focus:ring-indigo-200
                           text-sm px-4 py-2.5">
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}"
                            {{ $alat->kategori_id == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700">
                        Jumlah Total
                    </label>
                    <input type="number" name="jumlah_total"
                        value="{{ $alat->jumlah_total }}"
                        class="w-full mt-1 rounded-xl border border-slate-300
                               focus:border-indigo-500 focus:ring focus:ring-indigo-200
                               text-sm px-4 py-2.5">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700">
                        Jumlah Tersedia
                    </label>
                    <input type="number" name="jumlah_tersedia"
                        value="{{ $alat->jumlah_tersedia }}"
                        class="w-full mt-1 rounded-xl border border-slate-300
                               focus:border-indigo-500 focus:ring focus:ring-indigo-200
                               text-sm px-4 py-2.5">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">
                    Kondisi
                </label>
                <select name="kondisi"
                    class="w-full mt-1 rounded-xl border border-slate-300
                           focus:border-indigo-500 focus:ring focus:ring-indigo-200
                           text-sm px-4 py-2.5">
                    <option value="baik" {{ $alat->kondisi == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="rusak" {{ $alat->kondisi == 'rusak' ? 'selected' : '' }}>Rusak</option>
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('admin.alat.index') }}"
                   class="px-5 py-2.5 bg-slate-200 rounded-xl text-sm">
                    Batal
                </a>
                <button class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl text-sm">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
