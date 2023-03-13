<x-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $pageTitle }}</h2>
            </div>
        </div>
    </x-slot>

    @section('content')

    <div class="py-2">
        <div class="max-w-7xl mx-44 sm:px-6 lg:px-8">

        @if(session('success'))
    <div style="background-color: green; color: white; padding: 10px;">
        {{ session('success') }}
    </div>
    @endif

            <div class="border border-gray-300 bg-white h-86 p-4 shadow-sm">
                <div class="">
                    <div class="">
                        <h3 class="text-lg font-bold">{{ $pageDescription }}</h3>
                        <hr class="py-4">
                        <form action="{{ route('admin.categories.store') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Name*')" />
                                    <x-text-input id="name" class="block mt-1 mb-2 w-full focus:border-sky-500 focus:ring-sky-500" type="text" name="name" :value="old('name')" placeholder="Enter category name"  required/>
                                    <input type="hidden" name="id" value="{{ old('id') }}">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Discription -->
                                <div>
                                <x-input-label for="description" :value="__('Discription')" />
                                <textarea
                                        name="description"
                                        placeholder="{{ __('Enter discription text') }}"
                                        class="block mt-1 mb-2 w-full border-gray-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    >{{ old('description') }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>

                                <!-- Parent Category -->
                                <div>
                                    <x-input-label for="parent" :value="__('Parent Category*')" />
                                    <select name="parent_id" id="parent" class="block mt-1 mb-2 w-full border-gray-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm" required>
                                        <option value="0" class="bg-color-red">Select a parent category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('parent_id')" class="mt-2" />
                                </div>
                                
                                <!-- Featured -->
                                <div class="flex items-center">
                                <div class="">
                                    <label class="">
                                        <input class="" type="checkbox" id="featured" name="featured"
                                        />&nbsp;&nbsp;&nbsp;Featured Category
                                    </label>
                                </div>
                                </div>
                                
                                <!-- Menu -->
                                <div class="flex items-center">
                                    <div class="">
                                        <label class="">
                                            <input class="" type="checkbox" id="menu" name="menu"
                                            />&nbsp;&nbsp;&nbsp;Show in menu
                                        </label>
                                    </div>
                                </div>

                                <!-- Image -->
                                <div class="mt-2">
                                    <div class="flex flew-row">
                                        <div class="w-1/4">
                                                <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="categoryImage" class="w-20 h-auto">
                                        </div>
                                        <div class="w-3/4">
                                            <x-input-label for="image" :value="__('Category Image')" class=""/>
                                            <x-input id="image" type="file" name="image" class="block border p-2 mt-1 mb-2 w-full border-gray-300 focus:border-sky-300 focus:ring-sky-200 rounded-md shadow-sm inline-none" onchange="loadFile(event,'categoryImage')"/>
                                            <x-input-error :messages="$errors->get('image')" />
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">
                                
                                <!-- Submit & Cancel Buttons -->
                                <div class="flex items-center mt-4">
                                    <button type="submit" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                                        Create Category</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('admin.categories.index') }}" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                    Cancel</a>
                                </div>
                        </form>

                        <script>
                            loadFile = function(event, id) {
                                var output = document.getElementById(id);
                                output.src = URL.createObjectURL(event.target.files[0]);
                            };
                        </script>

                    </div>
                </div>
            </div> 
            



        </div>
    </div>           
@endsection
</x-layout>