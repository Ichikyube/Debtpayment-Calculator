
<div class="">
        <select class="appearance-none flex self-center justify-end w-full rounded-xl
        outline-none placeholder:!bg-transparent bg-[#F7D3C2] transition duration-150 ease-in-out sm:text-sm sm:leading-5
        border-none focus-visible:ring-0 ring-0" name="type" wire:model="type">
            <option class="border-none" value=""></option>
            
            @foreach($cards as $card)
                <option class="w-1/2 p-2" wire:key="{{ $card['id'] }}" value={{ $card['id'] }}>{{$card['title']}}</option>
            @endforeach
        </select>
</div>

