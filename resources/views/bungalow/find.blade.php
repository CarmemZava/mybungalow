@extends('layouts.bungalow-layout')




@section('content')
    <div class="flex gap-x-1">
        <div class="w-fit mx-auto bg-white rounded-lg shadow-xl flex flex-row gap-4 p-4 items-center">
            <form method="GET" action="{{ route('bungalow.find') }}" class="flex flex-row gap-4 items-center">

                <!-- Seleção datas -->
                <div class="inline-flex items-center px-3.5 py-2 gap-2 text-gray-400 group rounded-md bg-white">
                    <label for="entrada" class="font-medium">
                        Check-in:
                    </label>
                    <input type="date" name="data_inicio" class="text-sm text-gray-700 bg-transparent focus:outline-none" />
                </div>
                <div
                    class="inline-flex items-center px-3.5 py-2 gap-2 text-gray-400 group rounded-md bg-white">
                    <label for="saida" class="font-medium">
                        Check-out:
                    </label>
                    <input type="date" name="data_fim" class="text-sm text-gray-700 bg-transparent focus:outline-none" />
                </div>

                {{-- Selecção número de adultos --}}
                <div
                    class="inline-flex items-center px-3.5 py-2 gap-2 text-gray-400 group rounded-md bg-white">
                    <label for="adultos" class="font-medium">
                        Number of guests:
                    </label>
                    <select name="hospedes" id="hospedes">
                        <option value="">Selecione uma opção</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>

                <button type="submit" class="inline-flex items-center gap-2 rounded border border-[#7E84F2] px-6 py-2 text-sm font-semibold text-[#7E84F2] transition-all hover:bg-[#7E84F2] hover:text-white hover:shadow-lg active:scale-95 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">Find</button>




            </form>
        </div>

        <!-- Paginação -->
        <div class="flex justify-center mt-4 mr-6">
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
                            <a href="#" class="flex text-gray-700">{{ intval($bungalow->preco_diario) }}$/dia</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
