<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SarprasKu</title>

    @vite(['resources/css/app.css'])
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gradient-to-br from-indigo-50 via-white to-blue-50 text-slate-800 scroll-smooth">

<!-- NAVBAR -->
<nav class="fixed w-full z-50 bg-white/70 backdrop-blur-lg border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-8 py-4 flex items-center justify-between">

        <h1 class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
            SARPRASKU
        </h1>

        <div class="hidden md:flex gap-8 text-sm font-medium text-slate-600">
            <a href="#home" class="hover:text-blue-600 transition">Beranda</a>
            <a href="#alat" class="hover:text-blue-600 transition">Daftar Alat</a>
            <a href="#cara" class="hover:text-blue-600 transition">Cara Peminjaman</a>
        </div>

        <a href="{{ route('login') }}"
           class="px-5 py-2 bg-gradient-to-r from-blue-500 to-indigo-600
                  text-white rounded-xl text-sm font-semibold
                  shadow-md hover:shadow-lg
                  transition transform hover:-translate-y-0.5">
            Login
        </a>
    </div>
</nav>


<section id="home"
class="pt-36 pb-20 px-8 max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center relative">

    <!-- Background Blur Effect -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[600px] 
                bg-blue-200 rounded-full blur-3xl opacity-30 -z-10">
    </div>

    <!-- TEXT -->
    <div>
        <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
            Sistem Peminjaman  
            <span class="bg-gradient-to-r from-blue-600 to-indigo-600 
                         bg-clip-text text-transparent">
                Alat Sarpras
            </span>
        </h1>

        <p class="mt-6 text-slate-600 text-lg leading-relaxed max-w-lg">
            Kelola peminjaman alat sekolah dengan lebih cepat, lebih rapi,
            dan transparan tanpa ribet administrasi manual.
        </p>

        <div class="mt-10 flex gap-4 flex-wrap">
            <a href="{{ route('login') }}"
               class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600
                      text-white rounded-xl font-semibold
                      shadow-md hover:shadow-xl
                      transition transform hover:-translate-y-1">
                Ajukan Peminjaman
            </a>

            <a href="#cara"
               class="px-6 py-3 border border-blue-600 text-blue-600
                      rounded-xl font-semibold
                      hover:bg-blue-600 hover:text-white
                      transition">
                Lihat Cara
            </a>
        </div>
    </div>

   <!-- ILUSTRASI -->
<div class="flex justify-center">

    <div class="relative">

        <!-- Glow -->
        <div class="absolute -inset-10 bg-blue-300 rounded-full blur-3xl opacity-30"></div>

        <div class="relative w-72 h-72 rounded-full 
                    bg-gradient-to-br from-blue-100 to-indigo-50
                    flex items-center justify-center
                    shadow-2xl">

            <img src="{{ asset('assets/logo1.png') }}" 
                 alt="Ilustrasi Sarpras"
                 class="w-40 h-40 object-contain">

        </div>
    </div>

</div>

</section>

<!-- KEUNGGULAN -->
<section class="py-24 px-8 bg-white">
    <div class="max-w-6xl mx-auto text-center">

        <h2 class="text-3xl font-bold mb-14">
            Kenapa Pakai Sistem Ini?
        </h2>

        <div class="grid md:grid-cols-3 gap-10">

            <div class="group bg-white p-8 rounded-3xl shadow-sm border border-slate-100
                        hover:shadow-xl transition duration-300">

                <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center
                            mb-6 group-hover:scale-110 transition">
                    <i class="fa-solid fa-bolt text-blue-600 text-xl"></i>
                </div>

                <h3 class="font-semibold text-lg mb-3">Cepat & Praktis</h3>

                <p class="text-slate-600 leading-relaxed">
                    Proses peminjaman tanpa ribet dan bisa dilakukan kapan saja.
                </p>
            </div>


            <div class="group bg-white p-8 rounded-3xl shadow-sm border border-slate-100
                        hover:shadow-xl transition duration-300">

                <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center
                            mb-6 group-hover:scale-110 transition">
                    <i class="fa-solid fa-list-check text-blue-600 text-xl"></i>
                </div>

                <h3 class="font-semibold text-lg mb-3">Data Tertata</h3>

                <p class="text-slate-600 leading-relaxed">
                    Semua peminjaman tercatat rapi dan mudah dipantau.
                </p>
            </div>


            <div class="group bg-white p-8 rounded-3xl shadow-sm border border-slate-100
                        hover:shadow-xl transition duration-300">

                <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center
                            mb-6 group-hover:scale-110 transition">
                    <i class="fa-solid fa-shield-halved text-blue-600 text-xl"></i>
                </div>

                <h3 class="font-semibold text-lg mb-3">Transparan</h3>

                <p class="text-slate-600 leading-relaxed">
                    Status alat dan pengembalian bisa dilihat dengan jelas.
                </p>
            </div>

        </div>
    </div>
</section>


<!-- FOOTER -->
<footer class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-8 text-center">
    <p class="text-sm opacity-90">
        © {{ date('Y') }} Sistem Peminjaman Alat Sarpras
    </p>
</footer>

</body>
</html>
