html:`
            <div x-id="['index']" x-bind:id="index ? 'hutang'+ index : ''" class="bg-[#F7D3C2] snap-start snap-always mx-4 mb-8 w-11/12 lg:w-full lg:max-w-full rounded-md lg:rounded-[15px]
            shadow-sm hover:shadow-xl transition-shadow duration-300 ease-in-out"  x-data="{namaHutang:"'alert'+index", jmlHutang:'', bungaHutang:'', minBayar:'', monthlySalary:''}">
            <div class="flex flex-row px-5 py-5 align-middle border-b-2">
                <input :id="$id('id')" x-ref="namaHutang" class="ml-5 text-xl font-bold border-0 appearance-none text-blueGray-700 outline-none
                placeholder:!bg-transparent bg-transparent focus:border-none focus:outline-none
                focus-visible:ring-0" type="text" x-bind:value="ambilData.detail[index].debtTitle">
                <p :id="'alert'+index"></p>
            </div>
            <div class="flex flex-row items-center justify-between w-full px-3 py-4 border-b-2">
                <div class="flex flex-row items-center">
                    <div class="flex justify-center w-12 mr-2">
                        <i class="fa-regular fa-calendar-xmark"></i>
                    </div>
                    <div class="relative tanggalPembayaran flex items-center justify-between w-fit">
                        <input x-model="tanggalPembayaran" x-ref="tanggalPembayaran"  class="namaHutang form-input z-10 peer bg-white/10 text-white/30 focus:text-dark block w-full appearance-none px-3 pt-5  border-0 text-left outline-none
                        placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-sm sm:leading-1 focus:border-none focus:outline-none
                        focus-visible:ring-0" type="date" placeholder=" " >
                        <label class="absolute top-3 origin-[0] break-words sm:w-max md:w-max lg:w-max -translate-y-4 scale-80 transform text-sm text-dark duration-300
                        peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-4
                        peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Tanggal Pembayaran Selanjutnya</label>
                    </div>
                </div>
                <div class="mr-4 text-right"  x-text="new Date(jatuhTemo).toLocaleDateString('default', { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' })"></div>
            </div>
            <div class="flex items-center justify-between w-full px-3 py-4 border-b-2">
                <div class="flex flex-row items-center">
                    <div class="flex justify-center w-12 mr-2">
                        <i class="fa-solid fa-coins"></i>
                    </div>
                    <div class="relative flex items-center justify-between w-fit">
                        <input :id="$id('id')" x-ref="tanggalPembayaran" class="jmlHutang text-white/30 focus:text-black form-input z-10 peer bg-white/10 block w-full appearance-none px-3 pt-5  border-0 text-left outline-none
                        placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-sm sm:leading-1 focus:border-none focus:outline-none
                        focus-visible:ring-0" type="number" min="0" max="" step="100" placeholder=" " x-bind:value="ambilData.detail[index].debtAmount">
                        <label class="absolute top-3 origin-[0]  break-word sm:w-max md:w-max lg:w-max -translate-y-4 scale-100 transform text-sm text-dark duration-300
                        peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-125 peer-focus:left-0 peer-focus:-translate-y-4
                        peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Jumlah Hutang <span class="text-xs text-green-600">($)</span>
                        </label>
                    </div>
                </div>
                <div class="mr-4 text-right" x-money.en-US.USD.decimal="jmlHutang"></div>
            </div>

            <div class="flex flex-row items-center justify-between w-full px-3 py-4 border-b-2">
                <div class="flex flex-row items-center w-1/2">
                    <div class="flex justify-center w-12 mr-2">
                        <i class="fa-solid fa-percent"></i>
                    </div>
                    <div class="relative flex items-center justify-between w-fit">
                        <input x-model="bungaHutang" x-ref="bungaHutang" class="bungaHutang text-white/30 focus:text-black form-input z-10 peer bg-white/10 block w-full appearance-none pt-5  border-0 text-left outline-none
                        placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-sm sm:leading-1 focus:border-none focus:outline-none
                        focus-visible:ring-0" x-mask="99" placeholder=" " x-bind:value="ambilData.detail[index].debtInterest">
                        <label class="absolute top-3 truncate origin-[0] sm:w-max md:w-max lg:w-max -translate-y-4 scale-80 transform text-sm text-dark duration-300
                        peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-4
                        peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Suku Bunga Hutang <span class="text-xs text-green-600">(%)</span>
                        </label>
                    </div>
                </div>
                <div class="mr-4 text-right w-fit" x-text="bungaHutang?bungaHutang + ' %': ''"></div>
            </div>
            <div class="flex flex-row items-center justify-between w-full px-3 py-4">
                <div class="flex flex-row items-center">
                    <div class="flex justify-center w-12 mr-2">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <div class="relative flex items-center justify-between w-fit group">
                        <input name="minBayar" id="minBayar" x-ref="bungaHutang" class="minBayar  form-input align-text-bottom z-10 pt-5  peer bg-white/10 block w-full appearance-none px-3 border-0
                        text-left outline-none placeholder:!bg-transparent  text-white/30 focus:text-black transition duration-150 ease-in-out sm:text-sm sm:leading-1 focus:border-none
                        focus:outline-none focus-visible:ring-0" required type="number" min="10" step="100" placeholder=" " x-bind:value="ambilData.detail[index].monthlyInstallments">
                        <label class="absolute top-3 origin-[0] break-word w-44  lg:w-max -translate-y-4 scale-80 transform text-sm text-dark duration-300
                        peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-4 text-ellipsis
                        peer-focus:scale-75 peer-focus:text-myblue break-words peer-focus:dark:text-blue-500">Pembayaran minimum perbulan <span class="text-xs text-green-600">($)</span>
                        </label>
                    </div>
                </div>
                <div class="mr-4 text-right" x-money.en-US.USD.decimal="minBayar"></div>
            </div>
            <template x-if="index>0">
            <div class="flex items-center justify-between py-3 text-center">
                <button @click="removeDebt(index)" class="ml-4 text-sm font-bold text-red-500 px-7">
                    Cancel
                </button>
            </div>
            </template>
        </div>`,
