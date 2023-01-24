<div class="flex flex-row px-5 py-5 align-middle border-b-2">
                    <h6 class="ml-5 text-xl font-bold text-blueGray-700">Hutang <span x-text="index+1"></span></h6>
                    <p :id="'alert'+index"></p>
                </div>
                <div class="flex flex-row items-center px-3 py-4 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img class="invert" src="/img/1.svg" alt="" class="h-5">
                    </div>
                    <div class="relative flex items-center justify-between w-full"><p class="text-base text-dark">Nama Hutang</p>
                        <input class="namaHutang form-input w-full absolute appearance-none inline border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition
                        duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="text" placeholder="KPR" x-bind:value="ambilData.detail[index].debtTitle">
                    </div>
                </div>
                <div class="flex flex-row items-center px-3 py-4 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img class="invert" src="/img/moneys.svg" alt="" class="h-5">
                    </div>
                    <div class="relative flex items-center justify-between w-full">
                        <p class="text-base text-dark">Jumlah Hutang <span class="text-xs text-gray-400">($)</span></p>
                        <input class="jmlHutang form-input w-full absolute appearance-none inline border-0 outline-none
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                        focus:border-none focus:outline-none text-right focus-visible:ring-0" type="number" min="0" max="" step="100" placeholder="500000" x-bind:value="ambilData.detail[index].debtAmount">
                    </div>
                </div>

                <div class="flex flex-row items-center px-3 py-4 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img class="invert" src="/img/moneytime.svg" alt="" class="h-5">
                    </div>
                    <div class="relative flex items-center justify-between w-full">
                        <p class="text-base text-dark">Suku Bunga Hutang <span class="text-xs text-gray-400">(%)</span></p>
                        <input class="bungaHutang absolute w-full form-input appearance-none block px-3 border-0 text-right outline-none
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                        sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" max="100" placeholder="15" x-bind:value="ambilData.detail[index].debtInterest">
                    </div>
                </div>

                <div class="flex flex-row items-center px-3 py-4">
                    <div class="flex justify-center w-12 mr-2">
                        <img class="invert" src="/img/moneysend.svg" alt="" class="h-5">
                    </div>
                    <div class="relative flex items-center justify-between w-full group">
                        <p class="text-base text-dark">Pembayaran minimum perbulan <span class="text-xs text-gray-400">($)</span></p>
                        <input name="minBayar" id="minBayar" class="minBayar absolute w-full form-input appearance-none block px-3 border-0 text-right outline-none
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                        sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="10" step="100" placeholder="500" x-bind:value="ambilData.detail[index].monthlyInstallments">
                    </div>
                </div>
