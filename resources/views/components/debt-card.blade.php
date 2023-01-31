<!-- This is a debt card component -->
<div {{ $attributes }} class="bg-[#F7D3C2] snap-start snap-always mx-4 mb-8 w-11/12 lg:w-full lg:max-w-full rounded-md lg:rounded-[15px]
    shadow-sm hover:shadow-xl transition-shadow duration-300 ease-in-out"  x-data="{namaHutang:`Debt Title ${index+1}`,waktuBayar:'', jmlHutang:'', bungaHutang:'', minBayar:'', monthlySalary:''}">
    <div x-data="{ editTitle : false }" class="flex flex-row w-full px-5 py-5 align-middle border-b-2 tooltip">
        <div  class="flex items-center justify-between">
            <input x-show="editTitle"  x-model="namaHutang" :id="$id('id')" class="w-full ml-5 text-xl font-bold border-0 rounded-md namaHutang form-input focus-visible:ring-0" type="text">
            <button type="button" class="flex px-4 py-2 font-medium group" x-bind:class="editTitle? 'bg-myorange rounded-md -ml-12': ''"
            @click="editTitle = !editTitle">
            <div x-show="!editTitle" class="ml-2 mr-4 text-xl font-bold" x-text="namaHutang"></div>
                <span class="group-hover:text-red-500"><i class="fa-solid fa-pen-to-square"></i></span></button>
		</div>
        <p class="bg-red-600 nama"></p><!-- validation -->
    </div>
    <!-- Due Date -->
    <div class="flex flex-row items-center justify-between w-full px-3 py-4 border-b-2 group tooltip">
        <div class="flex justify-center w-12 mr-2">
            <i class="fa-regular fa-calendar-xmark"></i>
        </div>
        {{ $date }}
    </div>
    <!-- Debt Amount -->
    <div class="flex items-center justify-between w-full px-3 py-4 border-b-2 group tooltip">
        <div class="flex justify-center w-12 mr-2">
            <i class="fa-solid fa-coins"></i>
        </div>
        <div class="relative flex items-center justify-between w-full">
            <input x-model="jmlHutang" :id="$id('id')" class="jmlHutang  focus:text-black/30 text-transparent bg-transparent form-input z-10 peer block w-full appearance-none px-3 pt-2
            placeholder:!bg-transparent transition duration-150 truncate ease-in-out align-text-bottom sm:text-md sm:leading-1 focus:border-none focus:outline-none border-0 text-left outline-none
            focus-visible:ring-0" type="number" min="0" max="" step="100" placeholder=" ">
            <label class="absolute top-0 origin-[0] sm:w-max md:w-max lg:w-max -translate-y-4 scale-80 transform text-md font-semibold text-green-800 duration-300
            peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-5
            peer-focus:scale-75 peer-focus:text-lime-600">Debt Amount <span class="text-xs text-green-600">($)</span>
            </label>
            <div class="bg-red-600 jml"></div><!-- validation -->
            <div x-show="jmlHutang" class="absolute right-0 w-10/12 mr-4 font-bold text-right truncate" x-money.en-US.USD.decimal="jmlHutang"></div>
        </div>

    </div>
    <!-- Interest Rate -->
    <div class="flex flex-row items-center justify-between w-full px-3 py-4 border-b-2 group tooltip">
        <div class="flex justify-center w-12 mr-2">
            <i class="fa-solid fa-percent"></i>
        </div>
        <div class="relative flex items-center justify-between w-full">
            <input x-model="bungaHutang" class="bungaHutang bg-transparent focus:text-black/30 text-transparent  form-input z-10 peer block w-full appearance-none px-3 pt-2
            placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-md sm:leading-1 focus:border-none focus:outline-none border-0 text-left outline-none
            focus-visible:ring-0" x-mask="99" placeholder=" ">
            <label class="absolute truncate top-0 origin-[0] sm:w-max md:w-max lg:w-max -translate-y-4 scale-80 transform text-md font-semibold text-green-800 duration-300
            peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-5
            peer-focus:scale-75 peer-focus:text-lime-600">Debt Interest Rate <span class="text-xs text-green-600">(%)</span>
            </label>
            {{-- alert --}}
            <div class="bunga"></div><!-- validation -->
            <div class="absolute right-0 w-10/12 mr-4 font-bold text-right truncate" x-text="bungaHutang?bungaHutang + ' %': ''"></div>
        </div>
    </div>
    <!-- Minimum Payment -->
    <div class="flex flex-row items-center justify-between w-full px-3 py-4 group tooltip">
        <div class="flex justify-center w-12 mr-2">
            <i class="fa-solid fa-hand-holding-dollar"></i>
        </div>
        <div class="relative flex items-center justify-between w-full">
            <input x-model="minBayar" class="minBayar bg-transparent focus:text-black/30 text-transparent  form-input z-10 peer block w-full appearance-none px-3 pt-2
            placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-md sm:leading-1 focus:border-none focus:outline-none border-0 text-left outline-none
            focus-visible:ring-0" required type="number" min="10" step="100" placeholder=" ">
            <label class="absolute truncate top-0 origin-[0] w-[90%] sm:w-max md:w-max lg:w-max -translate-y-4 scale-80 transform text-md font-semibold text-green-800 duration-300
            peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-5 peer-focus:w-[100%]
            peer-focus:scale-75 peer-focus:text-lime-600">Monthly Minimum Payment <span class="text-xs text-green-600">($)</span>
            </label>
            <div class="min"></div><!-- validation -->
            <div x-show="minBayar" class="absolute right-0 w-10/12 mr-4 font-bold text-right truncate" x-money.en-US.USD.decimal="minBayar"></div>
        </div>
    </div>
    {{ $slot }}
</div>
