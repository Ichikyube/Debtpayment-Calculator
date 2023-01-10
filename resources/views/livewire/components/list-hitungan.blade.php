<div>
    <!-- Button to show form komentar -->
    <button type="button" x-on:click="coba = 'list-hitungan', localStorage.setItem('coba', 'list-hitungan')" class="text-white text-4xl pl-1"><i class="fa-solid fa-money-bill"></i></button>
    

    <!-- Card Konten List Hitungan -->
    <div x-show="coba == 'list-hitungan'" id="hilanginscroll" class="overflow-y-scroll absolute bg-white shadow bottom-5 left-28 w-[97%] h-[90%] rounded-xl p-10 transition-all duration-500">
        <h1 class="font-bold text-3xl ml-8">List Hitungan</h1>
        <br>
        <div x-data="{ open: false }" class="bg-[#F7D3C2] py-[24px] px-[45px] rounded-[30px] mt-5">
            <!-- Head -->
            <div class="flex justify-between">
                <p class="font-bold text-xl">
                    Pinjaman, Rumah, Elektronik, Lainnya
                </p>
                <button x-on:click="open = !open" type="button" class="text-right text-2xl"><i class="fa-solid fa-chevron-down"></i></button>
            </div>

            <!-- Show Hide Content -->
            <div 
            x-show="open" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="flex">

                <div class="w-1/2">
                    <div class="flex gap-2 mt-7">
                        <div class="bg-blue-500 rounded-lg px-3 flex items-center text-white">
                            5%
                        </div>
                        <div class="w-full">
                            <div class="flex justify-between">
                                <p class="mb-2">Hutang Pinjaman</p>
                                <p>$500</p>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 5%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-2 mt-7">
                        <div class="bg-blue-500 rounded-lg px-3 flex items-center text-white">
                            5%
                        </div>
                        <div class="w-full">
                            <div class="flex justify-between">
                                <p class="mb-2">Hutang KPR</p>
                                <p>$500</p>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 5%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-2 mt-7">
                        <div class="bg-blue-500 rounded-lg px-3 flex items-center text-white">
                            5%
                        </div>
                        <div class="w-full">
                            <div class="flex justify-between">
                                <p class="mb-2">Hutang Lainnya</p>
                                <p>$500</p>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 5%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-1/2 h-60 flex justify-center">
                    <canvas id="myChart1"></canvas>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const ctx1 = document.getElementById('myChart1');

                        new Chart(ctx1, {
                            type: 'doughnut',
                            data: {
                                labels: ['Pendapatan', 'Hutang'],
                                datasets: [{
                                    label: 'Total Pembayaran Perbulan',
                                    data: [2500, 250],
                                    backgroundColor: [
                                        'rgb(54, 162, 235)',
                                        'rgb(255, 4, 4, 1)'
                                    ],
                                    hoverOffset: 7
                                }]
                            }
                        });
                    </script>
                </div>

            </div>

            <!-- Bottom Content -->
            <div class="flex justify-between">
                <div class="w-7/12 flex mt-5 gap-16">
                    <div>
                        <p>Pendapatan</p>
                        <p class="font-bold text-xl">
                            $2500
                        </p>
                    </div>
                    <div>
                        <p>Total Hutang</p>
                        <p class="font-bold text-xl">
                            $4700
                        </p>
                    </div>
                    <div>
                        <p>Pembayaran</p>
                        <p class="font-bold text-xl">
                            $250
                        </p>
                    </div>
                </div>

                <div class="w-5/12 flex justify-between">
                    <div class="flex gap-12 items-end">
                        <div>
                            <p>Snowball</p>
                            <p class="font-bold text-xl">Agustus 2030</p>
                        </div>
                        <div>
                            <p>Tanpa Snowball</p>
                            <p class="font-bold text-xl">Agustus 2045</p>
                        </div>
                    </div>
                    <div class="flex gap-4 items-end">
                        <a href="" class="text-2xl"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="text-2xl"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div x-data="{ open2: false }" class="bg-[#F7D3C2] py-[24px] px-[45px] rounded-[30px] mt-5">
            <!-- Head -->
            <div class="flex justify-between">
                <p class="font-bold text-xl">
                    Pinjaman, Rumah, Elektronik, Lainnya
                </p>
                <button x-on:click="open2 = !open2" type="button" class="text-right text-2xl"><i class="fa-solid fa-chevron-down"></i></button>
            </div>

            <!-- Show Hide Content -->
            <div 
            x-show="open2" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="flex">

                <div class="w-1/2">
                    <div class="flex gap-2 mt-7">
                        <div class="bg-blue-500 rounded-lg px-3 flex items-center text-white">
                            5%
                        </div>
                        <div class="w-full">
                            <div class="flex justify-between">
                                <p class="mb-2">Hutang Pinjaman</p>
                                <p>$500</p>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 5%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-2 mt-7">
                        <div class="bg-blue-500 rounded-lg px-3 flex items-center text-white">
                            5%
                        </div>
                        <div class="w-full">
                            <div class="flex justify-between">
                                <p class="mb-2">Hutang KPR</p>
                                <p>$500</p>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 5%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-2 mt-7">
                        <div class="bg-blue-500 rounded-lg px-3 flex items-center text-white">
                            5%
                        </div>
                        <div class="w-full">
                            <div class="flex justify-between">
                                <p class="mb-2">Hutang Lainnya</p>
                                <p>$500</p>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 5%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-1/2 h-60 flex justify-center">
                    <canvas id="myChart2"></canvas>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const ctx2 = document.getElementById('myChart2');

                        new Chart(ctx2, {
                            type: 'doughnut',
                            data: {
                                labels: ['Pendapatan', 'Hutang'],
                                datasets: [{
                                    label: 'Total Pembayaran Perbulan',
                                    data: [2500, 250],
                                    backgroundColor: [
                                        'rgb(54, 162, 235)',
                                        'rgb(255, 4, 4, 1)'
                                    ],
                                    hoverOffset: 7
                                }]
                            }
                        });
                    </script>
                </div>

            </div>

            <!-- Bottom Content -->
            <div class="flex justify-between">
                <div class="w-7/12 flex mt-5 gap-16">
                    <div>
                        <p>Pendapatan</p>
                        <p class="font-bold text-xl">
                            $2500
                        </p>
                    </div>
                    <div>
                        <p>Total Hutang</p>
                        <p class="font-bold text-xl">
                            $4700
                        </p>
                    </div>
                    <div>
                        <p>Pembayaran</p>
                        <p class="font-bold text-xl">
                            $250
                        </p>
                    </div>
                </div>

                <div class="w-5/12 flex justify-between">
                    <div class="flex gap-12 items-end">
                        <div>
                            <p>Snowball</p>
                            <p class="font-bold text-xl">Agustus 2030</p>
                        </div>
                        <div>
                            <p>Tanpa Snowball</p>
                            <p class="font-bold text-xl">Agustus 2045</p>
                        </div>
                    </div>
                    <div class="flex gap-4 items-end">
                        <a href="" class="text-2xl"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="" class="text-2xl"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


