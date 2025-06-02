{{-- VIEW DE DETALHES DO BUNGALOW --}}
@extends('layouts.bungalow-layout')

@section('content')
    <div class="w-full flex justify-center pt-0">
        <div class="relative mx-10 text-white rounded-xl bg-blue-gray-500 bg-clip-border max-w-3xl max-h-full shadow-none">
            <img class="w-[700px] h-[525px] object-cover rounded-xl" src="{{ asset($bungalow->imagem) }}" />
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

            {{-- Alerta de erro em caso de alteração de datas e falta de disponibilidade --}}
            @if ($errors->has('indisponibilidade'))
                <div class="flex flex-col items-center mt-8" id="error-alert">
                    <div role="alert"
                        class="relative flex w-full border rounded-md p-2 border-[#7E84F2] text-white items-center"
                        style="background-color: #7E84F2;">
                        <span class="grid place-items-center shrink-0 p-1">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-5 w-5">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM12 6.25C12.4142 6.25 12.75 6.58579 12.75 7V13C12.75 13.4142 12.4142 13.75 12 13.75C11.5858 13.75 11.25 13.4142 11.25 13V7C11.25 6.58579 11.5858 6.25 12 6.25ZM12.5675 17.5008C12.8446 17.1929 12.8196 16.7187 12.5117 16.4416C12.2038 16.1645 11.7296 16.1894 11.4525 16.4973L11.4425 16.5084C11.1654 16.8163 11.1904 17.2905 11.4983 17.5676C11.8062 17.8447 12.2804 17.8197 12.5575 17.5119L12.5675 17.5008Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <div class="w-full text-sm font-sans leading-none m-1.5">
                            Sorry, these dates are already booked.
                        </div>
                        <button onclick="document.getElementById('error-alert').remove()"
                            class="ml-auto inline-flex items-center justify-center px-3 py-1 text-sm font-medium rounded-md bg-white text-[#7E84F2] hover:bg-gray-100 transition">
                            Close
                        </button>
                    </div>
                </div>
            @endif

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

            {{-- Características mostradas por ícone/cursor, foram definidas no ficheiro config.caracteristicas --}}
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
                    $features = config('caracteristicas.bungalow_features');

                    $normalizedFeatures = [];
                    foreach ($features as $key => $value) {
                        $normalizedKey = strtolower(
                            str_replace(
                                [' ', 'ç', 'á', 'ã', 'â', 'é', 'ê', 'í', 'ó', 'ô', 'õ', 'ú'],
                                ['_', 'c', 'a', 'a', 'a', 'e', 'e', 'i', 'o', 'o', 'o', 'u'],
                                $key,
                            ),
                        );
                        $normalizedFeatures[$normalizedKey] = $value;
                    }
                @endphp

                @foreach ($bungalow->caracteristicas as $caracteristica)
                    @php
                        $nomeNormalizado = strtolower(
                            str_replace(
                                [' ', 'ç', 'á', 'ã', 'â', 'é', 'ê', 'í', 'ó', 'ô', 'õ', 'ú'],
                                ['_', 'c', 'a', 'a', 'a', 'e', 'e', 'i', 'o', 'o', 'o', 'u'],
                                $caracteristica->nome,
                            ),
                        );
                    @endphp

                    @if (array_key_exists($nomeNormalizado, $normalizedFeatures))
                        <div title="{{ $normalizedFeatures[$nomeNormalizado]['title'] }}"
                            class="{{ $normalizedFeatures[$nomeNormalizado]['class'] }}">
                            <i class="{{ $normalizedFeatures[$nomeNormalizado]['icone'] }}"></i>
                        </div>
                    @else
                        <div>
                            Característica não encontrada: {{ $caracteristica->nome }}
                        </div>
                    @endif
                @endforeach

            </div>
            </p>



            {{-- Detalhes preço e outros associados ao ato de reservar --}}
            @if (session()->has('dados-busca-final'))
                @php
                    $dadosAtualizados = session('dados-busca-final');
                @endphp
                <div class="container px-1 py-20 mx-auto">
                    <div class="rounded-lg bg-white shadow-indigo-10 shadow-md p-3 flex flex-col gap-2">
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
                        <h3 class="text-xl font-bold text-indigo-500 text-left">{{ $dadosAtualizados['total'] }}€</h3>
                        <div>
                            <p class="text-sm font-semibold text-gray-400">{{ $dadosAtualizados['inicial'] }}€</p>
                            <p class="text-sm font-semibold text-gray-400">(Down payment: 10% of the total)</p>
                        </div>
                    </div>
                </div>
            @endif


            {{-- Mostrar o modal com as datas já escolhidas, e possibilidade de alterá-las --}}
            <div id="bookModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                <div class="bg-white p-6 rounded shadow-lg w-full max-w-md relative">
                    <h2 class="text-2xl font-bold mb-4">Confirm your booking details</h2>

                    <form method="POST" action="{{ route('bungalow-pre-reservation') }}">
                        @csrf
                        <label class="text-[20px] font-semibold text-[#4A575A]">{{ $bungalow->modelo }}</label>
                        @if (!empty($dadosAtualizados))
                            <label class="block mb-2">Check-in:</label>
                            <input type="date" name="data_inicio"
                                value="{{ $dadosAtualizados['data_inicio'] ?? '' }}" min="{{ date('Y-m-d') }}" required
                                class="border rounded px-3 py-2 w-full mb-4" />

                            <label class="block mb-2">Check-out:</label>
                            <input type="date" name="data_fim" value="{{ $dadosAtualizados['data_fim'] ?? '' }}"
                                min="{{ $dadosAtualizados['data_inicio'] ?? date('Y-m-d') }}" required
                                class="border rounded px-3 py-2 w-full mb-4" />

                            <label class="block mb-2">Guests:</label>
                            <input type="number" name="hospedes" value="{{ $dadosAtualizados['hospedes'] ?? 1 }}"
                                min="1" class="border rounded px-3 py-2 w-full mb-4" required />
                        @else
                            {{-- Caso não existam dados, podes mostrar inputs vazios ou valores default --}}
                            <label class="block mb-2">Check-in:</label>
                            <input type="date" name="data_inicio" min="{{ date('Y-m-d') }}" required
                                class="border rounded px-3 py-2 w-full mb-4" />

                            <label class="block mb-2">Check-out:</label>
                            <input type="date" name="data_fim" min="{{ date('Y-m-d') }}" required
                                class="border rounded px-3 py-2 w-full mb-4" />

                            <label class="block mb-2">Guests:</label>
                            <input type="number" name="hospedes" min="1" value="1"
                                class="border rounded px-3 py-2 w-full mb-4" required />
                        @endif

                        <button type="submit"
                            class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">
                            Pay now
                        </button>
                    </form>
                </div>
            </div>






        </div>

    </div>



    {{-- Cálculo Pagamento total e 10% de entrada --}}
    {{-- <script>
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
            return inicial;
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
        function abrirModal(valorTotal, valorInicial) {
            document.getElementById('total').value = valorTotal.toFixed(2);
            document.getElementById('inicial').value = valorInicial.toFixed(2);
            document.getElementById('bookModal').classList.remove('hidden');
        }
    </script> --}}
@endsection
