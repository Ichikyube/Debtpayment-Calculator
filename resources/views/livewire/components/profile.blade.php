<div class="container mx-auto" x-data="$store.userProfile">
    <h1 class="my-4 ml-8 text-3xl font-bold lg:my-0 lg:mb-4 drop-shadow-md">profile</h1>
    <div class="flex flex-col w-full transition-all ease-in-out delay-100 md:flex-row lg:flex-row mt-14 mt-150"  x-bind:class="showForm == true ? 'justify-evenly lg:w-1/2' : 'justify-center w-full'" x-init="userData()">
        <div class="px-8 lg:flex-row">
            <div class="flex flex-col justify-center -mt-8 lg:w-max">
                <img src="{{asset('img/avatar.svg')}}" class="self-center ring-primary ring-offset-base-100 ring-offset-2 w-40 h-40 p-1 -mt-3 border-2 shadow-lg border-white border-solid rounded-full ring-2 ring-green-300 dark:ring-gray-500" alt="Bordered avatar">

                <div class="mt-6 text-center">
                    <div class="flex justify-center">
                        <h3 class="mb-2 text-4xl font-semibold leading-normal text-blueGray-700"  x-text="user.name"  ></h3>
                        <div x-show="!showForm" x-on:click="userData, showForm = !showForm, message=''"
                            class="relative justify-end flex items-center">


                            <button type="button" @click="insertUpdate(user.name,user.email,user.gender,user.tempat_lahir,user.tgl_lahir,user.alamat)"
                                class=" -top-8 right-5 text-sm px-2 py-1 ml-4 bg-white text-myblue hover:text-green-500
                                font-bold rounded-[30px] drop-shadow-lg cursor-pointer select-none
                                active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
                                active:border-b-[0px] transition-all duration-150
                                [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]">

                                <span class="inline-flex items-center rounded-full hover:pl-2 group transition-all duration-500 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:outline-none" role="alert" tabindex="0">
                                    <i class="fa-solid fa-pen-to-square "></i>
                                    <span class="whitespace-nowrap inline-block group-hover:max-w-screen-2xl group-focus:max-w-screen-2xl max-w-0 scale-80 group-hover:scale-100 overflow-hidden transition-all duration-500 group-hover:px-2 group-focus:px-2">edit</span>
                                </span>
                            </button>
                        </div>
                    </div>


                    <div class="mt-0 mb-2 text-sm font-bold leading-normal uppercase text-blueGray-400" x-text="user.email" ></div>
                    <ul class="grid overflow-y-scroll hilanginscroll h-40 gap-2 mx-auto text-justify w-fit lg:w-[600px] overflow-clip text-blueGray-600">
                        <li><p>Jenis Kelamin      : <span x-text="user.gender"></span> </p></li>
                        <li><p class="break-normal whitespace-pre-wrap">Tempat, Tgl Lahir  : <span x-text="user.tempat_lahir + ',    '" ></span> <span x-text="user.tgl_lahir"></span> </p></li>
                        <li><p>alamat             : <span class="" x-text="user.alamat"></span></p></li>
                    </ul>
                    </div>
            </div>
        </div>

        <div x-show="showForm"class="bg-[#F7D3C2] overflow-y-auto w-full lg:w-1/3 h-[590px] md:h-96 lg:h-5/6 md:w-min
            md:static lg:absolute lg:right-28 lg:-mt-11 -mt-[31.3rem] rounded-b-[30px] md:rounded-[30px] lg:rounded-[30px] drop-shadow-md static hilanginscroll"
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
                            Simpan
                        </button>
                        <button type="button" x-on:click="showForm = !showForm" class="text-sm w-24 mt-4 py-2 bg-white text-red-500
                            font-bold rounded-[30px] drop-shadow-lg cursor-pointer select-none hover:bg-red-500 hover:text-white
                            active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
                            active:border-b-[0px] transition-all duration-150 ring ring-primary ring-offset-base-100 ring-offset-2
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
                        <i class="fa-solid fa-signature"></i>
                    </div>
                    <div class="flex items-center justify-between w-full"  >
                        <p class="mt-1 text-sm text-zinc-900 sm:col-span-2 sm:mt-0">Nama Lengkap</p>
                        <input x-model="update.name" type="text" class="mt-1 text-lg w-1/2 text-zinc-900 sm:col-span-2 sm:mt-0 form-input appearance-none block px-3 border-0
                        rounded-xl outline-none placeholder:!bg-transparent bg-transparent text-center transition duration-150 ease-in-out sm:text-sm sm:leading-5
                        focus:border-none focus:outline-none focus-visible:ring-0">
                    </div>
                </div>
                <div class="border-t border-gray-200">
                    <div class="flex flex-row items-center px-4 py-5 border-b-2">
                        <div class="flex justify-center w-12 mr-2">
                            <i class="fa-solid fa-venus-mars"></i>
                        </div>
                        <div class="flex items-center justify-between w-full">
                            <label for="gender" class="mt-1 text-sm block font-medium text-zinc-900 sm:col-span-2 sm:mt-0">Jenis Kelamin</label>
                            <select x-model="update.gender" name="gender" id="gender"
                            class="mt-1 w-full py-2 text-zinc-900 bg-white/10 after:rounded-md placeholder-shown:bg-gray-600 sm:col-span-2 sm:mt-0 text-lg form-input appearance-none block px-3 border-0
                            rounded-xl shadow-sm outline-none placeholder:!bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                            focus:border-none focus:outline-none focus-visible:ring-0">
                                <option class="text-center">-- pilih gender --</option>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-center px-4 py-5 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <i class="fa-solid fa-hospital"></i>
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <label class="mt-1 text-sm text-zinc-900 sm:col-span-2 sm:mt-0 ">Tempat Lahir</label>
                        <input x-model="update.tempat_lahir" type="text" class="form-input appearance-none block px-3 border-0 rounded-xl outline-none
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:leading-5
                        focus:border-none focus:outline-none focus-visible:ring-0
                        mt-1 text-lg w-1/2 text-zinc-900 sm:col-span-2 sm:mt-0">
                    </div>
                </div>

                <div class="flex flex-row items-center px-4 py-5 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <i class="fa-solid fa-cake-candles"></i>
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <p class="mt-1 text-sm text-zinc-900 sm:col-span-2 sm:mt-0">Tanggal Lahir</p>
                        <input x-model="update.tgl_lahir" type="date" class="form-input appearance-none block px-3 border-0 rounded-xl outline-none
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:leading-5
                        focus:border-none focus:outline-none focus-visible:ring-0
                        mt-1  text-lg w-1/2 text-zinc-900 sm:col-span-2 sm:mt-0">
                    </div>
                </div>

                <div class="flex flex-row items-center px-4 py-5 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <i class="fa-solid fa-map"></i>
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <p class="mt-1 text-sm text-zinc-900 sm:col-span-2 sm:mt-0">Alamat</p>
                        <input x-model="update.alamat" type="text" class="form-input appearance-none block px-3 border-0 rounded-xl outline-none
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:leading-5
                        focus:border-none focus:outline-none focus-visible:ring-0
                        mt-1  text-lg w-1/2 text-zinc-900 sm:col-span-2 sm:mt-0">
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </div>
</div>

