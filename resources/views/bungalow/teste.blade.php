{{-- VIEW DE DETALHES DO BUNGALOW --}}
@extends('layouts.bungalow-layout')

@section('content')
    <!-- Centering wrapper -->
    <div class="flex justify-center pt-3 bg-gray-50">
        <div
            class="relative mx-10 overflow-hidden text-white shadow-lg rounded-xl bg-blue-gray-500 bg-clip-border shadow-blue-gray-500/40">
            <img src="https://images.unsplash.com/photo-1499696010180-025ef6e1a8f9?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1470&amp;q=80"
                alt="ui/ux review check" />
            <div
                class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-tr from-transparent via-transparent to-black/60">
            </div>
            <button
                class="!absolute top-4 right-4 h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-full text-center align-middle font-sans text-xs font-medium uppercase text-red-500 transition-all hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button">
                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path
                            d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z">
                        </path>
                    </svg>
                </span>
            </button>
        </div>
        <div class="p-6">
            <div class="flex items-center justify-between mb-3">
                <h5 class="block font-sans text-xl antialiased font-medium leading-snug tracking-normal text-blue-gray-900">
                    Wooden House, Florida
                </h5>
            </div>
            <p class="mr-5 block font-sans text-base antialiased font-light leading-relaxed text-gray-700">
                Enter a freshly updated and thoughtfully furnished peaceful home surrounded by ancient trees, stone
                walls, and open meadows.
            </p>
            {{-- COMEÇA --}}
            <div class="inline-flex flex-wrap items-center gap-3 mt-8 group">
                {{-- TV --}}
                <div title="TV"
                    class="cursor-pointer rounded-full border border-gray-900/5 bg-gray-900/5 p-4 w-12 h-12 flex items-center justify-center text-gray-900 transition-colors hover:border-gray-900/10 hover:bg-gray-900/10 hover:!opacity-100 group-hover:opacity-70">
                    <i class="fa-solid fa-tv"></i>
                </div>
                {{-- Aquecimento --}}
                <div title="heat"
                    class="cursor-pointer rounded-full border border-gray-900/5 bg-gray-900/5 p-4 w-12 h-12 flex items-center justify-center text-gray-900 transition-colors hover:border-gray-900/10 hover:bg-gray-900/10 hover:!opacity-100 group-hover:opacity-70">
                    <i class="fa-solid fa-fire"></i>
                </div>
                {{-- Roupa de cama --}}
                <div title="bedding"
                    class="cursor-pointer rounded-full border border-gray-900/5 bg-gray-900/5 p-4 w-12 h-12 flex items-center justify-center text-gray-900 transition-colors hover:border-gray-900/10 hover:bg-gray-900/10 hover:!opacity-100 group-hover:opacity-70">
                    <i class="fa-solid fa-bed"></i>
                </div>

                {{-- FALTA cozinha equipada --}}

                {{-- Fogão --}}
                <div title="stove"
                    class="cursor-pointer rounded-full border border-gray-900/5 bg-gray-900/5 p-4 w-12 h-12 flex items-center justify-center text-gray-900 transition-colors hover:border-gray-900/10 hover:bg-gray-900/10 hover:!opacity-100 group-hover:opacity-70">
                    <i class="fa-solid fa-fire-burner"></i>
                </div>
                {{-- Frigorífico --}}
                <div title="refrigerator"
                    class="cursor-pointer rounded-full border border-gray-900/5 bg-gray-900/5 p-4 w-12 h-12 flex items-center justify-center text-gray-900 transition-colors hover:border-gray-900/10 hover:bg-gray-900/10 hover:!opacity-100 group-hover:opacity-70">
                    <i class="fa-regular fa-refrigerator"></i>
                </div>
                {{-- loiças --}}
                <div title="Plates and utensils"
                    class="cursor-pointer rounded-full border border-gray-900/5 bg-gray-900/5 p-4 w-12 h-12 flex items-center justify-center text-gray-900 transition-colors hover:border-gray-900/10 hover:bg-gray-900/10 hover:!opacity-100 group-hover:opacity-70">
                    <i class="fa-solid fa-kitchen-set"></i>
                </div>
                {{-- microondas --}}

                {{-- Produtos de higiene --}}
                <div title="hygiene products"
                    class="cursor-pointer rounded-full border border-gray-900/5 bg-gray-900/5 p-4 w-12 h-12 flex items-center justify-center text-gray-900 transition-colors hover:border-gray-900/10 hover:bg-gray-900/10 hover:!opacity-100 group-hover:opacity-70">
                    <i class="fa-solid fa-pump-soap"></i>
                </div>





                {{-- Aceita Animais --}}
                <div title="Pet-friendly"
                    class="cursor-pointer rounded-full border border-gray-900/5 bg-gray-900/5 p-4 w-12 h-12 flex items-center justify-center text-gray-900 transition-colors hover:border-gray-900/10 hover:bg-gray-900/10 hover:!opacity-100 group-hover:opacity-70">
                    <i class="fa-solid fa-paw"></i>
                </div>







                <span
                    class="cursor-pointer rounded-full border border-gray-900/5 bg-gray-900/5 p-3 text-gray-900 transition-colors hover:border-gray-900/10 hover:bg-gray-900/10 hover:!opacity-100 group-hover:opacity-70">
                    +20
                </span>
            </div>
            <div class="p-6">
                <button
                    class="flex items-center gap-2 rounded border border-[#7E84F2] px-6 py-2 text-sm font-semibold text-[#7E84F2] transition-all hover:bg-[#7E84F2] hover:text-white hover:shadow-lg active:scale-95 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button">
                    Book now!
                </button>
            </div>



        </div>

    </div>
@endsection
