{{-- VIEW DE DETALHES DO BUNGALOW --}}
@extends('layouts.bungalow-layout')

@section('content')
    <div class="w-full flex justify-center pt-0 bg-gray-50">
        <div
            class="relative mx-10 overflow-hidden text-white shadow-lg rounded-xl bg-blue-gray-500 bg-clip-border shadow-blue-gray-500/40 max-w-3xl max-h-full">
            <img class="w-full object-cover"
                src="https://images.unsplash.com/photo-1499696010180-025ef6e1a8f9?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1470&amp;q=80"
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
            {{-- Detalhes sobre modelo, marca e localização --}}
            <div class="flex items-center justify-between mb-3">
                <h5 class="hidden lg:flex gap-x-8 text-[20px] font-semibold text-[#4A575A] justify-center">
                    {{ $bungalow->modelo }}
                </h5>
            </div>

            <div class="mr-5 block font-sans text-base antialiased font-light leading-relaxed text-gray-700">
                <p>MyBungalow {{ $bungalow->marca->nome }} apresenta {{ $bungalow->marca->observacao }}</p>
                <br>
                <p class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5s-3 1.343-3 3 1.343 3 3 3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 22s8-4.5 8-10A8 8 0 0 0 4 12c0 5.5 8 10 8 10z" />
                    </svg>{{ $bungalow->localizacao->posicao }} , {{ $bungalow->localizacao->filial }} -
                    {{ $bungalow->localizacao->cidade }}
                </p>
            </div>

            {{-- Características mostradas por ícone/cursor --}}
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

                {{-- TOALHAS --}}



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
            </script>



            <!-- Modal, vai servir de formulário para Confimação de Dados e criação de uma Locação Pendente -->
            <div id="bookModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                <div class="bg-white p-6 rounded shadow-lg w-full max-w-md relative">
                    <button onclick="document.getElementById('bookModal').classList.add('hidden')"
                        class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>

                    <h2 class="text-2xl font-bold mb-4">Confirm your booking details</h2>
                    <form method="POST" action="{{ route('bungalow-locacao.store') }}">
                        @csrf

                        <label class="text-[20px] font-semibold text-[#4A575A]">{{ $bungalow->modelo }}</label>
                        <label class="block mb-2">Check-in:</label>
                        <label for="data_inicio"></label>
                        <input type="date" name="data_inicio" id="data_inicio" value="{{ request('data_inicio') }}" min="{{ date('Y-m-d') }}"
                        class="border rounded px-3 py-2 w-full mb-4" required/>

                        <label class="block mb-2">Check-out:</label>
                        <input type="date" name="dataFim" value="{{ $dataFim }}" min="{{ date('Y-m-d') }}"
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
