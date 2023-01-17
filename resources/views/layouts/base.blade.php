<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ url(asset('css/style.css')) }}">
        <script src="https://kit.fontawesome.com/c12c059ff2.js" crossorigin="anonymous"></script>


        @livewireStyles
        <livewire:scripts />
        <script src="{{ asset('js/debt/debts.js') }}"></script>
        <script src="{{asset('js/auth/auth.js')}}"></script>
        <script src="{{ asset('js/flowbite.min.js') }}"></script>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body class="h-full font-poppins">
        @yield('body')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </body>
</html>
