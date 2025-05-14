@extends('layouts.app')
@section('title', __('carrito_compra'))
@section('content')
<body id="cartPage">
<!-- Hero Banner del Carrito -->
<div class="relative bg-gradient-to-r from-blue-900 to-blue-700 overflow-hidden">
    <div class="container mx-auto px-4 py-12 md:py-16">
        <div class="text-center text-white z-10 relative">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 animate__animated animate__fadeInUp">
                {{ __('tu_carrito') }} <span class="text-blue-300">{{ __('de_compra') }}</span>
            </h1>
            <p class="text-lg max-w-2xl mx-auto mb-6 text-gray-200 animate__animated animate__fadeInUp animate__delay-1s">
                {{ __('carrito_descripcion') }}
            </p>
        </div>
        <!-- Decoraciones de fondo -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
            <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-blue-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-purple-500 rounded-full blur-3xl"></div>
        </div>
    </div>
</div>

<!-- Contenido del Carrito -->
<div class="bg-white py-12 md:py-16">
    <div class="container mx-auto px-4">
        <!-- Pasos del proceso de compra -->
        <div class="mb-12">
            <div class="flex justify-center">
                <div class="w-full max-w-4xl">
                    <div class="flex items-center justify-between">
                        <!-- Paso 1: Carrito -->
                        <div class="flex-1 text-center">
                            <div class="bg-blue-600 text-white rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <p class="text-sm font-bold text-blue-600">{{ __('carrito') }}</p>
                            <div class="h-1 bg-blue-600 mt-2"></div>
                        </div>
                        <!-- Línea de conexión -->
                        <div class="w-1/6 h-1 bg-gray-300"></div>
                        <!-- Paso 2: Datos de envío -->
                        <div class="flex-1 text-center">
                            <div class="bg-gray-200 text-gray-500 rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-truck"></i>
                            </div>
                            <p class="text-sm text-gray-500">{{ __('envio') }}</p>
                            <div class="h-1 bg-gray-200 mt-2"></div>
                        </div>
                        <!-- Línea de conexión -->
                        <div class="w-1/6 h-1 bg-gray-300"></div>
                        <!-- Paso 3: Pago -->
                        <div class="flex-1 text-center">
                            <div class="bg-gray-200 text-gray-500 rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <p class="text-sm text-gray-500">{{ __('pago') }}</p>
                            <div class="h-1 bg-gray-200 mt-2"></div>
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

        <!-- Estado del carrito -->
        <div id="cart-content">
            <!-- Si hay productos en el carrito -->
            <div id="cart-with-items">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Lista de productos en el carrito (2 columnas en desktop) -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                            <div class="bg-gray-50 p-4 border-b">
                                <h2 class="font-bold text-lg text-gray-800">{{ __('productos_en_carrito') }}</h2>
                            </div>
                            
                            <div class="divide-y divide-gray-200">
                                @foreach($items as $item)
                                <div class="p-4 sm:p-6">
                                    <div class="flex flex-col sm:flex-row">
                                        <!-- Imagen del producto -->
                                        <div class="mb-4 sm:mb-0 sm:mr-6">
                                            <div class="w-24 h-24 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center">
                                                <img src="{{ asset('storage/products/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="object-cover w-full h-full">
                                            </div>
                                        </div>

                                        <!-- Detalles del producto -->
                                        <div class="flex-1">
                                            <div class="flex flex-col sm:flex-row sm:justify-between mb-4">
                                                <div>
                                                    <h3 class="font-bold text-gray-800 mb-1">{{ $item->product->name }}</h3>
                                                    <p class="text-sm text-gray-500 mb-2">{{ __('referencia') }}: #{{ $item->product->sku }}</p>
                                                </div>
                                                <div class="mt-2 sm:mt-0">
                                                    <span class="font-bold text-blue-600">{{ number_format($item->product->price, 2) }}€</span>
                                                </div>
                                            </div>

                                            <div class="flex flex-wrap items-center justify-between">
                                            <div class="flex items-center gap-2">
    <!-- Botón disminuir -->
    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="inline">
        @csrf
        <input type="hidden" name="action" value="decrease">
        <button type="submit" class="px-2 py-1 bg-gray-200 rounded">-</button>
    </form>

    <input type="number" value="{{ $item->quantity }}" readonly class="w-12 text-center border rounded">

    <!-- Botón aumentar -->
    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="inline">
        @csrf
        <input type="hidden" name="action" value="increase">
        <button type="submit" class="px-2 py-1 bg-gray-200 rounded">+</button>
    </form>
