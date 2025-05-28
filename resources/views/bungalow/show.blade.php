{{-- VIEW DE DETALHES DO BUNGALOW --}}
@extends('layouts.bungalow-layout')

@section('content')
    <div class="w-full flex justify-center pt-0">
        <div
            class="relative mx-10 overflow-hidden text-white rounded-xl bg-blue-gray-500 bg-clip-border max-w-3xl max-h-full shadow-none">
            <img class="w-[700px] h-[525px] object-cover" src="{{ asset($bungalow->imagem) }}" />
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
            {{-- Detalhes sobre modelo, marca e localização --}}
            <div class="flex items-center justify-between mb-3">
                <h5 class="hidden lg:flex gap-x-8 text-[20px] font-semibold text-[#4A575A] justify-center">
                    {{ $bungalow->modelo }}
                </h5>
            </div>

            <div class="mr-5 block font-sans text-base antialiased font-light leading-relaxed text-gray-700">
                <p>MyBungalow {{ $bungalow->marca->nome }} apresenta {{ $bungalow->marca->observacao }}</p>
                <br>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5s-3 1.343-3 3 1.343 3 3 3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 22s8-4.5 8-10A8 8 0 0 0 4 12c0 5.5 8 10 8 10z" />
                    </svg>{{ $bungalow->localizacao->posicao }} , {{ $bungalow->localizacao->filial }} -
                    {{ $bungalow->localizacao->cidade }}
                </div>
                <br>
                <p class="flex items-center gap-2">
                <div class="mb-4 flex items-center text-gray-700 gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                    </svg> Accommodation Details:
                </div>

                <div>
                    <p>Suitable for {{ $bungalow->numero_hospedes }} guests</p>
                    <p>{{ $bungalow->numero_quartos }} bedrooms </p>
                    <p>{{ $bungalow->numero_camas }} beds</p>
                    <p>{{ $bungalow->numero_casas_banho }} bathrooms</p>
                </div>

                </p>
            </div>
            <br>

            {{-- Características mostradas por ícone/cursor --}}
            <p class="flex items-center gap-2">
            <div class="flex items-center text-gray-700 gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                </svg> Amenities:
            </div>
            <div class="grid grid-cols-8 gap-3 mt-8">

                @php
                    //Criação de um config que possue todas as características definidas por um title, e ícone
                    $features = config('caracteristicas.bungalow_features');
                    $bungalowFeatures = [
                        'aceita_animais',
                        'estacionamento_privado',
                        'aquecimento',
                        'roupa_de_cama',
                        'tv',
                        'cozinha_equipada',
                        'loicas',
                        'fogao',
                        'frigorifico',
                        'microondas',
                        'wc_com_duche',
                        'produtos_de_higiene',
                        'toalhas',
                        'jardim',
                        'churrasqueira',
                        'mobilario_exterior',
                    ];
                @endphp


                @foreach ($bungalow->caracteristicas as $caracteristica)
                    <div title="{{ $caracteristica->title }}" class="{{ $caracteristica->class }}">
                        <i class="{{ $caracteristica->icone }}"></i>
                    </div>
                @endforeach

            </div>
            </p>


            {{-- Detalhes preço e outros associados ao ato de reservar --}}
            <div class="container px-5 py-20 mx-auto">
                <div class="rounded-lg bg-white shadow-indigo-50 shadow-md p-3 flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4 font-sans text-xl font-medium text-blue-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <rect x="2" y="7" width="20" height="10" rx="2" ry="2"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                <line x1="2" y1="11" x2="22" y2="11" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" />
                            </svg>
                            <span>Total</span>
                        </div>
                        <button
                            class="flex items-center gap-2 rounded border border-[#7E84F2] px-6 py-2 text-sm font-semibold text-[#7E84F2] transition-all hover:bg-[#7E84F2] hover:text-white hover:shadow-lg active:scale-95 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button" id="bookNow"
                            onclick="document.getElementById('bookModal').classList.remove('hidden')">
                            Book now!
                        </button>
                    </div>

                    <h3 class="text-xl font-bold text-indigo-500 text-left" id="total"></h3>
                    <div>
                        <p class="text-sm font-semibold text-gray-400" id="inicial"></p>
                        <p class="text-sm font-semibold text-gray-400">(Down payment: 10% of the total)</p>
                    </div>

                </div>
            </div>

            {{-- Cálculo Pagamento total e 10% de entrada --}}
            <script>
                function PagamentoTotal(preco_diario, dataInicio, dataFim, hospedes) {
                    let saida = document.getElementById("total");

                    let inicio = new Date(dataInicio);
                    let fim = new Date(dataFim);

                    let segundos = fim - inicio;
                    let dias = segundos / (1000 * 60 * 60 * 24);

                    if (dias <= 0) {
                        saida.textContent = "Datas inválidas";
                        return null;
                    }

                    let total = dias * preco_diario;
                    saida.textContent = total.toFixed(2) + " €";

                    return total;

                }

                function PagamentoInicial(total) {
                    let saida2 = document.getElementById("inicial");
                    if (total === null) {
                        saida2.textContent = "";
                        return;
                    }
                    let inicial = total * 0.1;
                    saida2.textContent = inicial.toFixed(2) + " €";
                }

                // Chamada automática para aparecer o valor ao abrir a show view
                let totalCalculado = PagamentoTotal(
                    {{ $bungalow->preco_diario }},
                    "{{ $dataInicio }}",
                    "{{ $dataFim }}",
                    {{ $hospedes }}
                );

                PagamentoInicial(totalCalculado);

                // Passar os dados para o modal que vai carregar estes para a próxima view
                document.getElementById('input_total').value = totalCalculado.toFixed(2);
                document.getElementById('input_inicial').value = (totalCalculado * 0.1).toFixed(2);
            </script>



            <!-- Modal, vai servir de formulário para Confimação de Dados e passa para a view de pagamento -->
            <div id="bookModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                <div class="bg-white p-6 rounded shadow-lg w-full max-w-md relative">
                    <h2 class="text-2xl font-bold mb-4">Confirm your booking details</h2>
                    <form method="POST" action="{{ route('bungalow-pre-reservation') }}">
                        @csrf
                        <!-- input do id do bungalow escondido para passar para o LocacaoController -->
                        <input type="hidden" name="bungalow_id" id="bungalow_id" value="{{ $bungalow->id }}">
                        {{-- Valor total e 10% vão ser também passados como hidden --}}
                        <input type="hidden" id="total_input" name="total" value="{{ $valorTotal }}">
                        <input type="hidden" id="inicial_input" name="inicial" value="{{ $valorInicial }}">
                        <label class="text-[20px] font-semibold text-[#4A575A]">{{ $bungalow->modelo }}</label>
                        <label class="block mb-2">Check-in:</label>
                        <label for="data_inicio"></label>
                        <input type="date" name="data_inicio" id="data_inicio" value="{{ request('data_inicio') }}"
                            min="{{ date('Y-m-d') }}" class="border rounded px-3 py-2 w-full mb-4" required />

                        <label class="block mb-2">Check-out:</label>
                        <input type="date" name="data_fim" value="{{ $dataFim }}" min="{{ date('Y-m-d') }}"
                            class="border rounded px-3 py-2 w-full mb-4" required>

                        <label class="block mb-2">Guests:</label>
                        <input type="text" name="hospedes" value="{{ $hospedes }}"
                            class="border rounded px-3 py-2 w-full mb-4" required>

                        <button type="submit"
                            class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">
                            Pay now
                        </button>
                    </form>
                </div>
            </div>













        </div>

    </div>
@endsection
