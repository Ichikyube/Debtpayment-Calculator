@extends('layouts.app')

@section('content')
    <div class="relative h-[100vh] w-full">
        <!-- Sidebar -->
        <div x-data="{ coba: localStorage.getItem('coba') }" class="absolute left-[3%] top-[5%] bottom-0 flex flex-col gap-20 w-[90%]">
            <a href="" class="mx-3 text-4xl text-white"><img src="/img/far.png" alt="png" class="w-12"></a>
            <div class="flex flex-col gap-24 px-4">
                @livewire('components.profile')
                @livewire('components.kalkulator')
                @livewire('components.list-hitungan')

            </div>
            <a href="" class="mx-5 mt-12 text-4xl text-white"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>



        <!-- <div class="absolute bg-white shadow bottom-5 right-5 w-[87%] h-[83%] rounded-xl">
            coba
        </div> -->
    </div>
@endsection
