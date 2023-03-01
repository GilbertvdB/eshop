<x-layout>
    <x-slot name="header"> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $pageTitle }}</h2>
    </x-slot>

    <!-- x-flash-message  to be created -->
    @section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-44 sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex-row flex-wrap lg:w-1/4 border">
                    <div class="border-b border-gray-200 w-full">
                        <nav class="flex flex-col">
                            <a href="#general" class="bg-white text-gray-900 py-3 px-6 border-l-4 border-gray-500 font-semibold active:tab-active hover:tab-hover transition duration-150 ease-in-out">General</a>
                            <a href="#site-logo" class="bg-white text-gray-900 py-3 px-6 border-l-4 border-gray-500 font-semibold active:tab-active hover:tab-hover transition duration-150 ease-in-out">Site Logo</a>
                            <a href="#footer-seo" class="bg-white text-gray-900 py-3 px-6 border-l-4 border-gray-500 font-semibold active:tab-active hover:tab-hover transition duration-150 ease-in-out">Footer &amp; SEO</a>
                            <a href="#social-links" class="bg-white text-gray-900 py-3 px-6 border-l-4 border-gray-500 font-semibold active:tab-active hover:tab-hover transition duration-150 ease-in-out">Social Links</a>
                            <a href="#analytics" class="bg-white text-gray-900 py-3 px-6 border-l-4 border-gray-500 font-semibold active:tab-active hover:tab-hover transition duration-150 ease-in-out">Analytics</a>
                            <a href="#payments" class="bg-white text-gray-900 py-3 px-6 border-l-4 border-gray-500 font-semibold active:tab-active hover:tab-hover transition duration-150 ease-in-out">Payments</a>
                        </nav>
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