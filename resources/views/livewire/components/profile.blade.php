<div>
    <!-- Button to show form komentar -->
    <button type="button" x-on:click="coba = 'profile', localStorage.setItem('coba', 'profile')" class="pl-1 text-4xl text-white"><i class="fa-regular fa-user"></i></button>


    <!-- Card Konten profile -->
    <div x-show="coba == 'profile'" class="absolute bg-white shadow bottom-5 left-28 w-[97%] h-[90%] rounded-xl p-10">

        <h1 class="mb-5 text-3xl font-bold">profile</h1>
        <div class="flex mt-14">
            <div class="w-1/2">
                <div class="flex flex-col justify-center -mt-8">
                    <img src="{{asset('img/avatar.svg')}}" class="self-center w-40 h-40 p-1 -mt-3 border-2 border-white border-solid rounded-full ring-2 ring-gray-300 dark:ring-gray-500" alt="Bordered avatar">
                    <div class="mt-12 text-center">
                        <h3 class="mb-2 text-4xl font-semibold leading-normal text-blueGray-700">
                          Fulanah
                        </h3>
                        <div class="mt-0 mb-2 text-sm font-bold leading-normal uppercase text-blueGray-400">
                            fulan@fulanah.com
                        </div>
                        <div class="w-1/2 mx-auto mb-2 text-justify text-blueGray-600">
                          <p>Jenis Kelamin  : <span>Laki-Laki</span></p>
                          <p>Tempat, Tgl Lahir  : <span>Bandung, 02-Okt-2002</span></p>
                          <p>Alamat                    : <span>Jl Cisitu Indah 2 no 16
                            Kecamatan Coblong,
                            Bandung, Jawa Barat</span></p>
                        </div>
                      </div>
                </div>

            </div>
            <div class="bg-[#F7D3C2] w-1/3 h-96 rounded-[30px] drop-shadow-md">
                <div class="flex flex-row px-5 py-5 align-middle border-b-2">
                    <h6 class="ml-5 text-xl font-bold text-blueGray-700">Edit Profile</h6>
                </div>

                <div class="flex flex-row items-center px-3 py-2 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <p class="text-base text-gray-400" class="text-base text-gray-400">Nama Lengkap</p>
                    </div>
                </div>

                <div class="flex flex-row items-center px-3 py-2 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img src="{{asset('img/moneys.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <p class="text-base text-gray-400">Email</p>
                    </div>
                </div>

                <div class="flex flex-row items-center px-3 py-2 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img src="{{asset('img/moneytime.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <p class="text-base text-gray-400">Jenis Kelamin</p>
                    </div>
                </div>

                <div class="flex flex-row items-center px-3 py-2 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img src="{{asset('img/moneysend.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <p class="text-base text-gray-400">Tempat Lahir</p>
                    </div>
                </div>

                <div class="flex flex-row items-center px-3 py-2 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <p class="text-base text-gray-400">Tanggal Lahir</p>
                    </div>
                </div>

                <div class="flex flex-row items-center px-3 py-2 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <p class="text-base text-gray-400">Alamat</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
