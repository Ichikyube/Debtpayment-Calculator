<section
    x-data="{ open: @entangle('open') }"
    @keydown.window.escape="open = false"
    x-show="open"
    x-cloak
    class="relative z-10"
    aria-labelledby="slide-over-title"
    x-ref="dialog"
    aria-modal="true"
>

    <div
        x-show="open"
        x-cloak
        x-transition:enter="ease-in-out duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in-out duration-500"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
    >Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt quae, illo dolorem ut aut, praesentium ipsum rerum assumenda velit excepturi nihil recusandae mollitia! Quaerat qui fugit impedit, laudantium placeat pariatur!</div>

    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="fixed inset-y-0 right-0 flex max-w-full pl-10 pointer-events-none">

                <div
                    x-show="open"
                    x-cloak
                    x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                    x-transition:enter-start="translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="translate-x-full"
                    class="w-screen max-w-md pointer-events-auto"
                    @click.away="open = false"
                >
                    <div class="flex flex-col h-full py-6 overflow-y-scroll bg-white shadow-xl">
                        <header class="px-4 sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                                    Panel title
                                </h2>
                                <div class="flex items-center ml-3 h-7">
                                    <button
                                        type="button"
                                        class="text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                        @click="open = false"
                                    >
                                        <span class="sr-only">Close panel</span>
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </header>
                        <article class="relative flex-1 px-4 mt-6 sm:px-6">
                            @if ($component)
                                @livewire($component)
                            @else
                                <div class="absolute inset-0 px-4 sm:px-6">
                                    <div class="h-full border-2 border-gray-200 border-dashed" aria-hidden="true">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere hic neque expedita, culpa illo natus cum ad. Dolore porro qui neque molestiae illum fuga quibusdam, rem corrupti esse vero magnam?</div>
                                </div>
                            @endif
                        </article>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
