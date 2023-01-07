<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

    <div class="bg-dark pb-6">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-500">My Account - Orders</h2>
        </div>
    </div>
    <div class="bg-gray-100 py-6 border-t-2">
    <div class="container mx-auto px-4">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full lg:w-3/4 px-4">
                    <table class="w-full text-left table-collapse border-collapse">
                        <thead>
                            <tr>
                                <th class="py-4 px-6 bg-gray-200 font-bold text-gray-600 border-b border-gray-300 uppercase text-xs tracking-wide text-center">Order No.</th>
                                <th class="py-4 px-6 bg-gray-200 font-bold text-gray-600 border-b border-gray-300 uppercase text-xs tracking-wide text-center">First Name</th>
                                <th class="py-4 px-6 bg-gray-200 font-bold text-gray-600 border-b border-gray-300 uppercase text-xs tracking-wide text-center">Last Name</th>
                                <th class="py-4 px-6 bg-gray-200 font-bold text-gray-600 border-b border-gray-300 uppercase text-xs tracking-wide text-center">Order Amount</th>
                                <th class="py-4 px-6 bg-gray-200 font-bold text-gray-600 border-b border-gray-300 uppercase text-xs tracking-wide text-center">Qty.</th>
                                <th class="py-4 px-6 bg-gray-200 font-bold text-gray-600 border-b border-gray-300 uppercase text-xs tracking-wide text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <th class="px-3 py-3 border-t">{{ $order->order_number }}</th>
                                    <td class="px-3 py-3 border-t">{{ $order->first_name }}</td>
                                    <td class="px-3 py-3 border-t">{{ $order->last_name }}</td>
                                    <td class="px-3 py-3 border-t">&euro;{{ round($order->grand_total, 2) }}</td>
                                    <td class="px-3 py-3 border-t">{{ $order->item_count }}</td>
                                    <td class="px-3 py-3 border-t"><span class="bg-green-500 text-white text-xs rounded-full px-3 py-1">{{ strtoupper($order->status) }}</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-3 py-3 border-t">No orders to display.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </main>
            </div>
        </div>
    </div>


            </div>
        </div>
    </div>
</div>    
</x-app-layout>