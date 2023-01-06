<div class="absolute top-5" x-data="{ showBox: true }">
    <button @click="showBox = !showBox">Toggle</button>
    <div x-show="showBox" style="width:50px; height:50px; background:red"></div>
</div>
