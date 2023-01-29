<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Debt Repayment</title>

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ url(asset('css/style.css')) }}">
        {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-12e7c4ac.css') }}"> --}}
        <script src="https://kit.fontawesome.com/c12c059ff2.js" crossorigin="anonymous"></script>
        @livewireStyles

        <script src="{{ asset('js/debt/debts.js') }}"></script>
        <script src="{{asset('js/auth/auth.js')}}"></script>
        <script defer src="{{ asset('js/flowbite.min.js') }}"></script>
        <script src="{{asset('js/users/profile.js')}}"></script>
        {{-- <script defer src="{{ asset('build/assets/app-d95ce6e5.js') }}"></script> --}}

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body class="flex flex-col justify-center flex-1 max-h-full min-h-screen bg-no-repeat bg-cover hilanginscroll font-poppins">

        @yield('body')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @livewireScripts
    </body>
</html>
