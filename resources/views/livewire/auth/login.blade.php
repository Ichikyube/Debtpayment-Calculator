<x-app-layout title="Sign in to your account">
    <script>
        let token = localStorage.getItem('token');

        if (token != null) {
            window.location.replace("/dashboard");
        }
    </script>
    <div class="w-full sm:mx-auto text-dark ">
        <script src="{{asset('js/auth/auth.js')}}"></script>
        <div class="bg-white items-center px-5 sm:w-[500px] mx-auto rounded-[15px] shadow-2xl">
            <div x-data="$store.login" class="font-normal">
                <div class="text-dark" x-init="getMessages()">
                    <a href="{{ route('home') }}">
                        <div class="flex justify-center w-20 mx-auto mb-4 md:pt-[50px]">
                            <x-logo />
                        </div>
                        <h2 class="mt-[22px] text-[24px] md:text-[40px] font-semibold tracking-tight text-center block text-black">
                            Login
                        </h2>
                        <h2 class="hidden text-[40px] lg:leading-relaxed text-center md:block text-black tracking-tight leading-[76px]">
                            Debt Repayment
                        </h2>
                              {{-- pesan berhasil register --}}
                            <button x-show="messages" type="button" x-on:click="closeNotif" id="alert-4" class="flex py-4 m-6 text-yellow-700 rounded-lg px-7 bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                            role="alert" x-init="setTimeout(() => { closeNotif()}, 5000);" x-transition.duration.300ms>
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div class="mx-3 ml-3 text-sm font-medium tracking-tight" x-text="messages">
                            </div>
                            </button>

                    </a>
                </div>
                <form @submit.prevent="submited()" class="px-4 py-8 sm:rounded-lg sm:px-10">
                    {{-- <div x-init="{error.message ? localStorage.setItem ('messages', error.message)}"></div> --}}
                    {{-- <h1 class="mb-3 tracking-tight text-black" x-text=""></h1> --}}
                    <div>
                        <label for="email" class="block text-sm font-medium tracking-tight text-black">
                            Email
                        </label>

                        <div class="mt-1 rounded-md">
                            <input x-model="email" type="email" name="email" id="email" required autofocus
                                class="appearance-none form-input border-0 border-b border-b-black border-b-solid outline-none w-full placeholder:!bg-transparent bg-transparent block px-3 py-2 transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-[#FDC32F] focus:outline-none focus-visible:ring-0" x-bind:class="validation.email != null ? 'border-b-red-600' : ''" placeholder=" you@example.com">
                            <p class="mt-0 text-xs tracking-tight text-red-500" x-text="validation.email"></p>
                        </div>
                    </div>
                    <br>

                    <div class="">
                        <label for="password" class="block text-sm font-medium tracking-tight text-black">
                            Password
                        </label>

                        <div class="mt-1 rounded-md">
                            <input x-model="password" type="password" name="password" id="password" required class="appearance-none form-input border-0 border-b border-b-black border-b-solid outline-none w-full placeholder:!bg-transparent bg-transparent block px-3 py-2 transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-[#FDC32F] focus:outline-none focus-visible:ring-0" x-bind:class="validation.password != null ? 'border-b-red-600' : ''">
                            <p class="text-xs tracking-tight text-red-500" x-text="validation.password"></p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm bg-[#2A7C97]">
                            <button type="submit"
                                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md hover:bg-[#FDC32F] hover:text-black focus:outline-none focus:bg-[#2A7C97] focus:text-white focus:ring-indigo active:bg-white">
                                LOGIN
                            </button>
                        </span>
                    </div>
                    @if (Route::has('register'))
                    <p class="mt-2 text-sm leading-5 tracking-tight text-center text-gray-600 max-w">
                        Belum punya akun? <a href="{{ route('register') }}"
                            class="font-medium tracking-tight text-blue-500 no-underline transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                                Sign up
                        </a>
                    </p>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
