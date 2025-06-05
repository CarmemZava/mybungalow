@extends('layouts.bungalow-layout')


@section('content')
    <div class="max-w-lg mt-8 mx-auto bg-white p-6 rounded-lg shadow-md text-center">
        {{-- Mensagem de sucesso caso o mail seja enviado --}}
        @if (session('success'))
            <div class="flex items-center mb-4 rounded-md bg-green-100 px-6 py-4 shadow-md ring-1 ring-green-300">
                <svg class="h-6 w-6 flex-shrink-0 text-green-600 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <p class="text-green-800 font-semibold">
                    {{ session('success') }}
                </p>
            </div>
        @endif

        <div class="bg-gray-100 p-6 rounded-md shadow-sm max-w-lg mx-auto">
            <h2 class="mr-5 mb-4 block font-sans text-xl antialiased font-light leading-relaxed text-gray-700">Transaction
                completed successfully!</h2>

            @if (isset($amount) && isset($payerName))
                <div class="p-2 mb-4 text-shadow-white bg-green-300 rounded-md text-center">
                    <p class="text-lg text-gray-700">Payment succeeded.</p>
                    <p class="text-base text-gray-700">Amount: <span class="font-bold">{{ $amount }}</span>, paid by: <span
                            class="font-bold">{{ $payerName }}</span>.</p>
                </div>
            @endif

            {{-- Voltar à página inicial --}}
            <div class="flex justify-center gap-4">
                <a href="{{ url('/home') }}"
                    class="flex items-center mt-2 gap-2 rounded border border-[#7E84F2] px-6 py-2 text-sm font-semibold text-[#7E84F2] transition-all hover:bg-[#7E84F2] hover:text-white hover:shadow-lg active:scale-95 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    Home Page
                </a>

                {{-- Enviar email com Booking Details --}}
                <form action="{{ route('locacao.mail') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center mt-2 gap-2 rounded border border-[#7E84F2] px-6 py-2 text-sm font-semibold text-[#7E84F2] transition-all hover:bg-[#7E84F2] hover:text-white hover:shadow-lg active:scale-95 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Send mail
                    </button>
                </form>

                {{-- Bixar o PDF com Booking Details --}}
                <a href="{{ route('locacao.print') }}"
                    class="flex items-center mt-2 gap-2 rounded border border-[#7E84F2] px-6 py-2 text-sm font-semibold text-[#7E84F2] transition-all hover:bg-[#7E84F2] hover:text-white hover:shadow-lg active:scale-95 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    Download
                </a>
            </div>
        </div>
    </div>
@endsection
