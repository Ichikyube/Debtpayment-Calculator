<div x-show="showForm" class="bg-[#F7D3C2] overflow-y-auto w-full h-full md:w-2/3 lg:w-2/5 min-h-min md:h-96 lg:h-5/6
    md:static lg:absolute lg:right-28 md:mt-0 lg:-mt-11 mt-0 top-0 lg:top-[20%] rounded-b-md md:rounded-xl
    lg:rounded-xl drop-shadow-md static hilanginscroll"
    x-transition:enter="transition ease-out duration-1000"
    x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90">
    <div class="flex flex-col">
        <div class="flex flex-col justify-between px-5 py-5 align-middle border-b-2">
            <h6 class="ml-5 text-xl font-bold text-blueGray-700">Edit Profile</h6>
            <div class="flex items-end justify-between">
                <button type="button" x-on:click="updateProfile" class="text-sm w-24 bg-white text-green-500
                    font-bold rounded-[30px] drop-shadow-lg cursor-pointer select-none py-2
                    active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
                    active:border-b-[0px] transition-all duration-150 ease-in-out hover:bg-myblue hover:text-white
                    [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]">
                    Save
                </button>
                <button type="button" x-on:click="showForm = !showForm" class="text-sm w-24 mt-4 py-2 bg-white text-red-500
                    font-bold rounded-[30px] drop-shadow-lg cursor-pointer select-none hover:bg-red-500 hover:text-white
                    active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
                    active:border-b-[0px] transition-all duration-150 ring ring-primary ring-offset-base-100 ring-offset-2
                    [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]">
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <div class="border-t border-gray-200">
        <div class="flex flex-row items-center px-4 border-b-2" >
            <div class="flex justify-center w-12 mr-2">
                <i class="fa-solid fa-signature"></i>
            </div>
            <div class="relative flex items-center justify-between w-full py-2">
                <input x-model="update.name" id="fullname" maxlength="20" type="text" class="w-1/2 form-input peer text-white/30 focus:text-black z-10 align-text-bottom text-left
                bg-white/10 block appearance-none hover:bg-myorange/10 px-3 border-0 pb-0 outline-none placeholder:!bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-1
                focus:border-none focus:outline-none focus-visible:ring-0">
                <label for="fullname" class="absolute top-3 origin-[0] break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-lg
                bg-main text-dark duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0
                peer-focus:-translate-y-5 peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Full Name</label>
                <div class="w-full text-lg font-bold text-center text-zinc-900 lr-4" x-text="update.name"></div>
            </div>
        </div>
    </div>
    <div class="border-t border-gray-200">
        <div class="flex flex-row items-center px-4 border-b-2">
            <div class="flex justify-center w-12 mr-2">
                <i class="fa-solid fa-venus-mars"></i>
            </div>
            <div class="relative flex items-center justify-between w-full py-2">
                <select x-model="update.gender" name="gender" id="gender"
                class="w-fit form-input peer hover:bg-myorange/10 text-white/30 pb-0 focus:text-black z-10 align-text-bottom text-left bg-white/10 block
                appearance-none px-3 border-0 outline-none placeholder:!bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-1
                focus:border-none focus:outline-none focus-visible:ring-0">
                    <option class="text-xs text-center">-- Choose Gender --</option>
                    <option class="text-xs">Man</option>
                    <option class="text-xs">Woman</option>
                </select>
                <label for="gender" class="absolute top-3 origin-[0] break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-lg
                bg-main text-dark duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0
                peer-focus:-translate-y-5 peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Gender</label>
                <i class="w-full text-lg font-bold text-center text-zinc-900 lr-4" x-bind:class="update.gender == 'Man'? 'fa-solid fa-mars' : update.gender == 'Woman'? 'fa-solid fa-venus': ' '"></i>
            </div>
        </div>
    </div>
    <div class="flex flex-row items-center px-4 border-b-2">
        <div class="flex justify-center w-12 mr-2">
            <i class="fa-solid fa-hospital"></i>
        </div>
        <div class="relative flex items-center justify-between w-full py-2">
            <input x-model="update.tempat_lahir" type="text" maxlength="20" class="w-1/2 form-input peer pt-5 text-white/30 focus:text-black z-10 align-text-bottom text-left bg-white/10 block
            appearance-none px-3 border-0 outline-none hover:bg-myorange/10 pb-0 placeholder:!bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-1
            focus:border-none focus:outline-none focus-visible:ring-0">
            <label class="absolute top-3 origin-[0] break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-lg
            bg-main text-dark duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0
            peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Birth Place</label>
            <div class="w-full text-lg font-bold text-center text-zinc-900 lr-4" x-text="update.tempat_lahir"></div>
        </div>
    </div>
    <div class="flex flex-row items-center px-4 border-b-2">
        <div class="flex justify-center w-12 mr-2">
            <i class="fa-solid fa-cake-candles"></i>
        </div>
        <div class="relative flex items-center justify-between w-full py-2">
            <input x-model="update.tgl_lahir" type="date" class="w-1/2 form-input peer hover:bg-myorange/10 text-white/30 focus:text-black z-10 align-text-bottom text-left bg-white/10 block
                appearance-none px-3 border-0 outline-none pb-0 placeholder:!bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-1
                focus:border-none focus:outline-none focus-visible:ring-0">
            <label class="absolute top-3 origin-[0] break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-lg
                bg-main text-dark duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0
                peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Date of Birth</label>
            <div class="w-full text-lg font-bold text-center break-words text-zinc-900 lr-4"  x-text="new Date(update.tgl_lahir).toLocaleDateString('default', { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' })"></div>
            {{-- <x-birthDate-picker ddate="update.tgl_lahir"/> --}}
        </div>
    </div>
    <div class="flex flex-row items-start px-4 h-max">
        <div class="flex justify-center w-12 mt-4 mr-2">
            <i class="fa-solid fa-map"></i>
        </div>
        <div class="relative flex items-start justify-between w-full py-2">
            <input x-model="update.alamat"  maxlength="80" type="text" class="w-full form-input peer hover:bg-myorange/10 text-white/30 focus:text-black z-10 align-text-bottom text-left bg-white/10 block
            appearance-none px-3 border-0 outline-none pb-0 placeholder:!bg-transparent sm:text-sm sm:leading-1
            focus:border-none focus:outline-none focus-visible:ring-0">
            <label class="absolute top-3 origin-[0] break-word sm:w-max md:w-max lg:w-max -translate-y-6 h-max scale-75 transform text-lg
            bg-main text-dark duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0
                peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Address</label>
        </div>
    </div>
    <div class="w-7/12 mr-5 text-lg font-bold text-center break-words text-zinc-900 lr-4" x-text="update.alamat"></div>
    <br><br>
</div>
