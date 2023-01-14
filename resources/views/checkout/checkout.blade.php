<x-app-layout>

<div class="max-w-7xl mx-auto">
    <div class="p-6 text-gray-900">

        <div class="flex mt-2">

            <div class="w-2/3 bg-white shadow-md px-3">
                <div class="bg-white p-6">
                    <h2 class="text-3xl font-bold">Checkout</h2>
                    <hr>
                </div>

                <!-- Display errors -->
                <div class="flex flex-wrap">
                    <div class="w-full">
                        @if (Session::has('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative">
                                <strong class="font-bold">{{ Session::get('error') }} </strong>
                            </div>
                        @endif
                    </div>
                </div>
                    
                <!-- Container 1 - Form -->
                <div>
                <form action="{{ route('checkout.place.order') }}" method="POST" role="form" id="form">
                @csrf
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-2xl leading-6 font-medium text-gray-900">Billing Details</h3>
                        <div class="mt-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                First name
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="first_name" name="first_name" type="text" class="form-input w-full py-2 px-3 text-gray-900 leading-tight rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Last name
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="last_name" name="last_name" type="text" class="form-input w-full py-2 px-3 text-gray-900 leading-tight rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            <label for="address" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Address
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="address" name="address" type="text" class="form-input w-full py-2 px-3 text-gray-900 leading-tight rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            <label for="city" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                City
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="city" name="city" type="text" class="form-input w-full py-2 px-3 text-gray-900 leading-tight rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            <label for="postcode" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Post Code
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="postcode" name="post_code" type="text" class="form-input w-full py-2 px-3 text-gray-900 leading-tight rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            <label for="phonenumber" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Phone Number
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="phonenumber" name="phone_number" type="text" class="form-input w-full py-2 px-3 text-gray-900 leading-tight rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            <label for="email" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                Email
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input id="email" name="email" type="email" value="{{ auth()->user()->email }}" disabled class="form-input w-full py-2 px-3 text-gray-900 leading-tight rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            <label for="notes" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                                    Order Notes
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <textarea id="notes" name="notes" rows="6" class="form-input w-full py-2 px-3 text-gray-900 leading-tight rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                </div>

            </div>

            <!-- Container 2 - Order Total -->
            <div class="w-1/3 ml-4">
                <div class="px-4 py-5 bg-white shadow-md sm:p-6">
                    <h3 class="text-2xl leading-6 font-bold text-gray-900">Your Order</h3>
                    <div class="mt-2 sm:border-t sm:border-gray-200 sm:pt-5">
                        <div class="flex justify-between">
                            <div class="text-lg leading-5 font-medium text-gray-800">Total cost:</div>
                            <div class="text-lg font-semibold leading-8 text-gray-900">{{ config('settings.currency_symbol') }}{{ Cart::session(Auth::user()->id)->getSubTotal() }}</div>
                        </div>
                    </div>
                    <div class="mt-6 sm:mt-5 sm:border-t sm:border-gray-200 sm:pt-5">
                        <button type="submit" form="form" class="w-full px-2 py-2 font-medium text-white bg-blue-600 rounded-md shadow-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue transition duration-150 ease-in-out">
                            Place Order</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

</x-app-layout>