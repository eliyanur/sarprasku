@extends('layout_admin.admin')
@section('pageTitle', 'Kategori')

@section('content')
<div class="space-y-6">

    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Kategori Alat</h1>
            <p class="text-sm text-slate-500">Kelola data kategori alat</p>
        </div>

        <a href="{{ route('admin.kategori.create') }}"
           class="inline-flex items-center justify-center px-5 py-2.5
                  rounded-xl bg-indigo-600 text-white text-sm font-semibold
                  hover:bg-indigo-700 transition">
            + Tambah Kategori
        </a>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl shadow">
        <div class="overflow-x-auto p-4">
            <table id="kategoriTable"
                   class="min-w-[700px] w-full text-sm border-separate border-spacing-y-2">

                <thead>
                    <tr class="bg-indigo-50 text-indigo-700">
                        <th class="px-4 py-3 text-left rounded-l-xl">No</th>
                        <th class="px-4 py-3 text-left">Nama Kategori</th>
                        <th class="px-4 py-3 text-left hidden md:table-cell">Keterangan</th>
                        <th class="px-4 py-3 text-center rounded-r-xl">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($kategori as $item)
                    <tr class="bg-white shadow-sm hover:bg-slate-50 transition">
                        <td class="px-4 py-3">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-4 py-3 font-medium text-slate-700">
                            {{ $item->nama_kategori }}
                        </td>

                        <td class="px-4 py-3 text-slate-600 hidden md:table-cell">
                            {{ $item->deskripsi ?? '-' }}
                        </td>

                        <td class="px-4 py-3">
                            <div class="flex flex-col sm:flex-row gap-2 justify-center">
                                <a href="{{ route('admin.kategori.edit', $item) }}"
                                   class="px-3 py-1.5 rounded-lg bg-yellow-400
                                          text-white text-xs text-center">
                                    Edit
                                </a>

                                <form action="{{ route('admin.kategori.destroy', $item) }}"
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
        $('#kategoriTable').DataTable({
            responsive: true,
            pageLength: 5,
            lengthChange: true, // ← AKTIFKAN ENTRY
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
