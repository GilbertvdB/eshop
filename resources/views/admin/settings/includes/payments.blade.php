<div>
    <hr class="py-4">
    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf

        <!-- Stripe Payment Method -->
        <div>
            <x-input-label for="stripe_payment_method" :value="__('Stripe Payment Method')" />
            <select name="stripe_payment_method" id="stripe_payment_method" class="block mt-1 mb-2 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="1" {{ (config('settings.stripe_payment_method')) == 1 ? 'selected' : '' }}>Enabled</option>
                <option value="0" {{ (config('settings.stripe_payment_method')) == 0 ? 'selected' : '' }}>Disabled</option>
            </select>
        </div>

        <!-- Stripe Key -->
        <div>
            <x-input-label for="stripe_key" :value="__('Key')" />
            <x-text-input id="stripe_key" class="block mt-1 mb-2 w-full" type="text" name="stripe_key" :value="config('settings.stripe_key')" placeholder="Enter stripe key" />
            <x-input-error :messages="$errors->get('stripe_key')" class="mt-2" />
        </div>

        <!-- Stripe Secret Key-->
        <div>
            <x-input-label for="stripe_secret_key" :value="__('Secret Key')" />
            <x-text-input id="stripe_secret_key" class="block mt-1 mb-2 w-full" type="text" name="stripe_secret_key" :value="config('settings.stripe_secret_key')" placeholder="Enter stripe secret key"  />
            <x-input-error :messages="$errors->get('stripe_secret_key')" class="mt-2" />
        </div>

        <hr class="my-8">

        <!-- PayPal Payment Method -->
        <div>
            <x-input-label for="paypal_payment_method" :value="__('PayPal Payment Method')" />
            <select name="paypal_payment_method" id="paypal_payment_method" class="block mt-1 mb-2 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="1" {{ (config('settings.paypal_payment_method')) == 1 ? 'selected' : '' }}>Enabled</option>
                <option value="0" {{ (config('settings.paypal_payment_method')) == 0 ? 'selected' : '' }}>Disabled</option>
            </select>
        </div>

        <!-- Paypal Client Id -->
        <div>
            <x-input-label for="paypal_client_id" :value="__('Client Id')" />
            <x-text-input id="paypal_client_id" class="block mt-1 mb-2 w-full" type="text" name="paypal_client_id" :value="config('settings.paypal_client_id')" placeholder="Enter paypal client id" />
            <x-input-error :messages="$errors->get('paypal_client_id')" class="mt-2" />
        </div>

        <!-- Ideal Secret Id-->
        <div>
            <x-input-label for="paypal_secret_id" :value="__('Secret Id')" />
            <x-text-input id="paypal_secret_id" class="block mt-1 mb-2 w-full" type="text" name="paypal_secret_id" :value="config('settings.paypal_secret_id')" placeholder="Enter paypal secret id"  />
            <x-input-error :messages="$errors->get('paypal_secret_id')" class="mt-2" />
        </div>

        <hr class="my-8">

        <!-- Ideal Payment Method -->
        <div>
            <x-input-label for="ideal_payment_method" :value="__('Ideal Payment Method')" />
            <select name="ideal_payment_method" id="ideal_payment_method" class="block mt-1 mb-2 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="1" {{ (config('settings.ideal_payment_method')) == 1 ? 'selected' : '' }}>Enabled</option>
                <option value="0" {{ (config('settings.ideal_payment_method')) == 0 ? 'selected' : '' }}>Disabled</option>
            </select>
        </div>

        <!-- Ideal Client Id -->
        <div>
            <x-input-label for="ideal_client_id" :value="__('Client Id')" />
            <x-text-input id="ideal_client_id" class="block mt-1 mb-2 w-full" type="text" name="ideal_client_id" :value="config('settings.ideal_client_id')" placeholder="Enter ideal client id" />
            <x-input-error :messages="$errors->get('paypal_client_id')" class="mt-2" />
        </div>

        <!-- Ideal Secret Id-->
        <div>
            <x-input-label for="ideal_secret_id" :value="__('Secret Id')" />
            <x-text-input id="ideal_secret_id" class="block mt-1 mb-2 w-full" type="text" name="ideal_secret_id" :value="config('settings.ideal_secret_id')" placeholder="Enter ideal secret id"  />
            <x-input-error :messages="$errors->get('ideal_secret_id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Update Settings') }}
            </x-primary-button>
        </div>
    </form>
</div>