@extends('layouts.bungalow-layout')

@section('content')
    <div class="bg-gray-100 min-h-screen pt-6 flex items-start justify-center">
        <div class="flex flex-wrap justify-center gap-6 max-w-7xl w-full px-4">
            <!-- Pagamento 100% -->
            <div
                class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 max-w-sm w-full">
                <div class="p-1 bg-blue-200">
                </div>
                <div class="p-8">
                    <img class="mx-auto mb-6" src="{{ asset('images/paypal.png') }}" alt="paypal" height="150"
                        width="180">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Pay the Full Price</h2>
                    <p class="text-gray-600 mb-6">Get 5% of descount in your next MyBungalow.</p>
                    <p class="text-4xl font-bold text-gray-800 mb-6">$19.99</p>
                    <ul class="text-sm text-gray-600 mb-6">
                        <li class="mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Pay with Paypal
                        </li>
                        <li class="mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            It's easy
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            It's safe
                        </li>
                    </ul>
                </div>
                <div class="p-4">
                    <button
                        class="w-full bg-blue-500 text-white rounded-full px-4 py-2 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                        Pay now
                    </button>
                </div>
            </div>

            <!-- Pagamento 10% -->
            <div
                class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 max-w-sm w-full">
                <div class="p-1 bg-purple-200">
                </div>
                <div class="p-8">
                    <img class="mx-auto mb-6" src="{{ asset('images/paypal.png') }}" alt="paypal" height="150"
                        width="180">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Pay 10% upfront</h2>
                    <p class="text-gray-600 mb-6">The remaining payment is due the day before your check-in.</p>
                    <p class="text-4xl font-bold text-gray-800 mb-6">$99.99</p>
                    <ul class="text-sm text-gray-600 mb-6">
                        <li class="mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Pay with Paypal
                        </li>
                        <li class="mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            It's easy
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            It's safe
                        </li>
                    </ul>
                </div>
                <div class="p-4">
                    <button
                        class="w-full bg-purple-500 text-white rounded-full px-4 py-2 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple active:bg-purple-800">
                        Pay now
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection
