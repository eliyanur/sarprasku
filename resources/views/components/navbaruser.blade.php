<nav
    id="navbar"
    class="fixed top-0 left-0 md:left-[320px] right-0 md:right-3 z-30 bg-gradient-to-b from-blue-400 to-indigo-500
    rounded-b-3xl shadow-sm flex items-center
    px-4 md:px-6 py-4 md:py-6 transition-all duration-300"
>

      <button id="btnSidebar"
    class="md:hidden p-2 rounded-lg bg-indigo-500 text-white">
    <i class="fa-solid fa-bars"></i>
</button>

 <div
    id="overlay"
    class="fixed inset-0 bg-black/40 backdrop-blur-sm
           hidden z-20 md:hidden">
</div>

    <h1
    class="absolute left-1/2 -translate-x-1/2
    md:static md:translate-x-0
    text-lg md:text-xl font-bold text-white">
    @yield('pageTitle', 'Dashboard')
</h1>


    <!-- RIGHT -->
    <div class="flex items-center gap-6 ml-auto">

        <!-- NOTIFICATION -->
        <div class="relative">
    <button id="notifBtn"
        class="relative w-10 h-10 rounded-xl
               bg-slate-100 hover:bg-slate-200
               flex items-center justify-center transition">

        <i class="fa-regular fa-bell text-slate-600"></i>

        @if(isset($notif_terlambat) && $notif_terlambat->count() > 0)
        <span
            class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full animate-pulse">
        </span>
        @endif
    </button>

    <!-- DROPDOWN -->
    <div id="notifDropdown"
        class="hidden absolute right-0 mt-3 w-80 bg-white shadow-xl rounded-xl p-4 z-50">

        <h3 class="font-semibold text-slate-700 mb-3">Notifikasi</h3>

        @if(isset($notif_terlambat) && $notif_terlambat->count() > 0)
            @foreach($notif_terlambat as $item)
                <div class="text-sm p-2 rounded-lg bg-red-50 mb-2">
                    ⚠️ Peminjaman <b>{{ $item->alat->nama }}</b> telah melewati batas pengembalian.
                </div>
            @endforeach
        @else
            <div class="text-sm text-slate-500">
                Tidak ada notifikasi
            </div>
        @endif

    </div>
</div>

</nav>