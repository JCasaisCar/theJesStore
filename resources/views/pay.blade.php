@extends('layouts.app')
@section('title', __('pago'))

@push('head')
    <meta name="stripe-key" content="{{ config('services.stripe.key') }}">
    <meta name="stripe-url" content="{{ route('stripe.payment') }}">
    <meta name="total-amount" content="{{ str_replace(',', '.', $total) }}">
@endpush

@section('content')
<body id="payPage">
    
<div class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-10 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
        <div class="absolute top-40 right-20 w-80 h-80 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
        <div class="absolute bottom-10 left-1/3 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
    </div>

    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3csvg width=\" 40\" height=\"40\" xmlns=\"http://www.w3.org/2000/svg\"%3e%3cdefs%3e%3cpattern id=\"grid\" width=\"40\" height=\"40\" patternUnits=\"userSpaceOnUse\"%3e%3cpath d=\"m 40 0 l 0 40 m -40 0 l 40 0\" fill=\"none\" stroke=\"rgba(255,255,255,0.05)\" stroke-width=\"1\"/%3e%3c/pattern%3e%3c/defs%3e%3crect width=\"100%25\" height=\"100%25\" fill=\"url(%23grid)\" /%3e%3c/svg%3e')] opacity-30"></div>

    <div class="container mx-auto px-4 py-20 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <div class="w-24 h-24 mx-auto bg-gradient-to-br from-blue-500 to-cyan-500 rounded-3xl flex items-center justify-center mb-8 shadow-2xl">
                <i class="fas fa-credit-card text-white text-3xl"></i>
            </div>

            <h1 class="text-4xl md:text-6xl font-black mb-6 bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                {{ __('metodo_de') }} {{ __('pago') }}
            </h1>
            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                {{ __('pago_descripcion') }}
            </p>

            <div class="flex items-center justify-center text-sm">
                <a href="{{ route('home') }}" class="text-blue-300 hover:text-white transition-colors duration-300 font-medium flex items-center">
                    <i class="fas fa-home mr-2"></i>{{ __('inicio') }}
                </a>
                <div class="mx-3 text-gray-400">
                    <i class="fas fa-chevron-right text-xs"></i>
                </div>
                <span class="text-white font-medium">{{ __('carrito') }}</span>
                <div class="mx-3 text-gray-400">
                    <i class="fas fa-chevron-right text-xs"></i>
                </div>
                <span class="text-white font-medium">{{ __('datos_envio') }}</span>
                <div class="mx-3 text-gray-400">
                    <i class="fas fa-chevron-right text-xs"></i>
                </div>
                <span class="text-white font-medium">{{ __('pago') }}</span>
            </div>
        </div>
    </div>
</div>

