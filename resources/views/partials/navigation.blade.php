<nav  x-data="{ open: false }"  class="relative px-4 py-4 flex justify-between items-center bg-white background:linear-gradient(to right, #4dc0b5 var(--scroll), transparent 0)">
    <a class="flex text-3xl font-bold leading-none text-gray-900 no-underline hover:no-underline" href="#">
        <x-links.application-logo class="block w-auto text-gray-800 fill-current h-9" />
    </a>
    <div class="absolute lg:hidden right-5" >
        <button data-collapse-toggle="navbar-default" type="button" aria-controls="navbar-default" aria-expanded="false" class="flex items-center p-3 text-blue-600 navbar-burger">
            <svg class="block w-4 h-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <div class="hidden mt-5 lg:contents lg:mx-auto lg:items-center justify-between lg:w-auto lg:space-x-6" id="navbar-default">
            <div class="flex w-max gap-14">
                @if(!session()->has('logged'))
                    @if(Route::is('Home') )
                        <x-links.nav-link :href="route('welcome')">
                            {{ __('Explore') }}
                        </x-links.nav-link>
                    @else
                        <x-links.nav-link :href="route('home')" :active="request()->routeIs('welcome')">
                            {{ __('Home') }}
                        </x-links.nav-link>
                    @endif
                @endif
                @auth
                    <x-links.nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-links.nav-link>
                @endauth
            </div>
            <div>
            @if (Route::has('login'))
                <div class="px-6 py-4 sm:block">
                    @auth
                        <a href="{{ route('logout') }}" class="text-sm text-gray-700 underline dark:text-gray-500" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">{{ __('SignOut') }}</a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <x-links.nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('SignIn') }}
                        </x-links.nav-link>
                        @if (Route::has('register'))
                            <x-links.nav-link :href="route('register')" :active="request()->routeIs('register')">
                                {{ __('SignUp') }}
                            </x-links.nav-link>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
    </div>
</nav>
<!--Container-->
