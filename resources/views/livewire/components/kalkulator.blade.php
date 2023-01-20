<div x-data="$store.create">
    <div class="flex items-center justify-between mb-2 align-middle">
        <h1 class="my-4 ml-8 text-3xl font-bold lg:my-0 lg:mb-4">Kalkulator Hutang</h1>
        <div x-show="!calculated" class="flex items-center px-3 pb-2 text-center justify-evenly">
            <button type="button" x-on:click.lazy="posts++" class="text-sm py-4 px-7 ml-4
            bg-white text-red-500 font-bold rounded-[30px] drop-shadow-lg cursor-pointer select-none
            active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
            active:border-b-[0px] transition-all duration-150 mr-11
            [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]  after:w-6 after:h-6 after:bg-red-500
            after:text-white  after:font-cursive after:font-extrabold after:absolute after:-right-3
            after:-scale-x-100  after:rounded-full after:content-['+'] after:align-middle after:text-center">
                Tambahkan Hutang
            </button>
            <button x-on:click="hitung()" class="self-end px-5 text-white shadow drop-shadow-lg cursor-pointer
            select-none active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7] active:border-b-[0px] rounded-xl
            [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7] bg-myblue h-14 lg:w-44 transition-all duration-150">Calculate</button>

        </div>
    </div>

    <template x-if="calculated">
        @livewire('components.hasil-hitungan')
    </template>


    <div x-show="!calculated" class="flex justify-between">
        <div class="flex flex-col overflow-y-scroll scroll-auto touch-auto hilanginscroll flex-nowrap" id="scrollhorizontal">
            <!-- Form Kalkulator -->
            <div class="bg-[#F7D3C2] lg:w-5/6 mb-11 max-w-[63vh] lg:max-w-full overflow-y-scroll lg:overflow-y-visible hilanginscroll rounded-md w-11/12 lg:rounded-[30px]
                shadow-sm hover:shadow-xl transition-shadow duration-300 ease-in-out">
                <div class="flex flex-row px-5 py-5 align-middle border-b-2">
                    <h6 class="ml-5 text-xl font-bold text-blueGray-700">Hutang 1</h6>
                </div>
                <div class="flex flex-row items-center px-3 py-2 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="flex items-center justify-between w-full"><p class="text-base text-gray-400">Nama Hutang</p>
                        <input class="namaHutang form-input appearance-none block px-3 border-0 text-right pr-6 outline-none placeholder:!bg-transparent bg-transparent transition
                        duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="text" placeholder="KPR">
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
                        focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" max="" step="100" placeholder="500000">
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
                        sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" max="100" placeholder="15%">
                    </div>
                </div>

                <div class="flex flex-row items-center px-3 py-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img src="{{asset('img/moneysend.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <p class="text-base text-gray-400">Pembayaran minimum perbulan</p>
                        <input class="minBayar form-input appearance-none block px-3 border-0 text-right outline-none
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                        sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="10" step="100" placeholder="500">
                    </div>
                </div>
            </div>
            <!-- Looping Tambahan Form Hutang -->
            <template x-for="post in posts">
                <div x-html="html"></div>
            </template>
        </div>
        <div class="bg-[#F7D3C2] h-fit rounded-md lg:rounded-[30px] shadow-sm hover:shadow-md transition-shadow duration-300 ease-in-out">
            <div class="flex items-center justify-between px-3 py-2 text-center">
                <div class="flex justify-center w-12 mr-2">
                    <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                </div>
                <div class="flex items-center justify-between w-full">
                    <p class="text-base text-gray-400">Pendapatan perbulan</p>
                    <input x-model="mountlySalary" class="form-input appearance-none block px-3 border-0 text-right outline-none
                    placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                    sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" step="100" placeholder="5000">
                </div>
            </div>

            <div class="flex items-center justify-between px-3 py-3">
                <div class="flex justify-center w-12 mr-2">
                    <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                </div>
                <div class="flex items-center justify-between w-full">
                    <p class="text-base text-gray-400">Pembayaran Extra Perbulan</p>
                    <input x-model="extraSalary" class="form-input appearance-none block px-3 border-0 text-right outline-none
                    placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                    sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" step="100" placeholder="1000">

                </div>
            </div>
        </div>
    </div>
    <script>
        const scrollContainer = document.getElementById("scrollhorizontal");

        scrollContainer.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            scrollContainer.scrollLeft += evt.deltaY;
        });
    </script>
</div>
