<div class="bg-[#F7D3C2] ml-[88px] max-h-fit py-[32px] px-[45px] rounded-[30px] w-1/2 drop-shadow-md">
    <h6 class="text-xl font-bold text-blueGray-700">Mulai dengan mengurutkan hutang Anda.</h6>
    <hr class="mt-4 mb-6 border-b-1 border-blueGray-300">
    <div id="sliding debts">
        <div class="flex flex-row align-middle"><div class="flex justify-center w-12 mr-2"><img src="{{asset('img/1.svg')}}" alt=""></div>
            <div class="flex justify-between w-full"><p class="text-base text-gray-400" class="text-base text-gray-400">Tipe Hutang</p>
                <livewire:dropdown-select>
            </div>
        </div>
        <hr class="mt-4 mb-6 border-b-1 border-blueGray-300">
        <div class="flex flex-row align-middle"><div class="flex justify-center w-12 mr-2"><img src="{{asset('img/moneys.svg')}}" alt=""></div>
        <div class="flex justify-between w-full"><p class="text-base text-gray-400">Jumlah Hutang</p><input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="text" placeholder="500000"></div>
        </div>
        <hr class="mt-4 mb-6 border-b-1 border-blueGray-300">
        <div class="flex flex-row align-middle"><div class="flex justify-center w-12 mr-2"><img src="{{asset('img/moneytime.svg')}}" alt=""></div>
        <div class="flex justify-between w-full"><p class="text-base text-gray-400">Suku Bunga Hutang</p><input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="text" placeholder="15%"></div>
        </div>
        <hr class="mt-4 mb-6 border-b-1 border-blueGray-300">
        <div class="flex flex-row align-middle"><div class="flex justify-center w-12 mr-2"><img src="{{asset('img/moneysend.svg')}}" alt=""></div>
        <div class="flex justify-between w-full"><p class="text-base text-gray-400">Pembayaran minimum perbulan</p><input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="text" placeholder="500"></div>
        </div>
        <hr class="mt-4 mb-6 border-b-1 border-blueGray-300">
        <div class="flex flex-row align-middle"><div class="flex justify-center w-12 mr-2"><img src="{{asset('img/1.svg')}}" alt=""></div>
            <div class="flex justify-between w-full"><p class="text-base text-gray-400">Pendapatan perbulan</p><input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent
                        transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="text" placeholder="5000"></div>
        </div>
        <hr class="mt-4 mb-6 border-b-1 border-blueGray-300">
        <div class="flex justify-between text-center">
            <button wire:click.prevent="removeProduct({{$index}})"
                class="text-sm p-5 font-bold text-blueGray-700 rounded-[30px]">
                cancel
            </button>
        </div>
    </div>
</div>
