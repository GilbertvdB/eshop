<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800">
          {{ __('My Cart') }}
      </h2>

      @php($stars = 4)
      @php($reviews = 15)
  </x-slot>
  <main class="flex max-w-7xl mx-auto">
          <div class="my-6 w-3/4">
            <div class="container mx-auto">
                <div class="flex">
                    <div class="grow flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                      @if ($message = Session::get('success'))
                          <div class="p-2 mb-3 bg-green-300 rounded">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                      @endif
                        <h3 class="text-3xl font-bold">Shoppingcart</h3>
                        <hr>
                      <div class="flex-1">
                        <table class="w-full text-sm lg:text-base">
                          <thead>
                            <tr class="h-12 uppercase my-4">
                              <th class="hidden md:table-cell"></th>
                              <th class="text-left">Name</th>
                              <th class="pl-5 text-left lg:text-right lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qtd</span>
                                <span class="hidden lg:inline">Quantity</span>
                              </th>
                              <th class="hidden text-right md:table-cell"> Price</th>
                              <th class="hidden text-right md:table-cell"> Remove </th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($cartItems as $item)
                            <tr class="border my-4">
                              <td class="hidden pb-4 md:table-cell">
                              <a href="{{ route('product.show', $item->id) }}">
                                  <img class="w-20 h-20 object-cover" src="{{ asset('images/' . $item->attributes->image) }}" alt="{{ $item->name }}">
                              </a>    
                              </td>
                              <td>
                                <a href="{{ route('product.show', $item->id) }}">
                                  <p class="mb-2 md:ml-4 text-black-600 font-bold">{{ $item->name }}</p>
                                </a>
                                <div class="flex md:ml-4" >
                                @for ($i = 1; $i <= $stars; $i++)
                                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false" role="presentation" class="w-4 h-4 text-yellow-500">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" fill="currentColor"></path>
                                </svg>
                                @endfor
                                <a href="">
                                ({{ $reviews }})
                                </a>
                                </div>
                                <div class="md:ml-4 text-green-600 text-sm mb-2">Op voorraad</div>
                                <div class="md:ml-4 text-green-600 text-sm mb-2">Voor 23:59 uur besteld, maandag in huis </div>
                              </td>
                              <td class="justify-center mt-6 md:justify-end md:flex">
                                <div class="h-10 w-28">
                                  <div class="relative flex flex-row w-full h-8">
                                    
                                    <form action="{{ route('cart.update') }}" method="POST">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $item->id}}" >
                                    <input type="text" name="quantity" value="{{ $item->quantity }}" 
                                    class="w-16 text-center h-6 text-gray-800 outline-none rounded border border-blue-600" />
                                    <button class="px-4 mt-1 py-1.5 text-sm rounded rounded shadow text-sky-100 bg-sky-500">Update</button>
                                    </form>
                                  </div>
                                </div>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                &euro;{{ $item->price }}
                                </span>
                              </td>
                              <td class="hidden text-right md:table-cell pr-2">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $item->id }}" name="id">
                                  <button class="px-4 py-2 text-white bg-red-500 shadow rounded-full">x</button>
                              </form>
                                
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                        <div class="mt-4">
                          <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="px-6 py-2 text-sm rounded shadow text-red-100 bg-red-500">Clear Cart</button>
                          </form>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
          </div>

          <div class="w-1/4 ml-4">
          <div class="container">
                <div class="flex my-6">
                    <div class="grow flex flex-col w-full p-4 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    <h3 class="text-2xl font-bold">Order summary</h3>
                    <hr>
                    <div>
                    <table class="w-full mt-2">
                      <tr>
                        <td>Items({{ Cart::getTotalQuantity()}})</td>
                        <td class="text-right">&euro;{{ Cart::getTotal() }}</td>
                      </tr>
                      <tr>
                        <td>Shipping fees </td>
                        <td class="text-right">&euro;2.50</td>
                      </tr>
                    </table>
                    <hr class="border border-black my-2">
                    <span class="text-blue-700">Add Promo code </span>
                    <table class="w-full">
                      <tr>
                        <td class="text-lg font-bold">Totaal</td>
                        <td class="text-right">&euro;price</td>  
                      </tr>
                    </table>
                    </div>
                        <div class="my-4">
                        <a href="{{ route('checkout.index') }}" class="px-6 py-2 text-sm rounded shadow text-white bg-blue-500">Proceed To Checkout</a>
                        </div>
                    </div>
                </div>
          </div>
          </div>
          
</main>
</x-app-layout>