@extends('layout_admin.admin')
@section('pageTitle', 'Log Aktivitas')

@section('content')
<div class="space-y-6">

    <!-- HEADER -->
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Log Aktivitas</h1>
        <p class="text-sm text-slate-500">Riwayat aktivitas pengguna sistem</p>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl shadow">
        <div class="overflow-x-auto p-4">
            <table id="logTable"
                   class="min-w-[900px] w-full text-sm border-separate border-spacing-y-2">

                <thead>
                    <tr class="bg-indigo-50 text-indigo-700">
                        <th class="px-4 py-3 text-left rounded-l-xl">User</th>
                        <th class="px-4 py-3 text-left">Role</th>
                        <th class="px-4 py-3 text-left">Aktivitas</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left rounded-r-xl">Waktu</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($logs as $log)
                    <tr class="bg-white shadow-sm hover:bg-slate-50 transition">

                        <td class="px-4 py-3 font-medium text-slate-700">
                            {{ $log->user->name ?? '-' }}
                        </td>

                        <td class="px-4 py-3 text-slate-600 capitalize">
                            {{ $log->user->role ?? '-' }}
                        </td>

                        <td class="px-4 py-3 text-slate-700">
                            {{ $log->aktivitas }}
                        </td>

                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                @if($log->status == 'disetujui')
                                    bg-green-100 text-green-700
                                @elseif($log->status == 'ditolak')
                                    bg-red-100 text-red-700
                                @elseif($log->status == 'pending')
                                    bg-yellow-100 text-yellow-700
                                @elseif($log->status == 'dikembalikan')
                                    bg-blue-100 text-blue-700
                                @endif
                            ">
                                {{ ucfirst($log->status) }}
                            </span>
                        </td>

                        <td class="px-4 py-3 text-slate-600">
                            {{ \Carbon\Carbon::parse($log->waktu)->format('d M Y H:i') }}
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
        $('#logTable').DataTable({
            pageLength: 5,
            lengthChange: true,
            autoWidth: false,
            order: [[4, 'desc']],
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
