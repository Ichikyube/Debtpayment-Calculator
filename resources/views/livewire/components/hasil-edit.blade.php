<div class="overflow-y-scroll overflow-x-hidden h-[430px] hilanginscroll">
    <div class="flex">
        <!-- List Hutang -->
        <div class="w-1/2 h-80 overflow-scroll hilanginscroll">
            <!-- Looping Tambahan Form Hutang -->
            <template x-for="data in hasil.hutang">
                <div class="flex gap-2 mt-7">
                    <div>
                        <div class="flex items-center px-3 text-white bg-[#2A7C97] rounded-lg" x-text="data.debtInterest + '%'">
                        </div>
                        <p class="text-center mt-[8px]" x-text="'$' + data.monthlyInstallments"></p>
                    </div>
                    
                    <div class="w-full">
                        <div class="flex justify-between">
                            <p class="mb-2" x-text="data.debtTitle"></p>
                            <p x-text="formatTglFull(data.datePayment)"></p>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-lime-400 h-2.5 rounded-full" style="width: 5%"></div>
                            </div>
                            <p x-text="'$' + data.debtAmount"></p>
                        </div>
                        
                    </div>
                </div>
            </template>
        </div>
        <!-- Chart Hutang -->
        <div class="flex flex-col items-center w-1/2 -z-10 h-80">
            <div class="flex justify-between w-full px-16">
                <div>
                    Pendapatan<br>
                    <span class="font-semibold" x-text="formatUang(hasil.hasil.monthlySalary)"></span>
                </div>
                <div class="text-end">
                    Total Min Bayar <br>
                    <span class="font-semibold" x-text="formatUang(hasil.hasil.totalMinPayment)"></span>

                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <canvas w="200px" h="200px" id="hasilChart"></canvas>
            <div x-init="charts(hasil.hasil.monthlySalary,hasil.hasil.totalMinPayment)"></div>

            <div class="flex justify-between w-full px-16">
                <div>
                    <span class="font-semibold" x-text="formatUang(hasil.hasil.extraSalary)"></span><br>
                    Pembayaran Extra
                </div>
                <div class="text-end">
                    <span class="font-semibold" x-text="formatUang(hasil.hasil.totalDebt)"></span><br>
                    Total Hutang
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-between gap-2 mt-5">
        <div class="w-7/12">
            <div
            class="p-8 pb-0 text-lg font-medium tracking-wide text-center text-green-500 uppercase border-gray-200">
            Estimasi Lunas</div>
            <div class="items-center justify-center block sm:flex md:block lg:flex">
                <template x-if="hasil.hutang.length > 1 || hasil.hasil.extraSalary > 20">
                <div class="mt-2 text-center sm:m-8 md:m-0 md:mt-4 md:mb-8 lg:m-5">
                    <div class="inline-flex items-center">
                        <span class="text-3xl font-semibold text-[#2A7C97]" x-text="dateSnowball"></span>
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
        <div class="flex justify-end mr-[50px]">
            <button x-on:click="calculated = !calculated" class="self-end mr-7 my-2 text-xl font-bold">Kembali</button>
            <button x-on:click="tab = 'listHitungan', editData(id)" class="self-end px-4 py-2 text-white bg-[#2A7C97] rounded-xl"><span class="inline-block text-center align-top">Simpan</d></button>
        </div>
    </div>
</div>
