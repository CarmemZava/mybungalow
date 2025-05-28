@extends('layouts.bungalow-layout')




@section('content')
    <div class="flex gap-x-1">
        <!-- CRIAR FUNCAO ALERT PARA GARANTIR QUE OS INPUTS SERAO ADICIONADOS -->
        <div class="w-fit mx-auto bg-white rounded-lg shadow-xl flex flex-row gap-4 p-4 items-center">
            <form id="find" method="GET" action="{{ route('bungalow.find') }}" class="flex flex-row gap-4 items-center">

                <!-- Seleção datas check-in e check-out com mensagem de erro feita pelo Request ValidacaoDatas -->
                <div class="relative inline-flex items-center px-3.5 py-2 gap-2 text-gray-400 group rounded-md bg-white">
                    <label for="data_fim" class="font-medium">Check-in:</label>
                    <input type="date" name="data_inicio" id="data_inicio" min="{{ date('Y-m-d') }}"
                        value="{{ old('data_inicio', request('data_inicio')) }}"
                        class="text-sm text-gray-700 bg-transparent focus:outline-none @error('data_inicio') border border-red-500 @enderror" />

                    @error('data_inicio')
                        <div
                            class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-red-600 text-white text-xs rounded px-2 py-1 whitespace-nowrap shadow-lg z-10">
                            {{ $message }}
                            <div
                                class="absolute bottom-[-6px] left-1/2 transform -translate-x-1/2 w-3 h-3 bg-red-600 rotate-45">
                            </div>
                        </div>
                    @enderror
                </div>

                <div class="relative inline-flex items-center px-3.5 py-2 gap-2 text-gray-400 group rounded-md bg-white">
                    <label for="data_fim" class="font-medium">Check-out:</label>
                    <input type="date" name="data_fim" id="data_fim" min="{{ date('Y-m-d') }}"
                        value="{{ old('data_fim', request('data_fim')) }}"
                        class="text-sm text-gray-700 bg-transparent focus:outline-none @error('data_fim') border border-red-500 @enderror" />

                    @error('data_fim')
                        <div
                            class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-red-600 text-white text-xs rounded px-2 py-1 whitespace-nowrap shadow-lg z-10">
                            {{ $message }}
                            <div
                                class="absolute bottom-[-6px] left-1/2 transform -translate-x-1/2 w-3 h-3 bg-red-600 rotate-45">
                            </div>
                        </div>
                    @enderror
                </div>

                {{-- Selecção número de adultos --}}
                <div class="inline-flex items-center px-3.5 py-2 gap-2 text-gray-400 group rounded-md bg-white">
                    <label for="adultos" class="font-medium">
                        Number of guests:
                    </label>
                    <select name="hospedes" id="hospedes">
                        <option value="">Please choose an option</option>
                        <option value="1" {{ request('hospedes') == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ request('hospedes') == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ request('hospedes') == '3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ request('hospedes') == '4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ request('hospedes') == '5' ? 'selected' : '' }}>5</option>
                        <option value="6" {{ request('hospedes') == '6' ? 'selected' : '' }}>6</option>
                        <option value="7" {{ request('hospedes') == '7' ? 'selected' : '' }}>7</option>
                        <option value="8" {{ request('hospedes') == '8' ? 'selected' : '' }}>8</option>
                        <option value="9" {{ request('hospedes') == '9' ? 'selected' : '' }}>9</option>
                        <option value="10" {{ request('hospedes') == '10' ? 'selected' : '' }}>10</option>
                    </select>
                    @error('hospedes')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="inline-flex items-center gap-2 rounded border border-[#7E84F2] px-6 py-2 text-sm font-semibold text-[#7E84F2] transition-all hover:bg-[#7E84F2] hover:text-white hover:shadow-lg active:scale-95 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">Find</button>
            </form>

            <!-- Validação de preenchimentos de inputs: data_inicio, data_fim e hospedes -->
            <script>
                document.getElementById("find").addEventListener("submit", function(find) {
                    let inicio = document.getElementById("data_inicio").value;
                    let fim = document.getElementById("data_fim").value;
                    let hospedes = document.getElementById("hospedes").value;

                    if (!inicio || !fim || !hospedes) {
                        alert("Please fill in all the fields.");
                        find.preventDefault();
                    }
                });
            </script>




        </div>
        <!-- Paginação -->
        <div class="flex justify-center mt-4 mr-6">
            {{ $bungalows->links() }}
        </div>
    </div>

    <!-- Exibição dos bungalows filtrados -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 px-6">
        @foreach ($bungalows as $bungalow)
            @php
                $url = route('bungalow.show', [
                    'id' => $bungalow->id,
                    'data_inicio' => $dataInicio,
                    'data_fim' => $dataFim,
                    'hospedes' => $hospedes,
                ]);
            @endphp

            <a href="{{ $url }}" class="block py-6 cursor-pointer">
                <div class="bg-white shadow-2xl rounded-lg tracking-wide hover:shadow-3xl transition-shadow duration-300 mt-8">
                    <img src="{{ asset($bungalow->imagem) }}" alt="Imagem do Bungalow" style="width: 300px; height: 250px;"
                        class="block mx-auto">
                    <div class="px-4 py-2 mt-2">
                        <h2 class="hidden lg:flex gap-x-8 text-[20px] font-semibold text-[#4A575A] justify-center">
                            {{ $bungalow->modelo }}</h2>
                        <p class="text-sm text-gray-700 px-2 mr-1">{{ $bungalow->marca->nome }}</p>
                        <p class="text-sm text-gray-700 px-2 mr-1">{{ $bungalow->localizacao->filial }},
                            {{ $bungalow->localizacao->cidade }} </p>
                        <div class="flex items-center justify-between mt-6 mx-2">
                            <span class="text-blue-500 text-xs hover:underline">Show more</span>
                            <span class="flex text-gray-700">{{ intval($bungalow->preco_diario) }}$/day</span>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
