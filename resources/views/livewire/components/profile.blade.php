<div class="container mx-auto" x-data="$store.userProfile">
    <h1 class="my-4 ml-8 text-3xl font-bold lg:my-0 lg:mb-4">profile</h1>
    <div class="flex flex-col w-full transition-all ease-in-out delay-100 lg:flex-row mt-14 mt-150"  x-bind:class="showForm == true ? 'justify-evenly lg:w-1/2' : 'justify-center w-full'" x-init="userData()">
        <div class="px-8 lg:flex-row lg:w-1/2">
            <div class="flex flex-col justify-center -mt-8">
                <img src="{{asset('img/avatar.svg')}}" class="self-center w-40 h-40 p-1 -mt-3 border-2 border-white border-solid rounded-full ring-2 ring-gray-300 dark:ring-gray-500" alt="Bordered avatar">

                <div class="mt-12 text-center">
                    <div class="flex justify-center">
                        <h3 class="pl-16 mb-2 text-4xl font-semibold leading-normal text-blueGray-700"  x-text="user.name"  >wew
                        </h3>
                        <div x-show="!showForm" x-on:click="userData, showForm = !showForm, message=''"
                            class="flex flex-row items-center py-5 -pl-4">
                            <button type="button" @click="insertUpdate(user.name,user.email,user.gender,user.tempat_lahir,user.tgl_lahir,user.alamat)"
                                class="text-sm py-2 px-7 ml-4 bg-white text-red-500
                                font-bold rounded-[30px] drop-shadow-lg cursor-pointer select-none
                                active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
                                active:border-b-[0px] transition-all duration-150
                                [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </div>
                    </div>


                    <div class="mt-0 mb-2 text-sm font-bold leading-normal uppercase text-blueGray-400" x-text="user.email" >
                    </div>
                    <div class="flex flex-col justify-center px-4 mx-auto mb-2 text-justify align-middle w-fit text-blueGray-600">
                        <p>Jenis Kelamin      : <span x-text="user.gender"></span> </p><br>

                        <p>Tempat, Tgl Lahir  : <span x-text="user.tempat_lahir + ',    '" ></span> <span x-text="user.tgl_lahir"></span> </p>
                        <p>alamat             : <span x-text="user.alamat"></span></p>
                    </div>
                    </div>
            </div>
        </div>

        <div x-show="showForm"class="bg-[#F7D3C2] overflow-y-auto w-full lg:w-1/3 h-max lg:h-5/6
            lg:absolute lg:right-28 lg:-mt-11 rounded-[30px] drop-shadow-md static hilanginscroll"
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
                        <button type="button"  x-on:click="updateProfile"  class="text-sm w-24 bg-white text-green-500
                            font-bold rounded-[30px] drop-shadow-lg cursor-pointer select-none py-2
                            active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
                            active:border-b-[0px] transition-all duration-150
                            [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]">
                            Simpan
                        </button>
                        <button type="button" x-on:click="showForm = !showForm" class="text-sm w-24 mt-4 py-2 bg-white text-red-500
                            font-bold rounded-[30px] drop-shadow-lg cursor-pointer select-none
                            active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
                            active:border-b-[0px] transition-all duration-150
                            [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]">
                            Batal
                        </button>
                    </div>
                </div>
                <p x-text="message"></p>
                <p x-text="validation.name"></p>
                <p x-text="validation.gender"></p>
                <p x-text="validation.tempat_lahir"></p>
                <p x-text="validation.tgl_lahir"></p>
                <p x-text="validation.alamat"></p>
            </div>
            <div class="border-t border-gray-200">
                <div class="flex flex-row items-center px-4 py-5 border-b-2" >
                    <div class="flex justify-center w-12 mr-2">
                        <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="flex items-center justify-between w-full"  >
                        <p class="mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0">Nama Lengkap</p>
                        <input x-model="update.name" type="text" class="mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0 form-input appearance-none block px-3 border-0
                        rounded-xl outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                        focus:border-none focus:outline-none focus-visible:ring-0">
                    </div>
                </div>
                <div class="border-t border-gray-200">
                    <div class="flex flex-row items-center px-4 py-5 border-b-2">
                        {{-- <div class="flex justify-center w-12 mr-2">
                            <img src="{{asset('img/moneytime.svg')}}" alt="" class="h-5">
                        </div> --}}
                        <div class="flex items-center justify-between w-full">
                            <p class="mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0">Jenis Kelamin</p>
                            <select x-model="update.gender"
                            class="mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0 form-input appearance-none block px-3 border-0
                            rounded-xl outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                            focus:border-none focus:outline-none focus-visible:ring-0">
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                            {{-- <input x-model="user.gender" type="text" class="form-input appearance-none block px-3 border-0 rounded-xl outline-none
                            placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                            focus:border-none focus:outline-none focus-visible:ring-0
                            mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0"> --}}
                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-center px-4 py-5 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img src="{{asset('img/moneysend.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <p class="mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0 ">Tempat Lahir</p>
                        <input x-model="update.tempat_lahir" type="text" class="form-input appearance-none block px-3 border-0 rounded-xl outline-none
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                        focus:border-none focus:outline-none focus-visible:ring-0
                        mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0">
                    </div>
                </div>

                <div class="flex flex-row items-center px-4 py-5 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <p class="mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0">Tanggal Lahir</p>
                        <input x-model="update.tgl_lahir" type="date" class="form-input appearance-none block px-3 border-0 rounded-xl outline-none
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                        focus:border-none focus:outline-none focus-visible:ring-0
                        mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0">
                    </div>
                </div>

                <div class="flex flex-row items-center px-4 py-5 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img src="{{asset('img/1.svg')}}" alt="" class="h-5">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <p class="mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0">Alamat</p>
                        <input x-model="update.alamat" type="text" class="form-input appearance-none block px-3 border-0 rounded-xl outline-none
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                        focus:border-none focus:outline-none focus-visible:ring-0
                        mt-1 text-sm text-gray-400 sm:col-span-2 sm:mt-0">
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </div>
</div>

