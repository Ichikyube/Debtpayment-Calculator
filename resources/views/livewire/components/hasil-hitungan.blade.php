<div>
    <div class="flex">
        <!-- List Hutang -->
        <div class="w-1/2">
            <div class="flex gap-2 mt-7">
                <div class="flex items-center px-3 text-white bg-blue-500 rounded-lg">
                    5%
                </div>
                <div class="w-full">
                    <div class="flex justify-between">
                        <p class="mb-2">Hutang Pinjaman</p>
                        <p>$500</p>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-lime-400 h-2.5 rounded-full" style="width: 5%"></div>
                    </div>
                </div>
            </div>

            <div class="flex gap-2 mt-7">
                <div class="flex items-center px-3 text-white bg-blue-500 rounded-lg">
                    8%
                </div>
                <div class="w-full">
                    <div class="flex justify-between">
                        <p class="mb-2">Hutang KPR</p>
                        <p>$500</p>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-lime-400 h-2.5 rounded-full" style="width: 5%"></div>
                    </div>
                </div>
            </div>
            <div class="flex gap-2 mt-7">
                <div class="flex items-center px-3 text-white bg-blue-500 rounded-lg">
                    10%
                </div>
                <div class="w-full">
                    <div class="flex justify-between">
                        <p class="mb-2">Hutang Perabotan</p>
                        <p>$1500</p>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-lime-400 h-2.5 rounded-full" style="width: 5%"></div>
                    </div>
                </div>
            </div>
            <div class="flex gap-2 mt-7">
                <div class="flex items-center px-3 text-white bg-blue-500 rounded-lg">
                    8%
                </div>
                <div class="w-full">
                    <div class="flex justify-between">
                        <p class="mb-2">Hutang Lainnya</p>
                        <p>$500</p>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-lime-400 h-2.5 rounded-full" style="width: 5%"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Chart Hutang -->
        <div class="flex flex-col items-center w-1/2 h-60">
            <canvas id="hasilChart"></canvas>
            <div>Total Hutang $4700</div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctx2 = document.getElementById('hasilChart');

                new Chart(ctx2, {
                    type: 'doughnut',
                    data: {
                        labels: ['Pendapatan', 'Pembayaran'],
                        datasets: [{
                            label: 'Total Pembayaran Perbulan',
                            data: [2500, 250],
                            backgroundColor: [
                                'rgb(54, 162, 235)',
                                'rgb(255, 4, 4, 1)'
                            ],
                            borderWidth: 1,
                            borderColor: 'rgb(93, 56, 219)',
                            hoverOffset: 7
                        }]
                    }
                });
            </script>
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
                        <span class="text-3xl font-medium">Sept, </span>
                        <span class="ml-2 text-4xl text-gray-600"> 2035</span>
                    </div>
                    <span class="block mt-2 text-sm text-gray-600">Menggunakan metode Snowball</span>
                </div>
                <div class="mt-4 mb-8 text-center sm:m-8 md:m-0 md:mt-4 md:mb-8 lg:m-8">
                    <div class="inline-flex items-center">
                        <span class="text-3xl font-medium">Sept,</span>
                        <span class="ml-2 text-4xl text-gray-600"> 2024</span>
                    </div>
                    <span class="block mt-2 text-sm text-gray-600">Metode biasa</span>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <button class="self-end px-5 text-white bg-myblue h-14 w-44 rounded-xl"><span class="inline-block text-center align-top">Simpan</d></button>
        </div>
    </div>

</div>
