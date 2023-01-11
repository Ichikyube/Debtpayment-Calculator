<div>
    <!-- Button to show form komentar -->
    <button type="button" x-on:click="coba = 'dashboard', localStorage.setItem('coba', 'dashboard')" class="pl-1 text-4xl text-white"><i class="fa-solid fa-qrcode"></i></button>


    <!-- Card Konten Dashboard -->
    <div x-show="coba == 'dashboard'" class="absolute bg-white shadow bottom-5 left-28 w-[97%] h-[90%] rounded-xl p-10 overflow-x-scroll">

        <livewire:components.kalkulator/>
    </div>
</div>
