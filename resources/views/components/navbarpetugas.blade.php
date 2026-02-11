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

    <!-- RIGHT -->
    <div class="flex items-center gap-6 ml-auto">

        <!-- NOTIFICATION -->
        <button
            class="relative w-10 h-10 rounded-xl
                   bg-slate-100 hover:bg-slate-200
                   flex items-center justify-center transition">
            <i class="fa-regular fa-bell text-slate-600"></i>
            <span
                class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full">
            </span>
        </button>

    </div>
</header>
