<div class="container mx-auto" x-data="{edit:false}" x-init="getProfile()">

    <h1 class="my-4 ml-8 text-3xl font-bold lg:my-0 lg:mb-4">profile</h1>
    <div class="flex flex-col w-full lg:flex-row mt-14">
        <div class="px-8 lg:flex-row lg:w-1/2">
            <div class="flex flex-col justify-center -mt-8">
                <img src="{{asset('img/avatar.svg')}}" class="self-center w-40 h-40 p-1 -mt-3 border-2 border-white border-solid rounded-full ring-2 ring-gray-300 dark:ring-gray-500" alt="Bordered avatar">
                <div class="mt-12 text-center">
                    <h3 class="mb-2 text-4xl font-semibold leading-normal text-blueGray-700"x-text="profile.name">
                        Fulanah
                    </h3>
                    <div class="mt-0 mb-2 text-sm font-bold leading-normal uppercase text-blueGray-400" x-text="profile.email">                       
                    </div>
                    <div class="px-4 mb-2 text-justify text-blueGray-600">
                        <p>Jenis Kelamin  : <span x-text="profile.gender">Laki-Laki</span> </p>
                        
                        <p>Tempat, Tgl Lahir  : <span x-text="profile.tempat_lahir + ','"></span> <span x-text="profile.tgl_lahir"></span> </p>
                        <p>Alamat                    : <span x-text="profile.alamat"></span></p>
                    </div>
                    </div>
            </div>
        </div>
        <div x-show="!edit" x-on:click="edit=true" class="flex flex-row items-center justify-center px-4 py-5 border-b-2">
            <button type="button"  class="text-sm py-4 px-7 ml-4 bg-white text-red-500
           font-bold rounded-[30px] drop-shadow-lg cursor-pointer select-none
            active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
            active:border-b-[0px] transition-all duration-150
            [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]">
            Edit
            </button>
        </div>
        <div x-show="edit" class="bg-[#F7D3C2] overflow-y-auto w-full lg:w-1/3 h-max lg:-mt-11 rounded-[30px] drop-shadow-md">
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
                <div  class="flex flex-row items-center justify-center px-4 py-5 border-b-2">
                    <button type="button" x-on:click="edit = false" class="text-sm py-4 px-7 ml-4 bg-white text-red-500
                   font-bold rounded-[30px] drop-shadow-lg cursor-pointer select-none
                    active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
                    active:border-b-[0px] transition-all duration-150
                    [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]">
                    Simpan
                    </button>
                    <button type="button" x-on:click="edit = false" class="text-sm py-4 px-7 ml-4 bg-white text-red-500
                    font-bold rounded-[30px] drop-shadow-lg cursor-pointer select-none
                     active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
                     active:border-b-[0px] transition-all duration-150
                     [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]">
                     Batal
                     </button>
                </div>
                <br><br>
            </div>
        </div>
    </div>
</div>
