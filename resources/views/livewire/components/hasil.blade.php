<div>
    <!-- Button to show form komentar -->
    <button type="button" wire:click="openDiv" class="text-white text-4xl pl-1"><i class="fa-solid fa-qrcode"></i></button>
    

    @if ($showDiv)
    <!-- Card Konten Dashboard -->
    <div class="absolute bg-white shadow bottom-5 left-28 w-[97%] h-[90%] rounded-xl p-10">
        isi card
    </div>
    @endif
</div>
