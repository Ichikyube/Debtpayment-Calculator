<div  x-id="['index']" x-bind:id="index ? 'hutang'+ index : ''" class="bg-[#F7D3C2] snap-start snap-always mx-4 mb-8 w-11/12 lg:w-full lg:max-w-full rounded-md lg:rounded-[15px]
    shadow-sm hover:shadow-xl transition-shadow duration-300 ease-in-out"  x-data="{namaHutang:`Hutang ${index+1}`,waktuBayar:'', jmlHutang:'', bungaHutang:'', minBayar:'', monthlySalary:''}">
      <div x-data="{ open : false }" class="flex flex-row w-full px-5 py-5 align-middle border-b-2 tooltip">
        <div  class="flex items-center justify-between">
            <input x-show="open"  x-model="namaHutang" :id="$id('id')" class="w-full ml-5 text-xl font-bold border-0 rounded-md namaHutang form-input focus-visible:ring-0" type="text">
            <button type="button" class="flex px-4 py-2 font-medium group" x-bind:class="open? 'bg-myorange rounded-md -ml-12': ''"
            @click="open = !open">
            <div x-show="!open" class="ml-2 mr-4 text-xl font-bold" x-text="namaHutang"></div>
                <span class="group-hover:text-red-500"><i class="fa-solid fa-pen-to-square"></i></span></button>
		</div>
        <p class="nama"></p>
    </div>
    <div class="flex flex-row items-center justify-between w-full px-3 py-4 border-b-2 group tooltip">
        <div class="flex justify-center w-12 mr-2">
            <i class="fa-regular fa-calendar-xmark"></i>
        </div>
        @livewire('date-picker')

    </div>
    <div class="flex items-center justify-between w-full px-3 py-4 border-b-2 group tooltip">
        <div class="flex justify-center w-12 mr-2">
            <i class="fa-solid fa-coins"></i>
        </div>
        <div class="relative flex items-center justify-between w-full">
            <input x-model="jmlHutang" :id="$id('id')" class="jmlHutang  focus:text-black/30 text-transparent bg-transparent form-input z-10 peer block w-full appearance-none px-3 pt-2
            placeholder:!bg-transparent transition duration-150 truncate ease-in-out align-text-bottom sm:text-md sm:leading-1 focus:border-none focus:outline-none border-0 text-left outline-none
            focus-visible:ring-0" type="number" min="0" max="" step="100" placeholder=" ">
            <label class="absolute top-0 origin-[0] sm:w-max md:w-max lg:w-max -translate-y-4 scale-80 transform text-md text-dark duration-300
            peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-5
            peer-focus:scale-75 peer-focus:text-myblue">Jumlah Hutang <span class="text-xs text-green-600">($)</span>
            </label>
            <div class="jml"></div>
            <div class="absolute font-bold right-0 w-10/12 mr-4 text-right truncate" x-money.en-US.USD.decimal="jmlHutang"></div>
        </div>

    </div>

    <div class="flex flex-row items-center justify-between w-full px-3 py-4 border-b-2 group tooltip">
        <div class="flex justify-center w-12 mr-2">
            <i class="fa-solid fa-percent"></i>
        </div>
        <div class="relative flex items-center justify-between w-full">
            <input x-model="bungaHutang" class="bungaHutang bg-transparent focus:text-black/30 text-transparent  form-input z-10 peer block w-full appearance-none px-3 pt-2
            placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-md sm:leading-1 focus:border-none focus:outline-none border-0 text-left outline-none
            focus-visible:ring-0" x-mask="99" placeholder=" ">
            <label class="absolute truncate top-0 origin-[0] sm:w-max md:w-max lg:w-max -translate-y-4 scale-80 transform text-md text-dark duration-300
            peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-5
            peer-focus:scale-75 peer-focus:text-myblue">Suku Bunga Hutang <span class="text-xs text-green-600">(%)</span>
            </label>
            {{-- alert --}}
            <div class="bunga"></div>
            <div class="absolute font-bold right-0 w-10/12 mr-4 text-right truncate" x-text="bungaHutang?bungaHutang + ' %': ''"></div>
        </div>
    </div>
    <div class="flex flex-row items-center justify-between w-full px-3 py-4 group tooltip">
        <div class="flex justify-center w-12 mr-2">
            <i class="fa-solid fa-hand-holding-dollar"></i>
        </div>
        <div class="relative flex items-center justify-between w-full">
            <input x-model="minBayar" class="minBayar bg-transparent focus:text-black/30 text-transparent  form-input z-10 peer block w-full appearance-none px-3 pt-2
            placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-md sm:leading-2 focus:border-none focus:outline-none border-0 text-left outline-none
            focus-visible:ring-0" required type="number" min="10" step="100" placeholder=" ">
            <label class="absolute break-words text-ellipsis -top-0 lg:-top-5 md:-top-5 origin-[0] max-w-[85%] sm:w-max md:w-max lg:w-max -translate-y-4 scale-80 transform text-md text-dark duration-300
            peer-placeholder-shown:translate-y-0 peer-placeholder-shown:-top-1 leading-none peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-4 peer-focus:w-full peer-focus:leading-none
            peer-focus:scale-75 peer-focus:text-myblue">Pembayaran minimum perbulan <span class="text-xs text-green-600">($)</span>
            </label>
            <div class="min"></div>
            <div class="absolute font-bold right-0 w-10/12 mr-4 text-right truncate" x-money.en-US.USD.decimal="minBayar"></div>
        </div>
    </div>
    <template x-if="index>0">
    <div class="flex items-center justify-between py-3 text-center">
        <button @click="removeDebt(index)" class="ml-4 text-md font-bold text-red-500 px-7">
            Cancel
        </button>
    </div>
    </template>
</div>
