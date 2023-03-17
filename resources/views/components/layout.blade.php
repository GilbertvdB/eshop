<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        
        <title>{{ $title ?? 'Admin Panel' }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts / Edit to use backend ccs and js -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-200">
        @include('admin.partials.header')
        
        <div class="content transition-all duration-300 ml-48">
        <!-- Page Heading -->
        @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-auto py-4 px-4 sm:px-6 lg:px-12">
                        {{ $header }}
                    </div>
                </header>
            @endif

        <main class="w-full py-2">
        @include('admin.partials.sidebar')
        @yield('content')
        </main>
        </div>

    </body>
</html>
