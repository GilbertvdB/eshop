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
                <span>
                <form action="{{ route('wishlist.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}"  name="image">
                        <input type="hidden" value="1" name="qty">
                        <button class="px-4 py-1.5 text-white text-sm bg-red-200 rounded">
                        <svg class="w-8 h-8"  id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 107.21"><title>add-to-wishlist</title>
                    <path d="M73.13,93.77,59.58,107.21,44,92.19c-2.43-2.35-5.25-4.92-8.18-7.59C19.93,70.14.79,52.69,0,31.09l0-1.65A28.51,28.51,0,0,1,9,8.54,31.68,31.68,0,0,1,29.57.31l1.71,0c13.72.18,20,6.2,28.18,14.24C66.21,7.38,71.81,1.52,83.21.21a33.07,33.07,0,0,1,18.62,3.37,34.41,34.41,0,0,1,12.24,10.25,31,31,0,0,1,6,14.86A30.55,30.55,0,0,1,116.82,46c-.41.8-.88,1.65-1.39,2.52l-.45.74A30.65,30.65,0,0,1,73.13,93.77Zm15.22-35.6a3.69,3.69,0,0,1,.3-1.48l0-.06a3.8,3.8,0,0,1,2.06-2,3.94,3.94,0,0,1,1.47-.31h0a3.87,3.87,0,0,1,1.48.29,4.15,4.15,0,0,1,1.26.84,3.87,3.87,0,0,1,.84,1.25l0,.07a4,4,0,0,1,.28,1.4v7.78h7.75a3.87,3.87,0,0,1,1.48.29,3.92,3.92,0,0,1,1.26.84,4,4,0,0,1,.84,1.25l0,.07a3.78,3.78,0,0,1,.28,1.35v.15a3.86,3.86,0,0,1-.29,1.41,4.15,4.15,0,0,1-.84,1.26,3.7,3.7,0,0,1-1.25.83l-.07,0a4,4,0,0,1-1.39.28H96.12v7.75a3.87,3.87,0,0,1-.3,1.48A3.92,3.92,0,0,1,95,84.17l-.08.07a3.72,3.72,0,0,1-1.17.77l-.07,0a3.8,3.8,0,0,1-1.4.28h0a4.07,4.07,0,0,1-1.48-.3,3.85,3.85,0,0,1-2.09-2.08,3.79,3.79,0,0,1-.3-1.47V73.69H80.6a3.87,3.87,0,0,1-1.48-.3l-.06,0a3.58,3.58,0,0,1-1.2-.81A3.87,3.87,0,0,1,77,71.3l0-.07a4,4,0,0,1-.28-1.4v0A4,4,0,0,1,77,68.33a3.86,3.86,0,0,1,.84-1.27,4,4,0,0,1,1.25-.83,3.71,3.71,0,0,1,1.47-.3h7.78V58.17Zm21.7-13.31c.34-.58.67-1.17,1-1.76a24.13,24.13,0,0,0,2.56-13.67,24.39,24.39,0,0,0-4.72-11.73,27.78,27.78,0,0,0-9.92-8.31A26.62,26.62,0,0,0,84,6.68c-9.13,1-14,6.2-19.9,12.47l-4.43,4.64L55.2,19.45c-7.27-7.14-12.74-12.52-24-12.67l-1.4,0a25.21,25.21,0,0,0-16.36,6.5A22.12,22.12,0,0,0,6.49,29.52l0,1.34c.67,18.85,18.72,35.3,33.67,48.93,2.89,2.63,5.67,5.16,8.32,7.72l11,10.61,9-8.91a30.66,30.66,0,0,1,41.55-44.35Zm-.76,7.87a24.14,24.14,0,1,0,7.07,17.07,24.06,24.06,0,0,0-7.07-17.07Z"/>
                </svg>
                        </button>
                    </form>   
                </span>
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