<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
    <title>Document</title>

    {{-- Google fonts: logo --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&family=Sacramento&display=swap"
        rel="stylesheet">

    <style>
        .fundo {
            background-image: url('{{ asset('images/ondas.png') }}');
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

</head>

<body>
    <div class="flex h-screen">
        <!-- Nav esquerda -->
        <div class="hidden lg:flex items-center justify-center flex-1 bg-white text-black fundo">
            <div class="max-w-6xl text-center overflow-y-auto h-[90vh] px-4 py-6">
                <div class="flex mt-16 w-full flex-wrap content-center justify-center p-5"
                    style="background-color: transparent;">


                    <div class="bg-white p-5 rounded-xl shadow-md">
                        <div class="flex flex-col items-center gap-2">
                            <div class="flex flex-col">
                                <a href="#" class="-m-1.5 p-1.5">
                                    {{-- logo --}}
                                    <img class="h-8 w-auto" src="{{ asset('images/logo-bungalow2.png') }}"
                                        alt="logo" style="height: 360px; width:500px">
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
    </div>
    <!-- Nav direita -->
    <div class="w-full bg-gray-100 lg:w-1/2 flex items-center justify-center">
        <div class="max-w-md w-full p-6">
            <div class="text-3xl font-semibold mb-6 text-black text-center">
                <h1>Welcome to MyBungalow </h1>
                <h1 style="color: #7E84F2"></h1>
                {{-- <h1 style="color: #4A575A" class="sacramento-regular">My</h1>
                <h1 style="color:#7E84F2" class="sacramento-regular">Bungalow</h1> --}}
            </div>
            {{-- <h1 class="text-3xl font-semibold mb-6 text-black text-center">Welcome to MyBungalow</h1> --}}
            <h1 class="text-sm font-semibold mb-6 text-gray-500 text-center">Join to Our Community with all time
                access and free </h1>

            <form action="#" method="POST" class="space-y-4">
                <!-- Your form elements go here -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username"
                        class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" id="email" name="email"
                        class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                </div>
                <div>
                    <button type="submit"
                        class="w-full bg-black text-white p-2 rounded-md hover:bg-gray-800 focus:outline-none focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">Sign
                        Up</button>
                </div>
            </form>
            <div class="mt-4 text-sm text-gray-600 text-center">
                <p>Already have an account? <a href="#" class="text-black hover:underline">Login here</a>
                </p>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
