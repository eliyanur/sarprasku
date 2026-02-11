@extends('layout_admin.admin')

@section('content')

<div class="p-6">
    <h2 class="text-2xl font-bold mb-6">Log Aktivitas</h2>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">User</th>
                    <th class="p-3 text-left">Role</th>
                    <th class="p-3 text-left">Aktivitas</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr class="border-t">
                    <td class="p-3">{{ $log->user->name ?? '-' }}</td>
                    <td class="p-3 capitalize">{{ $log->user->role ?? '-' }}</td>
                    <td class="p-3">{{ $log->aktivitas }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 text-xs rounded 
                            @if($log->status == 'disetujui') bg-green-100 text-green-700
                            @elseif($log->status == 'ditolak') bg-red-100 text-red-700
                            @elseif($log->status == 'pending') bg-yellow-100 text-yellow-700
                            @elseif($log->status == 'dikembalikan') bg-blue-100 text-blue-700
                            @endif">
                            {{ $log->status }}
                        </span>
                    </td>
                    <td class="p-3">{{ $log->waktu }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $logs->links() }}
    </div>
</div>

@endsection
