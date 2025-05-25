<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .sacramento-regular {
            font-family: "Sacramento", cursive;
            font-weight: 400;
            font-style: normal;
            font-size: 40px;
        }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="flex items-center space-x-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        {{-- logo --}}
                        <img class="h-8 w-auto" src="{{ asset('images/logo/logo-bungalow2.png') }}" alt="logo"
                            style="height: 130px; width:180px">
                    </a>
                    {{-- Cor do meu site: #425057 e #7E84F2 --}}
                    <h1 style="color: #4A575A" class="sacramento-regular">My</h1>
                    <h1 style="color:#7E84F2" class="sacramento-regular">Bungalow</h1>
                </div>
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
