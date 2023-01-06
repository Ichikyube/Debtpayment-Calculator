@extends('layouts.app')

@section('content')
    <div class="relative h-[100vh] w-full">
        <!-- Sidebar -->
        <div x-data="{ open: 'dashboard' }" class="absolute left-[3%] top-[5%] bottom-0 flex flex-col gap-20 w-[90%]">
            <a href="" class="text-white text-4xl mx-3"><img src="/img/far.png" alt="png" class="w-12"></a>
            <div class="flex flex-col gap-24 px-4">
                @livewire('components.hasil')
                @livewire('components.list-hitungan')
                <a href="" class="text-white text-4xl pl-1""><i class="fa-regular fa-user"></i></a>
            </div>
            <a href="" class="text-white text-4xl mx-5 mt-12"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>



        <!-- <div class="absolute bg-white shadow bottom-5 right-5 w-[87%] h-[83%] rounded-xl">
            coba
        </div> -->
    </div>
@endsection