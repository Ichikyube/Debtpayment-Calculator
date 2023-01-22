<div x-data="$store.create">
    <h1 class="my-4 ml-8 text-3xl font-bold lg:my-0 lg:mb-8">Kalkulator Hutang</h1>
    <template x-if="calculated">
        @livewire('components.hasil-hitungan')
    </template>

    <div x-show="!calculated" class="relative flex flex-col md:flex-row lg:flex-row justify-evenly stretch" x-data="{namaHutang:'', jmlHutang:'', bungaHutang:'', minBayar:'', mountlySalary:''}">
        <div class="flex snap-y snap-mandatory flex-col items-center px-4 lg:w-1/2 overflow-y-scroll scroll-smooth rounded-xl overflow-x-hidden order-last md:order-first lg:order-first h-[450px] touch-auto hilanginscroll">
            <!-- Form Kalkulator -->
            <div class="bg-[#F7D3C2] snap-start snap-always mx-4 mb-8 w-11/12 lg:w-full lg:max-w-full rounded-md lg:rounded-[15px]
                shadow-sm hover:shadow-xl transition-shadow duration-300 ease-in-out">
                <div class="flex flex-row px-5 py-5 align-middle border-b-2">
                    <h6 class="ml-5 text-xl font-bold text-blueGray-700">Hutang 1</h6>
                </div>
                <div class="flex flex-row items-center justify-between px-3 py-4 border-b-2">
                    <div class="flex flex-row items-center">
                        <div class="flex justify-center w-12 mr-2">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <div class="relative flex items-center justify-between w-fit">
                            <input x-model="namaHutang" class="namaHutang form-input z-10 peer bg-white/10 text-white/30 focus:text-dark block w-full appearance-none px-3 pt-5  border-0 text-left outline-none
                            placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-sm sm:leading-1 focus:border-none focus:outline-none
                            focus-visible:ring-0" type="text" placeholder=" ">
                            <label class="absolute top-3 origin-[0]  break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-sm text-dark duration-300
                            peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6
                            peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Nama Hutang</label>
                        </div>
                    </div>
                    <div class="mr-4 text-right" x-text="namaHutang"></div>
                </div>
                <div class="flex flex-row items-center justify-between px-3 py-4 border-b-2">
                    <div class="flex flex-row items-center">
                        <div class="flex justify-center w-12 mr-2">
                            <i class="fa-solid fa-coins"></i>
                        </div>
                        <div class="relative flex items-center justify-between w-fit">
                            <input x-model="jmlHutang" class="jmlHutang  text-white/30 focus:text-black form-input z-10 peer bg-white/10 block w-full appearance-none px-3 pt-5  border-0 text-left outline-none
                            placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-sm sm:leading-1 focus:border-none focus:outline-none
                            focus-visible:ring-0" type="number" min="0" max="" step="100" placeholder=" ">
                            <label class="absolute top-3 origin-[0]  break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-sm text-dark duration-300
                            peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6
                            peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Jumlah Hutang <span class="text-xs text-green-600">($)</span>
                            </label>
                        </div>
                    </div>
                    <div class="mr-4 text-right" x-money.en-US.USD.decimal="jmlHutang"></div>
                </div>

                <div class="flex flex-row items-center justify-between px-3 py-4 border-b-2">
                    <div class="flex flex-row items-center">
                        <div class="flex justify-center w-12 mr-2">
                            <i class="fa-solid fa-percent"></i>
                        </div>
                        <div class="relative flex items-center justify-between w-fit">
                            <input x-model="bungaHutang" class="bungaHutang  text-white/30 focus:text-black form-input z-10 peer bg-white/10 block w-full appearance-none pt-5  px-3 border-0 text-left outline-none
                            placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-sm sm:leading-1 focus:border-none focus:outline-none
                            focus-visible:ring-0" x-mask="99" placeholder=" ">
                            <label class="absolute top-3 origin-[0] break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-sm text-dark duration-300
                            peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6
                            peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Suku Bunga Hutang <span class="text-xs text-green-600">(%)</span>
                            </label>
                        </div>
                    </div>
                    <div class="mr-4 text-right" x-text="bungaHutang?'% '+bungaHutang : ''"></div>
                </div>
                <div class="flex flex-row items-center justify-between px-3 py-4">
                    <div class="flex flex-row items-center">
                        <div class="flex justify-center w-12 mr-2">
                            <i class="fa-regular fa-calendar-check"></i><i class="fa-solid fa-file-invoice-dollar"></i>
                        </div>
                        <div class="relative flex items-center justify-between w-fit group">
                            <input name="minBayar" x-model="minBayar" id="minBayar" class="minBayar form-input align-text-bottom z-10 pt-5  peer bg-white/10 block w-full appearance-none px-3 border-0
                            text-left outline-none placeholder:!bg-transparent  text-white/30 focus:text-black transition duration-150 ease-in-out sm:text-sm sm:leading-1 focus:border-none
                            focus:outline-none focus-visible:ring-0" required type="number" min="10" step="100" placeholder=" ">
                            <label class="absolute top-3 origin-[0] break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-sm text-dark duration-300
                            peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6
                            peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Pembayaran minimum perbulan <span class="text-xs text-green-600">($)</span>
                            </label>
                        </div>
                    </div>
                    <div class="mr-4 text-right" x-money.en-US.USD.decimal="minBayar"></div>
                </div>
            </div>
            <!-- Looping Tambahan Form Hutang -->
            <template x-for="post in posts">
                <livewire:debt-calc/>
            </template>
        </div>
        <div class="flex flex-col items-center order-first mb-2 align-middle lg:items-end md:order-last lg:order-last lg:w-1/2">
            <div class="bg-[#F7D3C2] w-11/12  h-fit md:ml-4 lg:ml-4 rounded-md lg:rounded-[15px] shadow-sm hover:shadow-md transition-shadow duration-300 ease-in-out">
                <div class="flex flex-row px-5 py-5 align-middle border-b-2">
                    <h6 class="ml-5 text-xl font-bold text-blueGray-700">Tambahan</h6>
                </div>
                <div class="flex flex-row flex-wrap lg:flex-col">
                    <div class="flex items-center justify-between px-3 py-4 text-center">
                        <div class="flex flex-row items-center">
                            <div class="flex justify-center w-6 mr-2">
                                <i class="fa-solid fa-circle-dollar-to-slot"></i>
                            </div>
                            <div class="relative flex items-center w-fit">
                                <input x-model="mountlySalary" id="mountlySalary" class="form-input align-text-bottom z-10 pt-5 peer bg-white/10 block w-full appearance-none px-3 border-0 text-left outline-none
                                placeholder:!bg-transparent transition duration-150 ease-in-out  text-white/30 focus:text-black sm:text-sm sm:leading-1 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" step="100" placeholder=" ">
                                <label for="mountlySalary" class="absolute top-3 origin-[0]  break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-sm text-dark duration-300
                                peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75
                                peer-focus:text-myblue peer-focus:dark:text-blue-500">Pendapatan perbulan <span class="text-xs text-green-600">($)</span></label>
                            </div>
                        </div>
                        <div class="mr-4 text-right" x-money.en-US.USD.decimal="mountlySalary"></div>
                    </div>

                    <div class="flex items-center justify-between px-3 py-4 text-center">
                        <div class="flex flex-row items-center">
                            <div class="flex justify-center w-6 mr-2">
                                <i class="fa-solid fa-money-bill-1-wave"></i>
                            </div>
                            <div class="relative flex items-center w-fit">
                                <input x-model="extraSalary" class="form-input peer  text-white/30 focus:text-black z-10 pt-5 align-text-bottom text-left bg-white/10 block w-full appearance-none px-3 border-0 outline-none
                                placeholder:!bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-1 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" step="100" placeholder=" ">
                                <label for="extraSalary" class="absolute top-3 origin-[0]  break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-sm text-dark duration-300
                                peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75
                                peer-focus:text-myblue peer-focus:dark:text-blue-500">Pembayaran Extra Perbulan <span class="text-xs text-green-600">($)</span></label>
                            </div>
                        </div>
                        <div class="mr-4 text-right" x-money.en-US.USD.decimal="extraSalary"></div>
                    </div>

                </div>

            </div>
            <div x-show="!calculated" class="flex flex-row items-center justify-between w-11/12 mb-2 ml-4 text-center align-middle md:flex-row lg:mt-10 md:justify-between lg:justify-evenly">
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
