@extends('layouts.bungalow-layout')


@section('content')

<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md text-center">

        @if (session('success'))
            <div class="p-4 mb-4 text-white bg-green-500 rounded-md">
                {{ session('success') }}
            </div>
        @endif


        <div class="bg-gray-100 p-6 rounded-md shadow-sm max-w-lg mx-auto">
            <h2 class="mr-5 block font-sans text-base antialiased font-light leading-relaxed text-gray-700">Transaction completed with sucess!</h2>

            @if (isset($amount) && isset($payerName))
                <div class="p-4 mb-4 text-white bg-green-500 rounded-md text-center">
                    <p class="text-lg font-semibold">Payment succeded!</p>
                    <p class="text-sm">Value: <span class="font-bold">{{ $amount }}</span>, pay for: <span
                            class="font-bold">{{ $payerName }}</span>.</p>
                </div>
            @endif

            {{-- Botão para voltar à página inicial ou continuar navegando --}}
            <div class="flex items-center gap-2 rounded border border-[#7E84F2] px-6 py-2 text-sm font-semibold text-[#7E84F2] transition-all hover:bg-[#7E84F2] hover:text-white hover:shadow-lg active:scale-95 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                <a href="{{ route('bungalow.home') }}"
                    class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300 text-center">
                    Go back to your Home Page
                </a>
            </div>
        </div>

    </div>

@endsection
