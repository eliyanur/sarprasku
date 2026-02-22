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


        <!-- PROFILE -->
@auth
@if(Auth::user()->role === 'admin')
<div
    class="flex items-center gap-3
           bg-white/60 backdrop-blur-md
           px-4 py-2 rounded-xl
           shadow-sm border border-white/40
           hover:bg-white/80 transition">

    <p class="text-sm font-semibold text-slate-700">
        {{ Auth::user()->name }}
    </p>

    <span
        class="text-[10px] font-semibold tracking-wide
               text-indigo-600 bg-indigo-100
               px-2 py-0.5 rounded-full">
        ADMIN
    </span>
</div>
@endif
@endauth


    </div>
</header>
