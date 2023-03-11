<x-layout>
    <x-slot name="header"> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $pageTitle }}</h2>
        <p>{{ $pageDescription }}</p>
    </x-slot>

    @section('content')
    <!-- x-flash-message to be created -->
    @if(session()->has('message'))
    <div class="alert alert-{{ session()->get('alert-type', 'info') }}">
        {{ session()->get('message') }}
    </div>
    @endif

    @if (session('success'))
    <div class="grid grid-cols-5">
        <span class="text-green-600 italic col-start-2 col-end-4" >
            {{ session('success') }}
            </span>
    </div>
    @endif


    <div class="py-2">
        <div class="max-w-7xl mx-44 sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden">

            <div class="flex">
                <div class="w-1/5">
                <div class="border border-gray-300 bg-white h-86 shadow-sm sm:rounded-lg">
                    <a href="#general" class="nav-link block text-black py-3 px-4 w-full text-left focus:outline-none hover:bg-sky-200" onclick="openSettings(event, 'general')">General</a>
                    <a href="#logo" class="nav-link block text-black py-3 px-4 w-full text-left focus:outline-none hover:bg-sky-200" onclick="openSettings(event, 'logo')">Site Logo</a>
                    <a href="#footer-seo" class="nav-link block text-black py-3 px-4 w-full text-left focus:outline-none hover:bg-sky-200" onclick="openSettings(event, 'footer-seo')">Footer &amp; SEO</a>
                    <a href="#social-links" class="nav-link block text-black py-3 px-4 w-full text-left focus:outline-none hover:bg-sky-200" onclick="openSettings(event, 'social-links')">Social Links</a>
                    <a href="#analytics" class="nav-link block text-black py-3 px-4 w-full text-left focus:outline-none hover:bg-sky-200" onclick="openSettings(event, 'analytics')">Analytics</a>
                    <a href="#payments" class="nav-link block text-black py-3 px-4 w-full text-left focus:outline-none hover:bg-sky-200" onclick="openSettings(event, 'payments')">Payments</a>
                </div>

                </div>
                
                    <div id="general" class="tabcontent border bg-white border-gray-300 w-4/5 h-fit ml-4 p-4 hidden">
                        <h3 class="text-2xl font-bold">General Settings</h3>
                        @include('admin.settings.includes.general')
                    </div>

                    <div id="logo" class="tabcontent border bg-white border-gray-300 w-4/5 h-fit ml-4 p-4 hidden">
                        <h3 class="text-2xl font-bold">Site Logo</h3>
                        @include('admin.settings.includes.logo')
                    </div>

                    <div id="footer-seo" class="tabcontent border bg-white border-gray-300 w-4/5 h-fit ml-4 p-4 hidden">
                        <h3 class="text-2xl font-bold">Footer &amp; SEO</h3>
                        @include('admin.settings.includes.footer_seo')
                    </div>

                    <div id="social-links" class="tabcontent border bg-white border-gray-300 w-4/5 h-fit ml-4 p-4 hidden">
                        <h3 class="text-2xl font-bold">Social Links</h3>
                        @include('admin.settings.includes.social_links')
                    </div>

                    <div id="analytics" class="tabcontent border bg-white border-gray-300 w-4/5 h-fit ml-4 p-4 hidden">
                        <h3 class="text-2xl font-bold">Analytics</h3>
                        @include('admin.settings.includes.analytics')
                    </div>

                    <div id="payments" class="tabcontent border bg-white border-gray-300 w-4/5 h-fit ml-4 p-4 hidden">
                        <h3 class="text-2xl font-bold">Payments</h3>
                        @include('admin.settings.includes.payments')
                    </div>
            </div>


                <script>

                function openSettings(evt, settingName) {
                    // Declare all variables
                    var i, tabcontent, tablinks;

                    // Get all elements with class="tabcontent" and hide them
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }

                    // Get all elements with class="nav-link" and remove the class "active"
                    tablinks = document.getElementsByClassName("nav-link");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].classList.remove("active");
                        tablinks[i].classList.remove("border-l-4");
                    }

                    // Show the current tab, and add an "active" class to the link that opened the tab
                    document.getElementById(settingName).style.display = "block";
                    evt.currentTarget.classList.add("active");
                    evt.currentTarget.classList.add("border-l-4");
                    evt.currentTarget.classList.add("border-sky-500");
                }

                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();

                </script>

            </div>
        </div>
    </div>

    @endsection
</x-layout>