<div id="hilanginscroll" x-data="{modelOpen: false}" x-init="listData" x-cloak>
    <div class="flex justify-between">
        <div x-show="notif" class="w-5 h-5 bg-red-500"></div>
        <h1 class="my-4 ml-8 text-3xl font-bold lg:my-0 drop-shadow-md">List Hitungan</h1>
        <div class="ml-3 text-sm font-medium" x-text="messages"></div>
        <template x-if="messages != null">
            <div id="alert-4" class="flex p-4 mr-5 text-yellow-700 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                {{-- pesan notifikasi --}}

                <div class="ml-3 text-sm font-medium" x-text="messages"></div>

                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-4" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </template>
    </div>
    <br>
    <template x-if="isLoading && list == 0">
        <div class="flex flex-col items-center justify-center w-full h-full min-h-[300px] align-center mx-auto bg-white">
            <span class="block w-6 h-6 text-center whitespace-normal border-4 rounded-full border-t-blue-300 animate-spin"></span>
            loading...
        </div>
    </template>

    <div class="flex flex-col px-4 overflow-y-scroll h-[443px] touch-auto hilanginscroll">
        <!-- Looping List Hutang -->
        <template x-for="data in list">
            <div  x-data="{ open: false, delete1: false}" class="bg-[#F7D3C2] py-[24px] lg:px-[45px] px-5 rounded-[15px] mb-5 shadow-sm hover:shadow-md transition-shadow duration-300 ease-in-out">
                <!-- Head -->
                <div class="flex justify-between">
                    <p class="inline-block text-xl font-semibold text-gray-800 truncate w-96">
                        <template x-for="detail in data.debt_details">
                            <span x-text="data.debt_details.length == 1 ? `${detail.debtTitle}` : `${detail.debtTitle}, `"></span>
                        </template>
                    </p>
                    <button x-on:click="open = !open" @click="chart(data.id,data.monthly_salary,data.total_min_payment)" type="button" class="text-2xl text-right"><i class="fa-solid fa-chevron-down"></i></button>
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
                class="flex flex-wrap">

                    <!-- List Detail Hutang -->
                    <div class="w-1/2 my-5 h-[250px] overflow-scroll hilanginscroll">

                        <template x-for="detail in data.debt_details">
                            <div class="flex gap-2 mt-3">
                                <div>
                                    <div class="flex items-center px-3 py-2 text-white bg-[#2A7C97] rounded-lg" x-text="detail.debtInterest+'%'">
                                    </div>
                                    <p class="text-center mt-[8px]" x-text="formatUang(detail.monthlyInstallments)"></p>
                                </div>
                                <div class="w-full">
                                    <div class="flex justify-between py-2">
                                        <p class="mb-2" x-text="detail.debtTitle"></p>
                                        <p class="mb-2" x-text="formatTglFull(detail.datePayment)"></p>
                                    </div>
                                    <div class="flex items-center gap-2" x-data="{persen: detail.monthlyInstallments/detail.debtAmount*100}">
                                        <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                                            <div class="bg-[#2A7C97] h-2.5 rounded-full" x-bind:style="'width: '+persen+'%'"></div>
                                        </div>
                                        <p x-text="formatUang(detail.debtAmount)"></p>
                                    </div>

                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Chart Hutang -->
                    <div class="flex justify-center w-1/2 h-60">
                        <canvas width="300px" x-bind:id="'myChart'+data.id"></canvas>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            function chart(id, pendapatan, hutang){
                                const ctx = document.getElementById('myChart'+id);
                                new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: ['Pendapatan', 'Total Min Bayar'],
                                        datasets: [{
                                            label: 'Perbulan',
                                            data: [pendapatan, hutang],
                                            backgroundColor: [
                                                'rgb(42, 124, 151)',
                                                'rgb(254, 159, 87)'
                                            ],
                                            hoverOffset: 7
                                        }]
                                    }
                                });
                            }
                        </script>
                    </div>

                </div>

                <!-- Bottom Content -->
                <div class="flex flex-wrap justify-between break-words">
                    <div class="flex gap-5 mt-5 lg:gap-16 lg:w-6/12">
                        <div>
                            <p class="text-sm break-all">Pendapatan</p>
                            <p class="text-lg font-bold text-gray-700" x-text="formatUang(data.monthly_salary)">
                            </p>
                        </div>
                        <div>
                            <p class="text-sm break-all">Total Hutang</p>
                            <p class="text-lg font-bold text-gray-700" x-text="formatUang(data.total_debt)">
                            </p>
                        </div>
                        <div>
                            <p class="text-sm break-all">Pembayaran</p>
                            <p class="text-lg font-bold text-gray-700" x-text="formatUang(data.total_min_payment)">
                                $250
                            </p>
                        </div>
                        <div>
                            <p class="text-sm break-all">Extra</p>
                            <p class="text-lg font-bold text-gray-700" x-text="formatUang(data.extra_salary)">
                                $250
                            </p>
                        </div>
                    </div>

                    <div class="flex justify-between w-full lg:w-6/12">
                        <div class="flex items-end gap-2 lg:gap-10">
                            <template x-if="data.debt_details.length > 1 || data.extra_salary > 20">
                                <div>
                                    <p class="">Snowball</p>
                                    <p class="text-xl font-bold text-myyellow" x-text="formatTgl(data.snowball_calculator)"></p>
                                </div>
                            </template>
                            <div>
                                <p>Tanpa Snowball</p>
                                <p class="text-xl font-bold text-gray-700" x-text="formatTgl(data.normal_calculator)"></p>
                            </div>
                        </div>
                        <div x-data="$store.getData" class="flex flex-col items-end gap-2 lg:flex-row">
                            <!-- Buton Edit -->
                            <button x-on:click.prevent="ubah(data.id),console.log('data ke ' + data.id ), tab = 'edit-hitungan', localStorage.setItem('tab', 'edit-hitungan')" class="text-xl bg-[#2A7C97] px-1 text-[#F7D3C2] rounded shadow"><i class="fa-solid fa-pen-to-square"></i></button>

                            <!-- Button Delete -->
                            <div>
                                <button x-on:click="modelOpen =!modelOpen , idDebt = data.id" class="text-xl">
                                    <span class="bg-[#2A7C97] px-1 text-[#F7D3C2] rounded shadow"><i class="fa-regular fa-trash-can"></i></span>
                                </button>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
    <!-- Modal Delete Confirmation -->
    <livewire:modal-erase/>
</div>




