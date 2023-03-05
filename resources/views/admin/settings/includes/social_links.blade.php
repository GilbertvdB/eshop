<div>
    <hr class="py-4">
    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf

        <!-- Facebook Profile-->
        <div>
            <x-input-label for="social_facebook" :value="__('Facebook Profile')" />
            <x-text-input id="social_facebook" class="block mt-1 mb-2 w-full" type="text" name="social_facebook" :value="config('settings.social_facebook')" placeholder="Enter facebook profile link"  />
            <x-input-error :messages="$errors->get('social_facebook')" class="mt-2" />
        </div>

        <!-- Twitter Profile -->
        <div>
            <x-input-label for="social_twitter" :value="__('Twitter Profile')" />
            <x-text-input id="social_twitter" class="block mt-1 mb-2 w-full" type="text" name="social_twitter" :value="config('settings.social_twitter')" placeholder="Enter twitter profile link"  />
            <x-input-error :messages="$errors->get('social_twitter')" class="mt-2" />
        </div>

        <!-- Instagram Profile -->
        <div>
            <x-input-label for="social_instagram" :value="__('Instagram Profile')" />
            <x-text-input id="social_instagram" class="block mt-1 mb-2 w-full" type="text" name="social_instagram" :value="config('settings.social_instagram')" placeholder="Enter instagram profile link"  />
            <x-input-error :messages="$errors->get('social_instagram')" class="mt-2" />
        </div>

        <!-- LinkedIn Profile -->
        <div>
            <x-input-label for="social_linkedin" :value="__('LinkedIn Profile')" />
            <x-text-input id="social_linkedin" class="block mt-1 mb-2 w-full" type="text" name="social_linkedin" :value="config('settings.social_linkedin')" placeholder="Enter linkedin profile link"  />
            <x-input-error :messages="$errors->get('social_linkedin')" class="mt-2" />
        </div>

        <!-- Tiktok Profile -->
        <div>
            <x-input-label for="social_tiktok" :value="__('TikTok Profile')" />
            <x-text-input id="social_tiktok" class="block mt-1 mb-2 w-full" type="text" name="social_tiktok" :value="config('settings.social_tiktok')" placeholder="Enter tiktok profile link"  />
            <x-input-error :messages="$errors->get('social_tiktok')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Update Settings') }}
            </x-primary-button>
        </div>
    </form>
</div>