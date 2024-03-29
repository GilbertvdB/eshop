<x-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $pageTitle }} - {{ $pageDescription }}</h2>
            </div>
        </div>
    </x-slot>

    @section('content')

    <div class="py-2">
        <div class="sm:px-6 lg:px-8">

        @if(session('error'))
            <div class="bg-red-500 text-white px-4 py-2 rounded transition-all duration-500" id="error-message">
                {{ session('error') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById("error-message").style.opacity = 0;
                }, 1500); // 3000 milliseconds = 3 seconds
            </script>
        @endif

        <div class="flex">
                <div class="w-1/5">
                    <div class="border border-gray-300 bg-white h-86 shadow-sm">
                        <a href="#general" class="nav-link block text-black py-3 px-4 w-full text-left focus:outline-none hover:bg-sky-200 active:border-l-4 active:border-sky-500 active" 
                            onclick="showTab('general'); return false;">
                            General</a>
                        <a href="#images" class="nav-link block text-black py-3 px-4 w-full text-left focus:outline-none hover:bg-sky-200 active:border-l-4 active:border-sky-500 {{ Request::is('images*') ? 'active' : '' }}" 
                            onclick="showTab('images'); return false;">
                            Images</a>
                    </div>   
                </div>    

                <!-- General Tab -->
                <div class="border border-gray-300 bg-white h-86 ml-4 p-4 shadow-sm w-3/5">
                    <div id="general" class="">
                        <div class="">
                            <h3 class="text-lg font-bold">Product information</h3>
                            <hr class="py-4">
                            <form action="{{ route('admin.products.update', $product) }}" method="POST" role="form" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="">
                                    <!-- Name -->
                                    <div>
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input id="name" class="block mt-1 mb-2 w-full" type="text" name="name" :value="old('name', $product->name) " placeholder="Enter attribute name"  required/>
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    <div class="flex flew-row">
                                        <!-- SKU -->
                                        <div class="w-1/2 mr-4">
                                            <x-input-label for="sku" :value="__('Sku')" />
                                            <x-text-input id="sku" class="block mt-1 mb-2 w-full" type="text" name="sku" :value="old('sku', $product->sku) " placeholder="Enter product sku"  />
                                            <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                                        </div>

                                        <!-- Brand -->
                                        <div class="w-1/2 ml-4">
                                            <x-input-label for="brand" :value="__('Brand')" />
                                            <select name="brand_id" id="brand" class=" block mt-1 mb-2 w-full border-gray-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm">
                                                <option value="0" class="">Select a brand</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}" class="" @if($brand->id == old('brand_id', $product->brand_id)) selected @endif> {{ $brand->name }} </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('brand_id')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Categories -->
                                    <div>
                                        <x-input-label for="categories" :value="__('Categories')" />
                                        <select name="categories[]" id="categories" class="block mt-1 mb-2 w-full border-gray-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm" multiple>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : '' }}> {{ $category->name }} </option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('categories')" class="mt-2" />
                                    </div>

                                    <div class="flex flew-row">
                                        <!-- Price -->
                                        <div class="w-1/2 mr-4">
                                            <x-input-label for="price" :value="__('Price')" />
                                            <x-text-input id="price" class="block mt-1 mb-2 w-full" type="text" name="price" :value="old('price', $product->price) " placeholder="Enter product price"  />
                                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                        </div>

                                        <!-- Sale Price -->
                                        <div class="w-1/2 ml-4">
                                            <x-input-label for="sale_price" :value="__('Sale Price')" />
                                            <x-text-input id="sale_price" class="block mt-1 mb-2 w-full" type="text" name="sale_price" :value="old('sale_price', $product->sale_price)" placeholder="Enter product sale price"  />
                                            <x-input-error :messages="$errors->get('sale_price')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="flex flew-row">    
                                        <!-- Quantity -->
                                        <div class="w-1/2 mr-4">
                                            <x-input-label for="quantity" :value="__('Quantity')" />
                                            <x-text-input id="quantity" class="block mt-1 mb-2 w-full" type="number" name="quantity" :value="old('quantity', $product->quantity)" placeholder="Enter product quantity"  />
                                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                                        </div>

                                        <!-- Weight -->
                                        <div class="w-1/2 ml-4">
                                            <x-input-label for="weight" :value="__('Weight')" />
                                            <x-text-input id="weight" class="block mt-1 mb-2 w-full" type="text" name="weight" :value="old('weight', $product->weight)" placeholder="Enter product weight"  />
                                            <x-input-error :messages="$errors->get('weight')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div>
                                    <x-input-label for="description" :value="__('Description')" />
                                    <textarea
                                            name="description"
                                            placeholder="{{ __('Enter description') }}"
                                            class="block mt-1 mb-2 w-full border-gray-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm"
                                            rows="8"
                                        >{{ old('description', $product->description) }}</textarea>
                                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                    </div>

                                    <!-- Status -->
                                    <div class="flex items-center">
                                        <div class="">
                                            <label class="">
                                                <input class="text-sky-500 focus:ring-sky-500" type="checkbox" id="status" name="status" {{ $product->status == 1 ? 'checked' : '' }}
                                                />&nbsp;&nbsp;&nbsp;Status
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <!-- Featured -->
                                    <div class="flex items-center">
                                        <div class="">
                                            <label class="">
                                                <input class="text-sky-500 focus:ring-sky-500" type="checkbox" id="featured" name="featured" {{ $product->featured == 1 ? 'checked' : '' }}
                                                />&nbsp;&nbsp;&nbsp;Featured
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <hr class="my-4">
                                    
                                    <!-- Submit & Cancel Buttons -->
                                    <div class="flex items-center mt-4">
                                        <button type="submit" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                                            Update Product</button>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="{{ route('admin.products.index') }}" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                        Go Back</a>
                                    </div>
                            </form>

                        </div>
                    </div>
                </div> 

                <!-- Images Tab -->
            <div id="images" class="hidden">
            <form action="{{ route('admin.products.images.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="file" name="files[]" multiple>
                <button class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg" type="submit">Upload Images</button>
            </form>
            product images: {{ $product->images }}
            @if ($product->images)
                <hr class="mt-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                @foreach ($product->images as $image)
                    <div>
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/'.$image->full) }}" class="w-full h-48 object-cover" alt="img">
                        <div class="p-4">
                        <a href="{{ route('admin.products.images.delete', $image->id) }}" class="float-right text-red-600">
                            <i class="fa fa-fw fa-lg fa-trash"></i>
                        </a>
                        </div>
                    </div>
                    </div>
                @endforeach
                </div>
            @else
                <div class="bg-white shadow rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="faviconImg" class="w-full h-48 object-cover" alt="img">
                    <div class="p-4">
                        <span>No image available</span>
                    </div>
                </div>    
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                @for ($i = 0; $i < 5; $i++)
                    <div>
                        <div class="bg-white shadow rounded-lg overflow-hidden">
                            <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" class="w-full h-48 object-cover" alt="img">
                            <div class="p-4">
                                <span>No image available</span>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
 

            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="{{ asset('js/jquery.fileupload.js') }}"></script>
            <script>
                $('input[type=file]').fileupload({
                    url: "{{ route('admin.products.images.upload') }}",
                    dataType: 'json',
                    done: function (e, data) {
                        // Handle the uploaded files here
                    }
                });
            </script>


            </div>

        </div>    
        
        <script>
        function showTab(tabId) {
            const tabs = document.querySelectorAll('#general, #images');
            tabs.forEach(tab => {
            if (tab.id === tabId) {
                tab.classList.remove('hidden');
            } else {
                tab.classList.add('hidden');
            }
            });

            // Get the menu link that corresponds to the clicked tab
            const menuLink = document.querySelector(`.nav-link[href="#${tabId}"]`);

            // Remove the 'active' class from any previously active menu item
            const activeMenuLink = document.querySelector('.nav-link.active');
            if (activeMenuLink) {
            activeMenuLink.classList.remove('active');
            }

            // Add the 'active' class to the clicked menu item
            menuLink.classList.add('active');
        }

        </script>


        </div>
    </div>           
@endsection
</x-layout>