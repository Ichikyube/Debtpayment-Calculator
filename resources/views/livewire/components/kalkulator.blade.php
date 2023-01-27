<div x-data="$store.create">
    {{-- start error alert --}}
    {{-- <template x-if="showErrorAlert"> --}}
        <div x-show="showErrorAlert"
            x-transition:enter="transition -translate-y-10 ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-10"
            x-transition:enter-end="-translate-y-0 opacity-100"
            x-transition:leave="transition -translate-y-10 ease-in duration-300"
            x-transition:leave-start="opacity-100 -translate-y-10"
            x-transition:leave-end="-translate-y-10 opacity-0"
            class="absolute shadow-2xl z-30 w-[700px] right-1/2 left-1/4 -top-5 p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
            <div class="flex items-center" >
                <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <h3 class="text-lg font-medium">Request Failed!!</h3>
            </div>
            <div class="mt-2 mb-4 text-sm">
                <ul class="mt-1.5 ml-4 list-disc list-inside" x-show="validation">
                    <li x-show="validation.debtTitle" x-text="validation.debtTitle"></li>
                    <li x-show="validation.debtAmount" x-text="validation.debtAmount"></li>
                    <li x-show="validation.debtInterest" x-text="validation.debtInterest"></li>
                    <li x-show="validation.datePayment" x-text="validation.datePayment"></li>
                    <li x-show="validation.monthlyInstallments" x-text="validation.monthlyInstallments"></li>
                </ul>
                <ul class="mt-1.5 ml-4 list-disc list-inside" x-show="messages">
                    <template x-for="message in messages">
                        <li x-show="message" x-text="message"></li>
                    </template>
                </ul>
            </div>
            <div class="flex justify-end">
                <button x-on:click="showErrorAlert = false" class="text-red-800 bg-transparent border border-red-900 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-400 dark:border-red-400 dark:text-red-400 dark:hover:text-white dark:focus:ring-red-800" data-dismiss-target="#alert-additional-content-2" aria-label="Close">
                    close
                </button>
            </div>
        </div>
    {{-- </template> --}}
    {{-- end error alert --}}

    {{-- start mini error alert --}}
    <div x-show="showMiniErrorAlert"
        x-transition:enter="transition -translate-y-10 ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-10"
        x-transition:enter-end="-translate-y-0 opacity-100"
        x-transition:leave="transition -translate-y-10 ease-in duration-300"
        x-transition:leave-start="opacity-100 -translate-y-10"
        x-transition:leave-end="-translate-y-10 opacity-0"
        class="flex justify-between items-center absolute z-30 left-[35%] right-[50%] -top-5 shadow-xl w-96 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <div class="flex items-center">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-10 h-10 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="flex flex-col">
                <span class="text-xl font-medium">Request Failed!!</span>
                <span>Harap isi data dengan benar</span>
            </div>
        </div>
        <button x-on:click="showMiniErrorAlert = false">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    {{-- end mini error alert --}}

    <h1 class="my-4 ml-8 text-3xl font-bold truncate lg:my-0 lg:mb-8 drop-shadow-md">Kalkulator Hutang</h1>
    <template x-if="calculated">
        @livewire('components.hasil-hitungan')
    </template>

    <div x-show="!calculated" class="relative flex flex-col md:flex-row lg:flex-row justify-evenly stretch">
        <div class="flex snap-y snap-mandatory flex-col items-center px-4 md:w-full lg:w-1/2 overflow-y-scroll scroll-smooth rounded-xl overflow-x-hidden order-last md:order-first lg:order-first h-[420px] touch-auto hilanginscroll">
            <!-- Form Kalkulator -->
            <template x-for="(post,index) in posts" :key="index" class="slides" >
                <livewire:debt-calc />
            </template>


                <div x-show="postAdded" class="absolute flex flex-col justify-center h-6 px-3 leading-none text-center align-middle motion-safe:animate-bounce bottom-16 rounded-r-md hover:text-myblue"
                x-transition:enter="transition -translate-y-10 ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-10"
                x-transition:enter-end="-translate-y-0 opacity-100"
                x-transition:leave="transition -translate-y-10 ease-in duration-300"
                x-transition:leave-start="opacity-100 -translate-y-10"
                x-transition:leave-end="-translate-y-10 opacity-0">
                    <h3 class="text-myblue ">Debt is added</h3>
                    <i class="text-red-500 fa-solid fa-arrow-down"></i>
                </div>


            <div class="h-screen">
                <div class="bg-[#F7D3C2] w-11/12 mx-4 snap-start snap-always block md:hidden lg:hidden h-fit md:ml-4 lg:ml-4 rounded-md lg:rounded-[15px] shadow-sm hover:shadow-lg mb-8 transition-shadow duration-300 ease-in-out">
                    <div class="flex flex-row px-5 py-5 align-middle border-b-2">
                        <h6 class="ml-5 text-xl font-bold text-blueGray-700">Tambahan</h6>
                    </div>
                    <div class="flex flex-row flex-wrap lg:flex-col">
                        <div class="flex items-center justify-between px-3 py-4 text-center border-b-2">
                            <div class="flex flex-row items-center">
                                <div class="flex justify-center w-6 mr-2">
                                    <i class="fa-solid fa-circle-dollar-to-slot"></i>
                                </div>
                                <div class="relative flex items-center w-fit">
                                    <input x-model="monthlySalary" id="monthlySalary" class="form-input align-text-bottom z-10 pt-5 peer bg-white/10 block w-full appearance-none px-3 border-0 text-left outline-none
                                    placeholder:!bg-transparent transition duration-150 ease-in-out  text-white/30 focus:text-black sm:text-sm sm:leading-1 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" step="100" placeholder=" ">
                                    <label for="monthlySalary" class="absolute top-3 origin-[0]  break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-sm text-dark duration-300
                                    peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75
                                    peer-focus:text-myblue peer-focus:dark:text-blue-500">Pendapatan perbulan <span class="text-xs text-green-600">($)</span></label>
                                </div>
                            </div>
                            <div class="mr-4 text-right" x-money.en-US.USD.decimal="monthlySalary"></div>
                        </div>

                        <div class="flex items-center justify-between px-3 py-4 text-center border-b-2">
                            <div class="flex flex-row items-center">
                                <div class="flex justify-center w-6 mr-2">
                                    <i class="fa-solid fa-money-bill-1-wave"></i>
                                </div>
                                <div class="relative flex items-center w-fit">
                                    <input x-model="extraSalary" class="form-input peer text-white/30 focus:text-black z-10 pt-5 align-text-bottom text-left bg-white/10 block w-full appearance-none px-3 border-0 outline-none
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
            </div>
        </div>
        <div class="flex flex-col items-center order-last mb-2 align-middle lg:w-1/2 lg:items-end md:order-last lg:order-last">
            <div class="bg-[#F7D3C2] w-11/12 hidden md:block lg:block h-fit md:ml-4 lg:ml-4 rounded-md lg:rounded-[15px] shadow-sm hover:shadow-md transition-shadow duration-300 ease-in-out">
                <div class="flex flex-row px-5 py-5 align-middle border-b-2">
                    <h6 class="ml-5 text-xl font-bold text-blueGray-700">Tambahan</h6>
                </div>
                <div class="flex flex-row flex-wrap lg:flex-col">
                    <div class="flex flex-row items-center justify-between w-full px-3 py-4 group">

                        <div class="flex justify-center w-12 mr-2">
                            <i class="fa-solid fa-circle-dollar-to-slot"></i>
                        </div>
                        <div class="relative flex items-center justify-between w-full">
                            <input x-model="monthlySalary" id="monthlySalary" class="text-white/10 bg-transparent focus:text-black/30 form-input z-10 peer block w-full appearance-none px-3 pt-2 placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-sm sm:leading-1 focus:border-none focus:outline-none border-0 text-left outline-none focus-visible:ring-0" type="number" min="0" step="100" placeholder=" ">
                            <label class="absolute break-words text-ellipsis top-0 origin-[0] max-w-[80%] sm:w-max md:w-max lg:w-max -translate-y-4 scale-80 transform text-sm text-dark duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-5 peer-focus:w-full peer-focus:scale-75 peer-focus:text-myblue">Pendapatan perbulan <span class="text-xs text-green-600">($)</span></label>
                        </div>

                        <div class="absolute right-0 w-10/12 mr-4 text-right truncate" x-money.en-US.USD.decimal="monthlySalary"></div>
                    </div>

                    <div class="flex flex-row items-center justify-between w-full px-3 py-4 group">
                        <div class="flex justify-center w-12 mr-2">
                            <i class="fa-solid fa-money-bill-1-wave"></i>
                        </div>
                        <div class="relative flex items-center justify-between w-full">
                            <input x-model="extraSalary" class="text-white/10 bg-transparent focus:text-black/30 form-input z-10 peer block w-full appearance-none px-3 pt-2 placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-sm sm:leading-1 focus:border-none focus:outline-none border-0 text-left outline-none focus-visible:ring-0" type="number" min="0" step="100" placeholder=" ">
                            <label class="absolute break-words text-ellipsis top-0 origin-[0] max-w-[80%] sm:w-max md:w-max lg:w-max -translate-y-4 scale-80 transform text-sm text-dark duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-5 peer-focus:w-full peer-focus:scale-75 peer-focus:text-myblue">Pembayaran Extra Perbulan <span class="text-xs text-green-600">($)</span></label>
                        </div>
                        <div class="absolute right-0 w-10/12 mr-4 text-right truncate" x-money.en-US.USD.decimal="extraSalary"></div>
                    </div>

                </div>

            </div>
            <div x-show="!calculated" class="flex flex-row items-center justify-between order-first mx-auto mb-2 text-center align-middle sm:w-10/12 lg:ml-9 md:mt-6 md:w-11/12 lg:w-11/12 md:order-last lg:order-last md:flex-row lg:mt-10 md:justify-evenly lg:justify-evenly">
                <button type="button" x-on:click.lazy="addDebt" class="text-sm py-0 md:py-2 after:top-3 md:after:top-8 lg:after:top-4 lg:py-4 px-4 w-36 lg:w-auto
                bg-white text-red-500 font-bold rounded-[15px] drop-shadow-lg cursor-pointer select-none active:translate-y-1
                active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7] active:border-b-[0px] transition-all duration-500 mr-4 md:mr-6
                lg:mr-11 ease-in-out hover:bg-red-400 hover:text-white [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7] after:w-6 after:h-6
                after:bg-red-500 after:text-white after:font-cursive after:font-extrabold after:absolute after:-right-3
                after:-scale-x-100 after:rounded-full after:content-['+'] after:align-middle after:text-center">
                    Tambahkan Hutang
                </button>
                <button x-on:click="hitung()" class="px-5 text-white shadow drop-shadow-lg cursor-pointer
                select-none active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7] active:border-b-[0px] rounded-xl
                [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7] bg-myblue py-2 md:h-14 lg:h-14 lg:w-44 transition-all duration-200">

                   Calculate

                </button>
            </div>
        </div>
    </div>
</div>
