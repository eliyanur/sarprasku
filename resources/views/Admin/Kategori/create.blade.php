@extends('layout_admin.admin')
@section('pageTitle', 'Tambah Kategori')

@section('content')
<div class="w-full max-w-xl mx-auto px-4 sm:px-0">

    <div class="bg-white rounded-2xl shadow p-6 sm:p-8">

        <!-- TITLE -->
        <h2 class="text-xl sm:text-2xl font-bold text-slate-800 mb-6">
            Tambah Kategori
        </h2>

        <form action="{{ route('admin.kategori.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- NAMA KATEGORI -->
            <div>
                <label class="block text-sm font-medium text-slate-700">
                    Nama Kategori
                </label>
                <input
                    type="text"
                    name="nama_kategori"
                    class="w-full mt-1 rounded-xl border border-slate-300
                           focus:border-indigo-500 focus:ring focus:ring-indigo-200
                           text-sm px-4 py-2.5"
                    placeholder="Contoh: Alat Elektronik"
                    required>
            </div>

            <!-- KETERANGAN -->
            <div>
                <label class="block text-sm font-medium text-slate-700">
                    Deskripsi
                </label>
                <textarea
                    name="deskripsi"
                    rows="4"
                    class="w-full mt-1 rounded-xl border border-slate-300
                           focus:border-indigo-500 focus:ring focus:ring-indigo-200
                           text-sm px-4 py-2.5"
                    placeholder="Opsional">
                </textarea>
            </div>

            <!-- ACTION -->
            <div class="flex flex-col sm:flex-row sm:justify-end gap-3 pt-4">
                <a href="{{ route('admin.kategori.index') }}"
                   class="w-full sm:w-auto text-center
                          px-5 py-2.5 bg-slate-200 rounded-xl
                          text-sm font-medium hover:bg-slate-300 transition">
                    Batal
                </a>

                <button
                    type="submit"
                    class="w-full sm:w-auto
                           px-5 py-2.5 bg-indigo-600 text-white rounded-xl
                           text-sm font-semibold hover:bg-indigo-700 transition">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
