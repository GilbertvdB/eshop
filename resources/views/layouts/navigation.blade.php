<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('product.index')" :active="request()->routeIs('product.index')">
                        {{ __('Products') }}
                    </x-nav-link>
                    <a href="{{ route('cart.list') }}" class="flex items-center">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                       <span class="text-red-700">{{ Cart::session(Auth::user()->id)->getTotalQuantity()}}</span> 
                    </a>
                    <a href="{{ route('wishlist.list') }}" class="flex items-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke-width="06" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 107.3" stroke="currentColor"><title>wishlist</title>
                        <path d="M65.58,90.82l10.49,9.91L65.58,90.82Zm-2.52,5.76a3.06,3.06,0,0,1,0,6.12H7.12a7.09,7.09,0,0,1-5-2.1h0a7.1,7.1,0,0,1-2.09-5V7.12a7.06,7.06,0,0,1,2.1-5h0A7.1,7.1,0,0,1,7.12,0H91.63a7.1,7.1,0,0,1,5,2.09l.21.23a7.16,7.16,0,0,1,1.88,4.8V49a3.06,3.06,0,0,1-6.12,0V7.12a1,1,0,0,0-.22-.62l-.08-.08a1,1,0,0,0-.7-.3H7.12a1,1,0,0,0-.7.3h0a1,1,0,0,0-.29.7V95.58a1,1,0,0,0,.3.7h0a1,1,0,0,0,.7.29ZM95.44,67.42c3.54-3.7,6-6.89,11.5-7.52,10.24-1.17,19.65,9.32,14.47,19.64-1.47,2.94-4.47,6.44-7.78,9.87C110,93.18,106,96.87,103.14,99.67l-7.69,7.63-6.36-6.12C81.44,93.82,69,84.54,68.55,73.06c-.28-8,6.07-13.2,13.37-13.11,6.53.09,9.29,3.33,13.52,7.47Zm-71.66,0A3.62,3.62,0,1,1,20.16,71a3.62,3.62,0,0,1,3.62-3.62Zm14.71,7.27a3.15,3.15,0,0,1,0-6.19h11.8a3.15,3.15,0,0,1,0,6.19ZM23.78,46a3.62,3.62,0,1,1-3.62,3.61A3.62,3.62,0,0,1,23.78,46Zm14.71,6.94a3.1,3.1,0,0,1,0-6.11H62.58a3.1,3.1,0,0,1,0,6.11ZM23.78,24.6a3.62,3.62,0,1,1-3.62,3.62,3.62,3.62,0,0,1,3.62-3.62Zm14.71,6.65a2.84,2.84,0,0,1-2.57-3.05,2.85,2.85,0,0,1,2.57-3.06H72.38A2.85,2.85,0,0,1,75,28.2a2.84,2.84,0,0,1-2.57,3.05Z"/>
                    </svg>
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('account.orders')">
                            {{ __('Orders') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('product.index')" :active="request()->routeIs('product.index')">
                {{ __('Products') }}
            </x-responsive-nav-link>
            <a href="{{ route('cart.list') }}" class="flex items-center">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span class="text-red-700">{{ Cart::getTotalQuantity()}}</span> 
            </a>
            <a href="{{ route('wishlist.list') }}" class="flex items-center">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </a>
           
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
