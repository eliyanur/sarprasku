@extends('layout_user.user')

@section('content')

<!-- Kartu Sambutan -->
   <section
    class="relative bg-gradient-to-r from-indigo-500 via-sky-500 to-sky-400
    text-white px-3 py-3 sm:px-4 sm:py-3 md:px-8 md:py-4 
    rounded-2xl shadow-lg flex items-center justify-between 
    overflow-hidden flex-shrink-0">

    <!-- Glow effect -->
    <div class="absolute -top-10 -left-10 w-40 h-40 bg-white/20 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-indigo-300/30 rounded-full blur-3xl"></div>

    <!-- Teks sambutan -->
    <div class="relative z-10 max-w-[70%] sm:max-w-[65%] md:max-w-none">
        <h2
            class="text-base sm:text-lg md:text-3xl font-semibold 
            font-mochiy leading-tight drop-shadow">
            Hallo {{ Auth::user()->name }}
        </h2>
        <p class="text-xs sm:text-sm md:text-base mt-1 text-sky-100 leading-snug">
            Selamat datang di perpustakaan BPMSPH.<br>
            Mari jelajahi dunia lewat membaca
        </p>
    </div>

    <!-- Gambar buku -->
    <div class="relative z-10 w-20 sm:w-24 md:w-36 lg:w-40 flex-shrink-0 ml-2 sm:ml-4">
        <img src="{{ asset('assets/logo1.png') }}" alt="Welcome"
            class="w-full drop-shadow-xl">
    </div>

    <!-- Overlay lembut -->
    <div
        class="absolute inset-0 bg-gradient-to-r from-white/10 to-transparent 
        backdrop-blur-[1px] rounded-2xl">
    </div>
</section>
<!-- CARD STATISTIK -->
<section class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 mt-6 px-2">

    <!-- Sedang Dipinjam -->
    <div class="bg-gradient-to-r from-indigo-500 via-sky-500 to-sky-400 px-6 pt-2 pb-4 
                rounded-2xl shadow-md relative overflow-hidden">
        <i class="fa-solid fa-book-open absolute left-2 -top-2 
                  text-[64px] text-white/30"></i>

        <div class="ml-[78px] mt-[4px] leading-tight relative z-10">
            <p class="text-sm text-white font-medium">Sedang dipinjam</p>
            <h3 class="text-lg font-mochiy text-white">Alat</h3>
        </div>
    </div>

    <!-- Telat -->
    <div class="bg-gradient-to-r from-indigo-500 via-sky-500 to-sky-400 px-6 pt-2 pb-4 
                rounded-2xl shadow-md relative overflow-hidden">
        <i class="fa-solid fa-triangle-exclamation absolute left-2 -top-2 
                  text-[64px] text-white/30"></i>

        <div class="ml-[78px] mt-[4px] leading-tight relative z-10">
            <p class="text-sm text-white font-medium">Telat Pengembalian</p>
            <h3 class="text-lg font-mochiy text-white">Alat</h3>
        </div>
    </div>

    <!-- Favorit -->
    <div class="bg-gradient-to-r from-indigo-500 via-sky-500 to-sky-400 px-6 pt-2 pb-4 
                rounded-2xl shadow-md relative overflow-hidden">
        <i class="fa-solid fa-heart absolute left-2 -top-2 
                  text-[64px] text-white/30"></i>

        <div class="ml-[78px] mt-[4px] leading-tight relative z-10">
            <p class="text-sm text-white font-medium">Alat Tersedia</p>
            <h3 class="text-lg font-mochiy text-white">Alat</h3>
        </div>
    </div>

</section>


@endsection