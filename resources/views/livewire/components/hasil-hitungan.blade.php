<div>
    <script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
    <div class="flex">
        <!-- List Hutang -->
        <div class="w-1/2">
            <!-- Looping Tambahan Form Hutang -->
            <template x-for="data in hasil.hutang">
                <div class="flex gap-2 mt-7">
                    <div class="flex items-center px-3 text-white bg-blue-500 rounded-lg" x-text="data.debtInterest + '%'">
                        5%
                    </div>
                    <div class="w-full">
                        <div class="flex justify-between">
                            <p class="mb-2" x-text="data.debtTitle"></p>
                            <p x-text="'$' + $store.data.debtAmount"></p>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                            <div class="bg-lime-400 h-2.5 rounded-full" style="width: 5%"></div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <!-- Chart Hutang -->
        <div x-data="{pendapatan: $hasil.mountlySalary}" class="absolute flex flex-col items-center w-1/2 -z-10 h-80 right-5">
            <canvas  width="400" height="400" id="hasilChart"></canvas>
            <div>Total Hutang <span x-text="$hasil.totalDebt"></span></div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        </div>
    </div>
    <div class="flex justify-between mt-[82px]">
        <div class="">
            <div
            class="p-8 text-lg font-medium tracking-wide text-center text-green-500 uppercase border-b border-gray-200">
            Estimasi Lunas</div>
            <div class="items-center justify-center block sm:flex md:block lg:flex">
                <div class="mt-8 text-center sm:m-8 md:m-0 md:mt-8 lg:m-8">
                    <div class="inline-flex items-center">
                        <span class="text-3xl font-medium" x-text="dateSnowball"></span>
                    </div>
                    <span class="block mt-2 text-sm text-gray-600">Metode Snowball</span>
                </div>
                <div class="mt-4 mb-8 text-center sm:m-8 md:m-0 md:mt-4 md:mb-8 lg:m-8">
                    <div class="inline-flex items-center">
                        <span class="text-3xl font-medium" 
                        x-text="dateNormal"></span>
                    </div>
                    <span class="block mt-2 text-sm text-gray-600">Metode biasa</span>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <button x-on:click="tambahData" class="self-end px-5 text-white bg-myblue h-14 w-44 rounded-xl"><span class="inline-block text-center align-top">Simpan</d></button>
        </div>
    </div>
</div>
