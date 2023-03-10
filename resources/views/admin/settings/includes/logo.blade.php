<div>
    <hr class="py-4">
    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
        @csrf
        
        <!--Site Logo -->
        <div class="flex flex-row">
            <!--Site Logo Image -->
            <div class="w-1/4">
                @if (config('settings.site_logo') != null)
                    <img src="{{ asset('storage/'.config('settings.site_logo')) }}" id="logoImg" class="w-20 h-auto">
                @else
                    <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="logoImg" class="w-20 h-auto">
                @endif
            </div>

            <!--Site Logo File Upload-->
            <div class="w-3/4">
                <div>
                    <x-input-label for="site_logo" :value="__('Site Logo')" />
                    <input class="block mt-1 mb-2 py-2 px-3 w-full border rounded-md text-gray-700 leading-tight focus:outline-none focus:border-blue-500" type="file" name="site_logo" value="Choose a file" onchange="loadFile(event,'logoImg')"/>
                    <x-input-error :messages="$errors->get('site_logo')" class="mt-2" />
                </div>
            </div>
        </div> 

        <!--Favicon Logo -->
        <div class="flex flex-row mt-6">
            <!--Favicon Logo Image -->
            <div class="w-1/4">
                @if (config('settings.site_favicon') != null)
                    <img src="{{ asset('storage/'.config('settings.site_favicon')) }}" id="faviconImg" class="w-20 h-auto">
                @else
                    <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="faviconImg" class="w-20 h-auto">
                @endif
            </div>

            <!--Favicon Logo File Upload-->
            <div class="w-3/4">
                <div>
                    <x-input-label for="site_favicon" :value="__('Site favicon')" />
                    <input class="block mt-1 mb-2 py-2 px-3 w-full border rounded-md text-gray-700 leading-tight focus:outline-none focus:border-blue-500" type="file" name="site_favicon" value="Choose a file" onchange="loadFile(event,'faviconImg')"/>
                    <x-input-error :messages="$errors->get('site_favicon')" class="mt-2" />
                </div>
            </div>
        </div> 

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Update Settings') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        loadFile = function(event, id) {
            var output = document.getElementById(id);
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
</div>