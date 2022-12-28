<x-app-layout>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

            <h1> Checkout Process</h1>
            <br>
            <div class="ml-20">
                <span class="text-gray-500"><a href={{ route('cart.list') }}>Your Cart</a></span>
                <span class="text-xl font-bold">/ Information / </span>
                <span class="text-gray-500">Payment / </span>
                <span class="text-gray-500">Confirmation</span>
            </div>
            <hr class="my-2 border-black"> 
            <div class="ml-20">
                @include('checkout.create')
            </div>



            </div>
        </div>
    </div>
</div>
</x-app-layout>