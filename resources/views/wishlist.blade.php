<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800">
          {{ __('My Wishlist') }}
      </h2>
  </x-slot>

          <main class="my-8 max-w-7xl mx-auto">
            <div class="container px-6 mx-auto">
                <div class="flex justify-center my-6">
                    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                      @if ($message = Session::get('success'))
                          <div class="p-2 mb-3 bg-green-300 rounded">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                      @endif
                        <h3 class="text-3xl font-bold">Wishlist</h3>
                      <div class="flex-1">
                        <table class="w-full text-sm lg:text-base">
                          <thead>
                            <tr class="h-12 uppercase">
                              <th class="hidden md:table-cell"></th>
                              <th class="text-left">Name</th>
                              <th class="hidden text-right md:table-cell"> price</th>
                              <th class="pl-5 text-left lg:text-right lg:pl-0">
                                <span class="lg:hidden" title="Add to Cart">Add</span>
                                <span class="hidden lg:inline">Add to Cart</span>
                              </th>
                              <th class="hidden text-right md:table-cell"> Remove </th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($cartItems as $item)
                            <tr class="border">
                              <td class="hidden pb-4 md:table-cell">
                              <a href="{{ route('product.show', $item->id) }}">
                                  <img class="w-20 h-20 object-cover" src="{{ asset('images/' . $item->attributes->image) }}" alt="{{ $item->name }}">
                              </a>    
                              </td>
                              <td>
                              @php($stars = 4)
                              @php($reviews = 15)
                                <a href="#">
                                  <p class="mb-2 md:ml-4 font-bold">{{ $item->name }}</p>
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
                              <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                &euro;{{ $item->price }}
                                </span>
                              </td>
                              <td class="justify-center mt-10 md:justify-end md:flex">
                                <div class="h-10 w-28">
                                  <div class="relative flex flex-row w-full h-8">
                                    
                                  <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <input type="hidden" value="{{ $item->id }}" name="id">
                                  <input type="hidden" value="{{ $item->name }}" name="name">
                                  <input type="hidden" value="{{ $item->price }}" name="price">
                                  <input type="hidden" value="{{ $item->attributes->image }}"  name="image">
                                  <input type="hidden" value="1" name="quantity">
                                  <button class="px-4 py-1.5 text-white text-sm bg-green-800 rounded">+</button>
                                  </form>
                                  </div>
                                </div>
                              </td>
                              <td class="hidden text-right md:table-cell pr-2">
                                <form action="{{ route('wishlist.remove') }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $item->id }}" name="id">
                                  <button class="px-4 py-2 text-white bg-red-600 shadow rounded-full">x</button>
                              </form>
                                
                              </td>
                            </tr>
                            @endforeach
                             
                          </tbody>
                        </table>
                        <div class="mt-4">
                         Total: &euro;{{ $wishlist->getTotal() }}
                        </div>
                        <div class="mt-4">
                          <form action="{{ route('wishlist.clear') }}" method="POST">
                            @csrf
                            <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-red-500">Clear Whishlist</button>
                          </form>
                        </div>


                      </div>
                    </div>
                  </div>
            </div>
        </main>
</x-app-layout>