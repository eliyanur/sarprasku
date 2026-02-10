<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('pageTitle', 'User Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

     {{-- Include link (CSS, font, dsb) --}}
    @include('layout_user.partial_user.link')
</head>
<body class="min-h-screen flex flex-col bg-white">

{{-- HEADER admin --}}
    @include('layout_user.partial_user.header')

 {{-- KONTEN UTAMA --}}
      <main
class="pt-8 pb-6 px-4 md:px-6
bg-cream
relative top-[90px] mb-24
ml-0 md:ml-[320px]
md:mr-3 md:rounded-3xl
transition-all duration-300
flex flex-col max-w-full shadow-inner">

    @yield('content')
</main>

    {{-- FOOTER USER --}}
    @include('layout_user.partial_user.footer')

    <script src="{{ asset('assets_user/js/sidebaruser.js') }}"></script>
    @stack('scripts')
</body>
</html>
