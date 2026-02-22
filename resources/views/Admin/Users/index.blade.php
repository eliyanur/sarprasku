@extends('layout_admin.admin')
@section('pageTitle', 'Akun Pengguna ')

@section('content')
<div class="space-y-6">

    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Manajemen Pengguna</h1>
            <p class="text-sm text-slate-500">Kelola akun pengguna sistem</p>
        </div>

        <a href="{{ route('admin.users.create') }}"
           class="inline-flex items-center justify-center px-5 py-2.5
                  rounded-xl bg-indigo-600 text-white text-sm font-semibold
                  hover:bg-indigo-700 transition">
            + Tambah Pengguna
        </a>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl shadow">
        <div class="overflow-x-auto p-4">
            <table id="usersTable"
                   class="min-w-[800px] w-full text-sm border-separate border-spacing-y-2">

                <thead>
                    <tr class="bg-indigo-50 text-indigo-700">
                        <th class="px-4 py-3 text-left rounded-l-xl">No</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left hidden md:table-cell">Email</th>
                        <th class="px-4 py-3 text-left">Role</th>
                        <th class="px-4 py-3 text-center rounded-r-xl">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr class="bg-white shadow-sm hover:bg-slate-50 transition">
                        <td class="px-4 py-3">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-4 py-3 font-medium text-slate-700">
                            {{ $user->name }}
                        </td>

                        <td class="px-4 py-3 text-slate-600 hidden md:table-cell">
                            {{ $user->email }}
                        </td>

                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                @if($user->role === 'admin')
                                    bg-red-100 text-red-700
                                @elseif($user->role === 'petugas')
                                    bg-blue-100 text-blue-700
                                @else
                                    bg-green-100 text-green-700
                                @endif
                            ">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>

                        <td class="px-4 py-3">
                            <div class="flex flex-col sm:flex-row gap-2 justify-center">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                   class="px-3 py-1.5 rounded-lg bg-yellow-400
                                          text-white text-xs text-center">
                                    Edit
                                </a>

                                <form action="{{ route('admin.users.destroy', $user->id) }}"
                                method="POST"
                                class="delete-form">
                                @csrf
                                @method('DELETE')

                                <button type="button"
                                    class="delete-btn w-full px-3 py-1.5 rounded-lg bg-red-500
                                        text-white text-xs">
                                    Hapus
                                </button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#usersTable').DataTable({
            pageLength: 5,
            lengthChange: true,
            autoWidth: false,
            language: {
                lengthMenu: "Tampilkan _MENU_ data",
                search: "Cari:",
                zeroRecords: "Data tidak ditemukan",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                paginate: {
                    previous: "‹",
                    next: "›"
                }
            }
        });
    });
</script>
@endpush
