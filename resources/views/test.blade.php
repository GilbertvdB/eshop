<x-app-layout>
    <div>
        Hello World!

        <ul>
    @foreach ($data as $item)
        <li>{{ $item }}</li>
    @endforeach
</ul>
    </div>
</x-app-layout>