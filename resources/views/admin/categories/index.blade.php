<x-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $pageTitle }}</h2>
                <p>{{ $pageDescription }}</p>
            </div>
            <div class="flex items-center">
                <a href="{{ route('admin.categories.create') }}" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                Add Category</a>
            </div>
        </div>
    </x-slot>

    @section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-44 sm:px-6 lg:px-8">

        <div class="border border-gray-300 bg-white h-86 p-2 shadow-sm">
            <div class="col-span-12">
                <div>
                <!-- Search bar -->    
                <div class="mb-4 flex justify-end">
                    <form action="{{ route('admin.categories.index') }}" method="GET">
                        <div class="flex items-center">
                            <input type="text" name="search" placeholder="Search categories" class="border border-gray-300 py-2 px-4 rounded-lg mr-2">
                            <button type="submit" class="bg-sky-500 text-white py-2 px-4 rounded-lg">Search</button>
                        </div>
                    </form>
                </div>

                    <div>
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Slug</th>
                                    <th class="px-4 py-2 text-center">Parent</th>
                                    <th class="px-4 py-2 text-center">Featured</th>
                                    <th class="px-4 py-2 text-center">Menu</th>
                                    <th class="px-4 py-2 text-center">Order</th>
                                    <th class="px-4 py-2 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    @if ($category->id != 1)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $category->id }}</td>
                                            <td class="border px-4 py-2">{{ $category->name }}</td>
                                            <td class="border px-4 py-2">{{ $category->slug }}</td>
                                            <td class="border px-4 py-2 text-center">{{ $category->parent->name }}</td>
                                            <td class="border px-4 py-2 text-center">
                                                @if ($category->featured == 1)
                                                    <span class="bg-green-500 text-white px-2 py-1 rounded">Yes</span>
                                                @else
                                                    <span class="bg-red-500 text-white px-2 py-1 rounded">No</span>
                                                @endif
                                            </td>
                                            <td class="border px-4 py-2 text-center">
                                                @if ($category->menu == 1)
                                                    <span class="bg-green-500 text-white px-2 py-1 rounded">Yes</span>
                                                @else
                                                    <span class="bg-red-500 text-white px-2 py-1 rounded">No</span>
                                                @endif
                                            </td>
                                            <td class="border px-4 py-2 text-center">{{ $category->order }}</td>
                                            <td class="border px-4 py-2 text-center">
                                                <div class="">
                                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="">Edit</a>
                                                    <a href="{{ route('admin.categories.delete', $category->id) }}" class="">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <!-- pagination -->
                        <div class="my-4">
                        {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>           
@endsection
</x-layout>