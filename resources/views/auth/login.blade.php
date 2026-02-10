<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-100 via-sky-100 to-indigo-100">

<div class="min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

        {{-- KIRI : ILUSTRASI --}}
        <div class="hidden md:flex items-center justify-center bg-blue-50 p-10">
            <img
                src="{{ asset('img/login-illustration.svg') }}"
                alt="Login Illustration"
                class="max-w-sm"
            >
        </div>

        {{-- KANAN : FORM LOGIN --}}
        <div class="p-8 sm:p-12 flex flex-col justify-center">

            <h2 class="text-2xl font-bold text-indigo-700 mb-1">
                Login Sistem
            </h2>
            <p class="text-sm text-slate-500 mb-6">
                Masuk untuk mengakses aplikasi
            </p>

            {{-- SESSION STATUS --}}
            @if (session('status'))
                <div class="mb-4 text-sm text-blue-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                {{-- USERNAME --}}
                <div>
                    <label class="text-sm font-medium text-slate-600">
                        Username
                    </label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        class="mt-1 w-full rounded-xl border-slate-300
                               focus:border-indigo-500 focus:ring-indigo-500"
                    >
                    @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div>
                    <label class="text-sm font-medium text-slate-600">
                        Password
                    </label>
                    <input
                        type="password"
                        name="password"
                        required
                        class="mt-1 w-full rounded-xl border-slate-300
                               focus:border-indigo-500 focus:ring-indigo-500"
                    >
                    @error('password')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- REMEMBER & LUPA --}}
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2">
                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500"
                        >
                        Ingat saya
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-indigo-600 hover:underline">
                            Lupa Password?
                        </a>
                    @endif
                </div>

                {{-- BUTTON --}}
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="px-6 py-2.5
                               bg-gradient-to-r from-blue-500 to-indigo-600
                               hover:from-blue-600 hover:to-indigo-700
                               text-white rounded-xl font-semibold transition
                               shadow-md hover:shadow-lg"
                    >
                        Login
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>
