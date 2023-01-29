<x-app-layout title="Create a new account" >
    <script>
        let token = localStorage.getItem('token');

        if (token != null) {
            window.location.replace("/dashboard");
        }
    </script>
    {{-- fecth data di file public/js/auth/auth.js --}}
    <script src="{{asset('js/auth/auth.js')}}"></script>

    <div x-data="$store.register" class="bg-white items-center px-5  py-7 sm:w-[500px] mx-auto rounded-[15px] shadow-2xl" >
        <div class="w-full sm:mx-auto text-dark">
            <a href="{{ route('home') }}">
                <div class="flex justify-center w-20 mx-auto mt-5"><x-logo/></div>
                <h2 class=" text-[24px] md:text-[40px] leading-[70.12px] font-semibold text-center text-black tracking-tight">
                    Register
                </h2>
            </a>
        </div>

        <form @submit.prevent="submited()" class="sm:mx-auto sm:w-full sm:max-w-md px-[20px] mt-5">
            <div class="px-4">
                <div>
                    <label for="name" class="block text-sm font-medium leading-5 text-black">
                        Name
                    </label>

                    <div class="mt-1 rounded-md">
                        <input x-model="name"  name="name" id="name" type="text" required autofocus :class="validation.name !== undefined ? 'text-red-900':''" class="form-input appearance-none block w-full px-3 py-2 border-0 border-b border-b-black border-b-solid outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out sm:text-sm  text-black focus:border-[#FDC32F] sm:leading-5 focus:outline-none focus-visible:ring-0" x-bind:class="validation.name != null ? 'border-b-red-600' : ''">
                    </div>
                    <p class="text-xs text-red-500" x-text="validation.name"></p>
                </div>

                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium leading-5 text-black">
                        Email
                    </label>

                    <div class="mt-1 rounded-md">
                        <input x-model="email"  name="email" id="email" required :class="validation.email !== undefined ? 'text-red-900':''" class="form-input appearance-none block w-full px-3 py-2 border-0 border-b border-b-black border-b-solid outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out sm:text-sm sm:leading-5 text-black focus:border-[#FDC32F] focus:outline-none focus-visible:ring-0" x-bind:class="validation.email != null ? 'border-b-red-600' : ''">
                    </div>
                    <p class="text-xs text-red-500" x-text="validation.email"></p>
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium leading-5 text-black">
                        Password
                    </label>

                    <div class="mt-1 rounded-md ">
                        <input x-model="password" type="password" name="password" id="password" required :class="validation.password !== undefined ? 'text-red-900':''" class="form-input appearance-none block w-full px-3 py-2 border-0 border-b border-b-black border-b-solid outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out text-black sm:text-sm sm:leading-5 focus:border-[#FDC32F] focus:outline-none focus-visible:ring-0 @error('password') border-red-300 placeholder-red-300  focus:ring-red @enderror" x-bind:class="validation.password != null ? 'border-b-red-600' : ''">
                    </div>
                    <p class="text-xs text-red-500" x-text="validation.password"></p>
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium leading-5 text-black">
                        Confirm Password
                    </label>

                    <div class="mt-1 rounded-md">
                        <input x-model="passwordConfirmation" id="password_confirmation" type="password" required class="form-input appearance-none block w-full px-3 py-2 border-0 border-b border-b-black border-b-solid outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out sm:text-sm text-black sm:leading-5 focus:border-[#FDC32F] focus:outline-none focus-visible:ring-0" x-bind:class="validation.password_confirmation != null ? 'border-b-red-600' : ''">
                    </div>
                    <p class="text-xs text-red-500" x-text="validation.password_confirmation"></p>
                </div>
                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm bg-[#2A7C97]">
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-[#2A7C97] hover:bg-[#FDC32F] hover:text-black focus:outline-none focus:border-main focus:ring-indigo active:bg-white">
                            Register
                        </button>
                    </span>
                </div>
                <p class="mt-2 text-sm leading-5 tracking-tight text-center text-gray-600 max-w">
                    Already own account? <a href="{{ route('login') }}" class="font-medium text-blue-500 no-underline transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                         Sign in
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-app-layout>
