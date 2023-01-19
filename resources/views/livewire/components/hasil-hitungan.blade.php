<div>
    <div class="flex">
        <!-- List Hutang -->
        <div class="w-1/2">
            <!-- Looping Tambahan Form Hutang -->
            <template x-for="data in hasil.hutang">
                <div class="flex gap-2 mt-7">
                    <div class="flex items-center px-3 text-white bg-blue-500 rounded-lg" x-text="data.debtInterest + '%'">
                    </div>
                    <div class="w-full">
                        <div class="flex justify-between">
                            <p class="mb-2" x-text="data.debtTitle"></p>
                            <p x-text="'$' + data.debtAmount"></p>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                            <div class="bg-lime-400 h-2.5 rounded-full" style="width: 5%"></div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <!-- Chart Hutang -->
        <div class="flex flex-col items-center w-1/2 -z-10 h-80 right-5" x-init="charts(hasil.hasil.mountlySalary,hasil.hasil.totalMinPayment)">
            <div class="flex justify-between w-full px-16">
                <div>
                    Pendapatan <br>
                    <span x-text="hasil.hasil.mountlySalary"></span>
                </div>
                <div class="text-end">
                    Total Min Bayar <br>
                    <span x-text="hasil.hasil.totalMinPayment"></span>
                </div>
            </div>
            <canvas  width="400" height="400" id="hasilChart"></canvas>

            <div>Total Hutang <span x-text="hasil.hasil.totalDebt"></span></div>
        </div>
    </div>
    <div class="flex justify-between">
        <div>
            <div
            class="p-8 pb-0 text-lg font-medium tracking-wide text-center text-green-500 uppercase border-gray-200">
            Estimasi Lunas</div>
            <div class="items-center justify-center block sm:flex md:block lg:flex">
                <template x-if="hasil.hutang.length > 1">
                <div class="mt-2 text-center sm:m-8 md:m-0 md:mt-4 md:mb-8 lg:m-5">
                    <div class="inline-flex items-center">
                        <span class="text-3xl font-medium" x-text="dateSnowball"></span>
                    </div>
                    <span class="block mt-2 text-sm text-gray-600">Metode Snowball</span>
                </div>
                </template>
                <div class="mt-2 text-center sm:m-8 md:m-0 md:mt-4 md:mb-8 lg:m-5">
                    <div class="inline-flex items-center">
                        <span class="text-3xl font-medium" x-text="dateNormal"></span>
                    </div>
                    <span class="block mt-2 text-sm text-gray-600">Metode biasa</span>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <button x-on:click="calculated = !calculated" class="self-end mr-7 mb-3 text-xl font-bold">Kembali</button>
            <button x-on:click="tambahData" class="self-end px-5 text-white bg-myblue h-14 w-44 rounded-xl"><span class="inline-block text-center align-top">Simpan</d></button>
        </div>
    </div>
</div>
