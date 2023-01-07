<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="">
                        <h2 class="text-4xl font-bold">Checkout</h2>
                    </div>
                    <div class="bg-gray-200 py-8">
                        <div class="container mx-auto">
                            <div class="flex flex-wrap">
                                <div class="w-full md:w-8/12">
                                    @if (Session::has('error'))
                                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                            <strong class="font-bold">{{ Session::get('error') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4 flex bg-white rounded-md shadow-md">
                            <form action="{{ route('checkout.place.order') }}" method="POST" role="form" class="md:w-8/12 px-3 mb-6">
                            @csrf
                                <div class="col-span-2/3 px-4 py-5 sm:p-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Billing Details</h3>
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

                                        <div class="col-span-1/3 border md:col-span-4 px-3">
                                            <div class="bg-white rounded-md shadow-md">
                                                <div class="px-4 py-5 sm:p-6">
                                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Your Order</h3>
                                                    <div class="mt-2 sm:border-t sm:border-gray-200 sm:pt-5">
                                                        <dl class="dlist-align">
                                                            <dt class="text-sm leading-5 font-medium text-gray-500">Total cost:</dt>
                                                            <dd class="text-2xl font-semibold leading-8 text-gray-900">{{ config('settings.currency_symbol') }}{{ Cart::session(Auth::user()->id)->getSubTotal() }}</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="mt-6 sm:mt-5 sm:border-t sm:border-gray-200 sm:pt-5">
                                                        <button type="submit" class="px-4 py-2 font-medium bg-indigo-600 rounded-md shadow-md hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue transition duration-150 ease-in-out">Place Order</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </form>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
</x-app-layout>