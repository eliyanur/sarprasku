@extends('layout_admin.admin')
@section('pageTitle', 'Data Alat')

@section('content')
<div class="space-y-6">

    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Data Alat</h1>
            <p class="text-sm text-slate-500">Kelola data alat yang tersedia</p>
        </div>

        <a href="{{ route('admin.alat.create') }}"
           class="inline-flex items-center justify-center px-5 py-2.5
                  rounded-xl bg-indigo-600 text-white text-sm font-semibold
                  hover:bg-indigo-700 transition">
            + Tambah Alat
        </a>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl shadow">
        <div class="overflow-x-auto p-4">
            <table id="alatTable"
                   class="min-w-[900px] w-full text-sm border-separate border-spacing-y-2">

                <thead>
    <tr class="bg-indigo-50 text-indigo-700">
        <th class="px-4 py-3 text-left rounded-l-xl">No</th>
        <th class="px-4 py-3 text-left">Gambar</th> <!-- kolom baru -->
        <th class="px-4 py-3 text-left">Nama Alat</th>
        <th class="px-4 py-3 text-left">Kategori</th>
        <th class="px-4 py-3 text-center">Total</th>
        <th class="px-4 py-3 text-center">Tersedia</th>
        <th class="px-4 py-3 text-left hidden md:table-cell">Kondisi</th>
        <th class="px-4 py-3 text-center rounded-r-xl">Aksi</th>
    </tr>
</thead>

<tbody>
    @foreach ($alat as $item)
    <tr class="bg-white shadow-sm hover:bg-slate-50 transition">
        <td class="px-4 py-3">{{ $loop->iteration }}</td>

        <!-- GAMBAR -->
        <td class="px-4 py-3">
            @if($item->gambar)
                <img src="{{ asset('storage/' . $item->gambar) }}" 
                     alt="{{ $item->nama_alat }}" 
                     class="w-12 h-12 object-cover rounded-lg">
            @else
                <div class="w-12 h-12 bg-gray-100 flex items-center justify-center rounded-lg text-gray-400 text-xs">
                    No Image
                </div>
            @endif
        </td>

        <td class="px-4 py-3 font-medium text-slate-700">{{ $item->nama_alat }}</td>
        <td class="px-4 py-3 text-slate-600">{{ $item->kategori->nama_kategori ?? '-' }}</td>
        <td class="px-4 py-3 text-center">{{ $item->jumlah_total }}</td>
        <td class="px-4 py-3 text-center">
            <span class="px-2 py-1 rounded-full text-xs font-semibold
                {{ $item->jumlah_tersedia > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                {{ $item->jumlah_tersedia }}
            </span>
        </td>
        <td class="px-4 py-3 text-slate-600 hidden md:table-cell">{{ ucfirst($item->kondisi) }}</td>
        <td class="px-4 py-3">
            <div class="flex flex-col sm:flex-row gap-2 justify-center">
                <a href="{{ route('admin.alat.show', $item) }}"
                   class="px-3 py-1.5 rounded-lg bg-blue-500 text-white text-xs text-center">
                   Detail
                </a>
                <a href="{{ route('admin.alat.edit', $item) }}"
                   class="px-3 py-1.5 rounded-lg bg-yellow-400 text-white text-xs text-center">
                   Edit
                </a>
                <form action="{{ route('admin.alat.destroy', $item) }}"
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
        $('#alatTable').DataTable({
            responsive: true,
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
