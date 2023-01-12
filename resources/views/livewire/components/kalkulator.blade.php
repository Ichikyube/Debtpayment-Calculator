<div x-data="{
    posts: 0,
    debtTitle: [],
    debtAmount: [],
    debtInterest: [],
    monthlyInstallments: [],
    paymentDate: [],
    mountlySalary: null,
    extraSalary: null,
    create_at: new Date(),
    update_at: new Date(),
    async tambahItem() {
          const data = new FormData()
          data.append('debtTitle', this.debtTitle)
          data.append('debtAmount', this.debtAmount)
          data.append('debtInterest', this.debtInterest)
          data.append('monthlyInstallments', this.monthlyInstallments)
          data.append('paymentDate', this.paymentDate)
          data.append('mountlySalary', this.mountlySalary)
          data.append('extraSalary', this.extraSalary)
          data.append('create_at', this.create_at)
          data.append('update_at', this.update_at)
          const tambah = fetch('http://127.0.0.1:3000/api/debt', {
            method: 'POST',
            body: data,
          })
            .then(response => response.json())
            .then(reponse => reponse.json())
            .then(data => {
                if (data.success == true) {
                    console.log(data);
                    window.location.replace('http://127.0.0.1:8000/dashboard')
                }
                if (data.success == false) {
                    this.validation = data.error;
                }
            });
        },
    addNewForm(){
        this.debtTitle.push(null);
        this.debtAmount.push(null);
        this.debtInterest.push(null);
        this.monthlyInstallments.push(null);
        this.paymentDate.push(null);
    }
        
}">
    <!-- Button to show form komentar -->
    <button type="button" x-on:click="coba = 'dashboard', localStorage.setItem('coba', 'dashboard')" class="pl-1 text-4xl text-white"><i class="fa-solid fa-qrcode"></i></button>

    <!-- Card Konten Dashboard -->
    <div x-show="coba == 'dashboard'" class="overflow-scroll hilanginscroll absolute bg-white shadow bottom-5 left-28 w-[97%] h-[90%] rounded-xl p-10">
        <h1 class="ml-8 text-3xl font-bold">Kalkulator Hutang</h1>
        <br>
        <template x-if="calculated">
            @livewire('components.hasil-hitungan')
        </template>

        <template x-if="!calculated">
            <div class="flex flex-row gap-5 overflow-x-scroll flex-nowrap hilanginscroll" id="hilanginscroll">

                <!-- Form Kalkulator -->
                <div>
                    <div class="bg-[#F7D3C2] w-[600px] rounded-[30px] drop-shadow-md">
                        <div class="flex flex-row px-5 py-5 align-middle border-b-2">
                            <h6 class="ml-5 text-xl font-bold text-blueGray-700">Hutang 1</h6>
                        </div>

                        <div class="flex flex-row items-center px-3 py-2 border-b-2">
                            <div class="flex justify-center w-12 mr-2">
                                <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                            </div>
                            <div class="flex items-center justify-between w-full"><p class="text-base text-gray-400" class="text-base text-gray-400">Tipe Hutang</p>
                                <select class="form-input appearance-none block px-3 border-0 rounded-xl outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" name="type" wire:model="type">
                                    <option class="border-none" value=""></option>
                                    <option class="w-1/2 p-2" wire:key="1" value="1">Hutang KPR</option>
                                    <option class="w-1/2 p-2" wire:key="1" value="1">Hutang Kendaraan</option>
                                    <option class="w-1/2 p-2" wire:key="1" value="1">Hutang Bank</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-row items-center px-3 py-2 border-b-2">
                            <div class="flex justify-center w-12 mr-2">
                                <img src="{{asset('img/moneys.svg')}}" alt="" class="h-5">
                            </div>
                            <div class="flex items-center justify-between w-full">
                                <p class="text-base text-gray-400">Jumlah Hutang</p>
                                <input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="500000">
                            </div>
                        </div>

                        <div class="flex flex-row items-center px-3 py-2 border-b-2">
                            <div class="flex justify-center w-12 mr-2">
                                <img src="{{asset('img/moneytime.svg')}}" alt="" class="h-5">
                            </div>
                            <div class="flex items-center justify-between w-full">
                                <p class="text-base text-gray-400">Suku Bunga Hutang</p>
                                <input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="15%">
                            </div>
                        <div class="flex justify-between items-center w-full">
                            <p class="text-base text-gray-400">Jumlah Hutang</p>
                            <input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" x-model="" type="number" placeholder="5000">
                        </div>

                        <div class="flex flex-row items-center px-3 py-2 border-b-2">
                            <div class="flex justify-center w-12 mr-2">
                                <img src="{{asset('img/moneysend.svg')}}" alt="" class="h-5">
                            </div>
                            <div class="flex items-center justify-between w-full">
                                <p class="text-base text-gray-400">Pembayaran minimum perbulan</p>
                                <input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="500">
                            </div>
                        </div>

                        <div class="flex flex-row items-center px-3 py-2 border-b-2">
                            <div class="flex justify-center w-12 mr-2">
                                <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                            </div>
                            <div class="flex items-center justify-between w-full">
                                <p class="text-base text-gray-400">Pendapatan perbulan</p>
                                <input class="form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="5000">
                            </div>
                        </div>

                        <div class="flex items-center justify-between px-3 py-2 text-center">
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
            </div>
            </div>

                <!-- Looping Tambahan Form Hutang -->
                <template x-for="post in posts">
                    <livewire:debt-calc>
                </template>
                <div class="flex justify-end ">
                    <button @click="calculated = true" class="absolute self-end px-5 text-white right-10 bottom-10 bg-myblue h-14 w-44 rounded-xl">Calculate</button>
                </div>
            </div>
        </template>

    </div>

    <script>
        const scrollContainer = document.getElementById("hilanginscroll");

        scrollContainer.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            scrollContainer.scrollLeft += evt.deltaY;
        });
    </script>

</div>
