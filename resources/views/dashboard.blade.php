@extends('layouts.app')

@section('content')
<script>
    let token = localStorage.getItem('token');

    if (token == null) {
        window.location.replace("/login");
    }
</script>
<script src="{{asset('js/auth/auth.js')}}"></script>

<div x-data="{ loading: true, tab: localStorage.getItem('tab') }"  class="relative w-full h-screen"  x-init="loading = false">
    <!-- Sidebar -->
    <div  x-data="$store.create" class="absolute left-[3%] top-[5%] bottom-0 flex flex-col w-[90%]" x-cloak x-show="!loading">
        <a href="" class="mx-3 text-4xl text-white w-fit"><img src="/img/far.png" alt="png" class="w-12"></a>
        <ul class="flex flex-col h-full px-4 justify-evenly w-fit">
            <li><button type="button"
                    x-on:click.prevent=" tab = 'kalkulator', localStorage.setItem('tab', 'kalkulator')"
                    class="absolute pl-1 text-4xl lg:static text-dark lg:text-white left-24 top-1"><i
                        x-bind:class="tab == 'kalkulator' ? 'text-red-400' : 'text-gray-400'"
                        class="fa-solid fa-qrcode"></i></button>
            </li>
            <li><button type="button"
                    x-on:click.prevent=" tab = 'listHitungan', localStorage.setItem('tab', 'listHitungan')"
                    class="absolute pl-1 text-4xl lg:static text-dark lg:text-white left-44 top-1"><i
                        x-bind:class="tab == 'listHitungan' ? 'text-red-400' : 'text-gray-400'"
                        class="fa-solid fa-money-bill"></i></button>
            </li>
            <li><button type="button" x-on:click.prevent=" tab = 'profile', localStorage.setItem('tab', 'profile')"
                    class="absolute pl-1 text-4xl lg:static text-dark lg:text-white left-64 top-1"><i
                        x-bind:class="tab == 'profile' ? 'text-red-400' : 'text-gray-400'"
                        class="fa-regular fa-user"></i></button>
            </li>
            <li x-data="$store.logout">
                <button x-on:click="logout()"
                    class="absolute text-4xl lg:static text-dark lg:text-white -right-4 top-1">
                    <i class="fa-solid fa-right-from-bracket"></i></button>
            </li>
        </ul>

        <div class="absolute hilanginscroll overflow-y-scroll bg-transparent lg:bg-white shadow bottom-5 -left-3 lg:left-28 top-12 lg:top-0 pt-0
                    h-fit lg:h-[90%] w-screen lg:w-[97%] transform rounded-none lg:rounded-xl px-0 lg:p-10 py-10">
            <template x-if="tab == 'kalkulator'" x-data="$store.create" x-cloak
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">@livewire('components.kalkulator')</template>
            <template x-if="tab == 'edit-hitungan'" x-cloak x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">@livewire('components.edit-hitungan')</template>
            <template x-if="tab == 'listHitungan'" x-cloak x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">@livewire('components.list-hitungan')</template>
            <template x-if="tab == 'profile'" x-cloak x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">@livewire('components.profile')</template>
        </div>
    </div>
</div>

    @endsection
