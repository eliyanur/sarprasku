<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SarprasKu</title>

    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-indigo-50 via-white to-blue-50 text-slate-800 scroll-smooth">

<nav class="fixed top-0 inset-x-0 z-50
            h-16
            bg-white/80 backdrop-blur
            border-b border-slate-200">

    <div class="max-w-7xl mx-auto px-5 h-full
                flex items-center justify-between">

        <!-- LOGO -->
        <span class="font-bold text-blue-600 text-lg">
            SARPRASKU
        </span>

        <!-- MENU DESKTOP -->
        <div class="hidden md:flex gap-8 text-sm font-medium text-slate-600">
            <a href="#home" class="hover:text-blue-600">Beranda</a>
            <a href="#keunggulan" class="hover:text-blue-600">Keunggulan</a>
        </div>

        <a href="{{ route('login') }}"
           class="block text-center px-4 py-2 rounded-xl
                  bg-blue-600 text-white font-semibold">
            Login
        </a>
        <!-- HAMBURGER BUTTON (MOBILE) -->
        <button id="hamburger"
                class="md:hidden flex flex-col gap-1.5">
            <span class="w-6 h-0.5 bg-slate-700"></span>
            <span class="w-6 h-0.5 bg-slate-700"></span>
            <span class="w-6 h-0.5 bg-slate-700"></span>
        </button>
    </div>

    <!-- MENU MOBILE -->
    <div id="mobile-menu"
         class="hidden md:hidden
                bg-white border-t border-slate-200
                px-5 py-4 space-y-4">

        <a href="#home"
           class="block text-slate-700 font-medium hover:text-blue-600">
            Beranda
        </a>

        <a href="#keunggulan"
           class="block text-slate-700 font-medium hover:text-blue-600">
            Keunggulan
        </a>

        <a href="{{ route('login') }}"
           class="block text-center px-4 py-2 rounded-xl
                  bg-blue-600 text-white font-semibold">
            Login
        </a>
    </div>
</nav>

<!-- HERO -->
<section id="home"
class="relative
       pt-24 pb-16
       px-5
       max-w-7xl mx-auto
       flex flex-col items-center gap-8
       md:grid md:grid-cols-2 md:gap-12
       md:pt-36 md:pb-24">

    <!-- Background Blur -->
    <div class="absolute top-32 left-1/2 -translate-x-1/2
            w-48 h-48
            md:w-[600px] md:h-[600px]
            bg-blue-200 rounded-full blur-3xl opacity-30 -z-10">
</div>


    <!-- LOGO (MOBILE FIRST) -->
    <div class="flex justify-center mb-8 md:mb-0">
        <div class="relative">

            <div class="absolute -inset-10 md:-inset-16
                        bg-gradient-to-r from-blue-400 to-indigo-400
                        rounded-full blur-3xl opacity-40"></div>

           <img src="{{ asset('assets/logo.png') }}"
     alt="Logo SarprasKu"
     class="w-28 h-28
            md:w-60 md:h-60
            object-contain drop-shadow-xl">

        </div>
    </div>

    <!-- TEXT -->
    <div class="text-center md:text-left">

        <h1 class="text-2xl md:text-5xl font-extrabold leading-tight">
            Sistem Peminjaman
            <span class="block bg-gradient-to-r from-blue-600 to-indigo-600
                         bg-clip-text text-transparent">
                Alat Sarpras
            </span>
        </h1>

        <p class="mt-4 md:mt-6
                  text-slate-600
                  text-sm md:text-lg
                  leading-relaxed
                  max-w-md mx-auto md:mx-0">
            Kelola peminjaman alat sekolah dengan lebih cepat,
            lebih rapi, dan transparan tanpa ribet administrasi manual.
        </p>

        <div class="mt-6 md:mt-10 flex justify-center md:justify-start">
            <a href="{{ route('login') }}"
               class="px-6 py-3
                      bg-gradient-to-r from-blue-500 to-indigo-600
                      text-white rounded-xl font-semibold
                      shadow-md hover:shadow-xl transition">
                Ajukan Peminjaman
            </a>
        </div>
    </div>

</section>

<!-- KEUNGGULAN -->
<section id="keunggulan"
class="py-20 md:py-28 px-6 md:px-8
       bg-gradient-to-br from-slate-50 to-blue-50">

    <div class="max-w-6xl mx-auto text-center">

        <h2 class="text-3xl md:text-4xl font-extrabold mb-4">
            Kenapa Memilih  
            <span class="bg-gradient-to-r from-blue-600 to-indigo-600 
                         bg-clip-text text-transparent">
                Sistem SarprasKu?
            </span>
        </h2>

        <p class="text-slate-600 max-w-2xl mx-auto mb-14 text-base md:text-lg">
            Solusi digital untuk pengelolaan peminjaman sarana dan prasarana
            yang efisien, transparan, dan terintegrasi.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

            <!-- CARD -->
            <div class="bg-white/80 backdrop-blur-lg p-8 rounded-3xl
                        shadow-md hover:shadow-xl
                        transition">

                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br 
                            from-blue-500 to-indigo-600
                            flex items-center justify-center
                            mb-6 mx-auto">
                    <i class="fa-solid fa-bolt text-white text-2xl"></i>
                </div>

                <h3 class="font-semibold text-lg mb-3">
                    Proses Cepat & Efisien
                </h3>

                <p class="text-slate-600 leading-relaxed">
                    Pengajuan peminjaman dilakukan secara online
                    tanpa proses manual.
                </p>
            </div>

            <!-- CARD -->
            <div class="bg-white/80 backdrop-blur-lg p-8 rounded-3xl
                        shadow-md hover:shadow-xl
                        transition">

                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br 
                            from-blue-500 to-indigo-600
                            flex items-center justify-center
                            mb-6 mx-auto">
                    <i class="fa-solid fa-database text-white text-2xl"></i>
                </div>

                <h3 class="font-semibold text-lg mb-3">
                    Data Terpusat
                </h3>

                <p class="text-slate-600 leading-relaxed">
                    Semua data peminjaman dan alat tersimpan
                    rapi dalam satu sistem.
                </p>
            </div>

            <!-- CARD -->
            <div class="bg-white/80 backdrop-blur-lg p-8 rounded-3xl
                        shadow-md hover:shadow-xl
                        transition">

                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br 
                            from-blue-500 to-indigo-600
                            flex items-center justify-center
                            mb-6 mx-auto">
                    <i class="fa-solid fa-shield-halved text-white text-2xl"></i>
                </div>

                <h3 class="font-semibold text-lg mb-3">
                    Transparan & Aman
                </h3>

                <p class="text-slate-600 leading-relaxed">
                    Status alat dan histori peminjaman
                    dapat dipantau dengan jelas.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-gradient-to-r from-blue-500 to-indigo-600 
               text-white py-6 text-center px-4">
    <p class="text-sm opacity-90">
        © {{ date('Y') }} Sistem Peminjaman Alat Sarpras
    </p>
</footer>

</body>
</html>
<script>
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');

    hamburger.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
