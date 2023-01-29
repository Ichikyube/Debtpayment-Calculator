<button {{ $attributes }} type="submit" class="px-5 text-white shadow drop-shadow-lg cursor-pointer
select-none active:translate-y-1 active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
active:border-b-[0px] rounded-xl [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]
bg-myblue py-2 md:h-14 lg:h-14 lg:w-44 transition-all duration-200">
    {{ $slot }}
</button>
