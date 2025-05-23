@extends('layouts.app')
@section('title', __('confirmacion'))
@section('content')
<!-- Cabecera Premium de Confirmación -->
<div class="relative bg-gradient-to-br from-green-900 via-emerald-800 to-teal-800 overflow-hidden">
    <!-- Efectos visuales de fondo -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-10 w-96 h-96 bg-green-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
        <div class="absolute top-40 right-20 w-80 h-80 bg-teal-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
        <div class="absolute bottom-10 left-1/3 w-72 h-72 bg-emerald-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
    </div>

    <!-- Patrón de cuadrícula -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3csvg width=\"40\" height=\"40\" xmlns=\"http://www.w3.org/2000/svg\"%3e%3cdefs%3e%3cpattern id=\"grid\" width=\"40\" height=\"40\" patternUnits=\"userSpaceOnUse\"%3e%3cpath d=\"m 40 0 l 0 40 m -40 0 l 40 0\" fill=\"none\" stroke=\"rgba(255,255,255,0.05)\" stroke-width=\"1\"/%3e%3c/pattern%3e%3c/defs%3e%3crect width=\"100%25\" height=\"100%25\" fill=\"url(%23grid)\" /%3e%3c/svg%3e')] opacity-30"></div>

    <div class="container mx-auto px-4 py-20 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Icono -->
            <div class="w-24 h-24 mx-auto bg-gradient-to-br from-green-400 to-teal-400 rounded-3xl flex items-center justify-center mb-8 shadow-2xl">
                <i class="fas fa-check-circle text-white text-3xl"></i>
            </div>
            <h1 class="text-4xl md:text-6xl font-black mb-6 bg-gradient-to-r from-white via-green-200 to-teal-200 bg-clip-text text-transparent">
                {{ __('confirmacion_de') }} {{ __('pedido') }}
            </h1>
            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                {{ __('confirmacion_descripcion') }}
            </p>

            <!-- Breadcrumb -->
            <div class="flex items-center justify-center text-sm">
                <a href="{{ route('home') }}" class="text-green-200 hover:text-white transition-colors duration-300 font-medium flex items-center">
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
                <div class="mx-3 text-gray-400">
                    <i class="fas fa-chevron-right text-xs"></i>
                </div>
                <span class="text-white font-medium">{{ __('confirmacion') }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Contenido de la Confirmación -->
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
                            <div class="bg-gray-200 text-gray-500 rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-check text-blue-600"></i>
                            </div>
                            <p class="text-sm text-gray-500">{{ __('pago') }}</p>
                            <div class="h-1 bg-gray-200 mt-2"></div>
                        </div>
                        <!-- Línea de conexión -->
                        <div class="w-1/6 h-1 bg-blue-600"></div>
                        <!-- Paso 4: Confirmación -->
                        <div class="flex-1 text-center">
                            <div class="bg-green-600 text-white rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-check"></i>
                            </div>
                            <p class="text-sm font-bold text-green-600">{{ __('confirmacion') }}</p>
                            <div class="h-1 bg-green-600 mt-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mensaje de éxito -->
        <div class="mb-12 text-center">
            <div class="inline-flex items-center justify-center w-24 h-24 bg-green-100 rounded-full mb-6">
                <i class="fas fa-check-circle text-5xl text-green-600"></i>
            </div>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3">{{ __('gracias_por_compra') }}</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                {{ __('pedido_recibido') }}
            </p>
        </div>

        <!-- Contenido de la confirmación -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Detalles del pedido (2 columnas en desktop) -->
            <div class="lg:col-span-2">
                <!-- Número de pedido y detalles -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                    <div class="bg-gray-50 p-4 border-b">
                        <h2 class="font-bold text-lg text-gray-800">{{ __('detalles_pedido') }}</h2>
                    </div>
                    
                    <div class="p-6">
                        <!-- Información del pedido -->
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-8">
                            <div class="flex flex-col md:flex-row md:justify-between">
                                <div class="mb-4 md:mb-0">
                                    <p class="text-sm text-gray-600">{{ __('numero_pedido') }}</p>
                                    <p class="font-bold text-gray-800">#{{ $order->id }}</p>
                                </div>
                                <div class="mb-4 md:mb-0">
                                    <p class="text-sm text-gray-600">{{ __('fecha') }}</p>
                                    <p class="font-bold text-gray-800">{{ $order->created_at->format('d/m/Y') }}</p>
                                </div>
                                <div class="mb-4 md:mb-0">
                                    <p class="text-sm text-gray-600">{{ __('estado') }}</p>
                                    <div class="flex items-center">
                                        <span class="inline-block w-2 h-2 bg-green-600 rounded-full mr-2"></span>
                                        <span class="font-bold text-green-600">{{ __('confirmado') }}</span>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">{{ __('pago') }}</p>
                                    <p class="font-bold text-gray-800">{{ ucfirst($order->payment_method) }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Productos comprados -->
                        <div class="mb-8">
                            <h3 class="text-md font-semibold text-gray-700 mb-4 flex items-center">
                                <i class="fas fa-box-open mr-2 text-blue-600"></i>
                                {{ __('productos_comprados') }}
                            </h3>
                            
                            <div class="border border-gray-200 rounded-lg overflow-hidden">
                                <table class="w-full">
                                    <thead class="bg-gray-50 border-b border-gray-200">
                                        <tr>
                                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('producto') }}</th>
                                            <th class="py-3 px-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('cantidad') }}</th>
                                            <th class="py-3 px-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('precio') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($order->details as $detail)
                                            <tr>
                                                <td class="py-4 px-4">
                                                    <div class="flex items-center">
                                                        <div class="w-12 h-12 bg-gray-100 rounded mr-3 overflow-hidden">
                                                        <img src="{{ asset('storage/products/' . $detail->product->image) }}" alt="{{ $detail->product->name }}" class="object-cover w-full h-full">
                                                        </div>
                                                        <div>
                                                            <p class="font-medium text-gray-800">{{ $detail->product->name }}</p>
                                                            <p class="text-xs text-gray-500">SKU: {{ $detail->product->id }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-4 text-center text-gray-800">{{ $detail->quantity }}</td>
                                                <td class="py-4 px-4 text-right font-medium text-gray-800">{{ number_format($detail->price, 2) }} €</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Dirección de envío -->
                        <div class="mb-8">
                            <h3 class="text-md font-semibold text-gray-700 mb-4 flex items-center">
                                <i class="fas fa-shipping-fast mr-2 text-blue-600"></i>
                                {{ __('direccion_envio') }}
                            </h3>
                            
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <p class="font-medium text-gray-800">{{ $shippingAddress->nombre }} {{ $shippingAddress->apellidos }}</p>
                                <p class="text-gray-600">{{ $shippingAddress->direccion }}, {{ $shippingAddress->codigo_postal }}</p>
                                <p class="text-gray-600">{{ $shippingAddress->ciudad }}, {{ $shippingAddress->provincia }}</p>
                                <p class="text-gray-600">{{ $shippingAddress->pais }}</p>
                            </div>
                        </div>

                        <!-- Seguimiento de envío -->
                        <div class="mb-8">
                            <h3 class="text-md font-semibold text-gray-700 mb-4 flex items-center">
                                <i class="fas fa-truck mr-2 text-blue-600"></i>
                                {{ __('seguimiento_envio') }}
                            </h3>
                            
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div class="mb-4 md:mb-0">
                                        <p class="text-sm text-gray-600">{{ __('estado_envio') }}</p>
                                        <p class="font-medium text-gray-800">{{ __('preparando_envio') }}</p>
                                    </div>
                                    <div class="mb-4 md:mb-0">
                                        <p class="text-sm text-gray-600">{{ __('metodo_envio') }}</p>
                                        <p class="font-medium text-gray-800">{{ $order->shippingAddress?->shippingMethod?->nombre ?? __('desconocido') }}</p>                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">{{ __('fecha_estimada') }}</p>
                                        <p class="font-medium text-gray-800">{{ now()->addDays(5)->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                                
                                
                                <div class="mt-4 pt-4 border-t border-gray-200">
                                    <p class="text-sm text-gray-600">{{ __('codigo_seguimiento') }}</p>
                                    <div class="flex justify-between items-center mt-1">
                                        <p class="font-medium text-gray-800"></p>
                                        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                            {{ __('seguir_paquete') }} <i class="fas fa-external-link-alt ml-1"></i>
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                            <a href="{{ route('orders.index') }}" class="flex-1 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium py-3 px-6 rounded-lg transition focus:outline-none focus:ring-4 focus:ring-blue-300 text-center">
                                <i class="fas fa-clipboard-list mr-2"></i> {{ __('ver_mis_pedidos') }}
                            </a>
                            <a href="/tienda" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition focus:outline-none focus:ring-4 focus:ring-blue-300 text-center">
                                <i class="fas fa-shopping-bag mr-2"></i> {{ __('seguir_comprando') }}
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Soporte al cliente -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-6 lg:mb-0">
                    <div class="p-4">
                        <div class="flex items-center space-x-4">
                            <div class="text-blue-600">
                                <i class="fas fa-headset text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-800">{{ __('soporte_cliente') }}</h3>
                                <p class="text-sm text-gray-600">{{ __('soporte_cliente_descripcion') }}</p>
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
                        <!-- Subtotal -->
<div class="flex justify-between py-2">
    <span class="text-gray-600">{{ __('subtotal') }}</span>
    <span class="font-medium text-gray-800">{{ number_format($order->subtotal, 2) }} €</span>
</div>

<!-- Envío -->
<div class="flex justify-between py-2">
    <span class="text-gray-600">{{ __('envio') }}</span>
    <span class="font-medium text-gray-800">
    {{ number_format($order->shippingAddress?->shippingMethod?->precio ?? 0, 2) }} €
</span>
</div>

<!-- IVA -->
<div class="flex justify-between py-2">
    <span class="text-gray-600">{{ __('impuestos') }}</span>
    <span class="font-medium text-gray-800">{{ number_format($order->iva, 2) }} €</span>
</div>

@if($order->subtotal + $order->iva > $order->total)
@php
    $descuento = ($order->subtotal + $order->iva) - $order->total;
@endphp
<div class="flex justify-between py-2">
    <span class="text-green-600">{{ __('descuento') }}</span>
    <span class="font-medium text-green-600">-{{ number_format($descuento, 2) }} €</span>
</div>
@endif

<!-- Total -->
<div class="flex justify-between py-3 border-t border-gray-200 mt-2">
    <span class="font-bold text-gray-800">{{ __('total') }}</span>
    <span class="font-bold text-blue-600 text-xl">{{ number_format($order->total, 2) }} €</span>
</div>
                            
                            
                            
                            
                            
                            
                        </div>
                        
                        <!-- Factura -->
                        <div class="pt-4 border-t border-gray-100">
                            <a href="{{ route('invoice.download', $order->id) }}" class="text-blue-600 hover:text-blue-800 flex items-center justify-center w-full py-3 border border-blue-600 rounded-lg transition-colors">
                                <i class="fas fa-file-invoice mr-2"></i>
                                {{ __('descargar_factura') }}
                            </a>
                        </div>
                        
                        <!-- Enlaces de ayuda -->
                        <div class="pt-4 border-t border-gray-100">
                            <div class="flex flex-col space-y-3 text-sm">
                                <a href="#" class="text-blue-600 hover:underline flex items-center">
                                    <i class="fas fa-question-circle mr-2"></i>
                                    {{ __('preguntas_frecuentes') }}
                                </a>
                                <a href="#" class="text-blue-600 hover:underline flex items-center">
                                    <i class="fas fa-exchange-alt mr-2"></i>
                                    {{ __('politica_devoluciones') }}
                                </a>
                                <a href="#" class="text-blue-600 hover:underline flex items-center">
                                    <i class="fas fa-envelope mr-2"></i>
                                    {{ __('contactar_soporte') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Email de confirmación -->
<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4 text-center">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 max-w-xl mx-auto">
            <i class="fas fa-envelope text-3xl text-blue-600 mb-4"></i>
            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ __('email_confirmacion') }}</h3>
            <p class="text-gray-600 mb-4">{{ __('email_confirmacion_descripcion') }}</p>
            
            <div class="py-3 px-4 bg-gray-50 rounded-lg text-center">
                <p class="font-medium text-gray-800"></p>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->
<div class="bg-blue-600 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h3 class="text-2xl font-bold text-white mb-3">{{ __('unete_newsletter') }}</h3>
            <p class="text-blue-100 mb-6">{{ __('newsletter_descripcion') }}</p>
            
            <form class="flex flex-col md:flex-row gap-3 max-w-lg mx-auto">
                <input type="email" placeholder="{{ __('tu_email') }}" class="flex-1 py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                <button type="submit" class="bg-white hover:bg-gray-100 text-blue-600 font-medium py-3 px-6 rounded-lg transition focus:outline-none focus:ring-4 focus:ring-blue-300">
                    {{ __('suscribirme') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection