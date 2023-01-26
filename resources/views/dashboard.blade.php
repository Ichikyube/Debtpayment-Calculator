@extends('layouts.app')

@section('content')
<script>
    let token = localStorage.getItem('token');

    if (token == null) {
        localStorage.setItem ('messages', 'Harap Login terlebih dahulu')
        window.location.replace("/login");
    }
</script>
<script src="{{asset('js/auth/auth.js')}}"></script>

<div x-data="{ loading: true, tab: localStorage.getItem('tab') }"  class="relative w-full p-4 align-middle"  x-init="loading = false">
    <!-- Sidebar -->
    <div x-data="$store.create" class="flex flex-col w-full align-middle lg:flex-row" x-cloak x-show="!loading">
        <div class="flex justify-between w-full align-middle lg:w-20 lg:flex-col">
            <a href="" class="mx-3 text-4xl text-white w-fit"><img src="/img/far.png" alt="png" class="w-12"></a>
            <ul class="flex flex-row w-full h-full px-4 justify-evenly lg:flex-col">
                <li><button type="button"
                        x-on:click.prevent=" tab = 'kalkulator', localStorage.setItem('tab', 'kalkulator')"
                        class="text-4xl text-dark lg:text-white"><i
                            x-bind:class="tab == 'kalkulator' ? 'text-myyellow drop-shadow-3xl' : 'text-gray-400 drop-shadow-md'"
                            class="fa-solid fa-qrcode"></i></button>
                </li>
                <li><button type="button" x-bind:disabled="!list"
                        x-on:click.prevent=" tab = 'listHitungan', localStorage.setItem('tab', 'listHitungan')"
                        class="text-4xl text-dark lg:text-white "><i
                            x-bind:class="tab == 'listHitungan' ? 'text-myyellow drop-shadow-3xl' : 'text-gray-400 drop-shadow-md'"
                            class="fa-solid fa-money-bill"></i></button>
                </li>
                <li><button type="button" x-on:click.prevent=" tab = 'profile', localStorage.setItem('tab', 'profile')"
                        class="text-4xl text-dark lg:text-white"><i
                            x-bind:class="tab == 'profile' ? 'text-myyellow drop-shadow-3xl' : 'text-gray-400 drop-shadow-md'"
                            class="fa-regular fa-user"></i></button>
                </li>
            </ul>
            <div class="px-4" x-data="$store.logout">
                <button x-on:click="showWarningAlert = true"
                    class="text-4xl text-dark lg:text-white">
                    <i class="fa-solid fa-right-from-bracket drop-shadow-md"></i></button>

                {{-- start alert modal warning --}}
                <div x-show="showWarningAlert"
                    class="fixed inset-0 top-0 left-0 z-50 flex items-center justify-center h-screen bg-center bg-no-repeat bg-cover outline-none min-w-screen focus:outline-none"" id="modal-id">
                    <div class="absolute inset-0 z-0 bg-black opacity-40"></div>
                    <div x-show="showWarningAlert"
                        x-transition:enter="transition -translate-y-10 ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-y-10"
                        x-transition:enter-end="-translate-y-0 opacity-100"
                        x-transition:leave="transition -translate-y-10 ease-in duration-300"
                        x-transition:leave-start="opacity-100 -translate-y-10"
                        x-transition:leave-end="-translate-y-10 opacity-0"
                        class="relative w-full max-w-lg p-5 mx-auto my-auto bg-white shadow-lg rounded-xl ">
                    <!--content-->
                        <div class="">
                        <!--body-->
                            <div class="justify-center flex-auto p-5 text-center">
                                <div class="flex justify-center mx-auto rounded-full w-28 h-28 bg-yellow-50">
                                    <div class="self-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="flex items-center w-4 h-4 mx-auto -m-1 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex items-center w-16 h-16 mx-auto text-yellow-300">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                        </svg>
                                    </div>
                                </div>
                                <h2 class="py-4 text-xl font-bold ">Apakah anda yakin mau logout?!!</h3>
                                <p class="px-8 text-sm text-gray-500">
                                    klik tombol ya jika ingin logout
                                </p>
                            </div>
                        <!--footer-->
                            <div class="p-3 mt-2 space-x-4 text-center md:block">
                                <button x-on:click="showWarningAlert = !showWarningAlert" class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-gray-600 bg-white border rounded-full shadow-sm md:mb-0 hover:shadow-lg hover:bg-gray-100">
                                    Cancel
                                </button>
                                <button x-on:click="logout" class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white bg-red-500 border border-red-500 rounded-full shadow-sm md:mb-0 hover:shadow-lg hover:bg-red-600">
                                    ya
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end alert modal warning --}}

            </div>
        </div>


        <div class="mt-4 lg:mt-0 md:px-4 bg-white stretch border-spacing-12 border-4 border-sky-200/20
                    shadow pt-0 h-[540px] lg:w-[97%] transform
                    rounded-md lg:rounded-xl px-0 lg:p-10 py-10">
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