<div class="bg-white py-12 md:py-16">
    <div class="container mx-auto px-4">
        <div class="mb-12">
            <div class="flex justify-center">
                <div class="w-full max-w-4xl">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 text-center">
                            <div class="bg-gray-200 text-gray-500 rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-check text-blue-600"></i>
                            </div>
                            <p class="text-sm text-gray-500">{{ __('carrito') }}</p>
                            <div class="h-1 bg-gray-200 mt-2"></div>
                        </div>
                        <div class="w-1/6 h-1 bg-blue-600"></div>
                        <div class="flex-1 text-center">
                            <div class="bg-gray-200 text-gray-500 rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-check text-blue-600"></i>
                            </div>
                            <p class="text-sm text-gray-500">{{ __('envio') }}</p>
                            <div class="h-1 bg-gray-200 mt-2"></div>
                        </div>
                        <div class="w-1/6 h-1 bg-blue-600"></div>
                        <div class="flex-1 text-center">
                            <div class="bg-blue-600 text-white rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <p class="text-sm font-bold text-blue-600">{{ __('pago') }}</p>
                            <div class="h-1 bg-blue-600 mt-2"></div>
                        </div>
                        <div class="w-1/6 h-1 bg-gray-300"></div>
                        <div class="flex-1 text-center">
                            <div class="bg-gray-200 text-gray-500 rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-check"></i>
                            </div>
                            <p class="text-sm text-gray-500">{{ __('confirmacion') }}</p>
                            <div class="h-1 bg-gray-200 mt-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                    <div class="bg-gray-50 p-4 border-b">
                        <h2 class="font-bold text-lg text-gray-800">{{ __('informacion_pago') }}</h2>
                    </div>

                    <div class="p-6">
                        <form id="payment-form">
                            <div class="mb-8">
                                <div class="bg-blue-50 rounded-lg p-4 text-sm text-blue-800 flex items-start">
                                    <div class="text-blue-600 mr-3">
                                        <i class="fas fa-info-circle text-xl"></i>
                                    </div>
                                    <p>{{ __('stripe_instrucciones') }}</p>
                                </div>
                            </div>

                            <div class="mb-8">
                                <h3 class="text-md font-semibold text-gray-700 mb-4 flex items-center">
                                    <i class="fas fa-money-check-alt mr-2 text-blue-600"></i>
                                    {{ __('selecciona_metodo_pago') }}
                                </h3>

                                <div class="space-y-4">
                                    <div class="border border-blue-600 rounded-lg p-4 transition">
                                        <div class="flex items-center">
                                            <input type="radio" id="pago-tarjeta" name="metodo_pago" value="tarjeta" checked class="text-blue-600 focus:ring-blue-600 mr-3">
                                            <label for="pago-tarjeta" class="flex-1 cursor-pointer">
                                                <div class="flex justify-between items-center">
                                                    <span class="font-medium text-gray-800">Stripe</span>
                                                    <div class="flex space-x-2">
                                                        <i class="fab fa-cc-visa text-blue-700 text-xl"></i>
                                                        <i class="fab fa-cc-mastercard text-red-600 text-xl"></i>
                                                        <i class="fab fa-cc-amex text-blue-500 text-xl"></i>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="border border-gray-200 rounded-lg p-4 transition hover:border-gray-400">
                                        <div class="flex items-center">
                                            <input type="radio" id="pago-paypal" name="metodo_pago" value="paypal" class="text-blue-600 focus:ring-blue-600 mr-3">
                                            <label for="pago-paypal" class="flex-1 cursor-pointer">
                                                <div class="flex justify-between items-center">
                                                    <span class="font-medium text-gray-800">PayPal</span>
                                                    <i class="fab fa-paypal text-blue-800 text-xl"></i>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <div id="paypal-content" class="hidden bg-gray-50 rounded-lg p-6 border border-gray-200">
                                        <div class="flex justify-center py-4">
                                            <div id="paypal-button-container" class="w-full"></div>
                                        </div>
                                        <p class="text-sm text-gray-600 text-center mt-2">
                                            {{ __('paypal_redirect') }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-8">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="terms" class="text-gray-600">
                                            {{ __('acepto') }} <a href="{{__('terms') }}" class="text-blue-600 hover:underline">{{ __('terminos') }}</a> {{ __('y') }} <a href="{{__('privacy') }}" class="text-blue-600 hover:underline">{{ __('politica_privacidad') }}</a>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button type="button" id="submit-button" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition focus:outline-none focus:ring-4 focus:ring-blue-300 flex justify-center items-center">
                                    <span>{{ __('realizar_pago') }}</span>
                                    <i class="fas fa-lock ml-2"></i>
                                </button>
                            </div>
                        </form>

                        <form id="paypal-form" method="POST" action="{{ route('paypal.pay') }}">
                            @csrf
                            <input type="hidden" name="amount" id="paypal-amount">
                        </form>

                        <div id="stripe-error" class="hidden mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded"></div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-center space-x-4">
                            <div class="text-green-600">
                                <i class="fas fa-shield-alt text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-800">{{ __('pago_seguro') }}</h3>
                                <p class="text-sm text-gray-600">{{ __('pago_seguro_descripcion') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden sticky top-6">
                    <div class="bg-gray-50 p-4 border-b">
                        <h2 class="font-bold text-lg text-gray-800">{{ __('resumen_pedido') }}</h2>
                    </div>

                    <div class="p-4 space-y-4">
                        <div class="space-y-3">
                            @foreach ($cart->items as $item)
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gray-100 rounded mr-3 overflow-hidden">
                                        <img src="{{ asset('storage/products/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="object-cover w-full h-full">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">{{ $item->product->name }}</p>
                                        <p class="text-xs text-gray-500">{{ __('cantidad') }}: {{ $item->quantity }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-medium text-gray-800">{{ number_format($item->product->price * $item->quantity, 2) }} €</p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="pt-2">
                            <div class="flex justify-between py-2">
                                <span class="text-gray-600">{{ __('subtotal') }}</span>
                                <span class="font-medium text-gray-800">{{ number_format($subtotal, 2) }} €</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-gray-600">{{ __('envio') }}</span>
                                <span class="font-medium text-gray-800">{{ number_format($shippingPrice, 2) }} €</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-gray-600">{{ __('impuestos') }}</span>
                                <span class="font-medium text-gray-800">{{ number_format($iva, 2) }} €</span>
                            </div>

                            @if(isset($descuento) && $descuento > 0)
                            <div class="flex justify-between py-2 text-green-700 font-medium">
                                <span>{{ __('cupón_aplicado') }} ({{ $codigo ?? '' }})</span>
                                <span>-{{ number_format($descuento, 2) }} €</span>
                            </div>
                            @endif

                            <div class="flex justify-between py-3 border-t border-gray-200 mt-2">
                                <span class="font-bold text-gray-800">{{ __('total') }}</span>
                                <span class="font-bold text-blue-600 text-xl">{{ number_format($total, 2) }} €</span>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection