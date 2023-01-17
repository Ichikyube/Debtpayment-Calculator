<div>
    <div class="bg-[#F7D3C2] w-[600px] rounded-[30px] drop-shadow-md">
        <div class="flex flex-row align-middle border-b-2 px-5 py-5">
            <h6 class="text-xl font-bold text-blueGray-700 ml-5" x-text="`Hutang ${post+1}`"></h6>
        </div>

        <div class="flex flex-row items-center border-b-2 py-2 px-3">
            <div class="flex justify-center w-12 mr-2">
                <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
            </div>
            <div class="flex items-center justify-between w-full"><p class="text-base text-gray-400" class="text-base text-gray-400">Nama Hutang</p>
                <input class="nameTitle form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="text" placeholder="Hutang KPR">
                <p x-text="validation.debtTitle"></p>
            </div>
        </div>
    
        <div class="flex flex-row items-center border-b-2 py-2 px-3">
            <div class="flex justify-center w-12 mr-2">
                <img src="{{asset('img/moneys.svg')}}" alt="" class="h-5">
            </div>
            <div class="flex justify-between items-center w-full">
                <p class="text-base text-gray-400">Jumlah Hutang</p>
                <input x-model="debtAmount" class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="500000">
                <p x-text="validation.debtAmount"></p>
            </div>
        </div>

        <div class="flex flex-row items-center border-b-2 py-2 px-3">
            <div class="flex justify-center w-12 mr-2">
                <img src="{{asset('img/moneytime.svg')}}" alt="" class="h-5">
            </div>
            <div class="flex justify-between items-center w-full">
                <p class="text-base text-gray-400">Suku Bunga Hutang</p>
                <input x-model="debtInterest" class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="15%">
                <p x-text="validation.debtInterest"></p>
            </div>
        </div>

        <div class="flex flex-row items-center border-b-2 py-2 px-3">
            <div class="flex justify-center w-12 mr-2">
                <img src="{{asset('img/moneysend.svg')}}" alt="" class="h-5">
            </div>
            <div class="flex justify-between items-center w-full">
                <p class="text-base text-gray-400">Pembayaran minimum perbulan</p>
                <input x-model="monthlyInstallments" class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="500">
                <p x-text="validation.monthlyInstallments"></p>
            </div>
        </div>

        <div class="flex justify-between text-center items-center py-3">
            <button @click="posts--" class="text-sm py-4 px-7 ml-4 font-bold text-red-500">
                Cancel
            </button>
        </div>
    </div>
</div>
