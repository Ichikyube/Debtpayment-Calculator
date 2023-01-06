<div>
    <!-- Button to show form komentar -->
    <button type="button" x-on:click="open = 'list-hitungan'" class="text-white text-4xl pl-1"><i class="fa-solid fa-money-bill"></i></button>
    

    <!-- Card Konten List Hitungan -->
    <div x-show="open == 'list-hitungan'" class="absolute bg-white shadow bottom-5 left-28 w-[97%] h-[90%] rounded-xl p-10">
        List Hitungan
    </div>
</div>
