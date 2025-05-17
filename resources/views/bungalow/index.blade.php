@extends('layouts.bungalow-layout')




@section('content')
    <div class="w-fit mx-auto bg-white rounded-lg shadow-xl flex flex-row gap-4 p-4 items-center">

        <form method="GET" action="{{ route('bungalow.index') }}" class="flex flex-row gap-4 items-center">
            <!-- Buscas por nome e localizacao (filial e cidade) -->
            <div
                class="flex items-center px-3.5 py-2 text-gray-400 group hover:ring-1 hover:ring-gray-300 focus-within:!ring-2 ring-inset focus-within:!ring-teal-500 rounded-md bg-white w-72">
                <svg class="mr-2 h-5 w-5 stroke-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                    </path>
                </svg>
                <input
                    class="block w-full appearance-none bg-transparent text-base text-gray-700 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6"
                    placeholder="Pesquisar..." aria-label="Search" type="search" name="search"
                    value="{{ request('search') }}" />
            </div>

            <!-- Buscas por data -->
            <div
                class="flex items-center px-3.5 py-2 text-gray-400 group hover:ring-1 hover:ring-gray-300 focus-within:!ring-2 ring-inset focus-within:!ring-teal-500 rounded-md bg-white">
                <svg class="mr-2 h-5 w-5 stroke-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                    </path>
                </svg>
                <input type="date" name="data" class="text-sm text-gray-700 bg-transparent focus:outline-none" />
            </div>
        </form>

        <!-- Paginação -->
        <div class="flex justify-center mt-4">
            {{ $bungalows->links() }}
        </div>
    </div>












    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 px-6 justify-items-center">
        @foreach ($bungalows as $bungalow)
            <div class="px- py-10 max-w-sm">
                <div class="bg-white shadow-2xl rounded-lg tracking-wide">
                    <div class="md:flex-shrink-0">
                        <img src="https://ik.imagekit.io/q5edmtudmz/post1_fOFO9VDzENE.jpg" alt="mountains"
                            class="w-full h-50 rounded-t-lg">
                    </div>
                    <div class="px-4 py-2 mt-2">
                        <h2 class=sacramento-regular2>{{ $bungalow->modelo }}</h2>
                        <p class="text-sm text-gray-700 px-2 mr-1">{{ $bungalow->marca->nome }}</p>
                        <p class="text-sm text-gray-700 px-2 mr-1">{{ $bungalow->localizacao->filial }},
                            {{ $bungalow->localizacao->cidade }} </p>
                        <div class="flex items-center justify-between mt-2 mx-2">
                            <a href="#" class="text-blue-500 text-xs">Show More</a>
                            <a href="#" class="flex text-gray-700">
                                <svg fill="none" viewBox="0 0 24 24" class="w-6 h-6 text-blue-500" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                                5
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
