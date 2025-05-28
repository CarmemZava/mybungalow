<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

    {{-- Google fonts: logo --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&family=Sacramento&display=swap"
        rel="stylesheet">

    {{-- CSS  Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <style>
        .sacramento-regular {
            font-family: "Sacramento", cursive;
            font-weight: 400;
            font-style: normal;
            font-size: 40px;
        }

        .sacramento-regular2 {
            font-family: "Sacramento", cursive;
            font-weight: 400;
            font-style: normal;
            font-size: 35px;
            text-align: center;
        }
    </style>


    <title>Layout</title>
</head>

<body>

    <div class="bg-white">
        <header class="fixed inset-x-0 top-0 z-50 bg-white shadow">
            <nav class="flex items-center justify-between p-3 lg:px-8" aria-label="Global">
                <div class="flex items-center lg:flex-1 space-x-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        {{-- logo --}}
                        <img class="h-8 w-auto" src="{{ asset('images/logo/logo-bungalow2.png') }}" alt="logo"
                            style="height: 100px; width:150px">
                    </a>
                    {{-- Cor do meu site: #425057 e #7E84F2 --}}
                    <h1 style="color: #4A575A" class="sacramento-regular">My</h1>
                    <h1 style="color:#7E84F2" class="sacramento-regular">Bungalow</h1>
                </div>
                <div class="hidden lg:flex gap-x-8 text-[20px] font-semibold text-[#4A575A] justify-center flex-1">
                    <a href="{{ url('/home') }}">Home</a>
                    <a href="{{ route('bungalow.index') }}">Search</a>
                    <a href="#">Bookings</a>
                </div>


                <!-- Autenticação do Laravel -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>

            </nav>
        </header>
    </div>

    <div class="pt-36 min-h-screen">
        @yield('content')
    </div>

</body>

</html>
