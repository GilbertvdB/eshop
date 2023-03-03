<div>
    <hr class="pb-4">
    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf

        <!--Site Name -->
        <div>
            <x-input-label for="site_name" :value="__('Site Name')" />
            <x-text-input id="site_name" class="block mt-1 mb-2 w-full" type="text" name="site_name" :value="config('settings.site_name')" placeholder="Enter site name" required autofocus />
            <x-input-error :messages="$errors->get('site_name')" class="mt-2" />
        </div>

        <!--Site Title -->
        <div>
            <x-input-label for="site_title" :value="__('Site Title')" />
            <x-text-input id="site_title" class="block mt-1 mb-2 w-full" type="text" name="site_title" :value="config('settings.site_title')" placeholder="Enter site title"  />
            <x-input-error :messages="$errors->get('site_title')" class="mt-2" />
        </div>

        <!-- Default Email Address -->
        <div class="mt-4">
            <x-input-label for="default_email_address" :value="__('Default Email Address')" />
            <x-text-input id="default_email_address" class="block mt-1 mb-2 w-full" type="email" name="config('settings.default_email_address')" :value="old('default_email_address')" placeholder="Enter store default email address" required />
            <x-input-error :messages="$errors->get('default_email_address')" class="mt-2" />
        </div>

        <!--Currency Code -->
        <div>
            <x-input-label for="currency_code" :value="__('Currency Code')" />
            <x-text-input id="currency_code" class="block mt-1 mb-2 w-full" type="text" name="currency_code" :value="config('settings.currency_code')" placeholder="Enter store currency code"  />
            <x-input-error :messages="$errors->get('currency_code')" class="mt-2" />
        </div>

        <!--Currency Symbol -->
        <div>
            <x-input-label for="currency_symbol" :value="__('Currency Symbol')" />
            <x-text-input id="currency_symbol" class="block mt-1 mb-2 w-full" type="text" name="currency_symbol" :value="config('settings.currency_symbol')" placeholder="Enter store currency symbol"  />
            <x-input-error :messages="$errors->get('currency_symbol')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</div>