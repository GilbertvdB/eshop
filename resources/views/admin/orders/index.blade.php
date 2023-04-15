<x-layout>
    <x-slot name="header">
        <div class="flex justify-between">
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
            <div class="col-span-12">
                <div>
                <div class="flex flex-row justify-between mb-4">
                    <!-- Add order -->
                    <div class="flex items-center">
                    </div>    
                    <!-- Search bar -->    
                    <div class="flex justify-end">
                        <form action="{{ route('admin.orders.index') }}" method="GET">
                            <div class="flex items-center">
                                <input type="text" name="search" placeholder="Search orders" class="border border-gray-300 py-1 px-2 rounded-lg mr-2">
                                <button type="submit" class="bg-sky-500 text-white py-1 px-2 rounded-lg">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- orders Table -->
                    <div>
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2 text-left">Order Number</th>
                                    <th class="border px-4 py-2 text-left">Placed By</th>
                                    <th class="border px-4 py-2">Total Amount</th>
                                    <th class="border px-4 py-2">Items Qty</th>
                                    <th class="border px-4 py-2">Payment Status</th>
                                    <th class="border px-4 py-2">Status</th>
                                    <th class="border w-36 px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $order->order_number }}</td>
                                            <td class="border px-4 py-2">{{ $order->user->fullName }}</td>
                                            <td class="border px-4 py-2">{{ config('settings.currency_symbol') }}{{ $order->grand_total }}</td>
                                            <td class="border px-4 py-2 text-center">{{ $order->item_count }}</td>
                                            <td class="border px-4 py-2 text-center">
                                                @if ($order->payment_status == 1)
                                                    <span class="bg-green-500 text-sm text-white px-2 py-1 rounded">Completed</span>
                                                @else
                                                    <span class="bg-red-500 text-sm text-white px-2 py-1 rounded">Not Completed</span>
                                                @endif
                                            </td>
                                            <td class="border px-4 py-2 text-center">{{ $order->status }}</td>
                                            <td class="border px-4 py-2 text-center">
                                                <div class="flex row justify-evenly">
                                                    <a href="{{ route('admin.orders.show', $order->order_number) }}" class="inline-block transform hover:scale-125 transition duration-200" title="Edit">
                                                        <svg fill="#008040" width="24px" height="24px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="m1392.7 1700.332-44.782-44.781 307.872-307.872 44.781 44.782 77.248 385.12-385.12-77.249Zm-104.117-332.501L596.711 675.959l79.487-79.487 691.872 691.872-79.487 79.487ZM282.123 589.755 128.745 436.38c-10.075-10.076-16.793-24.63-16.793-39.184 0-15.673 6.718-29.108 16.793-40.303L357.13 128.508c11.196-10.076 24.63-16.793 40.303-16.793 14.554 0 29.108 6.717 39.184 16.793l153.376 153.376-307.872 307.872Zm1521.446 747.848L747.849 281.883 516.104 49.02c-63.813-62.693-174.647-62.693-237.341 0L49.259 278.525C17.913 309.872 0 352.414 0 397.195c0 44.782 17.913 87.324 49.26 118.67L282.121 747.61l1055.72 1055.72L1920 1919.761l-116.431-582.158Z" fill-rule="evenodd"></path> </g></svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- pagination -->
                        <div class="my-4">
                        {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>           
@endsection
</x-layout>