<div {{ $attributes->merge(['class' => 'absolute flex flex-col justify-center h-6 px-3 leading-none
    text-center align-middle motion-safe:animate-bounce bottom-12 rounded-r-md hover:text-myblue']) }}
        x-transition:enter="transition -translate-y-10 ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-10"
        x-transition:enter-end="-translate-y-0 opacity-100"
        x-transition:leave="transition -translate-y-10 ease-in duration-300"
        x-transition:leave-start="opacity-100 -translate-y-10"
        x-transition:leave-end="-translate-y-10 opacity-0">
    <h3 class="text-myblue ">{{ $slot }}</h3>
    <i class="text-red-500 fa-solid fa-arrow-down"></i>
</div>
