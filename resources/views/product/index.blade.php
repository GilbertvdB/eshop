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
            <img class="w-full h-52 object-cover" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
                <p class="text-gray-700 text-sm">{{ $product->description }}</p>
            </div>
            <div class="px-6 py-4 border">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">&euro;{{ $product->price }}</span>
                <span>
                <form action="{{ route('wishlist.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}"  name="image">
                        <input type="hidden" value="1" name="qty">
                        <button class="px-4 py-1.5 text-white text-sm rounded">
                        <div class="">
                            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false" role="presentation">
                            <path d="M21.281 9.076c-.317 1.427-1.031 2.776-2.142 3.966a108.712 108.712 0 01-4.284 4.284c-.872.872-1.824 1.745-2.776 2.618l-.08.08-.079-.08c-.952-.873-1.904-1.746-2.776-2.618a108.137 108.137 0 01-4.283-4.284c-1.111-1.19-1.825-2.539-2.142-3.966-.397-1.666.158-2.856.635-3.57.696-1.046 1.903-1.81 3.18-1.895 2.027-.136 3.465 1.45 4.498 2.982.29.43.603.847.9 1.274l.068.099.068-.099c.296-.427.609-.843.9-1.274 1.033-1.531 2.47-3.118 4.497-2.982 1.278.085 2.484.849 3.181 1.895.477.714 1.032 1.904.635 3.57M12 5.004a6.535 6.535 0 00-1.476-1.72c-1.207-1.003-3.06-1.661-4.632-1.269-2.46.397-5.553 3.253-4.76 7.298.352 1.799 1.321 3.41 2.539 4.755 1.376 1.52 2.868 2.951 4.363 4.369A203.883 203.883 0 0012 22.1a201.526 201.526 0 003.966-3.663c1.496-1.418 2.986-2.848 4.362-4.369 1.219-1.345 2.187-2.956 2.54-4.755.793-4.045-2.301-6.9-4.76-7.298-1.571-.392-3.425.266-4.633 1.27A6.532 6.532 0 0012 5.004" fill-rule="evenodd" fill="red">
                            </path>
                            </svg>
                        </div>
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