<div x-data="$store.getData">
    <h1 class="my-4 ml-8 text-3xl font-bold lg:my-0 lg:mb-4">Edit Hitungan Hutang</h1>
    <diiv x-show="!calculated">
        @livewire('components.hasil-edit')
    </diiv>

    <div x-show="calculated">
        <div class="flex flex-row gap-5 overflow-x-scroll scroll-auto touch-auto overscroll-x-contain hilanginscroll flex-nowrap" id="scrollhorizontal">
            <!-- Form Kalkulator -->
            <div>
                <div class="bg-[#F7D3C2] lg:w-[600px] w-11/12 rounded-none lg:rounded-[30px] drop-shadow-md">
                    <div class="flex flex-row px-5 py-5 align-middle border-b-2">
                        <h6 class="ml-5 text-xl font-bold text-blueGray-700">Hutang <span>1</span></h6>
                    </div>
                    <div class="flex flex-row items-center px-3 py-2 border-b-2">
                        <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                        </div>
                        <div class="flex items-center justify-between w-full"><p class="text-base text-gray-400">Nama Hutang</p>
                            <p x-text="validation.debtTitle"></p>
                            <input class="namaHutang form-input appearance-none block px-3 border-0 text-right pr-6 outline-none placeholder:!bg-transparent bg-transparent transition
                            duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="text" placeholder="KPR" x-bind:value="ambilData.detail[0].debtTitle">
                        </div>
                    </div>
                    <div class="flex flex-row items-center px-3 py-2 border-b-2">
                        <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/moneys.svg')}}" alt="" class="h-5">
                        </div>
                        <div class="flex items-center justify-between w-full">
                            <p class="text-base text-gray-400">Jumlah Hutang</p>
                            <p x-text="validation.debtAmount"></p>
                            <input class="jmlHutang form-input appearance-none block px-3 border-0 text-right outline-none
                            placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                            focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" max="" step="100" placeholder="500000" x-bind:value="ambilData.detail[0].debtAmount">
                        </div>
                    </div>

                    <div class="flex flex-row items-center px-3 py-2 border-b-2">
                        <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/moneytime.svg')}}" alt="" class="h-5">
                        </div>
                        <div class="flex items-center justify-between w-full">
                            <p class="text-base text-gray-400">Suku Bunga Hutang</p>
                            <p x-text="validation.debtInterest"></p>
                            <input class="bungaHutang form-input appearance-none block px-3 border-0 text-right outline-none
                            placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                            sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" max="100" placeholder="15%" x-bind:value="ambilData.detail[0].debtInterest">
                        </div>
                    </div>

                    <div class="flex flex-row items-center px-3 py-2 border-b-2">
                        <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/moneysend.svg')}}" alt="" class="h-5">
                        </div>
                        <div class="flex items-center justify-between w-full">
                            <p class="text-base text-gray-400">Pembayaran minimum perbulan</p>
                            <p x-text="validation.monthlyInstallments"></p>
                            <input class="minBayar form-input appearance-none block px-3 border-0 text-right outline-none
                            placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                            sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="10" step="100" placeholder="500" x-bind:value="ambilData.detail[0].monthlyInstallments">
                        </div>
                    </div>

                    <div class="flex items-center justify-between px-3 py-2 text-center border-b-2">
                        <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                        </div>
                        <div class="flex items-center justify-between w-full">
                            <p class="text-base text-gray-400">Pendapatan perbulan</p>
                            <p x-text="validation.mountlySalary"></p>
                            <input x-model="mountlySalary" class="form-input appearance-none block px-3 border-0 text-right outline-none
                            placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                            sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" step="100" placeholder="5000" x-bind:value="ambilData.mountlySalary">
                        </div>
                    </div>

                    <div class="flex items-center justify-between px-3 py-3">
                        <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                        </div>
                        <div class="flex items-center justify-between w-full">
                            <p class="text-base text-gray-400">Pembayaran Extra Perbulan</p>
                            <p x-text="validation.extraSalary"></p>
                            <input x-model="extraSalary" class="form-input appearance-none block px-3 border-0 text-right outline-none
                            placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                            sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" step="100" placeholder="1000" x-bind:value="ambilData.extraSalary">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Looping Tambahan Form Hutang -->
            <template x-for="index in posts-1">
                <div x-html="html"></div>
            </template>
        </div>
</div>

    <div x-show="calculated" class="z-50 flex items-center justify-between px-3 py-2 text-center bottom-10">
        <button type="button" x-on:click.lazy="posts++" class="text-sm py-4 px-7 ml-4
        bg-white text-red-500 font-bold rounded-[30px] drop-shadow-lg cursor-pointer select-none
        active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
        active:border-b-[0px] transition-all duration-150
        [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]  after:w-6 after:h-6 after:bg-red-500
        after:text-white  after:font-cursive after:font-extrabold after:absolute after:-right-3
        after:-scale-x-100  after:rounded-full after:content-['+'] after:align-middle after:text-center">
            Tambahkan Hutang
        </button>
        <button  x-on:click="hitungedit(ambilData.id)" class=" self-end px-5 text-white shadow drop-shadow-lg cursor-pointer
        select-none active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7] active:border-b-[0px] rounded-xl
        [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7] bg-myblue h-14 lg:w-44 transition-all duration-150">Calculate</button>

    </div>

    <script>
        const scrollContainer = document.getElementById("scrollhorizontal");

        scrollContainer.addEventListener("wheel", (evt) => {
            event.preventDefault();

            element.scrollBy({
                left: event.deltaY < 0 ? -30 : 30,
                
            });
        });
    </script>
</div>