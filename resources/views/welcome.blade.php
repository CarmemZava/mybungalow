<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif

    <style>
        .fundo {
            background-image: url('{{ asset('images/ondas.png') }}');
            background-repeat: repeat;
            background-position: center;
            background-size: 140px;
        }
    </style>



</head>

<body>
    <div class="bg-white">
        <header class="fixed inset-x-0 top-0 z-50 bg-white shadow">
            <nav class="flex items-center justify-between p-3 lg:px-8" aria-label="Global">
                <div class="flex items-center lg:flex-1 space-x-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        {{-- logo --}}
                        <img class="h-8 w-auto" src="{{ asset('images/logo-bungalow2.png') }}" alt="logo"
                            style="height: 100px; width:150px">
                    </a>
                    {{-- Cor do meu site: #425057 e #7E84F2 --}}
                    <h1 style="color: #4A575A" class="sacramento-regular">My</h1>
                    <h1 style="color:#7E84F2" class="sacramento-regular">Bungalow</h1>
                </div>
                <div class="flex lg:hidden">
                    <button type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>



                @if (Route::has('login'))
                    <nav class="hidden lg:flex gap-x-8 text-[20px] font-semibold text-[#4A575A]">
                        @auth
                            <a href="{{ url('/dashboard') }}">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </nav>
        </header>

        <main class="flex mt-16 w-full flex-wrap content-center justify-center p-5 pt-36 min-h-screen fundo"
            style="background-color: transparent;">
            <div class="bg-white p-5 rounded-xl shadow-md">
                <div class="grid grid-cols-2 gap-3">
                    <div class="w-80 bg-white p-3">
                        <img class="h-52 w-full object-cover" src="{{ asset('images/bungalow1.jpg') }}" />
                        <ul class="mt-3 flex flex-wrap">
                            <li class="mr-auto">
                                <a href="#" class="flex text-gray-400 hover:text-gray-600">
                                    <svg class="mr-0.5" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M21,12L14,5V9C7,10 4,15 3,20C5.5,16.5 9,14.9 14,14.9V19L21,12Z" />
                                    </svg>
                                    1
                                </a>
                            </li>
                            <li class="mr-2">
                                <a href="#" class="flex text-gray-400 hover:text-gray-600">
                                    <svg class="mr-0.5" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" />
                                    </svg>
                                    24
                                </a>
                            </li>
                            <li class="mr-2">
                                <a href="#" class="flex text-gray-400 hover:text-gray-600">
                                    <svg class="mr-0.5" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9Z" />
                                    </svg>
                                    3
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex text-gray-400 hover:text-gray-600">
                                    <svg class="mr-0.5" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z" />
                                    </svg>
                                    3
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="w-80 bg-white p-3">
                        <img class="h-52 w-full object-cover" src="{{ asset('images/bungalow2.jpg') }}" />
                        <ul class="mt-3 flex flex-wrap">
                            <li class="mr-auto">
                                <a href="#" class="flex text-gray-400 hover:text-gray-600">
                                    <svg class="mr-0.5" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M21,12L14,5V9C7,10 4,15 3,20C5.5,16.5 9,14.9 14,14.9V19L21,12Z" />
                                    </svg>
                                    1
                                </a>
                            </li>
                            <li class="mr-2">
                                <a href="#" class="flex text-gray-400 hover:text-gray-600">
                                    <svg class="mr-0.5" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" />
                                    </svg>
                                    24
                                </a>
                            </li>
                            <li class="mr-2">
                                <a href="#" class="flex text-gray-400 hover:text-gray-600">
                                    <svg class="mr-0.5" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9Z" />
                                    </svg>
                                    3
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex text-gray-400 hover:text-gray-600">
                                    <svg class="mr-0.5" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z" />
                                    </svg>
                                    3
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="w-80 bg-white p-3">
                        <img class="h-52 w-full object-cover" src="https://i.imgur.com/ISpNf4j.jpeg" />
                        <ul class="mt-3 flex flex-wrap">
                            <li class="mr-auto">
                                <a href="#" class="flex text-gray-400 hover:text-gray-600">
                                    <svg class="mr-0.5" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M21,12L14,5V9C7,10 4,15 3,20C5.5,16.5 9,14.9 14,14.9V19L21,12Z" />
                                    </svg>
                                    1
                                </a>
                            </li>
                            <li class="mr-2">
                                <a href="#" class="flex text-gray-400 hover:text-gray-600">
                                    <svg class="mr-0.5" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" />
                                    </svg>
                                    24
                                </a>
                            </li>
                            <li class="mr-2">
                                <a href="#" class="flex text-gray-400 hover:text-gray-600">
                                    <svg class="mr-0.5" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9Z" />
                                    </svg>
                                    3
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex text-gray-400 hover:text-gray-600">
                                    <svg class="mr-0.5" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z" />
                                    </svg>
                                    3
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="w-80 bg-white p-3">
                        <img class="h-52 w-full object-cover" src="https://i.imgur.com/DBpznrn.jpeg" />
                        <ul class="mt-3 flex flex-wrap">
                            <li class="mr-auto">
                                <a href="#" class="flex text-gray-400 hover:text-gray-600">
                                    <svg class="mr-0.5" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M21,12L14,5V9C7,10 4,15 3,20C5.5,16.5 9,14.9 14,14.9V19L21,12Z" />
                                    </svg>
                                    1
                                </a>
                            </li>
                            <li class="mr-2">
                                <a href="#" class="flex text-gray-400 hover:text-gray-600">
                                    <svg class="mr-0.5" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" />
                                    </svg>
                                    24
                                </a>
                            </li>
                            <li class="mr-2">
                                <a href="#" class="flex text-gray-400 hover:text-gray-600">
                                    <svg class="mr-0.5" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9Z" />
                                    </svg>
                                    3
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex text-gray-400 hover:text-gray-600">
                                    <svg class="mr-0.5" style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z" />
                                    </svg>
                                    3
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>







    </div>
    </div>
    </div>
</body>

</html>
