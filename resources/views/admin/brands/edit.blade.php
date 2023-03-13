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
                        <h3 class="text-lg font-bold">{{ $pageDescription }}</h3>
                        <hr class="py-4">
                        <form action="{{ route('admin.brands.update', $brand) }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="">
                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Name*')" />
                                    <x-text-input id="name" class="block mt-1 mb-2 w-full focus:border-sky-500 focus:ring-sky-500" type="text" name="name" :value="old('name', $brand->name)" placeholder="Enter brand name"  required/>
                                    <input type="hidden" name="id" value="{{ $brand->id }}">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Logo -->
                                <div class="mt-2">
                                    <div class="flex flew-row">
                                        <div class="w-1/4">
                                            @if ($brand->logo != null)
                                                <figure class="mt-2" style="width: 80px; height: auto;">
                                                    <img src="{{ asset('storage/'.$brand->logo) }}" id="brandLogo" class="" alt="img">
                                                </figure>
                                            @else
                                                <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="brandLogo" class="w-20 h-auto">
                                            @endif
                                        </div>
                                        <div class="w-3/4">
                                            <x-input-label for="logo" :value="__('Brand Logo')" class=""/>
                                            <x-input id="logo" type="file" name="logo" class="block border p-2 mt-1 mb-2 w-full border-gray-300 focus:border-sky-300 focus:ring-sky-200 rounded-md shadow-sm inline-none" onchange="loadFile(event,'brandImage')"/>
                                            <x-input-error :messages="$errors->get('logo')" />
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">
                                
                                <!-- Submit & Cancel Buttons -->
                                <div class="flex items-center mt-4">
                                    <button type="submit" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                                        Update Brand</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('admin.brands.index') }}" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
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