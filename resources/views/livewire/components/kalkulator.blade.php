<div x-data="$store.create">
    <!-- Button to show form komentar -->
    <button type="button" x-on:click="coba = 'dashboard', localStorage.setItem('coba', 'dashboard')" class="pl-1 text-4xl text-white"><i class="fa-solid fa-qrcode"></i></button>

    <!-- Card Konten Dashboard -->
    <template x-if="coba == 'dashboard'">
    <div class="overflow-scroll hilanginscroll absolute bg-white shadow bottom-5 left-28 w-[97%] h-[90%] rounded-xl p-10">
        <h1 class="ml-8 text-3xl font-bold">Kalkulator Hutang</h1>
        <br>
        <div x-show="calculated == false">
            @livewire('components.hasil-hitungan')
        </div>

        <div x-show="calculated" class="flex flex-row gap-5 overflow-x-scroll scroll-auto touch-auto overscroll-x-contain flex-nowrap hilanginscroll" id="hilanginscroll">

            <!-- Form Kalkulator -->
            <div>
                <div class="bg-[#F7D3C2] w-[600px] rounded-[30px] drop-shadow-md">
                    <div class="flex flex-row px-5 py-5 align-middle border-b-2">
                        <h6 class="ml-5 text-xl font-bold text-blueGray-700">Hutang 1</h6>
                    </div>

                    <div class="flex flex-row items-center px-3 py-2 border-b-2">
                        <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                        </div>
                        <div class="flex items-center justify-between w-full">
                            <p class="text-base text-gray-400" class="text-base text-gray-400">Nama Hutang</p>
                            <input class="namaHutang form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="text" placeholder="Hutang KPR">
                            <p x-text="validation.debtTitle"></p>
                        </div>
                    </div>

                    <div class="flex flex-row items-center px-3 py-2 border-b-2">
                        <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/moneys.svg')}}" alt="" class="h-5">
                        </div>
                        <div class="flex items-center justify-between w-full">
                            <p class="text-base text-gray-400">Jumlah Hutang</p>
                            <input class="jmlHutang form-input appearance-none block px-3 border-0 text-right outline-none
                            placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                            focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="500000">
                            <p x-text="validation.debtAmount"></p>
                        </div>
                    </div>

                    <div class="flex flex-row items-center px-3 py-2 border-b-2">
                        <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/moneytime.svg')}}" alt="" class="h-5">
                        </div>
                        <div class="flex items-center justify-between w-full">
                            <p class="text-base text-gray-400">Suku Bunga Hutang</p>
                            <input class="bungaHutang form-input appearance-none block px-3 border-0 text-right outline-none
                            placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                            sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="15%">
                            <p x-text="validation.debtInterest"></p>
                        </div>
                    </div>

                    <div class="flex flex-row items-center px-3 py-2 border-b-2">
                        <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/moneysend.svg')}}" alt="" class="h-5">
                        </div>
                        <div class="flex items-center justify-between w-full">
                            <p class="text-base text-gray-400">Pembayaran minimum perbulan</p>
                            <input class="minBayar form-input appearance-none block px-3 border-0 text-right outline-none
                            placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                            sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="500">
                            <p x-text="validation.monthlyInstallments"></p>
                        </div>
                    </div>

                    <div class="flex flex-row items-center px-3 py-2 border-b-2">
                        <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                        </div>
                        <div class="flex items-center justify-between w-full">
                            <p class="text-base text-gray-400">Pendapatan perbulan</p>
                            <input x-model="mountlySalary" class="form-input appearance-none block px-3 border-0 text-right outline-none
                            placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                            sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="5000">
                            <p x-text="validation.mountlySalary"></p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between px-3 py-2 text-center">
                        <button type="button" x-on:click="posts++" class="text-sm py-4 px-7 ml-4
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
            </div>

            <!-- Looping Tambahan Form Hutang -->
            <template x-for="post in posts">
                <div x-html="html"></div>
            </template>

        </div>
        <div x-show="calculated" class="flex justify-end ">
            <button x-on:click="tambahData" class="px-5 text-white right-10 bottom-10 bg-myblue h-14 w-44 rounded-xl">Calculate</button>
        </div>

    <script>
        const scrollContainer = document.getElementById("hilanginscroll");

        scrollContainer.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            scrollContainer.scrollLeft += evt.deltaY;
        });

    </script>

    </div>
    </template>
</div>
