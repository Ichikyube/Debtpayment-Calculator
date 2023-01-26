<div class="overflow-y-scroll overflow-x-hidden h-[430px] hilanginscroll">
    <div class="flex">
        <!-- List Hutang -->
        <div class="w-1/2 overflow-scroll h-80 hilanginscroll">
            <!-- Looping Detail Hutang -->
            <template x-for="data in hasil.hutang">
                <div class="flex gap-2 mt-7 tooltip">
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
                        <div class="flex items-center gap-2" x-data="{persen: data.monthlyInstallments/data.debtAmount*100}">
                            <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-lime-400 h-2.5 rounded-full" x-bind:style="'width: '+persen+'%'"></div>
                            </div>
                            <p x-text="'$' + data.debtAmount"></p>
                        </div>
                    </div>

                    <div class="bottom">
                        <p>Pembayaran tanggal <span class="font-bold" x-text="formatTglAja(data.datePayment)"></span> setiap bulannya</p>
                        <i></i>
                    </div>
                </div>
            </template>
            <div class="">
                <div
                class="p-8 pb-0 text-lg font-medium tracking-wide text-center text-green-500 uppercase border-gray-200">
                Estimasi Lunas</div>
                <div class="items-center justify-center block sm:flex md:block lg:flex">
                    <template x-if="hasil.hasil.snowballCalculator < hasil.hasil.normalCalculator">
                    <div class="mt-2 text-center sm:m-8 md:m-0 md:mt-4 md:mb-8 lg:m-5 tooltip">
                        <div class="inline-flex items-center">
                            <span class="text-3xl font-semibold text-[#2A7C97]" x-text="dateSnowball"></span>
                        </div>
                        <span class="block mt-2 text-sm text-gray-600">Metode Snowball</span>
                        <div class="top">
                            <p>ketika hutang terkecil lunas, pembayaran minimum perbulan hutang tersebut dialokasikan ke hutang terkecil selanjutnya.</p>
                            <i></i>
                        </div>
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
        </div>
        <!-- Chart Hutang -->
        <div class="flex flex-col items-center w-1/2 -z-10">
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
            <div class="relative w-full justify-center overflow-visible flex h-[200px]"><canvas class="absolute" w="300px" h="300px" id="hasilChart"></canvas></div>
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
    <div class="flex justify-end  mt-5 mr-[50px]">
        <button x-on:click="calculated = !calculated" class="self-end my-2 text-xl font-bold mr-7">Kembali</button>
        <button x-on:click="tab = 'listHitungan', editData(id)" class="self-end px-4 py-2 text-white bg-[#2A7C97] rounded-xl"><span class="inline-block text-center align-top">Simpan</span></button>
    </div>
</div>



