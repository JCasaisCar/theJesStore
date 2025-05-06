@extends('layouts.app')
@section('title', __('datos_envio'))
@section('content')
<body id="addres-page">
<!-- Hero Banner del Envío -->
<div class="relative bg-gradient-to-r from-blue-900 to-blue-700 overflow-hidden">
    <div class="container mx-auto px-4 py-12 md:py-16">
        <div class="text-center text-white z-10 relative">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 animate__animated animate__fadeInUp">
                {{ __('datos_de') }} <span class="text-blue-300">{{ __('envio') }}</span>
            </h1>
            <p class="text-lg max-w-2xl mx-auto mb-6 text-gray-200 animate__animated animate__fadeInUp animate__delay-1s">
                {{ __('envio_descripcion') }}
            </p>
        </div>
        <!-- Decoraciones de fondo -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
            <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-blue-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-purple-500 rounded-full blur-3xl"></div>
        </div>
    </div>
</div>

<!-- Contenido del Formulario de Envío -->
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
                            <div class="bg-blue-600 text-white rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-truck"></i>
                            </div>
                            <p class="text-sm font-bold text-blue-600">{{ __('envio') }}</p>
                            <div class="h-1 bg-blue-600 mt-2"></div>
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

        <!-- Contenido del formulario de envío -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Formulario de datos (2 columnas en desktop) -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                    <div class="bg-gray-50 p-4 border-b">
                        <h2 class="font-bold text-lg text-gray-800">{{ __('informacion_envio') }}</h2>
                    </div>
                    
                    <div class="p-6">
                    <form id="shipping-form" method="POST" action="{{ route('addres.store') }}">
                    @csrf
                            <!-- Datos personales -->
                            <div class="mb-8">
                                <h3 class="text-md font-semibold text-gray-700 mb-4 flex items-center">
                                    <i class="fas fa-user-circle mr-2 text-blue-600"></i>
                                    {{ __('datos_personales') }}
                                </h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">{{ __('nombre') }} *</label>
                                        <input type="text" id="nombre" name="nombre" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                    </div>
                                    
                                    <div>
                                        <label for="apellidos" class="block text-sm font-medium text-gray-700 mb-1">{{ __('apellidos') }} *</label>
                                        <input type="text" id="apellidos" name="apellidos" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                    </div>
                                    
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('email') }} *</label>
                                        <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                    </div>
                                    
                                    <div>
                                        <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">{{ __('telefono') }} *</label>
                                        <input type="tel" id="telefono" name="telefono" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Dirección de envío -->
                            <div class="mb-8">
                                <h3 class="text-md font-semibold text-gray-700 mb-4 flex items-center">
                                    <i class="fas fa-map-marker-alt mr-2 text-blue-600"></i>
                                    {{ __('direccion_envio') }}
                                </h3>
                                
                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <label for="direccion" class="block text-sm font-medium text-gray-700 mb-1">{{ __('direccion') }} *</label>
                                        <input type="text" id="direccion" name="direccion" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                    </div>
                                    
                                    <div>
                                        <label for="direccion2" class="block text-sm font-medium text-gray-700 mb-1">{{ __('direccion_adicional') }}</label>
                                        <input type="text" id="direccion2" name="direccion2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                        <div>
                                            <label for="ciudad" class="block text-sm font-medium text-gray-700 mb-1">{{ __('ciudad') }} *</label>
                                            <input type="text" id="ciudad" name="ciudad" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                        </div>
                                        
                                        <div>
                                            <label for="provincia" class="block text-sm font-medium text-gray-700 mb-1">{{ __('provincia') }} *</label>
                                            <input type="text" id="provincia" name="provincia" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                        </div>
                                        
                                        <div>
                                            <label for="codigo_postal" class="block text-sm font-medium text-gray-700 mb-1">{{ __('codigo_postal') }} *</label>
                                            <input type="text" id="codigo_postal" name="codigo_postal" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label for="pais" class="block text-sm font-medium text-gray-700 mb-1">{{ __('pais') }} *</label>
                                        <select id="pais" name="pais" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                            <option value="">{{ __('selecciona_pais') }}</option>
                                            <option value="ES">España</option>
                                            <option value="PT">Portugal</option>
                                            <option value="FR">Francia</option>
                                            <option value="IT">Italia</option>
                                            <option value="DE">Alemania</option>
                                            <!-- Más países -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Opciones de envío -->
                            <div class="mb-8">
                                <h3 class="text-md font-semibold text-gray-700 mb-4 flex items-center">
                                    <i class="fas fa-shipping-fast mr-2 text-blue-600"></i>
                                    {{ __('metodo_envio') }}
                                </h3>
                                
                                <div class="space-y-4">
                                    @foreach ($shippingMethods as $method)
                                        <div class="border border-gray-300 rounded-lg p-4 hover:border-blue-600 cursor-pointer transition" data-envio-container>
                                            <div class="flex items-center">
                                                <input type="radio" id="envio-{{ $method->id }}" name="shipping_method_id" value="{{ $method->id }}"
                                                    class="text-blue-600 focus:ring-blue-600 mr-3" {{ $loop->first ? 'checked' : '' }}>
                                                <label for="envio-{{ $method->id }}" class="flex-1 cursor-pointer">
                                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                                        <div>
                                                            <p class="font-medium text-gray-800">{{ $method->nombre }}</p>
                                                            <p class="text-sm text-gray-600">{{ $method->descripcion }}</p>
                                                        </div>
                                                        <div class="mt-2 md:mt-0">
                                                            <span class="font-bold text-blue-600">{{ number_format($method->precio, 2) }} €</span>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            
                            <!-- Notas adicionales -->
                            <div class="mb-8">
                                <h3 class="text-md font-semibold text-gray-700 mb-4 flex items-center">
                                    <i class="fas fa-sticky-note mr-2 text-blue-600"></i>
                                    {{ __('notas_adicionales') }}
                                </h3>
                                
                                <div>
                                    <label for="notas" class="block text-sm font-medium text-gray-700 mb-1">{{ __('notas_pedido') }}</label>
                                    <textarea id="notas" name="notas" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition" placeholder="{{ __('instrucciones_entrega') }}"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Botones de acción -->
                    <div class="bg-gray-50 p-4 sm:p-6 flex flex-wrap gap-3 justify-between items-center">
                        <a href="{{ route('cart') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition">
                            <i class="fas fa-arrow-left mr-2"></i>
                            {{ __('volver_carrito') }}
                        </a>
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
                        <!-- Resumen de productos -->
                        <div class="mb-6">
                        <h3 class="text-sm font-medium text-gray-700 mb-3">{{ __('productos') }} ({{ $cart->items->count() }})</h3>
                            <div class="space-y-3">
                                @foreach ($cart->items as $item)
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gray-100 rounded-md overflow-hidden mr-3">
                                            <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                        </div>
                                        <div class="flex-1 text-sm">
                                            <p class="text-gray-800 truncate">{{ $item->product->name }}</p>
                                            <p class="text-gray-500">{{ $item->quantity }} x {{ number_format($item->product->price, 2) }} €</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Subtotal, envío, descuentos -->
                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between">
                                <span class="text-gray-600">{{ __('subtotal') }}</span>
                                <span class="font-medium">{{ number_format($subtotal, 2) }} €</span>
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
                                <span class="font-bold text-blue-600">{{ number_format($total, 2) }} €</span>
                            </div>
                        </div>
                                
                        <!-- Botón de continuar al pago -->
                        <button type="submit" form="shipping-form" class="block w-full bg-gradient-to-r from-blue-800 to-blue-600 hover:from-blue-700 hover:to-blue-500 text-white font-bold py-3 px-6 rounded-lg transition shadow-lg text-center">
                            {{ __('continuar_al_pago') }} <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                        
                        <!-- Garantías -->
                        <div class="mt-6 text-center">
                            <p class="text-sm text-gray-500 flex items-center justify-center">
                                <i class="fas fa-lock mr-2"></i>
                                {{ __('informacion_segura') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection