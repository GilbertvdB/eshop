<x-layout>
    <x-slot name="header"> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $pageTitle }}</h2>
    </x-slot>

    <!-- x-flash-message  to be created -->
    @section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-44 sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">

            <div class="flex">
                <div class="w-1/5">
                    <div class="border border-gray-300 bg-white h-86 shadow-sm sm:rounded-lg">
                    <button class="tablinks block text-black py-3 px-4 w-full text-left focus:outline-none hover:bg-gray-200" onclick="openSettings(event, 'General')" id="defaultOpen">General</button>
                    <button class="tablinks block text-black py-3 px-4 w-full text-left focus:outline-none hover:bg-gray-200" onclick="openSettings(event, 'Logo')">Site Logo</button>
                    <button class="tablinks block text-black py-3 px-4 w-full text-left focus:outline-none hover:bg-gray-200" onclick="openSettings(event, 'Footer-seo')">Footer &amp; SEO</button>
                    <button class="tablinks block text-black py-3 px-4 w-full text-left focus:outline-none hover:bg-gray-200" onclick="openSettings(event, 'Social-links')">Social Links</button>
                    <button class="tablinks block text-black py-3 px-4 w-full text-left focus:outline-none hover:bg-gray-200" onclick="openSettings(event, 'Analytics')">Analytics</button>
                    <button class="tablinks block text-black py-3 px-4 w-full text-left focus:outline-none hover:bg-gray-200" onclick="openSettings(event, 'Payments')">Payments</button>
                    </div>
                </div>

                    <div id="General" class="tabcontent border bg-white border-gray-300 w-4/5 h-fit ml-4 p-2 hidden">
                        <h3 class="text-2xl font-bold">General Settings</h3>
                        @include('admin.settings.includes.general')
                    </div>

                    <div id="Logo" class="tabcontent border bg-white border-gray-300 w-4/5 h-fit ml-4 p-2 hidden">
                        <h3 class="text-2xl font-bold">Site Logo</h3>
                        @include('admin.settings.includes.logo')
                    </div>

                    <div id="Footer-seo" class="tabcontent border bg-white border-gray-300 w-4/5 h-fit ml-4 p-2 hidden">
                        <h3 class="text-2xl font-bold">Footer &amp; SEO</h3>
                        @include('admin.settings.includes.footer_seo')
                    </div>

                    <div id="Social-links" class="tabcontent border bg-white border-gray-300 w-4/5 h-fit ml-4 p-2 hidden">
                        <h3 class="text-2xl font-bold">Social Links</h3>
                        @include('admin.settings.includes.social_links')
                    </div>

                    <div id="Analytics" class="tabcontent border bg-white border-gray-300 w-4/5 h-fit ml-4 p-2 hidden">
                        <h3 class="text-2xl font-bold">Analytics</h3>
                        @include('admin.settings.includes.analytics')
                    </div>

                    <div id="Payments" class="tabcontent border bg-white border-gray-300 w-4/5 h-fit ml-4 p-2 hidden">
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

                // Get all elements with class="tablinks" and remove the class "active"
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                    tablinks[i].className = tablinks[i].className.replace(" border-l-4", "");
                }

                // Show the current tab, and add an "active" class to the link that opened the tab
                document.getElementById(settingName).style.display = "block";
                evt.currentTarget.className += " active";
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