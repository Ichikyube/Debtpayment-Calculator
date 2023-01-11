<div x-data="{posts: []}">
    <!-- Button to show form komentar -->
    <button type="button" x-on:click="coba = 'dashboard', localStorage.setItem('coba', 'dashboard')" class="pl-1 text-4xl text-white"><i class="fa-solid fa-qrcode"></i></button>


    <!-- Card Konten Dashboard -->
    <div x-show="coba == 'dashboard'" id="hilanginscroll" class="absolute bg-white shadow bottom-5 left-28 w-[97%] h-[90%] rounded-xl p-10 overflow-x-scroll">
        <h1 class="font-bold text-3xl ml-8">Kalkulator Hutang</h1>
        <br>
        <div class="flex flex-row flex-nowrap">
            <div class="bg-[#F7D3C2] rounded-[30px] drop-shadow-md">
                <div class="flex flex-row align-middle border-b-2 px-5 py-5">
                    <h6 class="text-xl font-bold text-blueGray-700">Mulai dengan mengurutkan hutang Anda.</h6>
                </div>

                <div class="flex flex-row align-middle border-b-2"><div class="flex justify-center w-12 mr-2"><img src="{{asset('img/1.svg')}}" alt=""></div>
                    <div class="flex justify-between w-full"><p class="text-base text-gray-400" class="text-base text-gray-400">Tipe Hutang</p>
                        <livewire:dropdown-select>
                    </div>
                </div>

                <div class="flex flex-row align-middle">
                    <div class="flex justify-center w-12 mr-2">
                        <img src="{{asset('img/moneys.svg')}}" alt="">
                    </div>
                    <div class="flex justify-between w-full">
                        <p class="text-base text-gray-400">Jumlah Hutang</p>
                        <input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="text" placeholder="500000">
                    </div>
                </div>
                <hr class="mb-6 border-b-1 border-blueGray-300">

                <div class="flex flex-row align-middle">
                    <div class="flex justify-center w-12 mr-2">
                        <img src="{{asset('img/moneytime.svg')}}" alt="">
                    </div>
                    <div class="flex justify-between w-full">
                        <p class="text-base text-gray-400">Suku Bunga Hutang</p>
                        <input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="text" placeholder="15%">
                    </div>
                </div>
                <hr class="mb-6 border-b-1 border-blueGray-300">

                <div class="flex flex-row align-middle">
                    <div class="flex justify-center w-12 mr-2">
                        <img src="{{asset('img/moneysend.svg')}}" alt="">
                    </div>
                    <div class="flex justify-between w-full">
                        <p class="text-base text-gray-400">Pembayaran minimum perbulan</p>
                        <input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="text" placeholder="500">
                    </div>
                </div>
                <hr class="mb-6 border-b-1 border-blueGray-300">

                <div class="flex flex-row align-middle">
                    <div class="flex justify-center w-12 mr-2">
                        <img src="{{asset('img/1.svg')}}" alt="">
                    </div>
                    <div class="flex justify-between w-full">
                        <p class="text-base text-gray-400">Pendapatan perbulan</p>
                        <input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="text" placeholder="5000">
                    </div>
                </div>
                <hr class="mb-6 border-b-1 border-blueGray-300">

                <div class="flex justify-between text-center">
                    <button @click="posts.push(1)" class="button text-sm py-4 px-7 ml-4
                    bg-white text-red-500 font-bold rounded-[30px] drop-shadow-lg cursor-pointer select-none
                    active:translate-y-1  active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
                    active:border-b-[0px] transition-all duration-150
                    [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]  after:w-6 after:h-6 after:bg-red-500
                    after:text-white  after:font-cursive after:font-extrabold after:absolute after:-right-3
                    after:-scale-x-100  after:rounded-full after:content-['+'] after:align-middle after:text-center">
                        Tambahkan Hutang
                    </button>
                </div>
            </div>

            <!-- Looping Tambahan Form Hutang -->
            <template x-for="post in posts">
                <livewire:debt-calc>
            </template>
        </div>
    </div>

    <script>
        document.onscroll = () => {
            // adjust for the difference between window height and width
            let percentScrolled = window.pageYOffset / window.innerHeight;
            let toScroll = percentScrolled * window.innerWidth;
            // scroll horizontally
            document.getElementById("hilanginscroll").style.left = "-" + toScroll + "px";
        }
    </script>
</div>
