<div class="container" x-data="$store.userProfile">
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
                    <ul class="w-1/2 h-40 p-2 mx-auto mt-10 overflow-y-scroll text-justify transition-colors duration-1000 ease-in-out group hover:border hover:border-sky-500 hilanginscroll overflow-clip text-blueGray-600">
                        <li class="whitespace-pre transition-colors duration-1000 ease-in-out border-transparent group-hover:border-b group-hover:border-sky-500"><p>Jenis Kelamin        : <span x-text="user.gender"></span> </p></li>
                        <li class="whitespace-pre transition-colors duration-1000 ease-in-out border-transparent group-hover:border-b group-hover:border-sky-500"><p class="break-normal whitespace-pre-wrap">Tempat, Tgl Lahir  : <span x-text="user.tempat_lahir + ',    '" ></span> <span x-text="user.tgl_lahir"></span> </p></li>
                        <li class="whitespace-pre"><p>alamat               : </p><p class="break-words whitespace-normal" x-text="user.alamat"></p></li>
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
                <p x-text="message"></p>
                <p x-text="validation.name"></p>
                <p x-text="validation.gender"></p>
                <p x-text="validation.tempat_lahir"></p>
                <p x-text="validation.tgl_lahir"></p>
                <p x-text="validation.alamat"></p>
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
            <script>
                const date_str = "07/20/2021";
                const date = new Date(date_str);
                const full_day_name = date.toLocaleDateString('default', { weekday: 'long' });
            </script>
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

