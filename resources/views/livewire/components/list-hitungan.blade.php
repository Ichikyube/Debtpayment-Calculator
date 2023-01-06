<div>
    <!-- Button to show form komentar -->
    <button type="button" x-on:click="coba = 'list-hitungan', localStorage.setItem('coba', 'list-hitungan')" class="text-white text-4xl pl-1"><i class="fa-solid fa-money-bill"></i></button>
    

    <!-- Card Konten List Hitungan -->
    <div x-show="coba == 'list-hitungan'" class="absolute bg-white shadow bottom-5 left-28 w-[97%] h-[90%] rounded-xl p-10">
        <h1 class="font-bold text-3xl ml-8">List Hitungan</h1>
        <br>
        <div class="bg-[#F7D3C2] py-[32px] px-[45px] rounded-[30px]">
            Pinjaman, Rumah, Elektronik, Lainnya
        </div>
    </div>
</div>
