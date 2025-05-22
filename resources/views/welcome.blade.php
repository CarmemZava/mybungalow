@extends('layouts.bungalow-welcome')

@section('content')
    <!-- Nav direita -->
    <div class="max-w-md w-full p-6 mx-auto">
        <div class="text-3xl font-semibold text-black text-center">
            <h1>
                Welcome to My<span style="color: #7E84F2">Bungalow</span>
            </h1>
            <p class="text-lg text-gray-600 text-center mt-10">
                A sua escapadinha começa aqui.
            </p>
            <p class="text-lg text-gray-600 text-center mt-2">
                Encontre o Mybungalow ideal e aproveite cada momento.
            </p>
        </div>

        {{-- Espaçamento opcional entre título e botões --}}
        <div class="mt-8">
            @if (Route::has('login'))
                @auth
                    <div class="text-center mt-4">
                        <a href="{{ url('/dashboard') }}"
                            class="text-[#4A575A] font-semibold text-lg underline hover:text-[#7E84F2] transition">
                            Go to Dashboard
                        </a>
                    </div>
                @else
                    <div class="flex flex-col items-center space-y-4">
                        <a href="{{ route('login') }}"
                            class="w-full text-center bg-[#7E84F2] text-white font-semibold py-2 px-4 rounded-xl shadow-lg hover:bg-[#5e68c7] transition duration-300">
                            Log In
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="w-full text-center border-2 border-[#7E84F2] text-[#7E84F2] font-semibold py-2 px-4 rounded-xl hover:bg-[#7E84F2] hover:text-white transition duration-300">
                                Register
                            </a>
                        @endif
                    </div>
                @endauth
            @endif
        </div>
    </div>

@endsection
