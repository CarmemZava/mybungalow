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

    <style>
        .fundo {
            background-image: url('{{ asset('images/logo/ondas.png') }}');
            background-repeat: repeat;
            background-position: center;
            background-size: 140px;
        }

        .sacramento-regular {
            font-family: "Sacramento", cursive;
            font-weight: 400;
            font-style: normal;
            font-size: 80px;
        }
    </style>

    <title>Layout auth views</title>
</head>

<body>

    <div class="flex h-screen">
        <!-- Nav esquerda -->
        <div class="hidden lg:flex items-center justify-center flex-1 bg-white text-black fundo">
            <div class="flex flex-col items-center justify-center w-full h-full text-center px-4 py-6">
                <div class="bg-white p-5 rounded-xl shadow-md">
                    <div class="flex flex-col items-center gap-2">
                        <div class="flex flex-col">
                            <a href="#" class="-m-1.5 p-1.5">
                                {{-- logo --}}
                                <img class="h-8 w-auto" src="{{ asset('images/logo/logo-bungalow2.png') }}" alt="logo"
                                    style="height: 200px; width:250px">
                            </a>
                        </div>
                        <div class="flex flex-row space-x-2 items-center sacramento-regular">
                            <h1 style="color: #4A575A" class="sacramento-regular">My</h1>
                            <h1 style="color:#7E84F2" class="sacramento-regular">Bungalow</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav direita -->
        <div class="w-full bg-gray-100 lg:w-1/2 flex items-center justify-center">
            @yield('content')
        </div>
    </div>


</body>

</html>
