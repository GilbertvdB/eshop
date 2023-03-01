<x-layout>
    <x-slot name="header"> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $pageTitle }}</h2>
    </x-slot>

    <!-- x-flash-message  to be created -->
    @section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-44 sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">

            <div class="flex flex-row h-screen">
                <!-- Side Navigation Bar -->
                <div class="w-1/4 bg-gray-100">
                    <nav class="py-4">
                        <ul class="space-y-2">
                            <li class="{{ request()->is('dashboard/link1') ? 'bg-gray-200' : '' }}">
                                <a href="link1" class="block px-4 py-2 rounded-md hover:bg-gray-200">Link 1</a>
                            </li>
                            <li class="{{ request()->is('dashboard/link2') ? 'bg-gray-200' : '' }}">
                                <a href="link2" class="block px-4 py-2 rounded-md hover:bg-gray-200">Link 2</a>
                            </li>
                            <li class="{{ request()->is('dashboard/link3') ? 'bg-gray-200' : '' }}">
                                <a href="link3" class="block px-4 py-2 rounded-md hover:bg-gray-200">Link 3</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Container for Active Link -->
                <div class="w-3/4 bg-white p-4">
                    @yield('content')
                    <div class="tab-pane fade" id="analytics">
                    @include('admin.settings.includes.analytics')
                </div>
                </div>
            </div>


            </div>
        </div>
    </div>

    

        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    @include('admin.settings.includes.general')
                </div>
                <div class="tab-pane fade" id="site-logo">
                    @include('admin.settings.includes.logo')
                </div>
                <div class="tab-pane fade" id="footer-seo">
                    @include('admin.settings.includes.footer_seo')
                </div>
                <div class="tab-pane fade" id="social-links">
                    @include('admin.settings.includes.social_links')
                </div>
                <div class="tab-pane fade" id="analytics">
                    @include('admin.settings.includes.analytics')
                </div>
                <div class="tab-pane fade" id="payments">
                    @include('admin.settings.includes.payments')
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-layout>