<div x-data="{posts: 0}">
    <!-- Button to show form komentar -->
    <button type="button" x-on:click="coba = 'dashboard', localStorage.setItem('coba', 'dashboard')" class="pl-1 text-4xl text-white"><i class="fa-solid fa-qrcode"></i></button>


    <!-- Card Konten Dashboard -->
    <div x-show="coba == 'dashboard'" class="overflow-scroll hilanginscroll absolute bg-white shadow bottom-5 left-28 w-[97%] h-[90%] rounded-xl p-10">
        <h1 class="font-bold text-3xl ml-8">Kalkulator Hutang</h1>
        <br>
        <div class="flex gap-5 flex-row flex-nowrap overflow-x-scroll hilanginscroll" id="hilanginscroll">

            <!-- Form Kalkulator -->
            <div>
                <div class="bg-[#F7D3C2] w-[600px] rounded-[30px] drop-shadow-md">
                    <div class="flex flex-row align-middle border-b-2 px-5 py-5">
                        <h6 class="text-xl font-bold text-blueGray-700 ml-5">Hutang 1</h6>
                    </div>
    
                    <div class="flex flex-row items-center border-b-2 py-2 px-3">
                        <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                        </div>
                        <div class="flex justify-between items-center w-full"><p class="text-base text-gray-400" class="text-base text-gray-400">Tipe Hutang</p>
                            <select class="form-input appearance-none block px-3 border-0 rounded-xl outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" name="type" wire:model="type">
                                <option class="border-none" value=""></option>
                                <option class="w-1/2 p-2" wire:key="1" value="1">Hutang KPR</option>
                                <option class="w-1/2 p-2" wire:key="1" value="1">Hutang Kendaraan</option>
                                <option class="w-1/2 p-2" wire:key="1" value="1">Hutang Bank</option>
                            </select>
                        </div>
                    </div>
    
                    <div class="flex flex-row items-center border-b-2 py-2 px-3">
                        <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/moneys.svg')}}" alt="" class="h-5">
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <p class="text-base text-gray-400">Jumlah Hutang</p>
                            <input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="500000">
                        </div>
                    </div>
    
                    <div class="flex flex-row items-center border-b-2 py-2 px-3">
                        <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/moneytime.svg')}}" alt="" class="h-5">
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <p class="text-base text-gray-400">Suku Bunga Hutang</p>
                            <input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="15%">
                        </div>
                    </div>
    
                    <div class="flex flex-row items-center border-b-2 py-2 px-3">
                        <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/moneysend.svg')}}" alt="" class="h-5">
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <p class="text-base text-gray-400">Pembayaran minimum perbulan</p>
                            <input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="500">
                        </div>
                    </div>
    
                    <div class="flex flex-row items-center border-b-2 py-2 px-3">
                        <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <p class="text-base text-gray-400">Pendapatan perbulan</p>
                            <input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="5000">
                        </div>
                    </div>
    
                    <div class="flex justify-between text-center items-center py-2 px-3">
                        <button @click="posts++" class="button text-sm py-4 px-7 ml-4
                        bg-white text-red-500 font-bold rounded-[30px] drop-shadow-lg cursor-pointer select-none
                        active:translate-y-1  active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
                        active:border-b-[0px] transition-all duration-150
                        [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]  after:w-6 after:h-6 after:bg-red-500
                        after:text-white  after:font-cursive after:font-extrabold after:absolute after:-right-3
                        after:-scale-x-100  after:rounded-full after:content-['+'] after:align-middle after:text-center">
                            Tambahkan Hutang
                        </button>
                    </div>
                </div>
            </div>

            <!-- Looping Tambahan Form Hutang -->
            <template x-for="post in posts">
                <livewire:debt-calc>
            </template>
        </div>
        <div class="flex justify-end">
            <button class="bg-blue-500 px-5 py-3 rounded-xl text-white">Calculate</button>
        </div>
    </div>

    <script>
        const scrollContainer = document.getElementById("hilanginscroll");

        scrollContainer.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            scrollContainer.scrollLeft += evt.deltaY;
        });
    </script>
</div>
