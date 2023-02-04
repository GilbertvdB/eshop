<x-layout>
    <x-slot:title>
        Admin Main
    </x-slot>

@section('content')
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-44 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <br>Products page
                    <br><a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('product.index') }}">
                            {{ __('Products Catalog') }}
                        </a>
                </div>

                <div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
</x-layout>