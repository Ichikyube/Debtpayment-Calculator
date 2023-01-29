<div class="overflow-y-scroll overflow-x-hidden h-[430px] hilanginscroll">
    <div class="flex">
        <!-- Debt List  -->
        <div class="w-1/2 overflow-scroll h-80 hilanginscroll">
            <!-- Looping Debt Detail -->
            <template x-for="data in hasil.hutang">
                <div class="flex gap-2 mt-7 tooltip">
                    <div>
                        <div class="flex items-center px-3 text-white bg-[#2A7C97] rounded-lg" x-text="data.interest_rate + '%'">
                        </div>
                        <p class="text-center mt-[8px]" x-text="'$' + data.monthly_payment"></p>
                    </div>

                    <div class="w-full">
                        <div class="flex justify-between">
                            <p class="mb-2" x-text="data.debt_name"></p>
                            <p x-text="formatTglFull(data.payment_date)"></p>
                        </div>
                        <div class="flex items-center gap-2" x-data="{persen: data.monthly_payment/data.debt_amount*100}">
                            <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-lime-400 h-2.5 rounded-full" x-bind:style="'width: '+persen+'%'"></div>
                            </div>
                            <p x-text="'$' + data.debt_amount"></p>
                        </div>
                    </div>

                    <div class="bottom">
                        <p>Date Payment <span class="font-bold" x-text="formatTglAja(data.payment_date)"></span> setiap bulannya</p>
                        <i></i>
                    </div>
                </div>
            </template>
            <template class="relative" x-if="hasil.hutang.length > 2">
                <x-scroll-arrow class="left-6 bottom-24 text-center absolute">Scroll to see the rest </x-scroll-arrow>
            </template>
            <div class="">
                <div
                class="p-8 pb-0 text-lg font-medium tracking-wide text-center text-green-500 uppercase border-gray-200">
                Debt Paid Off</div>
                <div class="items-center justify-center block sm:flex md:block lg:flex">
                    <template x-if="hasil.hasil.snowball_method < hasil.hasil.normal_method">
                    <div class="mt-2 text-center sm:m-8 md:m-0 md:mt-4 md:mb-8 lg:m-5 tooltip">
                        <div class="inline-flex items-center">
                            <span class="text-3xl font-semibold text-[#2A7C97]" x-text="formatTgl(hasil.hasil.snowball_method)"></span>
                        </div>
                        <span class="block mt-2 text-sm text-gray-600">Snowball Method</span>
                        <div class="top">
                            <p>When the smallest debt is paid off, the minimum monthly payment of that debt is allocated to the next smallest debt.</p>
                            <i></i>
                        </div>
                    </div>
                    </template>
                    <div class="mt-2 text-center sm:m-8 md:m-0 md:mt-4 md:mb-8 lg:m-5">
                        <div class="inline-flex items-center">
                            <span class="text-3xl font-medium" x-text="formatTgl(hasil.hasil.normal_method)"></span>
                        </div>
                        <span class="block mt-2 text-sm text-gray-600">Normal Method</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Debt Chart -->
        <div class="flex flex-col items-center w-1/2 -z-10">
            <div class="flex justify-between w-full px-16">
                <div>
                    Monthly Income<br>
                    <span class="font-semibold" x-text="formatUang(hasil.hasil.monthly_salary)"></span>
                </div>
                <div class="text-end">
                    Total Min Payment <br>
                    <span class="font-semibold" x-text="formatUang(hasil.hasil.total_min_payment)"></span>

                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <div class="relative w-full justify-center overflow-visible flex h-[200px]"><canvas class="absolute" w="300px" h="300px" id="hasilChart"></canvas></div>
            <div x-init="charts(hasil.hasil.monthly_salary,hasil.hasil.total_min_payment)"></div>

            <div class="flex justify-between w-full px-16">
                <div>
                    <span class="font-semibold" x-text="formatUang(hasil.hasil.extra_payment)"></span><br>
                    Extra Payment
                </div>
                <div class="text-end">
                    <span class="font-semibold" x-text="formatUang(hasil.hasil.debt_total)"></span><br>
                    Total Amount of Debt
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-end  mt-5 mr-[50px]">
        <button x-on:click="calculated = !calculated" class="self-end my-2 text-xl font-bold mr-7">Back</button>
        <button x-on:click="tab = 'listHitungan', editData(id)" class="self-end px-4 py-2 text-white bg-[#2A7C97] rounded-xl"><span class="inline-block text-center align-top">Save</span></button>
    </div>
</div>



