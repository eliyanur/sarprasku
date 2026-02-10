<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Peminjaman Alat Sarpras</title>

    @vite(['resources/css/app.css'])
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-white text-slate-800">

<!-- NAVBAR -->
<nav class="flex items-center justify-between px-8 py-5 bg-white shadow-sm fixed w-full z-50">
    <h1 class="text-xl font-bold text-blue-600">SARPRASKU</h1>
    <div class="hidden md:flex gap-8 text-sm font-medium">
        <a href="#home" class="hover:text-blue-600">Beranda</a>
        <a href="#alat" class="hover:text-blue-600">Daftar Alat</a>
        <a href="#cara" class="hover:text-blue-600">Cara Peminjaman</a>
    </div>
    <a href="{{ route('login') }}"
       class="px-5 py-2 bg-gradient-to-b from-blue-400 to-indigo-500 text-white rounded-xl text-sm hover:bg-blue-700">
        Login
    </a>
</nav>

<!-- HERO -->
<section id="home"
class="pt-32 pb-20 px-8 max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">
    <div>
        <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
            Sistem Peminjaman  
            <span class="text-blue-600">Alat Sarpras</span>
        </h1>
        <p class="mt-6 text-slate-600 text-lg">
            Kelola peminjaman alat sekolah dengan mudah, cepat,
            dan transparan tanpa ribet administrasi.
        </p>
        <div class="mt-8 flex gap-4">
            <a href="{{ route('login') }}"
               class="px-6 py-3 bg-gradient-to-b from-blue-400 to-indigo-500 text-white rounded-xl font-semibold">
                Ajukan Peminjaman
            </a>
            <a href="#cara"
               class="px-6 py-3 border border-blue-600 text-blue-600 rounded-xl font-semibold">
                Lihat Cara
            </a>
        </div>
    </div>

    <!-- ILUSTRASI -->
    <div class="flex justify-center">
        <div class="w-72 h-72 rounded-full bg-blue-100 flex items-center justify-center">
            <i class="fa-solid fa-toolbox text-blue-600 text-7xl"></i>
        </div>
    </div>
</section>

<!-- KEUNGGULAN -->
<section class="bg-blue-50 py-20 px-8">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-3xl font-bold mb-12">
            Kenapa Pakai Sistem Ini?
        </h2>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow">
                <i class="fa-solid fa-bolt text-blue-600 text-3xl mb-4"></i>
                <h3 class="font-semibold text-lg mb-2">Cepat & Praktis</h3>
                <p class="text-slate-600">
                    Proses peminjaman tanpa ribet dan bisa dilakukan kapan saja.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow">
                <i class="fa-solid fa-list-check text-blue-600 text-3xl mb-4"></i>
                <h3 class="font-semibold text-lg mb-2">Data Tertata</h3>
                <p class="text-slate-600">
                    Semua peminjaman tercatat rapi dan mudah dipantau.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow">
                <i class="fa-solid fa-shield-halved text-blue-600 text-3xl mb-4"></i>
                <h3 class="font-semibold text-lg mb-2">Transparan</h3>
                <p class="text-slate-600">
                    Status alat dan pengembalian bisa dilihat dengan jelas.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-gradient-to-b from-blue-400 to-indigo-500 text-white py-6 text-center">
    <p class="text-sm">
        © {{ date('Y') }} Sistem Peminjaman Alat Sarpras
    </p>
</footer>

</body>
</html>
