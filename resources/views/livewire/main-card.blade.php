
<div class="relative">
    <transition-group name="card" tag="div" class="absolute top-0 left-0 flex flex-wrap" x-data="{ open: false }">
      <button @click="open = true" class="p-2 m-2 text-sm font-medium bg-gray-200 rounded-lg outline-none focus:outline-none">Open Dropdown</button>

        <ul
            x-show.transition.origin.top.left="open"
            @click.away="open = false"
            x-transition:enter="transition ease-out origin-top-left duration-200"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition origin-top-left ease-in duration-100"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="max-w-lg p-5 ml-2 border border-gray-200 rounded shadow-sm"
        >
            @foreach($cards as $card)
              <li class="w-1/2 p-2" wire:key="{{ $card['id'] }}">
                <!-- card content goes here -->{{$card['title']}}
              </li>
            @endforeach
          </ul>
    </transition-group>
    <style>
      .card-enter-active, .card-leave-active {
        transition: all 0.5s ease;
      }
      .card-enter, .card-leave-to {
        transform: translateX(-100%);
      }
      </style>
</div>
