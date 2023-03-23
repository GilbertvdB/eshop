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
        <div class="max-w-7xl sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-2 rounded transition-all duration-500" id="success-message">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById("success-message").style.opacity = 0;
                }, 1500); // 3000 milliseconds = 3 seconds
            </script>
        @endif

            <div class="border border-gray-300 bg-white h-86 p-4 shadow-sm">
                <div class="">
                    <div class="">
                        <h3 class="text-lg font-bold">Product information</h3>
                        <hr class="py-4">
                        <form action="{{ route('admin.products.store') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 mb-2 w-full" type="text" name="name" :value="old('name')" placeholder="Enter attribute name"  required/>
                                    <input type="hidden" name="id" value="{{ old('id') }}">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="flex flew-row">
                                    <!-- SKU -->
                                    <div class="w-1/2 mr-4">
                                        <x-input-label for="sku" :value="__('Sku')" />
                                        <x-text-input id="sku" class="block mt-1 mb-2 w-full" type="text" name="sku" :value="old('sku')" placeholder="Enter product sku"  />
                                        <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                                    </div>

                                    <!-- Brand -->
                                    <div class="w-1/2 ml-4">
                                        <x-input-label for="brand" :value="__('Brand')" />
                                        <select name="brand_id" id="brand" class=" block mt-1 mb-2 w-full border-gray-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm">
                                            <option value="0" class="">Select a brand</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}" class=""> {{ $brand->name }} </option>
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
                                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('categories')" class="mt-2" />
                                </div>

                                <div class="flex flew-row">
                                    <!-- Price -->
                                    <div class="w-1/2 mr-4">
                                        <x-input-label for="price" :value="__('Price')" />
                                        <x-text-input id="price" class="block mt-1 mb-2 w-full" type="text" name="price" :value="old('price')" placeholder="Enter product price"  />
                                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                    </div>

                                    <!-- Special Price -->
                                    <div class="w-1/2 ml-4">
                                        <x-input-label for="special_price" :value="__('Special Price')" />
                                        <x-text-input id="special_price" class="block mt-1 mb-2 w-full" type="text" name="special_price" :value="old('special_price')" placeholder="Enter product special price"  />
                                        <x-input-error :messages="$errors->get('special_price')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="flex flew-row">    
                                    <!-- Quantity -->
                                    <div class="w-1/2 mr-4">
                                        <x-input-label for="quantity" :value="__('Quantity')" />
                                        <x-text-input id="quantity" class="block mt-1 mb-2 w-full" type="number" name="quantity" :value="old('quantity')" placeholder="Enter product quantity"  />
                                        <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                                    </div>

                                    <!-- Weight -->
                                    <div class="w-1/2 ml-4">
                                        <x-input-label for="weight" :value="__('Weight')" />
                                        <x-text-input id="weight" class="block mt-1 mb-2 w-full" type="text" name="weight" :value="old('weight')" placeholder="Enter product weight"  />
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
                                    ></textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>

                                <!-- Status -->
                                <div class="flex items-center">
                                    <div class="">
                                        <label class="">
                                            <input class="text-sky-500 focus:ring-sky-500" type="checkbox" id="status" name="status"
                                            />&nbsp;&nbsp;&nbsp;Status
                                        </label>
                                    </div>
                                </div>
                                
                                <!-- Featured -->
                                <div class="flex items-center">
                                    <div class="">
                                        <label class="">
                                            <input class="text-sky-500 focus:ring-sky-500" type="checkbox" id="featured" name="featured"
                                            />&nbsp;&nbsp;&nbsp;Featured
                                        </label>
                                    </div>
                                </div>
                                
                                <hr class="my-4">
                                
                                <!-- Submit & Cancel Buttons -->
                                <div class="flex items-center mt-4">
                                    <button type="submit" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                                        Save brand</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('admin.products.index') }}" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                    Cancel</a>
                                </div>
                        </form>

                    </div>
                </div>
            </div> 
            



        </div>
    </div>           
@endsection
</x-layout>