</div>

                                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-gray-500 hover:text-red-600 ml-4" title="{{ __('eliminar') }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <!-- Botones de acción para todos los productos -->
                            <div class="bg-gray-50 p-4 sm:p-6 flex flex-wrap gap-3 justify-between items-center">
                                <a href="{{ route('tienda') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    {{ __('seguir_comprando') }}
                                </a>
                                <form action="{{ route('cart.clear') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-red-600 hover:text-red-800 transition inline-flex items-center">
                                        <i class="far fa-trash-alt mr-2"></i>
                                        {{ __('vaciar_carrito') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Resumen de compra y checkout (1 columna en desktop) -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden sticky top-24">
                            <div class="bg-gray-50 p-4 border-b">
                                <h2 class="font-bold text-lg text-gray-800">{{ __('resumen_compra') }}</h2>
                            </div>
                            
                            <div class="p-4 sm:p-6">
                                <!-- Subtotal, envío, descuentos -->
                                <div class="space-y-3 mb-6">
    <div class="flex justify-between">
        <span class="text-gray-600">{{ __('subtotal') }}</span>
        <span class="font-medium">{{ number_format($subtotalSinIVA, 2) }} €</span>
    </div>
    <div class="flex justify-between">
        <span class="text-gray-600">{{ __('envio') }}</span>
        <span class="font-medium">{{ number_format($envio, 2) }} €</span>
    </div>
    <div class="flex justify-between">
        <span class="text-gray-600">{{ __('impuestos') }}</span>
        <span class="font-medium">{{ number_format($iva, 2) }} €</span>
    </div>
    <div class="pt-3 border-t border-gray-200 flex justify-between">
        <span class="font-bold text-gray-800">{{ __('total') }}</span>
        <span class="font-bold text-blue-600">{{ number_format($totalFinal, 2) }} €</span>
    </div>
</div>
                                
                                <!-- Código promocional -->
                                <div class="mb-6">
                                    <label for="coupon" class="block text-sm font-medium text-gray-700 mb-2">{{ __('codigo_promocional') }}</label>
                                    <div class="flex">
                                        <input type="text" id="coupon" placeholder="{{ __('introduce_codigo') }}" class="flex-1 px-4 py-2 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                        <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r-lg transition">
                                            {{ __('aplicar') }}
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Métodos de pago disponibles -->
                                <div class="mb-6">
                                    <h3 class="text-sm font-medium text-gray-700 mb-2">{{ __('metodos_pago') }}</h3>
                                    <div class="flex flex-wrap gap-2">
                                        <div class="bg-gray-100 p-2 rounded-md">
                                            <i class="fab fa-cc-visa text-blue-700"></i>
                                        </div>
                                        <div class="bg-gray-100 p-2 rounded-md">
                                            <i class="fab fa-cc-mastercard text-red-600"></i>
                                        </div>
                                        <div class="bg-gray-100 p-2 rounded-md">
                                            <i class="fab fa-cc-paypal text-blue-800"></i>
                                        </div>
                                        <div class="bg-gray-100 p-2 rounded-md">
                                            <i class="fab fa-apple-pay"></i>
                                        </div>
                                        <div class="bg-gray-100 p-2 rounded-md">
                                            <i class="fab fa-google-pay text-gray-800"></i>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Botón de checkout -->
                                <a href="{{ route('addres') }}" class="block w-full bg-gradient-to-r from-blue-800 to-blue-600 hover:from-blue-700 hover:to-blue-500 text-white font-bold py-3 px-6 rounded-lg transition shadow-lg text-center">
                                    {{ __('siguiente') }} <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                                
                                <!-- Garantías -->
                                <div class="mt-6 text-center">
                                    <p class="text-sm text-gray-500 flex items-center justify-center">
                                        <i class="fas fa-lock mr-2"></i>
                                        {{ __('pago_seguro') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Si el carrito está vacío -->
            <div id="empty-cart" class="hidden">
                <div class="max-w-2xl mx-auto text-center bg-white rounded-xl shadow-lg p-8 sm:p-12">
                    <div class="bg-blue-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-shopping-cart text-3xl text-blue-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('carrito_vacio') }}</h2>
                    <p class="text-gray-600 mb-8">{{ __('carrito_vacio_mensaje') }}</p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="{{ route('tienda') }}" class="bg-gradient-to-r from-blue-800 to-blue-600 hover:from-blue-700 hover:to-blue-500 text-white font-bold py-3 px-6 rounded-lg transition shadow-lg text-center">
                            {{ __('ir_tienda') }} <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="" class="bg-transparent hover:bg-gray-100 text-blue-600 border border-blue-600 font-bold py-3 px-6 rounded-lg transition text-center">
                            <i class="far fa-heart mr-2"></i> {{ __('ver_favoritos') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection