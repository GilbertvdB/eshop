<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    <div>
        Link to create!
        <br>
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('product.create') }}">
                            {{ __('Add Product') }}
                        </a>
    </div>
    <hr>
    <!-- Products -->
    <div>
    <div class="flex flex-wrap -mx-4">    
    @foreach($products as $product)
    <div class="w-full md:w-1/3 px-4 py-4">
    <a href="{{ route('product.show', $product) }}"> <!-- make it clickable and open show page -->
        <div class="max-w-sm rounded overflow-hidden shadow-lg m-4">
            <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
                <p class="text-gray-700 text-sm">{{ $product->description }}</p>
            </div>
            <div class="px-6 py-4">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">&euro;{{ $product->price }}</span>
                <span class="float-right">
                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-1.5 text-white text-sm bg-blue-800 rounded">Add To Cart</button>
                    </form>
                </span>
            </div>
        </div>
    </div>
    </a>
    @endforeach
    </div>

    </div>

            </div>
        </div>
        <img class="w-full h-24 w-24 object-cover" src="{{ asset('images/logo.jpg') }}" alt="logo">
    </div>
</div>    
</x-app-layout>