<div>
    <!-- Button to show form komentar -->
    <button type="button" x-on:click="coba = 'profile', localStorage.setItem('coba', 'profile')" class="text-white text-4xl pl-1"><i class="fa-regular fa-user"></i></button>
    

    <!-- Card Konten profile -->
    <div x-show="coba == 'profile'" class="absolute bg-white shadow bottom-5 left-28 w-[97%] h-[90%] rounded-xl p-10">
        profile
    </div>
</div>