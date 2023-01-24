<x-app-layout title="Sign in to your account">
    <script>
        let token = localStorage.getItem('token');

        if (token != null) {
            window.location.replace("/dashboard");
        }
    </script>
    <div class="tracking-[4.03px] sm:mx-auto text-dark w-full ">
        <script src="{{asset('js/auth/auth.js')}}"></script>
        <div class="bg-white items-center w-[300px] sm:w-[400px] mx-auto rounded-[15px] shadow-2xl">
            <div x-data="$store.login" class="font-normal">
                <div class="tracking-[4.03px] text-dark">
                    <a href="{{ route('home') }}">
                        <div class="flex justify-center w-20 mx-auto mb-4 md:pt-[50px]">
                            <x-logo />
                        </div>
                        <h2 class="mt-[22px] text-[24px] md:text-[40px] tracking-tight text-center block text-black">
                            Login
                        </h2>
                        <h2 class="hidden text-[40px] leading-relaxed text-center md:block text-black tracking-tight leading-[76px]">
                            Debt Repayment
                        </h2>
                    </a>
                </div>
                <div class="">
                    <div class="px-4 py-8 sm:rounded-lg sm:px-10">
                        <div>
                            <h1 class="tracking-tight text-black mb-3" x-text="error.message"></h1>
                            <div>
                                <label for="email" class="block text-sm font-medium tracking-tight text-black">
                                    Email
                                </label>

                                <div class="mt-1 rounded-md">
                                    <input x-model="email" type="email" name="email" id="email" required autofocus
                                        class="form-input w-full appearance-none block px-3 py-2 border-0 border-b border-b-2 border-b-white border-b-solid outline-none placeholder:!bg-transparent bg-transparent
                            transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-black focus:outline-none focus-visible:ring-0  placeholder=" you@example.com" />
                                    <br />
                                    <p class="text-xs tracking-tight text-black" x-text="validation.email"></p>
                                </div>
                            </div>

                            <div class="">
                                <label for="password" class="block text-sm font-medium tracking-tight text-black">
                                    Password
                                </label>

                                <div class="mt-1 rounded-md shadow-sm">
                                    <input x-model="password" type="password" name="password" id="password" required class="appearance-none form-input border-0 border-b border-b-white
                            border-b-solid outline-none w-full placeholder:!bg-transparent bg-transparent block px-3 py-2 transition duration-150 ease-in-out sm:text-sm
                            sm:leading-5 focus:border-black focus:outline-none focus-visible:ring-0" />
                                    <p class="text-xs tracking-tight text-black" x-text="validation.password"></p>
                                </div>
                            </div>

                            <div class="mt-6">
                                <span class="block w-full rounded-md shadow-sm bg-[#2A7C97]">
                                    <button x-on:click="submited()"
                                        class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md hover:bg-main hover:text-gray-700 focus:outline-none focus:bg-[#2A7C97] focus:text-white focus:ring-indigo active:bg-white">
                                        LOGIN
                                    </button>
                                </span>
                            </div>
                            @if (Route::has('register'))
                            <p class="mt-2 text-[11px] text-center text-black">
                                <a href="{{ route('register') }}"
                                    class=" transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline tracking-tight underline underline-offset-1">
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
