@extends('layout_admin.admin')
@section('pageTitle', 'Edit Kategori')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-2xl shadow p-8">

    <h2 class="text-xl font-bold text-slate-800 mb-6">
        Edit Kategori
    </h2>

    <form action="{{ route('admin.kategori.update', $kategori->id) }}"
          method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="text-sm font-medium text-slate-600">
                Nama Kategori
            </label>
            <input type="text" name="nama_kategori"
                value="{{ $kategori->nama_kategori }}" required
                class="mt-2 w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div>
    <label class="text-sm font-medium text-slate-600">
        Deskripsi
    </label>

    <textarea name="deskripsi" rows="4" required
        class="mt-2 w-full rounded-xl border-slate-300
               focus:border-indigo-500 focus:ring-indigo-500">{{ $kategori->deskripsi }}</textarea>
</div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.kategori.index') }}"
               class="px-4 py-2 rounded-xl bg-slate-200 text-slate-700">
                Batal
            </a>

            <button
                class="px-5 py-2 rounded-xl bg-indigo-600 text-white font-semibold">
                Update
            </button>
        </div>
    </form>

</div>
@endsection
