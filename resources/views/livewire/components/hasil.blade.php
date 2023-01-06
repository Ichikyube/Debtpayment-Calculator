<div>
    <!-- Button to show form komentar -->
    <button type="button" x-on:click="open = 'dashboard'" class="text-white text-4xl pl-1"><i class="fa-solid fa-qrcode"></i></button>
    

    <!-- Card Konten Dashboard -->
    <div x-show="open == 'dashboard'" class="absolute bg-white shadow bottom-5 left-28 w-[97%] h-[90%] rounded-xl p-10">
        Dashboard
    </div>
</div>
