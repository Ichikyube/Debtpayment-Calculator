<div class="container" x-data="$store.userProfile">
    <div x-init="setClear()">
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
                <button x-on:click="showErrorAlert = false" class="text-red-800 bg-transparent border border-red-900 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-400 dark:border-red-400 dark:text-red-400 dark:hover:text-white dark:focus:ring-red-800">
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
                    <span class="text-lg font-medium">Success</span>
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
    </div>
    <h1 class="my-4 ml-8 text-3xl font-bold lg:my-0 lg:mb-4 drop-shadow-md">Profile</h1>
    <div class="flex flex-col w-full transition-all ease-in-out delay-100 md:flex-row lg:flex-row mt-14 mt-150"  x-bind:class="showForm == true ? 'justify-evenly lg:w-1/2' : 'justify-center w-full'" x-init="userData()">
        <div class="px-8 lg:flex-row">
            <x-loading/>
            <div x-show="!isLoading" class="flex flex-col justify-center -mt-8 lg:w-max">

                <img x-bind:src="user.gender == 'Man'? '{{ URL::asset('/img/soccerguy.svg') }}' : user.gender == 'Woman'? '{{ URL::asset('/img/officewoman.svg') }}' : '{{ URL::asset('/img/alien.svg') }}'" class="self-center w-40 h-40 p-1 -mt-3 border-2 border-white border-solid rounded-full shadow-lg ring-primary ring-offset-base-100 ring-offset-2 ring-2 ring-green-300 dark:ring-gray-500" alt="Bordered avatar">

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
                    <div class="mt-0 mb-2 text-sm font-bold leading-normal text-blueGray-400" x-text="user.email" ></div>
                    <ul class="max-w-xl p-2 mx-auto mt-5 overflow-y-scroll text-justify transition-colors duration-1000 ease-in-out max-h-44 md:w-1/2 lg:w-full group hover:border hover:border-sky-500/30 hilanginscroll overflow-clip text-blueGray-600">
                        <li class="transition-colors duration-1000 ease-in-out border-transparent group-hover:border-b group-hover:border-sky-500/30"><p class="break-words whitespace-normal"><b> Gender  </b>    <span> : </span> <span x-text="user.gender"></span> </p></li>
                        <li class="transition-colors duration-1000 ease-in-out border-transparent group-hover:border-b group-hover:border-sky-500/30"><p class="break-normal whitespace-normal"><b> Place, Date of Birth  </b> <span> : </span> <span x-text="user.tempat_lahir" ></span><span>, </span><span x-text="formatTglFull(user.tgl_lahir)"></span> </p></li>
                        <li><p class="whitespace-normal"><b> Address </b><span class="align-left">: </span></p><p class="break-words whitespace-normal" x-text="user.alamat"></p></li>
                    </ul>
                </div>
            </div>
        </div>
        <x-profile-form/>
    </div>
</div>

