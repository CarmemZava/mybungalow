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
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&family=Sacramento&display=swap" rel="stylesheet">

    {{-- CSS  Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">



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
                        <img class="h-8 w-auto" src="{{ asset('images/logo-bungalow2.png') }}" alt="logo"
                            style="height: 100px; width:150px">
                    </a>
                    {{-- Cor do meu site: #425057 e #7E84F2 --}}
                    <h1 style="color: #4A575A" class="sacramento-regular">My</h1>
                    <h1 style="color:#7E84F2" class="sacramento-regular">Bungalow</h1>
                </div>
                <div class="hidden lg:flex gap-x-8 text-[20px] font-semibold text-[#4A575A]">
                    <a href="{{ url('/home') }}">Home</a>
                    <a href="{{ route('bungalow.index') }}">Booking</a>
                    <a href="#">Contact</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <div class="text-sm/2 font-semibold text-[#4A575A]">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </nav>
        </header>
    </div>

    <div class="pt-36 min-h-screen">
        @yield('content')
    </div>

</body>

</html>
