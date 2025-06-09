<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    <div x-data="{ open: false }" class=" bg-gray-100 min-h-screen flex">
        <!-- Main Content -->
        <div class="flex-1">
            @if (auth()->user()->role->value === 'admin')
                @include('layouts.sidebar')
            @elseif(auth()->user()->role->value === 'seller')
                @include('layouts.sidebar-seller')
            @elseif(auth()->user()->role->value === 'client')
                @include('layouts.sidebar-client')
                
            @endif
             
           

            
            @include('layouts.navigation')


            <!-- Page Content -->
            @if (auth()->user()->role->value === 'admin' || auth()->user()->role->value === 'seller' || auth()->user()->role->value === 'client')
                <main class="ml-64 bg-gray-50">
                    @yield('content') 
                </main>
           
            @endif
    
        </div>
    </div>

</body>
</html>
