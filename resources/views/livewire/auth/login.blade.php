<x-app-layout title="Sign in to your account">
    <script>
        let token = localStorage.getItem('token');

        if (token != null) {
            window.location.replace("/dashboard");
        }
    </script>
    <div class="tracking-[4.03px] sm:mx-auto text-dark w-full ">
        <script src="{{asset('js/auth/auth.js')}}"></script>
        <div class="bg-white items-center w-[300px] sm:w-[500px] mx-auto rounded-[15px] shadow-2xl">
            <div x-data="$store.login" class="font-normal">
                <div class="tracking-[4.03px] text-dark" x-init="getMessages()">

                    <a href="{{ route('home') }}">
                        <div class="flex justify-center w-20 mx-auto mb-4 md:pt-[50px]">
                            <x-logo />
                        </div>
                        <h2 class="mt-[22px] text-[24px] md:text-[40px] font-semibold tracking-tight text-center block text-black">
                            Login
                        </h2>
                        <h2 class="hidden text-[40px] leading-relaxed text-center md:block text-black tracking-tight leading-[76px]">
                            Debt Repayment
                        </h2>
                              {{-- pesan berhasil register --}}
                              <template x-if="messages != null">
                                <div id="alert-4" class="flex px-7 py-4 m-6 text-yellow-700 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Info</span>
                                    <div class="ml-3 mx-3 tracking-tight text-sm font-medium" x-text="messages">
                                    </div>
                                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-4" aria-label="Close">
                                        <span class="sr-only">Close</span>
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 `0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                </div>
                            </template>

                    </a>
                </div>
                <div class="">
                    <div class="px-4 py-8 sm:rounded-lg sm:px-10">
                            {{-- <div x-init="{error.message ? localStorage.setItem ('messages', error.message)}"></div> --}}
                            {{-- <h1 class="tracking-tight text-black mb-3" x-text=""></h1> --}}



                            <div>
                                <label for="email" class="block text-sm font-medium tracking-tight text-black">
                                    Email
                                </label>

                                <div class="mt-1 rounded-md">
                                    <input x-model="email" type="email" name="email" id="email" required autofocus
                                        class="form-input w-full appearance-none block px-3 py-2 border-0 border-b border-b-2 border-b-black border-b-solid outline-none placeholder:!bg-transparent bg-transparent
                            transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-[#FDC32F] focus:outline-none focus-visible:ring-0  placeholder=" you@example.com" />
                                    <br />
                                    <p class="text-xs tracking-tight text-black" x-text="validation.email"></p>
                                </div>
                            </div>

                            <div class="">
                                <label for="password" class="block text-sm font-medium tracking-tight text-black">
                                    Password
                                </label>

                                <div class="mt-1 rounded-md shadow-sm">
                                    <input x-model="password" type="password" name="password" id="password" required class="appearance-none form-input border-0 border-b border-b-black
                            border-b-solid outline-none w-full placeholder:!bg-transparent bg-transparent block px-3 py-2 transition duration-150 ease-in-out sm:text-sm
                            sm:leading-5 focus:border-[#FDC32F] focus:outline-none focus-visible:ring-0" />
                                    <p class="text-xs tracking-tight text-black" x-text="validation.password"></p>
                                </div>
                            </div>

                            <div class="mt-6">
                                <span class="block w-full rounded-md shadow-sm bg-[#2A7C97]">
                                    <button x-on:click="submited()"
                                        class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md hover:bg-[#FDC32F] hover:text-black focus:outline-none focus:bg-[#2A7C97] focus:text-white focus:ring-indigo active:bg-white">
                                        LOGIN
                                    </button>
                                </span>
                            </div>
                            @if (Route::has('register'))
                            <p class="mt-2 text-[11px] text-center text-black">
                                <a href="{{ route('register') }}"
                                    class=" transition duration-150 ease-in-out font-medium hover:text-indigo-500 focus:outline-none focus:underline tracking-tight underline underline-offset-1">
                                    Belum punya akun? sign up
                                </a>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
