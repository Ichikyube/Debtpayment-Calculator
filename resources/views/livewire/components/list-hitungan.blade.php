<div id="hilanginscroll" x-data="{modelOpen: false }" x-init="await listData()" x-cloak>
    <h1 class="my-4 ml-8 text-3xl font-bold lg:my-0 drop-shadow-md">List Hitungan</h1>
    <br>
    <template x-if="isLoading && list == 0">
        <div class="flex flex-col items-center justify-center w-full h-full min-h-[300px] align-center mx-auto bg-white">
            <span class="block w-6 h-6 text-center whitespace-normal border-4 rounded-full border-t-blue-300 animate-spin"></span>
            loading...
        </div>
    </template>
    <!-- Looping Tambahan Form Hutang -->
    <div class="flex flex-col px-4 overflow-y-scroll h-[443px] touch-auto hilanginscroll">
    <template x-for="data in list">
    <div x-data="{ open: false, delete1: false}" class="bg-[#F7D3C2] py-[24px] px-[45px] rounded-[30px] shadow-sm hover:shadow-md transition-shadow duration-300 ease-in-out">
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

            <!-- List Hutang -->
            <div class="w-1/2 my-5 h-[250px] overflow-scroll hilanginscroll">

                <template x-for="detail in data.debt_details">
                    <div class="flex gap-2 mt-3">
                        <div>
                            <div class="flex items-center px-3 py-2 text-white bg-[#2A7C97] rounded-lg" x-text="detail.debtInterest+'%'">
                            </div>
                            <p class="text-center" x-text="formatUang(detail.monthlyInstallments)"></p>
                        </div>
                        <div class="w-full">
                            <div class="flex justify-between py-2">
                                <p class="mb-2" x-text="detail.debtTitle"></p>
                                <p x-text="formatUang(detail.debtAmount)"></p>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-[#2A7C97] h-2.5 rounded-full" style="width: 5%"></div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Chart Hutang -->
            <div class="flex justify-center w-1/2 h-60">
                <canvas x-bind:id="'myChart'+data.id"></canvas>
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
            <div class="flex gap-16 mt-5 lg:w-6/12">
                <div>
                    <p>Pendapatan</p>
                    <p class="text-xl font-bold text-gray-700" x-text="formatUang(data.monthly_salary)">
                    </p>
                </div>
                <div>
                    <p>Total Hutang</p>
                    <p class="text-xl font-bold text-gray-700" x-text="formatUang(data.total_debt)">
                    </p>
                </div>
                <div>
                    <p class="break-all">Pembayaran</p>
                    <p class="text-xl font-bold text-gray-700" x-text="formatUang(data.total_min_payment)">
                        $250
                    </p>
                </div>
            </div>

            <div class="flex justify-between w-full lg:w-6/12">
                <div class="flex items-end gap-2 lg:gap-12">
                    <div>
                        <p class="">Snowball</p>
                        <p class="text-xl font-bold text-myyellow" x-text="formatTgl(data.snowball_calculator)"></p>
                    </div>
                    <div>
                        <p>Tanpa Snowball</p>
                        <p class="text-xl font-bold text-gray-700" x-text="formatTgl(data.normal_calculator)"></p>
                    </div>
                </div>
                <div x-data="$store.getData" class="flex items-end gap-2">
                    <!-- Buton Edit -->
                    <button x-on:click.prevent="ubah(data.id), tab = 'edit-hitungan', localStorage.setItem('tab', 'edit-hitungan')" class="text-xl bg-[#2A7C97] px-1 text-[#F7D3C2] rounded shadow"><i class="fa-solid fa-pen-to-square"></i></button>

                    <!-- Button Delete -->
                    <div>
                        <button @click="modelOpen =!modelOpen" class="text-xl">
                            <span class="bg-[#2A7C97] px-1 text-[#F7D3C2] rounded shadow"><i class="fa-regular fa-trash-can"></i></span>
                        </button>

                        <!-- Modal Delete Confirmation -->
                        <livewire:modal-erase/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </template>
    </div>
</div>




