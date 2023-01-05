@extends('layouts.base')

@section('body')
    @include('partials.navigation')
    <div class="flex flex-col justify-center bg-gray-50">
    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
    </div>
@endsection
