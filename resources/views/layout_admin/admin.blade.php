<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('pageTitle', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

     {{-- Include link (CSS, font, dsb) --}}
    @include('layout_admin.partial_admin.link')
</head>
<body class="min-h-screen flex flex-col bg-white">

{{-- HEADER admin --}}
    @include('layout_admin.partial_admin.header')

 {{-- KONTEN UTAMA --}}
      <main
class="pt-8 pb-6 px-4 md:px-6
bg-gradient-to-b from-indigo-50 to-purple-50
relative top-[90px] mb-24
ml-0 md:ml-[320px]
md:mr-3 md:rounded-3xl
transition-all duration-300
flex flex-col max-w-full shadow-inner">

    @yield('content')
</main>

    {{-- FOOTER USER --}}
    @include('layout_admin.partial_admin.footer')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets_admin/js/sidebaradmin.js') }}"></script>
    @stack('scripts')
</body>
</html>
