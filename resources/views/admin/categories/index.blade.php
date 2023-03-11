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

            <div class="row border border-gray-300 bg-white h-86 shadow-sm sm:rounded-lg">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Name </th>
                                        <th> Slug </th>
                                        <th class="text-center"> Parent </th>
                                        <th class="text-center"> Featured </th>
                                        <th class="text-center"> Menu </th>
                                        <th class="text-center"> Order </th>
                                        <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        @if ($category->id != 1)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>{{ $category->parent->name }}</td>
                                                <td class="text-center">
                                                    @if ($category->featured == 1)
                                                        <span class="badge bg-success">Yes</span>
                                                    @else
                                                        <span class="badge bg-danger">No</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($category->menu == 1)
                                                        <span class="badge bg-success">Yes</span>
                                                    @else
                                                        <span class="badge bg-danger">No</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    {{ $category->order }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>Edit</a>
                                                        <a href="{{ route('admin.categories.delete', $category->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>           
    @push('scripts')
        <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
        <script type="text/javascript">$('#sampleTable').DataTable();</script>
    @endpush
@endsection
</x-layout>