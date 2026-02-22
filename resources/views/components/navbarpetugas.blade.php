<!-- NAVBAR -->
<header
    class="fixed top-0 left-0 md:left-[300px] right-0 h-20
           bg-gradient-to-b from-indigo-50 to-purple-50 shadow-lg
           flex items-center
           px-4 md:px-8 z-30">

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
    text-lg md:text-xl font-bold text-indigo-500">
    @yield('pageTitle', 'Dashboard Petugas')
</h1>
    </div>
</header>
