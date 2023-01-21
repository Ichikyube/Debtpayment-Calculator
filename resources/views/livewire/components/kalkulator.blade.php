<div x-data="$store.create">
    <h1 class="my-4 ml-8 text-3xl font-bold lg:my-0 lg:mb-8">Kalkulator Hutang</h1>
    <template x-if="calculated">
        @livewire('components.hasil-hitungan')
    </template>

    <div x-show="!calculated" class="relative flex flex-col md:flex-row lg:flex-row justify-evenly stretch">
        <div class="flex flex-col items-center lg:w-1/2 overflow-y-scroll overflow-x-hidden order-last md:order-first lg:order-first h-[450px] touch-auto hilanginscroll">
            <!-- Form Kalkulator -->
            <div class="bg-[#F7D3C2] mx-4 mb-8 w-11/12 lg:w-full lg:max-w-full rounded-md lg:rounded-[15px]
                shadow-sm hover:shadow-xl transition-shadow duration-300 ease-in-out">
                <div class="flex flex-row px-5 py-5 align-middle border-b-2">
                    <h6 class="ml-5 text-xl font-bold text-blueGray-700">Hutang 1</h6>
                </div>
                <div class="flex flex-row items-center px-3 py-4 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img class="invert" src="{{asset('img/1.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="relative flex items-center justify-between w-full"><p class="text-base text-dark">Nama Hutang</p>
                        <input class="namaHutang form-input w-full absolute appearance-none inline border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition
                        duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="text" placeholder="KPR">
                    </div>
                </div>
                <div class="flex flex-row items-center px-3 py-4 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img class="invert" src="{{asset('img/moneys.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="relative flex items-center justify-between w-full">
                        <p class="text-base text-dark">Jumlah Hutang <span class="text-xs text-gray-400">($)</span></p>
                        <input class="jmlHutang form-input w-full absolute appearance-none inline border-0 outline-none
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                        focus:border-none focus:outline-none text-right focus-visible:ring-0" type="number" min="0" max="" step="100" placeholder="500000">
                    </div>
                </div>

                <div class="flex flex-row items-center px-3 py-4 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img class="invert" src="{{asset('img/moneytime.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="relative flex items-center justify-between w-full">
                        <p class="text-base text-dark">Suku Bunga Hutang <span class="text-xs text-gray-400">(%)</span></p>
                        <input class="bungaHutang absolute w-full form-input appearance-none block px-3 border-0 text-right outline-none
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                        sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" max="100" placeholder="15">
                    </div>
                </div>

                <div class="flex flex-row items-center px-3 py-4">
                    <div class="flex justify-center w-12 mr-2">
                        <img class="invert" src="{{asset('img/moneysend.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="relative flex items-center justify-between w-full group">
                        <p class="text-base text-dark">Pembayaran minimum perbulan <span class="text-xs text-gray-400">($)</span></p>
                        <input name="minBayar" id="minBayar" class="minBayar absolute w-full form-input appearance-none block px-3 border-0 text-right outline-none
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                        sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="10" step="100" placeholder="500">
                    </div>
                </div>
            </div>
            <!-- Looping Tambahan Form Hutang -->
            <template x-for="post in posts">
                <livewire:debt-calc/>
            </template>
        </div>
        <div class="flex flex-col lg:items-end items-center order-first mb-2 align-middle md:order-last lg:order-last lg:w-1/2">
            <div class="bg-[#F7D3C2] w-11/12 h-fit md:ml-4 lg:ml-4 rounded-md lg:rounded-[15px] shadow-sm hover:shadow-md transition-shadow duration-300 ease-in-out">
                <div class="flex flex-row px-5 py-5 align-middle border-b-2">
                    <h6 class="ml-5 text-xl font-bold text-blueGray-700">Tambahan</h6>
                </div>
                <div class="flex items-center justify-between px-3 py-4 text-center border-b-2">
                    <div class="flex justify-center w-6 mr-2">
                        <img class="invert" src="{{asset('img/1.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="relative flex justify-between w-full">
                        <p class="text-base text-dark">Pendapatan perbulan <span class="text-xs text-gray-400">($)</span></p>
                        <input x-model="mountlySalary" class="form-input appearance-none block px-3 border-0 text-right outline-none w-full
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm absolute
                        sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" step="100" placeholder="5000">
                    </div>
                </div>

                <div class="flex items-center justify-between px-3 py-4">
                    <div class="flex justify-center w-6 mr-2">
                        <img class="invert" src="{{asset('img/1.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="relative flex items-center justify-between w-full">
                        <p class="text-base text-dark">Pembayaran Extra Perbulan <span class="text-xs text-gray-400">($)</span></p>
                        <input x-model="extraSalary" class="form-input absolute appearance-none block px-3 border-0 text-right outline-none w-full
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                        sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" step="100" placeholder="1000">

                    </div>
                </div>
            </div>
            <div x-show="!calculated" class="flex items-center justify-between w-11/12 ml-4 text-center lg:mt-10 md:justify-between lg:justify-evenly">
                <button type="button" x-on:click.lazy="posts++" class="text-sm md:py-4 lg:py-4 px-7 w-36 lg:w-auto
                bg-white text-red-500 font-bold rounded-[15px] drop-shadow-lg cursor-pointer select-none
                active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
                active:border-b-[0px] transition-all duration-150 mr-4 md:mr-6 lg:mr-11
                [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]  after:w-6 after:h-6 after:bg-red-500
                after:text-white  after:font-cursive after:font-extrabold after:absolute after:-right-3
                after:-scale-x-100 after:rounded-full after:content-['+'] after:align-middle after:text-center">
                    Tambahkan Hutang
                </button>
                <button x-on:click="hitung()" class="px-5 text-white shadow drop-shadow-lg cursor-pointer
                select-none active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7] active:border-b-[0px] rounded-xl
                [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7] bg-myblue py-2 md:h-14 lg:h-14 lg:w-44 transition-all duration-150">Calculate</button>
            </div>
        </div>

    </div>
</div>
