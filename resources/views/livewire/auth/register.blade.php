<x-app-layout title="Create a new account">

    {{-- fecth data di file public/js/auth/auth.js --}}
    <script src="{{asset('js/auth/auth.js')}}"></script>

    <div x-data="$store.register" class="bg-transparent" >
        <div class="tracking-[4.03px] sm:mx-auto text-dark w-full">
            <a href="{{ route('home') }}">
                <div class="flex justify-center mx-auto mt-20 mb-4"><x-logo/></div>
                <h2 class="mt-11 mb-4 text-[24px] md:text-[53px] leading-[70.12px] text-center text-white">
                    Register
                </h2>
                <h2 class="mt-11 mb-4 text-[53px] leading-[70.12px] text-center text-white hidden md:block">
                    Debt Repayment
                </h2>
            </a>


            
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-4 md:py-8">
                <p x-text="messages"></p>
                <div>
                    <label for="name" class="block text-sm font-medium leading-5 text-white">
                        Name
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input x-model="name"  name="name" id="name" type="text" required autofocus :class="validation.name !== undefined ? 'text-red-900':''" class="form-input appearance-none block w-full px-3 py-2 border-0 border-b border-b-slate-400 border-b-solid outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none  sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0 text-white"/>
                    </div>
                    <p class="text-xs" x-text="validation.name"></p>
                </div>

                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium leading-5 text-white">
                        Email address
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input x-model="email"  name="email" id="email" required :class="validation.email !== undefined ? 'text-red-900':''" class="form-input appearance-none text-white block w-full px-3 py-2 border-0 border-b border-b-slate-400 border-b-solid outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0"/>
                    </div>
                    <p class="text-xs" x-text="validation.email"></p>
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium leading-5 text-white">
                        Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input x-model="password" type="password" name="password" id="password" required :class="validation.password !== undefined ? 'text-red-900':''" class="form-input appearance-none block w-full px-3 py-2 border-0 border-b border-b-slate-400 border-b-solid outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out sm:text-sm sm:leading-5 text-white focus:border-none focus:outline-none focus-visible:ring-0 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>
                    <p class="text-xs" x-text="validation.password"></p>
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium leading-5 text-white">
                        Confirm Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input x-model="passwordConfirmation" id="password_confirmation" type="password" required class="form-input appearance-none block w-full px-3 py-2 border-0 border-b border-b-slate-400 border-b-solid outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-none text-white focus:outline-none focus-visible:ring-0" />
                    </div>
                    <p class="text-xs" x-text="validation.password_confirmation"></p>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button x-on:click="submited()" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-black transition duration-150 ease-in-out border border-transparent rounded-md bg-main hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:border-main focus:ring-indigo active:bg-white">
                            Register
                        </button>
                    </span>
                </div>
                <h2 class="mt-6 text-base font-normal leading-9 text-center text-white">
                    Create a new account
                </h2>
    
                <p class="mt-2 text-sm leading-5 text-center text-gray-600 max-w">
                    Or
                    <a href="{{ route('login') }}" class="font-medium transition duration-150 ease-in-out text-white hover:text-indigo-500 focus:outline-none focus:underline">
                        sign in to your account
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
