<div x-data="{posts:[]}">
    <!-- Button to show form komentar -->
    <button type="button" x-on:click="coba = 'list-hitungan', localStorage.setItem('coba', 'list-hitungan')"
    class="pl-1 text-4xl text-white"><i class="fa-solid fa-money-bill"></i></button>
    <h1 class="mb-5 text-3xl font-bold ml-36">Kalkulator Hutang</h1>
    <button @click="posts.push(1)" class="button absolute left-[37%] bottom-10 z-50 text-sm py-4 px-7 ml-4
        bg-white text-red-500 font-bold rounded-[30px] drop-shadow-lg cursor-pointer select-none
        active:translate-y-1  active:[box-shadow:0_0px_0_0_#f2f2f2,0_0px_0_0_#b7b7b7]
        active:border-b-[0px] transition-all duration-150
        [box-shadow:0_1px_0_0_#f2f2f2,0_3px_0_0_#b7b7b7]  after:w-6 after:h-6 after:bg-red-500
        after:text-white  after:font-cursive after:font-extrabold after:absolute after:-right-3
        after:-scale-x-100  after:rounded-full after:content-['+'] after:align-middle after:text-center">
        Tambahkan Hutang
    </button>
    <div class="bg-[#F7D3C2] ml-[88px] max-h-min pt-[32px] px-[45px] rounded-[30px] w-[600px] drop-shadow-md">
        <h6 class="text-xl font-bold text-blueGray-700">Mulai dengan mengurutkan hutang Anda.</h6>
        <hr class="mt-4 border-b-1 border-blueGray-300">
    </div>
    <div class="flex flex-row">
        <template x-for="post in posts">
            <livewire:debt-calc>
        </template>
    </div>


</div>

