<div x-data="$store.edit">
    <h1 class="my-4 ml-8 text-3xl font-bold truncate lg:my-0 lg:mb-8 drop-shadow-md">Edit Debt </h1>
    <!-- loading animation -->
    <x-loading />
    {{-- start error alert --}}
    <div x-show="showMinierrrorAlert"
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
            <h3 class="text-lg font-medium hutangName">Request Filed!!</h3>
        </div>
        <div class="mt-2 mb-4 text-sm">
            <ul class="mt-1.5 ml-4 list-disc list-inside">
                <template x-for="message in messages">
                    <li x-text="message"></li>
                </template>
            </ul>
        </div>

        <div class="flex justify-end">
            <button x-on:click="showMinierrrorAlert = false" class="text-red-800 bg-transparent border border-red-900 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-400 dark:border-red-400 dark:text-red-400 dark:hover:text-white dark:focus:ring-red-800">
                close
            </button>
        </div>
    </div>
    {{-- end error alert --}}

    <!-- show the new calculated result -->
    <template x-if="!calculated">
        @livewire('views.hasil-edit')
    </template>
    <!-- edit calculator view -->
    <template x-if="!isLoading">
        <div x-show="calculated" class="relative flex flex-col md:flex-row lg:flex-row justify-evenly stretch"
             x-data="{
                id:ambilData.id,
                monthlySalary:ambilData.monthly_salary,
                extraPayment:ambilData.extra_payment}" >
            <div class="flex snap-y snap-mandatory flex-col items-center px-4 lg:w-1/2 overflow-y-scroll scroll-smooth rounded-xl overflow-x-hidden order-last md:order-first lg:order-first h-[425px] touch-auto hilanginscroll">
                <!-- Form Kalkulator -->

                <template x-for="(debt, index) in posts">
                    <x-debt-card x-data="{
                        namaHutang:debt.debt_name,
                        waktuBayar:debt.payment_date,
                        jmlHutang:debt.debt_amount,
                        bungaHutang:debt.interest_rate,
                        minBayar:debt.monthly_payment}" date='$date'>
                            <x-slot name="date">
                                <x-date-picker x-data="{
                                    showDatepicker: false,
                                    selectedDate: '',
                                    dateFormat: 'YYYY-MM-DD',
                                    month: '',
                                    year: '',
                                    no_of_days: [],
                                    blankdays: []}" x-init="[getNoOfDays(), initDate(waktuBayar) ]"></x-date-picker>
                            </x-slot>
                         </x-debt-card>

                </template>
                <!-- Additional options for mobile view -->
                <x-addition-card-sm monthlySalary="monthlySalary" extraPayment="extraPayment"/>
            </div>
            <!-- right side view is for Additional options for desktop view -->
            <div class="flex flex-col items-center order-last w-1/2 mb-2 align-middle lg:items-end md:order-last lg:order-last">
                <x-addition-card monthlySalary="monthlySalary" extraPayment="extraPayment" />
                <!-- button section for calculate -->
                <div x-show="calculated" class="flex flex-row items-center justify-between order-first mx-auto mb-2 text-center align-middle ml-9 md:mt-6 w-80 md:w-11/12 lg:w-11/12 md:order-last lg:order-last md:flex-row lg:mt-10 md:justify-evenly lg:justify-evenly">
                    {{-- <button type="button" x-on:click.lazy="posts++" class="text-sm py-0 md:py-2 after:top-3 md:after:top-8 lg:after:top-4 lg:py-5 px-7 w-36 lg:w-auto
                    bg-white text-red-500 font-bold rounded-[15px] drop-shadow-lg cursor-pointer select-none active:translate-y-1
                    active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7] active:border-b-[0px] transition-all duration-500 mr-4 md:mr-6
                    lg:mr-11 ease-in-out hover:bg-red-400 hover:text-white [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7] after:w-6 after:h-6
                    after:bg-red-500 after:text-white after:font-cursive after:font-extrabold after:absolute after:-right-3
                    after:-scale-x-100 after:rounded-full after:content-['+'] after:align-middle after:text-center">
                        Tambahkan Hutang
                    </button> --}}
                    <x-button.calculate-button x-on:click="hitungedit(ambilData.id)">Calculate</x-button.calculate-button>
                </div>
            </div>
        </div>
    </template>
</div>
