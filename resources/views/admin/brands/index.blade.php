<x-layout>
    <x-slot name="header">
        <div class="">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $pageTitle }}</h2>
                <p>{{ $pageDescription }}</p>
            </div>
        </div>
    </x-slot>

    @section('content')
    <div>
        <div class="sm:px-6 lg:px-8">

        <div class="border border-gray-300 bg-white h-86 p-2 shadow-sm">
            <div class="">
                <div>
                    <div class="flex flex-row justify-between mb-4">
                    <!-- Add Brand -->
                    <div class="flex items-center">
                        <a href="{{ route('admin.brands.create') }}" class="py-1 px-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                        Add Brand</a>
                    </div>    
                    <!-- Search bar -->    
                    <div class="flex justify-end">
                        <form action="{{ route('admin.brands.index') }}" method="GET">
                            <div class="flex items-center">
                                <input type="text" name="search" placeholder="Search brands" class="border border-gray-300 py-1 px-2 rounded-lg mr-2">
                                <button type="submit" class="bg-sky-500 text-white py-1 px-2 rounded-lg">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- brands Table -->
                    <div>
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="border w-16 px-4 py-2 text-left">#</th>
                                    <th class="border px-4 py-2 text-left">Name</th>
                                    <th class="border px-4 py-2 text-left">Slug</th>
                                    <th class="border w-36 px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($brands as $brand)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $brand->id }}</td>
                                        <td class="border px-4 py-2">{{ $brand->name }}</td>
                                        <td class="border px-4 py-2">{{ $brand->slug }}</td>
                                        <td class="border px-4 py-2 text-center">
                                            <div class="flex row justify-evenly">
                                                <a href="{{ route('admin.brands.edit', $brand->id) }}" class="inline-block transform hover:scale-125 transition duration-200" title="Edit">
                                                    <svg fill="#008040" width="24px" height="24px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="m1392.7 1700.332-44.782-44.781 307.872-307.872 44.781 44.782 77.248 385.12-385.12-77.249Zm-104.117-332.501L596.711 675.959l79.487-79.487 691.872 691.872-79.487 79.487ZM282.123 589.755 128.745 436.38c-10.075-10.076-16.793-24.63-16.793-39.184 0-15.673 6.718-29.108 16.793-40.303L357.13 128.508c11.196-10.076 24.63-16.793 40.303-16.793 14.554 0 29.108 6.717 39.184 16.793l153.376 153.376-307.872 307.872Zm1521.446 747.848L747.849 281.883 516.104 49.02c-63.813-62.693-174.647-62.693-237.341 0L49.259 278.525C17.913 309.872 0 352.414 0 397.195c0 44.782 17.913 87.324 49.26 118.67L282.121 747.61l1055.72 1055.72L1920 1919.761l-116.431-582.158Z" fill-rule="evenodd"></path> </g></svg>
                                                </a>
                                                <form method="POST" action="{{ route('admin.brands.destroy', $brand) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-block transform hover:scale-125 transition duration-200" title="Delete">
                                                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 11V17" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 11V17" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                                    </button>
                                                </form>

                                                
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- pagination -->
                        <div class="my-4">
                        {{ $brands->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>           
@endsection
</x-layout>