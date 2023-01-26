<div class="container" x-data="$store.userProfile">
    {{-- start error alert --}}
    <div x-show="showErrorAlert"
        x-transition:enter="transition -translate-y-10 ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-10"
        x-transition:enter-end="-translate-y-0 opacity-100"
        x-transition:leave="transition -translate-y-10 ease-in duration-300"
        x-transition:leave-start="opacity-100 -translate-y-10"
        x-transition:leave-end="-translate-y-10 opacity-0"
        class="absolute shadow-2xl z-30 w-[700px] right-1/2 left-1/4 -top-5 p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
        <div class="flex items-center">
            <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium">Request Filed!!</h3>
        </div>
        <div class="mt-2 mb-4 text-sm">
            <ul class="mt-1.5 ml-4 list-disc list-inside">
                <li x-show="validation.name" x-text="validation.name"></li>
                <li x-show="validation.gende" x-text="validation.gender"></li>
                <li x-show="validation.tempat_lahir" x-text="validation.tempat_lahir"></li>
                <li x-show="validation.tgl_lahir" x-text="validation.tgl_lahir"></li>
                <li x-show="validation.alamat" x-text="validation.alamat"></li>
            </ul>
        </div>
        <div class="flex justify-end">
            <button x-on:click="showErrorAlert = false" class="text-red-800 bg-transparent border border-red-900 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-400 dark:border-red-400 dark:text-red-400 dark:hover:text-white dark:focus:ring-red-800" data-dismiss-target="#alert-additional-content-2" aria-label="Close">
                close
            </button>
        </div>
    </div>
    {{-- end error alert --}}

    {{-- start success alert --}}
    <div x-show="showSuccessAlert"
        x-transition:enter="transition -translate-y-10 ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-10"
        x-transition:enter-end="-translate-y-0 opacity-100"
        x-transition:leave="transition -translate-y-10 ease-in duration-300"
        x-transition:leave-start="opacity-100 -translate-y-10"
        x-transition:leave-end="-translate-y-10 opacity-0"
        class="flex justify-between items-center absolute z-30 left-[35%] right-[50%] -top-5 shadow-xl w-96 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <div class="flex items-center">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-10 h-10 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="flex flex-col">
                <span class="text-xl font-medium">Success</span>
                <span x-text="message"></span>
            </div>
        </div>
        <button x-on:click="showSuccessAlert = false">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    {{-- end success alert --}}
    <h1 class="my-4 ml-8 text-3xl font-bold lg:my-0 lg:mb-4 drop-shadow-md">profile</h1>
    <div class="flex flex-col w-full transition-all ease-in-out delay-100 md:flex-row lg:flex-row mt-14 mt-150"  x-bind:class="showForm == true ? 'justify-evenly lg:w-1/2' : 'justify-center w-full'" x-init="userData()">
        <div class="px-8 lg:flex-row">
            <div class="flex flex-col justify-center -mt-8 lg:w-max">
                <img src="{{asset('img/avatar.svg')}}" class="self-center w-40 h-40 p-1 -mt-3 border-2 border-white border-solid rounded-full shadow-lg ring-primary ring-offset-base-100 ring-offset-2 ring-2 ring-green-300 dark:ring-gray-500" alt="Bordered avatar">

                <div class="mt-6 text-center">
                    <div class="flex justify-center">
                        <h3 class="mb-2 text-4xl font-semibold leading-normal text-blueGray-700"  x-text="user.name"  ></h3>
                        <div x-show="!showForm" x-on:click="userData, showForm = !showForm, message=''"
                            class="relative flex items-center justify-end">


                            <button type="button" @click="insertUpdate(user.name,user.email,user.gender,user.tempat_lahir,user.tgl_lahir,user.alamat)"
                                class=" -top-8 right-5 text-sm px-2 py-1 ml-4 bg-white text-myblue hover:text-green-500
                                font-bold rounded-[30px] drop-shadow-lg cursor-pointer select-none
                                active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
                                active:border-b-[0px] transition-all duration-150
                                [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]">

                                <span class="inline-flex items-center transition-all duration-500 rounded-full hover:pl-2 group focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:outline-none" role="alert" tabindex="0">
                                    <i class="fa-solid fa-pen-to-square "></i>
                                    <span class="inline-block overflow-hidden transition-all duration-500 whitespace-nowrap group-hover:max-w-screen-2xl group-focus:max-w-screen-2xl max-w-0 scale-80 group-hover:scale-100 group-hover:px-2 group-focus:px-2">edit</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="mt-0 mb-2 text-sm font-bold leading-normal uppercase text-blueGray-400" x-text="user.email" ></div>
                    <ul class="max-w-lg p-2 mx-auto mt-10 overflow-y-scroll text-justify transition-colors duration-1000 ease-in-out max-h-44 md:w-1/2 lg:w-full group hover:border hover:border-sky-500/30 hilanginscroll overflow-clip text-blueGray-600">
                        <li class="transition-colors duration-1000 ease-in-out border-transparent group-hover:border-b group-hover:border-sky-500/30"><p class="break-words whitespace-normal"><b> Jenis Kelamin  </b>    <span> : </span> <span x-text="user.gender"></span> </p></li>
                        <li class="transition-colors duration-1000 ease-in-out border-transparent group-hover:border-b group-hover:border-sky-500/30"><p class="break-normal whitespace-normal"><b> Tempat, Tgl Lahir  </b> <span> : </span> <span x-text="user.tempat_lahir + ',    '" ></span> <span x-text="user.tgl_lahir"></span> </p></li>
                        <li><p class="whitespace-normal"><b> alamat </b><span class="align-left">: </span></p><p class="break-words whitespace-normal" x-text="user.alamat"></p></li>
                    </ul>
                </div>
            </div>
        </div>

        <div x-show="showForm"class="bg-[#F7D3C2] overflow-y-auto w-full h-full md:w-2/3 lg:w-2/5 min-h-min md:h-96 lg:h-5/6
            md:static lg:absolute lg:right-28 md:mt-0 lg:-mt-11 absolute mt-0 top-0 lg:top-[20%] rounded-b-md md:rounded-xl
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
            </div>

            <div class="border-t border-gray-200">
                <div class="flex flex-row items-center px-4 border-b-2" >
                    <div class="flex justify-center w-12 mr-2">
                        <i class="fa-solid fa-signature"></i>
                    </div>
                    <div class="relative flex items-center justify-between w-full py-2">
                        <input x-model="update.name" id="fullname" type="text" class="w-1/2 form-input peer text-white/30 focus:text-black z-10 align-text-bottom text-left
                        bg-white/10 block appearance-none px-3 border-0 pb-0 outline-none placeholder:!bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-1
                        focus:border-none focus:outline-none focus-visible:ring-0">
                        <label for="fullname" class="absolute top-3 origin-[0] break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-xl
                        bg-main text-dark duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0
                        peer-focus:-translate-y-5 peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Nama Lengkap</label>
                        <div class="w-full text-xl font-bold text-center text-zinc-900 lr-4" x-text="update.name"></div>
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
                        class="w-fit form-input peer text-white/30 pb-0 focus:text-black z-10 align-text-bottom text-left bg-white/10 block
                        appearance-none px-3 border-0 outline-none placeholder:!bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-1
                        focus:border-none focus:outline-none focus-visible:ring-0">
                            <option class="text-xs text-center">-- pilih gender --</option>
                            <option class="text-xs">Laki-Laki</option>
                            <option class="text-xs">Perempuan</option>
                        </select>
                        <label for="gender" class="absolute top-3 origin-[0] break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-xl
                        bg-main text-dark duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0
                        peer-focus:-translate-y-5 peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Jenis Kelamin</label>
                        <i class="w-full text-xl font-bold text-center text-zinc-900 lr-4" x-bind:class="update.gender == 'Laki-Laki'? 'fa-solid fa-mars' : update.gender == 'Perempuan'? 'fa-solid fa-venus': ' '"></i>
                    </div>
                </div>
            </div>
            <div class="flex flex-row items-center px-4 border-b-2">
                <div class="flex justify-center w-12 mr-2">
                    <i class="fa-solid fa-hospital"></i>
                </div>
                <div class="relative flex items-center justify-between w-full py-2">
                    <input x-model="update.tempat_lahir" type="text" class="w-1/2 form-input peer pt-5 text-white/30 focus:text-black z-10 align-text-bottom text-left bg-white/10 block
                    appearance-none px-3 border-0 outline-none pb-0 placeholder:!bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-1
                    focus:border-none focus:outline-none focus-visible:ring-0">
                    <label class="absolute top-3 origin-[0] break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-xl
                    bg-main text-dark duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0
                    peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Tempat Lahir</label>
                    <div class="w-full text-xl font-bold text-center text-zinc-900 lr-4" x-text="update.tempat_lahir"></div>
                </div>
            </div>
            <div class="flex flex-row items-center px-4 border-b-2">
                <div class="flex justify-center w-12 mr-2">
                    <i class="fa-solid fa-cake-candles"></i>
                </div>
                <div class="relative flex items-center justify-between w-full py-2">
                    <input x-model="update.tgl_lahir" type="date" class="w-1/2 form-input peer text-white/30 focus:text-black z-10 align-text-bottom text-left bg-white/10 block
                        appearance-none px-3 border-0 outline-none pb-0 placeholder:!bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-1
                        focus:border-none focus:outline-none focus-visible:ring-0">
                    <label class="absolute top-3 origin-[0] break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-xl
                      bg-main text-dark duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0
                        peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Tanggal Lahir</label>
                    <div class="w-full text-xl font-bold text-center break-words text-zinc-900 lr-4"  x-text="new Date(update.tgl_lahir).toLocaleDateString('default', { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' })"></div>
                </div>
            </div>
            <div class="flex flex-row items-center px-4 border-b-2 h-max">
                <div class="flex justify-center w-12 mr-2">
                    <i class="fa-solid fa-map"></i>
                </div>
                <div class="relative flex items-center justify-between w-full py-2">
                    <input x-model="update.alamat" type="text" class="w-11/12 form-input peer text-white/30 focus:text-black z-10 align-text-bottom text-left bg-white/10 block
                    appearance-none px-3 border-0 outline-none pb-0 placeholder:!bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-1
                    focus:border-none focus:outline-none focus-visible:ring-0">
                    <label class="absolute top-3 origin-[0] break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-xl
                    bg-main text-dark duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0
                      peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Alamat</label>
                </div>

            </div>
            <div class="w-8/12 mx-auto text-xl font-bold text-center break-words text-zinc-900 lr-4" x-text="update.alamat"></div>
            <br><br>
        </div>
    </div>
</div>

