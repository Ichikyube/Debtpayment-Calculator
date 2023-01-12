<script>

</script>
<x-app-layout title="Create a new account">
<div x-data="{
    name: '',
    email:'',
    password: '',
    passwordConfirmation:'',
    validation: [],
    submited(){
        const form = {
            name: this.name,
            email: this.email,
            password: this.password,
            password_confirmation: this.passwordConfirmation,
        }

        fetch('http://127.0.0.1:3000/api/register', {
            method: 'POST',
            body: JSON.stringify(form),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            }
        })
        .then(reponse => reponse.json())
        .then(data => {
            if (data.success == true) {
                console.log(data);
                window.location.replace('http://127.0.0.1:8000/login')
            }
            if (data.success == false) {
                this.validation = data.error;
                console.log(this.validation);
            }
        });
    },
}" class="bg-transparent" >
    <div class="tracking-[4.03px] sm:mx-auto text-dark w-full font-redHatMono">
        <a href="{{ route('home') }}">
            <h2 class="mt-11 mb-4 text-[53px] leading-[70.12px] text-center">
                Debt Repayment
            </h2>
        </a>
        <p class="text-[36px] leading-[47.63px] text-center">Aplikasi Pelunasan Hutang</p>


        <h2 class="mt-6 text-base font-normal leading-9 text-center text-gray-900">
            Create a new account
        </h2>

        <p class="mt-2 text-sm leading-5 text-center text-gray-600 max-w">
            Or
            <a href="{{ route('login') }}" class="font-medium transition duration-150 ease-in-out text-main hover:text-indigo-500 focus:outline-none focus:underline">
                sign in to your account
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8">
            <div>
                <div>
                    <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                        Name
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input x-model="name"  name="name" id="name" type="text" required autofocus class="form-input appearance-none block w-full px-3 py-2 border-0 border-b border-b-slate-400 border-b-solid outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none  sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('name')
                        <p x-text="validation.name" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                        Email address
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input x-model.lazy="email"  name="email" id="email" required class="form-input appearance-none block w-full px-3 py-2 border-0 border-b border-b-slate-400 border-b-solid outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('email')
                        <p x-text="validation.email" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                        Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input x-model="password" type="password" name="password" id="password" required class="form-input appearance-none block w-full px-3 py-2 border-0 border-b border-b-slate-400 border-b-solid outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('password')
                        <p x-text="validation.password" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">
                        Confirm Password
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input x-model="passwordConfirmation" type="password" name="passwordConfirmation" id="passwordConfirmation" required class="form-input appearance-none block w-full px-3 py-2 border-0 border-b border-b-slate-400 border-b-solid outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" />
                    </div>
                    @error('password')
                        <p x-text="validation.password_confirmation" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button x-on:click.prevent="submited()" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-main hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:border-main focus:ring-indigo active:bg-white">
                            Register
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
