<script>

</script>

<x-app-layout title="Sign in to your account">
<div x-data="{
    email: '',
    password: '',
    error: [],
    validation: [],
    status: '',
    async getData() {
        await fetch('http://127.0.0.1:3000/api/me', {
            method: 'GET',
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
                Authorization: `Bearer ${localStorage.getItem('token')}`
            }
        })
        .then(response => response.json())
        .then(data => {
            localStorage.setItem('user', data.data);
        })
    },
    async submited() {
        var data = {
            email: this.email,
            password: this.password,
        };
        await fetch('http://127.0.0.1:3000/api/login', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            }
        })
        .then(response => response.json())
        .then(async data => {
            this.status = data.success;
            // response success == false (gagal Login)
            if (this.status == false) {
                this.error = data;
                this.validation = data.error;
            }
            // response seccess = true (Login Berhasil)
            if (this.status == true) {
                localStorage.setItem('token', data.access_token)
                this.getData();
                window.location.replace('http://127.0.0.1:8000/dashboard')
            }
        })
    },
}" class="font-normal font-redHatMono">
    <div class="tracking-[4.03px] sm:mx-auto text-dark w-full">

        <a href="{{ route('home') }}">
            <div class="flex justify-center mx-auto mt-20 mb-4"><x-logo/></div>
            <h2 class="mt-[22px] text-[53px] leading-[70.12px] text-center font-redHatMono">
                Debt Repayment
            </h2>
        </a>
        <p class="text-[36px] leading-[47.63px] text-center">Aplikasi Pelunasan Hutang</p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="authenticate">
                <h1 x-text="error.message"></h1>
                <div>
                    <label for="email" class="block text-sm font-medium leading-5 text-slate-500">
                        Email address
                    </label>

                    <div class="mt-1 rounded-md">
                        <input x-model.lazy="email" type="email" name="email" id="email" required autofocus
                        class="form-input appearance-none block w-full px-3 py-2 border-0 border-b border-b-slate-400 border-b-solid outline-none placeholder:!bg-transparent bg-transparent
                    transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0 @error('email') border-red-300
                          text-red-900  focus:border-red-300 focus:ring-red @enderror" placeholder="you@example.com" />
                          <br/>
                    </div>

                    @error('email')
                        <p x-text="validation.email" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium leading-5 text-slate-500">
                        Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input x-model="password" type="password" name="password" id="password" required class="appearance-none form-input border-0 border-b border-b-slate-400
                        border-b-solid outline-none placeholder:!bg-transparent bg-transparent block w-full px-3 py-2 transition duration-150 ease-in-out sm:text-sm
                        sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0 @error('password') border-red-300 text-red-900 placeholder-red-300
                         focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('password')
                        <p x-text="validation.password" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input wire:model.lazy="remember" id="remember" type="checkbox" class="w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-checkbox" />
                        <label for="remember" class="block ml-2 text-sm leading-5 text-gray-900">
                            Remember
                        </label>
                    </div>

                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm bg-main">
                        <button  x-on:click.prevent="submited()" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:border-gray-700 focus:ring-indigo active:bg-white">
                            ENTER
                        </button>
                    </span>
                </div>
                @if (Route::has('register'))
                    <p class="mt-2 text-sm leading-5 text-center text-gray-600 max-w">
                        Or
                        <a href="{{ route('register') }}" class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                            create a new account
                        </a>
                    </p>
                @endif
            </form>
        </div>
    </div>
</div>

</x-app-layout>
