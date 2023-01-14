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
                    <x-nav-link :href="route('product.index')" :active="request()->routeIs('product.index')">
                        {{ __('Products') }}
                    </x-nav-link>
                    @auth
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('product.create')" :active="request()->routeIs('product.create')">
                        {{ __('Add') }}
                    </x-nav-link>
                    <x-nav-link :href="route('review.index')" :active="request()->routeIs('review.index')">
                        {{ __('Reviews') }}
                    </x-nav-link>
                    @endauth

                    <a href="{{ route('cart.list') }}" class="flex items-center">
                        <svg class="w-5 h-5 text-black-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        @auth
                       <span class="text-red-700">{{ Cart::session(Auth::user()->id)->getTotalQuantity()}}</span>
                       @endauth 
                    </a>
                    <a href="{{ route('wishlist.list') }}" class="flex items-center">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="black" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.281 9.076c-.317 1.427-1.031 2.776-2.142 3.966a108.712 108.712 0 01-4.284 4.284c-.872.872-1.824 1.745-2.776 2.618l-.08.08-.079-.08c-.952-.873-1.904-1.746-2.776-2.618a108.137 108.137 0 01-4.283-4.284c-1.111-1.19-1.825-2.539-2.142-3.966-.397-1.666.158-2.856.635-3.57.696-1.046 1.903-1.81 3.18-1.895 2.027-.136 3.465 1.45 4.498 2.982.29.43.603.847.9 1.274l.068.099.068-.099c.296-.427.609-.843.9-1.274 1.033-1.531 2.47-3.118 4.497-2.982 1.278.085 2.484.849 3.181 1.895.477.714 1.032 1.904.635 3.57M12 5.004a6.535 6.535 0 00-1.476-1.72c-1.207-1.003-3.06-1.661-4.632-1.269-2.46.397-5.553 3.253-4.76 7.298.352 1.799 1.321 3.41 2.539 4.755 1.376 1.52 2.868 2.951 4.363 4.369A203.883 203.883 0 0012 22.1a201.526 201.526 0 003.966-3.663c1.496-1.418 2.986-2.848 4.362-4.369 1.219-1.345 2.187-2.956 2.54-4.755.793-4.045-2.301-6.9-4.76-7.298-1.571-.392-3.425.266-4.633 1.27A6.532 6.532 0 0012 5.004" fill-rule="evenodd">
                    </path>
                    </svg>
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
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
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                @endauth
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
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('product.create') }}">
            {{ __('Add Product') }}
            </a>
            
            <a href="{{ route('cart.list') }}" class="flex items-center">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span class="text-red-700">{{ Cart::getTotalQuantity()}}</span> 
            </a>
            <a href="{{ route('wishlist.list') }}" class="flex items-center">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="black" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.281 9.076c-.317 1.427-1.031 2.776-2.142 3.966a108.712 108.712 0 01-4.284 4.284c-.872.872-1.824 1.745-2.776 2.618l-.08.08-.079-.08c-.952-.873-1.904-1.746-2.776-2.618a108.137 108.137 0 01-4.283-4.284c-1.111-1.19-1.825-2.539-2.142-3.966-.397-1.666.158-2.856.635-3.57.696-1.046 1.903-1.81 3.18-1.895 2.027-.136 3.465 1.45 4.498 2.982.29.43.603.847.9 1.274l.068.099.068-.099c.296-.427.609-.843.9-1.274 1.033-1.531 2.47-3.118 4.497-2.982 1.278.085 2.484.849 3.181 1.895.477.714 1.032 1.904.635 3.57M12 5.004a6.535 6.535 0 00-1.476-1.72c-1.207-1.003-3.06-1.661-4.632-1.269-2.46.397-5.553 3.253-4.76 7.298.352 1.799 1.321 3.41 2.539 4.755 1.376 1.52 2.868 2.951 4.363 4.369A203.883 203.883 0 0012 22.1a201.526 201.526 0 003.966-3.663c1.496-1.418 2.986-2.848 4.362-4.369 1.219-1.345 2.187-2.956 2.54-4.755.793-4.045-2.301-6.9-4.76-7.298-1.571-.392-3.425.266-4.633 1.27A6.532 6.532 0 0012 5.004" fill-rule="evenodd">
                </path>
                </svg>
            </a>
            
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
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
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
            @endauth
        </div>
    </div>
</nav>
