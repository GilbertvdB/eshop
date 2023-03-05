<div>
    <hr class="py-4">
    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf

        <!-- Footer Copyright Text -->
        <div>
        <x-input-label for="footer_copyright_text" :value="__('Footer & SEO')" />
        <textarea
                name="footer_copyright_text"
                placeholder="{{ __('Enter footer copyright text') }}"
                class="block mt-1 mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ config('settings.footer_copyright_text') }}</textarea>
            <x-input-error :messages="$errors->get('footer_copyright_text')" class="mt-2" />
        </div>

        <!-- SEO Meta Title -->
        <div>
            <x-input-label for="seo_meta_title" :value="__('SEO Meta Title')" />
            <x-text-input id="seo_meta_title" class="block mt-1 mb-2 w-full" type="text" name="seo_meta_title" :value="config('settings.seo_meta_title')" placeholder="Enter seo meta title"  />
            <x-input-error :messages="$errors->get('seo_meta_title')" class="mt-2" />
        </div>

        <!-- SEO Meta Description -->
        <div>
        <x-input-label for="seo_meta_description" :value="__('SEO Meta Description')" />
        <textarea
                name="seo_meta_description"
                placeholder="{{ __('Enter SEO Meta description for store') }}"
                class="block mt-1 mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ config('settings.seo_meta_description') }}</textarea>
            <x-input-error :messages="$errors->get('seo_meta_description')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Update Settings') }}
            </x-primary-button>
        </div>
    </form>
</div>