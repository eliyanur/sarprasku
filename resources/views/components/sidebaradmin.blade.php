<!-- SIDEBAR -->
<aside
    id="sidebar"
    class="fixed left-0 top-0 w-[300px] h-full
           bg-gradient-to-b from-indigo-50 to-purple-50
           shadow-xl
           transition-transform duration-300
           z-40
           -translate-x-full md:translate-x-0">

    <!-- LOGO -->
    <div class="flex items-center gap-3 px-8 py-8">
        <div class="w-10 h-10 rounded-2xl bg-indigo-500 text-white
                    flex items-center justify-center font-bold text-lg">
            S
        </div>
        <span class="text-xl font-bold text-indigo-500 tracking-wide">
            Sarprasku
        </span>
    </div>

    <!-- MENU -->
    <nav class="px-6 text-sm space-y-2">

        <!-- DASHBOARD (ACTIVE) -->
        <a href="{{route('admin.dashboard')}}"
           class="flex items-center gap-4 px-5 py-3 rounded-2xl
                  bg-indigo-100 text-indigo-600 font-semibold shadow-sm">
            <i class="fa-solid fa-chart-line"></i>
            Dashboard
        </a>

        <a href="{{route('admin.users.index')}}"
           class="flex items-center gap-4 px-5 py-3 rounded-2xl
                  text-slate-600 hover:bg-indigo-100/70 hover:text-indigo-600 transition">
            <i class="fa-solid fa-users"></i>
            Data Pengguna
        </a>

        <a href="{{ route('admin.kategori.index') }}"
           class="flex items-center gap-4 px-5 py-3 rounded-2xl
                  text-slate-600 hover:bg-indigo-100/70 hover:text-indigo-600 transition">
            <i class="fa-solid fa-layer-group"></i>
            Data Kategori
        </a>

        <a href="{{route('admin.alat.index')}}"
           class="flex items-center gap-4 px-5 py-3 rounded-2xl
                  text-slate-600 hover:bg-indigo-100/70 hover:text-indigo-600 transition">
            <i class="fa-solid fa-toolbox"></i>
            Data Alat
        </a>

        <a href="{{route('admin.logaktivitas')}}"
           class="flex items-center gap-4 px-5 py-3 rounded-2xl
                  text-slate-600 hover:bg-indigo-100/70 hover:text-indigo-600 transition">
            <i class="fa-solid fa-clock-rotate-left"></i>
            Log Aktivitas
        </a>
    </nav>

    <!-- LOGOUT -->
<div class="absolute bottom-6 w-full px-6">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            class="w-full flex items-center gap-4 px-5 py-3 rounded-2xl
                   text-red-500 hover:bg-red-100 transition font-medium">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </button>
    </form>
</div>


</aside>
