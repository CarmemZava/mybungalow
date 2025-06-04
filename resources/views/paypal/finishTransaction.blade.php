@extends('layouts.bungalow-layout')


@section('content')
    <div class="max-w-lg mt-8 mx-auto bg-white p-6 rounded-lg shadow-md text-center">
        @if (session('success'))
            <div class="p-4 mb-4 text-white bg-green-500 rounded-md">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-gray-100 p-6 rounded-md shadow-sm max-w-lg mx-auto">
            <h2 class="mr-5 mb-4 block font-sans text-xl antialiased font-light leading-relaxed text-gray-700">Transaction
                completed successfully!</h2>

            @if (isset($amount) && isset($payerName))
                <div class="p-2 mb-4 text-white bg-green-500 rounded-md text-center">
                    <p class="text-lg font-semibold">Payment succeeded.</p>
                    <p class="text-sm">Amount: <span class="font-bold">{{ $amount }}</span>, pay by: <span
                            class="font-bold">{{ $payerName }}</span>.</p>
                </div>
            @endif

            {{-- Botão para voltar à página inicial ou baixar o PDF --}}
            <div class="flex justify-center gap-8">
                <a href="{{ url('/home') }}"
                    class="flex items-center mt-2 gap-2 rounded border border-[#7E84F2] px-6 py-2 text-sm font-semibold text-[#7E84F2] transition-all hover:bg-[#7E84F2] hover:text-white hover:shadow-lg active:scale-95 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    Home Page
                </a>
                <a href="{{ route('locacao.print') }}"
                    class="flex items-center mt-2 gap-2 rounded border border-[#7E84F2] px-6 py-2 text-sm font-semibold text-[#7E84F2] transition-all hover:bg-[#7E84F2] hover:text-white hover:shadow-lg active:scale-95 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    Download
                </a>
            </div>
        </div>
    </div>
@endsection
