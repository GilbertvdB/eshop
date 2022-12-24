<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    <div>
        Link to create!
        <br>
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ url()->previous() }}">
                            {{ __('Back') }}
                        </a>
    </div>
    <hr>
    <!-- Products -->
    <div class="container mx-auto px-4 py-16">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/2">
                <div class="max-w-sm rounded overflow-hidden shadow-xl m-4">    
                    <img class="w-full h-80 object-cover" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                </div>    
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Reviews</div>
                    
                </div>
            </div>
            <div class="md:w-1/2 pl-4">
                <div class="font-bold text-3xl mb-2">{{ $product->name }}</div>
                <div class="mb-2 text-3xl">&euro;{{ $product->price }}</div>
                <div class="mb-6 mt-4">
                <button class="font-bold text-lg py-2 px-4 rounded-full bg-blue-500 hover:bg-blue-700 text-white mr-2">Add to Cart</button>
                <button class="font-bold text-lg py-2 px-4 rounded-full bg-red-500 hover:bg-red-700 text-white">Buy Now</button>
                </div>
                <div class="mb-6"><p class="text-xl">Description:</p><p>{{ $product->description }}</p></div>
            </div>
        </div>
    </div>
    <br>

            </div>
        </div>
    </div>
</div>    
</x-app-layout>