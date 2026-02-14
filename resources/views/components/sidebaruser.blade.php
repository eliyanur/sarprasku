<!-- SIDEBAR USER STYLE CARD -->
<aside
id="sidebar"
    class="fixed left-0 top-0 w-[300px] h-screen
           bg-gradient-to-b from-blue-400 to-indigo-500
           text-white
           shadow-2xl
           flex flex-col z-40 -translate-x-full md:translate-x-0">

    <!-- HEADER -->
    <div class="px-8 py-8">

        <!-- Logo Section -->
        <div class="flex items-center gap-4 mb-8">
            <div class="w-14 h-14 rounded-full bg-white flex items-center justify-center shadow-lg">
                <span class="text-blue-600 font-bold text-xl">S</span>
            </div>
            <div>
                <h1 class="text-2xl font-bold leading-tight">
                    Sarprasku
                </h1>
            </div>
        </div>

        <!-- Profile Card -->
        <div class="bg-white/20 backdrop-blur-md rounded-3xl p-5 shadow-md">
            <p class="font-semibold text-base">
                {{ Auth::user()->name }}
            </p>
            <p class="text-sm text-blue-100">
                {{ Auth::user()->email }}
            </p>
        </div>

    </div>

    <!-- MENU -->
    <div class="flex-1 px-6 space-y-4 mt-4">

        <!-- Dashboard -->
        <a href="{{ route('user.dashboard') }}"
           class="flex items-center gap-4 px-6 py-4 rounded-2xl text-lg
           {{ request()->routeIs('user.dashboard')
              ? 'bg-white text-blue-600 font-semibold shadow-lg'
              : 'bg-white/20 hover:bg-white/30 transition' }}">
            <i class="fa-solid fa-table-columns text-xl"></i>
            Dashboard
        </a>

        <!-- Alat -->
        <a href="{{route('user.alat')}}"
           class="flex items-center gap-4 px-6 py-4 rounded-2xl text-lg
           {{ request()->routeIs('user.alat')
              ? 'bg-white text-blue-600 font-semibold shadow-lg'
              : 'bg-white/20 hover:bg-white/30 transition' }}">
            <i class="fa-solid fa-book text-xl"></i>
            Alat
        </a>

        <!-- Riwayat -->
        <a href="{{route('user.riwayat')}}"
           class="flex items-center gap-4 px-6 py-4 rounded-2xl text-lg
           {{ request()->routeIs('user.riwayat')
              ? 'bg-white text-blue-600 font-semibold shadow-lg'
              : 'bg-white/20 hover:bg-white/30 transition' }}">
            <i class="fa-solid fa-clock-rotate-left text-xl"></i>
            Riwayat
        </a>

    </div>

    <!-- LOGOUT (FIX DI BAWAH) -->
    <div class="px-6 pb-8">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center gap-4 px-6 py-4 rounded-2xl
                       bg-red-500 hover:bg-red-600 transition
                       w-full text-lg font-semibold shadow-lg">
                <i class="fa-solid fa-right-from-bracket text-xl"></i>
                Logout
            </button>
        </form>
    </div>

</aside>
