<x-app-layout title="Sign in to your account">
    <script>
        let token = localStorage.getItem('token');

        if (token != null) {
            window.location.replace("/dashboard");
        }
    </script>
    <div class="tracking-[4.03px] sm:mx-auto text-dark w-full">
        <script src="{{asset('js/auth/auth.js')}}"></script>
        <div x-data="$store.login" class="font-normal">
            <div class="tracking-[4.03px] sm:mx-auto text-dark w-full">
                <a href="{{ route('home') }}">
                    <div class="flex justify-center w-20 mx-auto mb-4">
                        <x-logo />
                    </div>
                    <h2 class="mt-[22px] text-[24px] md:text-[53px] leading-relaxed text-center text-white block">
                        Login
                    </h2>
                    <h2 class="hidden text-5xl leading-relaxed text-center text-white md:block">
                        Debt Repayment
                    </h2>
                </a>
            </div>
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <div class="px-4 py-8 sm:rounded-lg sm:px-10">
                    <div>
                        <h1 x-text="error.message"></h1>
                        <div>
                            <label for="email" class="block text-sm font-medium leading-5 text-white">
                                Email address
                            </label>

                            <div class="mt-1 rounded-md">
                                <input x-model="email" type="email" name="email" id="email" required autofocus
                                    class="form-input text-white appearance-none block w-full px-3 py-2 border-0 border-b border-b-2 border-b-white border-b-solid outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-black focus:outline-none focus-visible:ring-0  placeholder=" you@example.com" />
                                <br />
                                <p class="" x-text="validation.email"></p>
                            </div>
                        </div>

                        <div class="">
                            <label for="password" class="block text-sm font-medium leading-5 text-white">
                                Password
                            </label>

                            <div class="mt-1 rounded-md shadow-sm">
                                <input x-model="password" type="password" name="password" id="password" required class="appearance-none text-white form-input border-0 border-b border-b-white
                        border-b-solid outline-none placeholder:!bg-transparent bg-transparent block w-full px-3 py-2 transition duration-150 ease-in-out sm:text-sm
                        sm:leading-5 focus:border-black focus:outline-none focus-visible:ring-0" />
                                <p x-text="validation.password"></p>
                            </div>
                        </div>

                        <div class="mt-6">
                            <span class="block w-full rounded-md shadow-sm bg-main">
                                <button x-on:click="submited()"
                                    class="flex justify-center w-full px-4 py-2 text-sm font-medium text-black transition duration-150 ease-in-out border border-transparent rounded-md hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:border-gray-700 focus:ring-indigo active:bg-white">
                                    LOGIN
                                </button>
                            </span>
                        </div>
                        @if (Route::has('register'))
                        <p class="mt-2 text-sm leading-5 text-center text-gray-600 max-w">
                            Or
                            <a href="{{ route('register') }}"
                                class="font-medium text-white transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                                create a new account
                            </a>
                        </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
