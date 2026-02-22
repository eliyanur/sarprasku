@extends('layout_admin.admin')

@section('content')

<!-- PAGE TITLE -->
<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">Dashboard Admin</h1>
    <p class="text-slate-500 text-sm mt-1">
        Ringkasan aktivitas peminjaman alat
    </p>
</div>

<!-- STATISTIC CARDS -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

    <!-- TOTAL -->
    <div class="p-6 rounded-3xl bg-gradient-to-br from-indigo-500 via-indigo-600 to-indigo-700 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm opacity-80">Total Peminjaman</p>
                <h2 class="text-3xl font-bold mt-1">{{ $total }}</h2>
            </div>
            <i class="fa-solid fa-file-lines text-3xl opacity-70"></i>
        </div>
    </div>

    <!-- MENUNGGU -->
    <div class="p-6 rounded-3xl bg-gradient-to-br from-sky-500 via-sky-600 to-sky-700 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm opacity-80">Menunggu Persetujuan</p>
                <h2 class="text-3xl font-bold mt-1">{{ $menunggu }}</h2>
            </div>
            <i class="fa-solid fa-hourglass-half text-3xl opacity-70"></i>
        </div>
         </div>

    <!-- DISETUJUI -->
    <div class="p-6 rounded-3xl bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm opacity-80">Disetujui</p>
                <h2 class="text-3xl font-bold mt-1">{{ $disetujui }}</h2>
            </div>
            <i class="fa-solid fa-circle-check text-3xl opacity-70"></i>
        </div>
    </div>

    <!-- SELESAI -->
    <div class="p-6 rounded-3xl bg-gradient-to-br from-cyan-500 via-cyan-600 to-cyan-700 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm opacity-80">Dikembalikan</p>
                <h2 class="text-3xl font-bold mt-1">{{ $dikembalikan }}</h2>
            </div>
            <i class="fa-solid fa-box-archive text-3xl opacity-70"></i>
        </div>
    </div>

</div>


<!-- CONTENT GRID -->
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    <!-- CHART -->
    <div class="xl:col-span-2 bg-white rounded-3xl p-6 shadow-sm border border-slate-100">

        <div class="flex justify-between items-center mb-6">
            <h3 class="font-semibold text-slate-700">
                Statistik Peminjaman
            </h3>
            <span class="text-xs text-slate-400">
                Bulanan
            </span>
        </div>

        <div class="h-72 bg-gradient-to-br from-indigo-50 to-purple-100 
                    rounded-2xl p-6 relative overflow-hidden">

            <!-- Fake Line Chart -->
            <div class="absolute bottom-10 left-10 right-6">
                <div class="relative h-36">
                    @php
                        $max = max($bulanan->toArray() ?: [1]);
                        $points = '';
                        foreach(range(1,12) as $i => $bulan){
                            $x = $i * 25;
                            $y = 100 - (($bulanan[$bulan] ?? 0) / $max * 100);
                            $points .= "$x,$y ";
                        }
                    @endphp

                    <svg class="w-full h-full" viewBox="0 0 300 100" preserveAspectRatio="none">
                        <polyline
                            fill="none"
                            stroke="#6366f1"
                            stroke-width="4"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            points="{{ $points }}"
                        />
                    </svg>
                </div>
            </div>

            <!-- X Labels -->
            <div class="absolute bottom-2 left-10 right-6 flex justify-between text-xs text-slate-400">
                <span>Jan</span>
                <span>Feb</span>
                <span>Mar</span>
                <span>Apr</span>
                <span>Mei</span>
                <span>Jun</span>
                <span>Jul</span>
                <span>Agu</span>
            </div>

            <!-- Y Labels -->
            <div class="absolute top-6 left-3 flex flex-col justify-between h-40 text-xs text-slate-400">
                <span>100</span>
                <span>75</span>
                <span>50</span>
                <span>25</span>
                <span>0</span>
            </div>

        </div>
    </div>


    <!-- RECENT ACTIVITY -->
    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">

        <h3 class="font-semibold text-slate-700 mb-6">
            Peminjaman Terbaru
        </h3>

        <ul class="space-y-4 text-sm">
@foreach($terbaru as $item)
<li class="flex justify-between items-center p-3 rounded-xl hover:bg-slate-50 transition">
    <span class="font-medium text-slate-600">
        {{ $item->user->name }}
    </span>

    @if($item->status == 'pending')
        <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-600 text-xs font-medium">
            Menunggu
        </span>

    @elseif($item->status == 'disetujui')
        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-600 text-xs font-medium">
            Disetujui
        </span>

    @elseif($item->status == 'dikembalikan')
        <span class="px-3 py-1 rounded-full bg-green-100 text-green-600 text-xs font-medium">
            Dikembalikan
        </span>

    @else
        <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-xs font-medium">
            {{ ucfirst($item->status) }}
        </span>
    @endif
</li>
@endforeach
</ul>
    </div>

</div>

@endsection

