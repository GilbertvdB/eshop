<div>
    <hr class="py-4">
    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf

        <!-- Google Analytics Code -->
        <div>
        <x-input-label for="google_analytics" :value="__('Google Analytics Code')" />
        <textarea
                name="google_analytics"
                placeholder="{{ __('Enter google analytics code') }}"
                class="block mt-1 mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{!! config('settings.google_analytics') !!}</textarea>
            <x-input-error :messages="$errors->get('google_analytics')" class="mt-2" />
        </div>

        <!-- Facebook Pixel Code -->
        <div>
        <x-input-label for="facebook_pixels" :value="__('Facebook Pixel Code')" />
        <textarea
                name="facebook_pixels"
                placeholder="{{ __('Enter facebook pixel code') }}"
                class="block mt-1 mb-2 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ config('settings.facebook_pixels') }}</textarea>
            <x-input-error :messages="$errors->get('facebook_pixels')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Update Settings') }}
            </x-primary-button>
        </div>
    </form>
</div>