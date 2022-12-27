<x-app-layout>
    <div class="max-w-7xl mx-auto">
<div>
    Data: {{ $info }}
</div>
<br>
<div>
    @foreach( $info as $item)
        <br>{{ $item->id}}
        <br>{{ $item->name}}
        <br>{{ $item->price}}
        <br>{{ $item->quantity}}
        <br>
        <form action="{{ route('wishlist.remove') }}" method="POST">
         @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">
        <button type="submit">Delete</button>
        </form>
     @endforeach
</div>
<div>
<form action="{{route('wishlist.clear')}}" method="POST">
    @csrf
    <button type="submit">Clear Wish List</button>
</form>

</div>
<br>
<div>
    Test Form! for Adding!
<form action="{{ route('wishlist.store') }}" method="POST">
    @csrf

    <label for="id">ID:</label>
    <input type="text" name="id" id="id"><br>

    <label for="name">Name:</label>
    <input type="text" name="name" id="name"><br>

    <label for="price">Price:</label>
    <input type="text" name="price" id="price"><br>

    <label for="qty">Quantity:</label>
    <input type="text" name="qty" id="qty"><br>

    <button type="submit">Add to Wish List</button>
</form>
</div>

<br>
<div>
    Test Form! for Updating!
<form action="{{ route('wishlist.update') }}" method="POST">
    @csrf

    <label for="id">ID:</label>
    <input type="text" name="id" id="id"><br>

    <label for="name">Name:</label>
    <input type="text" name="name" id="name"><br>

    <label for="price">Price:</label>
    <input type="text" name="price" id="price"><br>

    <label for="qty">Quantity:</label>
    <input type="text" name="qty" id="qty"><br>

    <button type="submit">Update Wish List</button>
</form>

</div>

    </div>
</x-app-layout>