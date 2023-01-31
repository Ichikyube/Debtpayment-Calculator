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
        class="absolute shadow-2xl z-30 w-[700px] right-1/2 left-1/4 -top-5 p-4 mb-4 text-red-800 border border-red-300 rounded-lg
        bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
        <div class="flex items-center" >
            <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0
                    001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium">Request Failed!!</h3>
        </div>
        <div class="mt-2 mb-4 text-md">
            {{-- <ul class="mt-1.5 ml-4 list-disc list-inside" x-show="validation">
                <li x-show="validation.debtTitle" x-text="validation.debtTitle"></li>
                <li x-show="validation.debtAmount" x-text="validation.debtAmount"></li>
                <li x-show="validation.debtInterest" x-text="validation.debtInterest"></li>
                <li x-show="validation.datePayment" x-text="validation.datePayment"></li>
                <li x-show="validation.monthlyInstallments" x-text="validation.monthlyInstallments"></li>
            </ul> --}}
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
        class="flex justify-between items-center absolute z-30 left-[35%] right-[50%] -top-5 shadow-xl w-96 p-4 mb-4 text-md text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <div class="flex items-center">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-10 h-10 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="flex flex-col">
                <span class="text-xl font-medium">Request Failed!!</span>
                <span>Please fill the form with correct data</span>
            </div>
        </div>
        <button x-on:click="showMiniErrorAlert = false">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    {{-- end mini error alert --}}

    <h1 class="my-4 ml-8 text-3xl font-bold truncate lg:my-0 lg:mb-8 drop-shadow-md">Debt Calculator</h1>

    <!-- show calculation result after calculate button pressed -->
    <template x-if="calculated">
        @livewire('views.hasil-hitungan')
    </template>

    <div x-show="!calculated" class="relative flex flex-col md:flex-row lg:flex-row justify-evenly stretch">
        <div class="flex snap-y snap-mandatory flex-col items-center px-4 md:w-full lg:w-1/2 overflow-y-scroll scroll-smooth rounded-xl overflow-x-hidden order-last md:order-first lg:order-first h-[420px] touch-auto hilanginscroll">

            <!-- Looping Form Kalkulator -->
            <template x-for="(post,index) in posts" :key="index" class="slides" >
                <x-debt-card x-id="['index']" x-bind:id="index ? 'hutang'+ index : ''"
                    x-data="{
                        namaHutang:`Debt Title ${index+1}`,
                        waktuBayar:'',
                        jmlHutang:'',
                        bungaHutang:'',
                        minBayar:'',
                        monthlySalary:''
                    }">
                    <x-slot name="date">
                        <x-date-picker></x-date-picker>
                    </x-slot>
                    <!-- if this card is displayed more than once, cancel button will appear -->
                    <template x-if="index>0">
                        <div class="flex items-center justify-between py-3 text-center">
                            <button @click="removeDebt(index)" class="ml-4 font-bold text-red-500 text-md px-7">
                                Cancel
                            </button>
                        </div>
                    </template>
                </x-debt-card>
            </template>

            <!-- Arrow Notification Debt added -->
            <x-scroll-arrow x-show="postAdded">Debt is added</x-scroll-arrow>
            <!-- Additional options for mobile view -->
            <x-addition-card-sm/>
        </div>
        <!-- right side view is for Additional options for desktop view -->
        <div class="flex flex-col items-center order-last mb-2 align-middle lg:w-1/2 lg:items-end md:order-last lg:order-last">
            <x-addition-card/>
            <div x-show="!calculated" class="flex flex-row items-center justify-between order-first mx-auto mb-2 text-center align-middle sm:w-10/12 lg:ml-9 md:mt-6 md:w-11/12 lg:w-11/12 md:order-last lg:order-last md:flex-row lg:mt-10 md:justify-evenly lg:justify-evenly">
                <button type="button" x-on:click.lazy="addDebt" class="text-md py-3 md:py-4 after:top-3 leading-snug md:after:top-4 lg:after:top-4 lg:py-4 px-3 w-36
                bg-white/50 text-red-500 font-bold rounded-[15px] drop-shadow-lg cursor-pointer select-none active:translate-y-1
                active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7] active:border-b-[0px] transition-all duration-500 mr-4 md:mr-6
                lg:mr-11 ease-in-out hover:bg-red-400 hover:text-white [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7] after:w-6 after:h-6
                after:bg-red-500 after:text-white after:font-cursive after:font-extrabold after:absolute after:-right-3
                after:-scale-x-100 after:rounded-full after:content-['+'] after:align-middle after:text-center">

                    Add Debt

                </button>

                <x-button.calculate-button x-on:click="hitung()">

                   Calculate

                </x-button.calculate-button>
            </div>
        </div>
    </div>
</div>
