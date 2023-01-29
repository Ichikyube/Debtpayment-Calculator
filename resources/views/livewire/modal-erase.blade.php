<div x-show="modelOpen"  x-trap="modelOpen" class="fixed top-0 left-0 right-0" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center w-full h-full min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
        <div x-cloak @click="modelOpen = false" x-show="modelOpen"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-30 backdrop-blur-sm" aria-hidden="true"></div>

        <div x-cloak x-show="modelOpen"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block w-full max-w-xl p-8 my-0 overflow-hidden text-left align-middle transition-all transform bg-white rounded-lg shadow-xl lg:my-20 2xl:max-w-2xl">
            <div class="flex items-center justify-between space-x-4">
                <h1 class="text-xl font-medium text-gray-800 ">Hapus Data</h1>
                <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>

            <p class="mt-2 text-sm text-gray-500 ">
                Are you sure want to erase this data?
            </p>
            <div class="flex justify-center gap-8 mt-12">
                <button x-on:click="deleted, modelOpen = !modelOpen" class="px-5 py-2 text-white bg-red-600 rounded-xl">Yes</a>
                <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                    No
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
