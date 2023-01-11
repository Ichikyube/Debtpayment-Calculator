
<div class="">
    <style>
        .card-enter-active, .card-leave-active {
          transition: all 0.5s ease;
        }
        .card-enter, .card-leave-to {
          transform: translateX(-100%);
        }
        </style>
    <transition-group name="card" tag="div" x-data="{ open: false }">
        <select @click="open = true" type="button" class="appearance-none flex self-center justify-end w-full
        outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
        focus:border-none focus:outline-none focus-visible:ring-0" name="city" wire:model="city">
        <option value=''>Pilih jenis hutang   <svg class="w-4 h-4 ml-2 justify-right" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></option>
        <div
            x-show.transition.origin.top.right="open"
            @click.away="open = false"
            x-transition:enter="transition ease-out origin-top-right duration-200"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition origin-top-right ease-in duration-100"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="absolute p-5 ml-2 bg-[#F7D3C2] border border-gray-200 rounded shadow-sm right-11"
        >
            @foreach($cards as $card)
                <option class="w-1/2 p-2" wire:key="{{ $card['id'] }}" value={{ $card['id'] }}>{{$card['title']}}</option>
            @endforeach
          </div>
        </select>
    </transition-group>
</div>

