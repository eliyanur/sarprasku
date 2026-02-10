@extends('layout_admin.admin')
@section('pageTitle', 'Tambah Data Alat')

@section('content')
<div class="w-full max-w-xl mx-auto px-4 sm:px-0">

    <div class="bg-white rounded-2xl shadow p-6 sm:p-8">

        <h2 class="text-xl sm:text-2xl font-bold text-slate-800 mb-6">
            Tambah Data Alat
        </h2>

        <form action="{{ route('admin.alat.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- NAMA ALAT -->
            <div>
                <label class="block text-sm font-medium text-slate-700">
                    Nama Alat
                </label>
                <input type="text" name="nama_alat"
                    class="w-full mt-1 rounded-xl border border-slate-300
                           focus:border-indigo-500 focus:ring focus:ring-indigo-200
                           text-sm px-4 py-2.5"
                    placeholder="Contoh: Proyektor"
                    required>
            </div>

            <!-- KATEGORI -->
            <div>
                <label class="block text-sm font-medium text-slate-700">
                    Kategori
                </label>
                <select name="kategori_id"
                    class="w-full mt-1 rounded-xl border border-slate-300
                           focus:border-indigo-500 focus:ring focus:ring-indigo-200
                           text-sm px-4 py-2.5"
                    required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <!-- JUMLAH -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700">
                        Jumlah Total
                    </label>
                    <input type="number" name="jumlah_total"
                        class="w-full mt-1 rounded-xl border border-slate-300
                               focus:border-indigo-500 focus:ring focus:ring-indigo-200
                               text-sm px-4 py-2.5"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700">
                        Jumlah Tersedia
                    </label>
                    <input type="number" name="jumlah_tersedia"
                        class="w-full mt-1 rounded-xl border border-slate-300
                               focus:border-indigo-500 focus:ring focus:ring-indigo-200
                               text-sm px-4 py-2.5"
                        required>
                </div>
            </div>

            <!-- KONDISI -->
            <div>
                <label class="block text-sm font-medium text-slate-700">
                    Kondisi
                </label>
                <select name="kondisi"
                    class="w-full mt-1 rounded-xl border border-slate-300
                           focus:border-indigo-500 focus:ring focus:ring-indigo-200
                           text-sm px-4 py-2.5">
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                </select>
            </div>
            <!-- FOTO ALAT -->
    <div>
        <label class="block text-sm font-medium text-slate-700">
            Foto Alat
        </label>
        <input type="file" name="gambar" id="gambar"
            class="w-full mt-1 text-sm text-slate-500
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-xl file:border-0
                   file:text-sm file:font-semibold
                   file:bg-indigo-50 file:text-indigo-700
                   hover:file:bg-indigo-100"
            accept="image/*"
        >
        <!-- PREVIEW GAMBAR -->
        <div class="mt-3">
            <img id="preview" class="w-32 h-32 object-cover rounded-lg hidden">
        </div>
    </div>

            <!-- ACTION -->
            <div class="flex flex-col sm:flex-row sm:justify-end gap-3 pt-4">
                <a href="{{ route('admin.alat.index') }}"
                   class="px-5 py-2.5 bg-slate-200 rounded-xl
                          text-sm font-medium hover:bg-slate-300 text-center">
                    Batal
                </a>

                <button type="submit"
                    class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl
                           text-sm font-semibold hover:bg-indigo-700">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
