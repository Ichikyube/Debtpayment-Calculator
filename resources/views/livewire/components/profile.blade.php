<div>
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
        <div class="bg-[#F7D3C2] w-1/3 h-max -mt-11 rounded-[30px] drop-shadow-md">
            <div class="flex flex-row px-5 py-5 align-middle border-b-2">
                <h6 class="ml-5 text-xl font-bold text-blueGray-700">Edit Profile</h6>
            </div>
            <div class="border-t border-gray-200">
            <div class="flex flex-row items-center px-4 py-5 border-b-2">
                <div class="flex justify-center w-12 mr-2">
                    <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                </div>
                <div class="flex items-center justify-between w-full">
                    <p class="mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0">Nama Lengkap</p>
                    <input type="text" class="mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0 form-input appearance-none block px-3 border-0
                    rounded-xl outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                    focus:border-none focus:outline-none focus-visible:ring-0" placeholder="Fulanah">
                </div>
            </div>
            <div class="flex flex-row items-center px-4 py-5 border-b-2">
                <div class="flex justify-center w-12 mr-2">
                    <img src="{{asset('img/moneys.svg')}}" alt="" class="h-5">
                </div>
                <div class="flex items-center justify-between w-full">
                    <p class="mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0">Email</p>
                    <input type="text" class="mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0 form-input appearance-none
                    block px-3 border-0 rounded-xl outline-none placeholder:!bg-transparent bg-transparent transition duration-150
                    ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" placeholder="Fulanah">
                </div>
            </div>

            <div class="flex flex-row items-center px-4 py-5 border-b-2">
                <div class="flex justify-center w-12 mr-2">
                    <img src="{{asset('img/moneytime.svg')}}" alt="" class="h-5">
                </div>
                <div class="flex items-center justify-between w-full">
                    <p class="mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0">Jenis Kelamin</p>
                    <input type="text" class="form-input appearance-none block px-3 border-0 rounded-xl outline-none
                    placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                    focus:border-none focus:outline-none focus-visible:ring-0
                    mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0" placeholder="Fulanah">
                </div>
            </div>

            <div class="flex flex-row items-center px-4 py-5 border-b-2">
                <div class="flex justify-center w-12 mr-2">
                    <img src="{{asset('img/moneysend.svg')}}" alt="" class="h-5">
                </div>
                <div class="flex items-center justify-between w-full">
                    <p class="mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0 ">Tempat Lahir</p>
                    <input type="text" class="form-input appearance-none block px-3 border-0 rounded-xl outline-none
                    placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                    focus:border-none focus:outline-none focus-visible:ring-0
                    mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0" placeholder="Fulanah">
                </div>
            </div>

            <div class="flex flex-row items-center px-4 py-5 border-b-2">
                <div class="flex justify-center w-12 mr-2">
                    <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                </div>
                <div class="flex items-center justify-between w-full">
                    <p class="mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0">Tanggal Lahir</p>
                    <input type="text" class="form-input appearance-none block px-3 border-0 rounded-xl outline-none
                    placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                    focus:border-none focus:outline-none focus-visible:ring-0
                    mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0" placeholder="Fulanah">
                </div>
            </div>

            <div class="flex flex-row items-center px-4 py-5 border-b-2">
                <div class="flex justify-center w-12 mr-2">
                    <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                </div>
                <div class="flex items-center justify-between w-full">
                    <p class="mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0">Alamat</p>
                    <input type="text" class="form-input appearance-none block px-3 border-0 rounded-xl outline-none
                    placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                    focus:border-none focus:outline-none focus-visible:ring-0
                    mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0" placeholder="Fulanah">
                </div>
            </div>
            <br><br>
        </div>
    </div>

</div>
