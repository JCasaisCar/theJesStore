@extends('layouts.app')
@section('title', __('pago'))
@section('content')
<!-- Hero Banner del Pago -->
<div class="relative bg-gradient-to-r from-blue-900 to-blue-700 overflow-hidden">
    <div class="container mx-auto px-4 py-12 md:py-16">
        <div class="text-center text-white z-10 relative">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 animate__animated animate__fadeInUp">
                {{ __('metodo_de') }} <span class="text-blue-300">{{ __('pago') }}</span>
            </h1>
            <p class="text-lg max-w-2xl mx-auto mb-6 text-gray-200 animate__animated animate__fadeInUp animate__delay-1s">
                {{ __('pago_descripcion') }}
            </p>
        </div>
        <!-- Decoraciones de fondo -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
            <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-blue-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-purple-500 rounded-full blur-3xl"></div>
        </div>
    </div>
</div>

<!-- Contenido del Pago -->
<div class="bg-white py-12 md:py-16">
    <div class="container mx-auto px-4">
        <!-- Pasos del proceso de compra -->
        <div class="mb-12">
            <div class="flex justify-center">
                <div class="w-full max-w-4xl">
                    <div class="flex items-center justify-between">
                        <!-- Paso 1: Carrito -->
                        <div class="flex-1 text-center">
                            <div class="bg-gray-200 text-gray-500 rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-check text-blue-600"></i>
                            </div>
                            <p class="text-sm text-gray-500">{{ __('carrito') }}</p>
                            <div class="h-1 bg-gray-200 mt-2"></div>
                        </div>
                        <!-- Línea de conexión -->
                        <div class="w-1/6 h-1 bg-blue-600"></div>
                        <!-- Paso 2: Datos de envío -->
                        <div class="flex-1 text-center">
                            <div class="bg-gray-200 text-gray-500 rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-check text-blue-600"></i>
                            </div>
                            <p class="text-sm text-gray-500">{{ __('envio') }}</p>
                            <div class="h-1 bg-gray-200 mt-2"></div>
                        </div>
                        <!-- Línea de conexión -->
                        <div class="w-1/6 h-1 bg-blue-600"></div>
                        <!-- Paso 3: Pago -->
                        <div class="flex-1 text-center">
                            <div class="bg-blue-600 text-white rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <p class="text-sm font-bold text-blue-600">{{ __('pago') }}</p>
                            <div class="h-1 bg-blue-600 mt-2"></div>
                        </div>
                        <!-- Línea de conexión -->
                        <div class="w-1/6 h-1 bg-gray-300"></div>
                        <!-- Paso 4: Confirmación -->
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

        <!-- Contenido del pago -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Formulario de pago (2 columnas en desktop) -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                    <div class="bg-gray-50 p-4 border-b">
                        <h2 class="font-bold text-lg text-gray-800">{{ __('informacion_pago') }}</h2>
                    </div>
                    
                    <div class="p-6">
                        <form id="payment-form">
                            <!-- Instrucciones de Stripe -->
                            <div class="mb-8">
                                <div class="bg-blue-50 rounded-lg p-4 text-sm text-blue-800 flex items-start">
                                    <div class="text-blue-600 mr-3">
                                        <i class="fas fa-info-circle text-xl"></i>
                                    </div>
                                    <p>{{ __('stripe_instrucciones') }}</p>
                                </div>
                            </div>
                            
                            <!-- Selector de método de pago -->
                            <div class="mb-8">
                                <h3 class="text-md font-semibold text-gray-700 mb-4 flex items-center">
                                    <i class="fas fa-money-check-alt mr-2 text-blue-600"></i>
                                    {{ __('selecciona_metodo_pago') }}
                                </h3>
                                
                                <div class="space-y-4">
                                    <!-- Opción tarjeta de crédito -->
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
                                    
                                    <!-- PayPal como método alternativo -->
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
                                    
                                    <!-- Contenido PayPal (oculto inicialmente) -->
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
                            
                            <!-- Política de privacidad y términos -->
                            <div class="mb-8">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="terms" class="text-gray-600">
                                            {{ __('acepto') }} <a href="#" class="text-blue-600 hover:underline">{{ __('terminos') }}</a> {{ __('y') }} <a href="#" class="text-blue-600 hover:underline">{{ __('politica_privacidad') }}</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Botón de pago -->
                            <div>
                                <button type="submit" href="{{ route('confirm') }}" id="submit-button" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition focus:outline-none focus:ring-4 focus:ring-blue-300 flex justify-center items-center">
                                    <span>{{ __('realizar_pago') }}</span>
                                    <i class="fas fa-lock ml-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Sección de seguridad -->
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
            
            <!-- Resumen del pedido -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden sticky top-6">
                    <div class="bg-gray-50 p-4 border-b">
                        <h2 class="font-bold text-lg text-gray-800">{{ __('resumen_pedido') }}</h2>
                    </div>
                    
                    <div class="p-4 space-y-4">
                        <!-- Productos -->
                        <div class="space-y-3">
                            @foreach ($cart->items as $item)
                                <div class="flex justify-between py-2 border-b border-gray-100">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-gray-100 rounded mr-3 overflow-hidden">
                                            <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
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
                            <div class="flex justify-between py-3 border-t border-gray-200 mt-2">
                                <span class="font-bold text-gray-800">{{ __('total') }}</span>
                                <span class="font-bold text-blue-600 text-xl">{{ number_format($total, 2) }} €</span>
                            </div>
                        </div>
                        
                        <!-- Código de promoción -->
                        <div class="pt-2">
                            <div class="relative">
                                <input type="text" id="cupon" name="cupon" placeholder="{{ __('codigo_promocional') }}" class="w-full p-3 pr-16 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <button class="absolute right-0 top-0 h-full px-4 bg-gray-100 text-gray-600 hover:bg-gray-200 rounded-r-lg transition">
                                    {{ __('aplicar') }}
                                </button>
                            </div>
                        </div>
                        
                        <!-- Enlaces de ayuda -->
                        <div class="pt-4 border-t border-gray-100">
                            <div class="flex space-x-2 text-sm">
                                <a href="#" class="text-blue-600 hover:underline flex items-center">
                                    <i class="fas fa-question-circle mr-1"></i>
                                    {{ __('ayuda_compra') }}
                                </a>
                                <span class="text-gray-300">|</span>
                                <a href="#" class="text-blue-600 hover:underline flex items-center">
                                    <i class="fas fa-truck mr-1"></i>
                                    {{ __('politica_envios') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("{{ config('services.stripe.key') }}");
    const stripeUrl = "{{ route('stripe.payment') }}";
    const paypalUrl = "{{ route('paypal.redirect') }}";
    const total = "{{ json_encode($total) }}";

    document.getElementById('payment-form').addEventListener('submit', async function (e) {
        e.preventDefault();

        const metodo = document.querySelector('input[name="metodo_pago"]:checked').value;

        if (metodo === 'tarjeta') {
            try {
                const response = await fetch(stripeUrl, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ amount: total })
                });

                const data = await response.json();

                if (data.id) {
                    stripe.redirectToCheckout({ sessionId: data.id });
                } else {
                    alert("Error al iniciar pago con Stripe");
                }
            } catch (error) {
                alert("Error de red al contactar Stripe.");
                console.error(error);
            }
        }

        if (metodo === 'paypal') {
            window.location.href = paypalUrl;
        }
    });
</script>
@endsection