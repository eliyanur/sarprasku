@extends('layout_admin.admin')
@section('pageTitle', 'Tambah Akun')

@section('content')
<div class="w-full max-w-xl mx-auto px-4 sm:px-0">

    <div class="bg-white rounded-2xl shadow p-6 sm:p-8">

        <!-- TITLE -->
        <h2 class="text-xl sm:text-2xl font-bold text-slate-800 mb-6">
            Tambah Pengguna
        </h2>

        {{-- DUMMY INPUT (ANTI AUTOFILL BROWSER) --}}
        <input type="text" style="display:none">
        <input type="password" style="display:none">

        <form action="{{ route('admin.users.store') }}"
              method="POST"
              class="space-y-5"
              autocomplete="off">
            @csrf

            <!-- NAMA LENGKAP -->
            <div>
                <label class="block text-sm font-medium text-slate-700">
                    Nama Lengkap
                </label>
                <input
                    type="text"
                    name="name"
                    value=""
                    class="w-full mt-1 rounded-xl border border-slate-300
                           focus:border-indigo-500 focus:ring focus:ring-indigo-200
                           text-sm px-4 py-2.5"
                    placeholder="Nama lengkap pengguna"
                    required>
            </div>

            <!-- USERNAME -->
            
<div>
    <label class="block text-sm font-medium text-slate-700">
        Email
    </label>
    <input
        type="email"
        name="email"
        value=""
        autocomplete="new-email"
        class="w-full mt-1 rounded-xl border border-slate-300
               focus:border-indigo-500 focus:ring focus:ring-indigo-200
               text-sm px-4 py-2.5"
        placeholder="Email pengguna"
        required>
</div>


            <!-- PASSWORD -->
            <div>
                <label class="block text-sm font-medium text-slate-700">
                    Password
                </label>
                <input
                    type="password"
                    name="password"
                    value=""
                    autocomplete="new-password"
                    class="w-full mt-1 rounded-xl border border-slate-300
                           focus:border-indigo-500 focus:ring focus:ring-indigo-200
                           text-sm px-4 py-2.5"
                    placeholder="Password awal"
                    required>
            </div>

            <!-- ROLE -->
            <div>
                <label class="block text-sm font-medium text-slate-700">
                    Role
                </label>
                <select
                    name="role"
                    class="w-full mt-1 rounded-xl border border-slate-300
                           focus:border-indigo-500 focus:ring focus:ring-indigo-200
                           text-sm px-4 py-2.5"
                    required>
                    <option value="">-- Pilih Role --</option>
                    <option value="petugas">Petugas</option>
                    <option value="user">Pengguna</option>
                </select>
            </div>

            <!-- ACTION -->
            <div class="flex flex-col sm:flex-row sm:justify-end gap-3 pt-4">
                <a href="{{ route('admin.users.index') }}"
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
