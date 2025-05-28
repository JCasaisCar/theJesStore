@extends('layouts.app')

@section('title', 'Mis Pedidos')

@section('content')

<body id="ordersUsersPage">
    <div class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-10 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute top-40 right-20 w-80 h-80 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
            <div class="absolute bottom-10 left-1/3 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
        </div>

        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3csvg width=" 40" height="40" xmlns="http://www.w3.org/2000/svg" %3e%3cdefs%3e%3cpattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse" %3e%3cpath d="m 40 0 l 0 40 m -40 0 l 40 0" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1" /%3e%3c/pattern%3e%3c/defs%3e%3crect width="100%25" height="100%25" fill="url(%23grid)" /%3e%3c/svg%3e')] opacity-30"></div>

        <div class="container mx-auto px-4 py-20 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="w-24 h-24 mx-auto bg-gradient-to-br from-blue-500 to-cyan-500 rounded-3xl flex items-center justify-center mb-8 shadow-2xl">
                    <i class="fas fa-shopping-bag text-white text-3xl"></i>
                </div>

                <h1 class="text-4xl md:text-6xl font-black mb-6 bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                    {{ __('mis_pedidos') }}
                </h1>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                    {{ __('consulta_estado_detalles_tus_pedidos') }}
                </p>

                <div class="flex items-center justify-center text-sm">
                    <a href="{{ route('home') }}" class="text-blue-300 hover:text-white transition-colors duration-300 font-medium flex items-center">
                        <i class="fas fa-home mr-2"></i>{{ __('inicio') }}
                    </a>
                    <div class="mx-3 text-gray-400">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </div>
                    <span class="text-white font-medium">{{ __('mis_pedidos') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-gray-50 via-white to-gray-50 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                @if ($orders->isEmpty())
                <div class="bg-white rounded-3xl shadow-2xl p-12 text-center border border-gray-100">
                    <div class="w-32 h-32 mx-auto bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mb-6 shadow-inner">
                        <i class="fas fa-box-open text-gray-400 text-5xl"></i>
                    </div>
                    <h3 class="text-3xl font-black text-gray-800 mb-4">{{ __('no_pedidos_registrados') }}</h3>
                    <p class="text-lg text-gray-600 mb-8 max-w-md mx-auto">
                        {{ __('empieza_comprar_aquí_aparecerán_pedidos') }}
                    </p>
                    <a href="{{ route('tienda') }}" class="group inline-flex items-center bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                        <i class="fas fa-shopping-cart mr-3"></i>
                        {{ __('ir_tienda') }}
                        <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
                @else
                <div class="space-y-6">
                    @foreach ($orders as $order)
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-2xl">
                        <div class="p-6 md:p-8 bg-gradient-to-r from-gray-50 to-white">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg">
                                            <i class="fas fa-receipt text-white"></i>
                                        </div>
                                        <h3 class="text-2xl font-black text-gray-800">{{ __('pedido') }} #{{ $order->id }}</h3>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-calendar-alt text-gray-400"></i>
                                            <div>
                                                <p class="text-xs text-gray-500">{{ __('fecha') }}</p>
                                                <p class="text-sm font-medium text-gray-700">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-info-circle text-gray-400"></i>
                                            <div>
                                                <p class="text-xs text-gray-500">{{ __('estado') }}</p>
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold
                                                        @if($order->status == 'completed') bg-green-100 text-green-800
                                                        @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                                                        @elseif($order->status == 'pending') bg-yellow-100 text-yellow-800
                                                        @else bg-gray-100 text-gray-800
                                                        @endif">
                                                    @if($order->status == 'completed')
                                                    <i class="fas fa-check-circle mr-1"></i>
                                                    @elseif($order->status == 'processing')
                                                    <i class="fas fa-spinner fa-spin mr-1"></i>
                                                    @elseif($order->status == 'pending')
                                                    <i class="fas fa-clock mr-1"></i>
                                                    @endif
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-truck text-gray-400"></i>
                                            <div>
                                                <p class="text-xs text-gray-500">{{ __('seguimiento') }}</p>
                                                <p class="text-sm font-medium text-gray-700">{{ $order->tracking ?: 'Sin asignar' }}</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-euro-sign text-gray-400"></i>
                                            <div>
                                                <p class="text-xs text-gray-500">{{ __('total') }}</p>
                                                <p class="text-lg font-black bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                                    {{ number_format($order->total, 2) }} €
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button onclick="toggleDetails({{ $order->id }})"
                                    class="group inline-flex items-center bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold py-3 px-6 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                                    <i class="fas fa-eye mr-2"></i>
                                    <span id="toggle-text-{{ $order->id }}">{{ __('ver_detalles') }}</span>
                                    <i id="toggle-icon-{{ $order->id }}" class="fas fa-chevron-down ml-2 transition-transform duration-300"></i>
                                </button>
                            </div>
                        </div>

                        <div id="order-details-{{ $order->id }}" class="hidden border-t border-gray-100">
                            <div class="p-6 md:p-8">
                                <div class="overflow-hidden rounded-2xl shadow-lg mb-6">
                                    <table class="w-full">
                                        <thead>
                                            <tr class="bg-gradient-to-r from-gray-50 to-gray-100 text-gray-700">
                                                <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider">{{ __('producto') }}</th>
                                                <th class="px-6 py-4 text-center text-sm font-bold uppercase tracking-wider">{{ __('cantidad') }}</th>
                                                <th class="px-6 py-4 text-right text-sm font-bold uppercase tracking-wider">{{ __('precio') }}</th>
                                                <th class="px-6 py-4 text-right text-sm font-bold uppercase tracking-wider">{{ __('total') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($order->details as $detail)
                                            <tr class="hover:bg-gray-50 transition-colors">
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center gap-4">
                                                        @if ($detail->product->image)
                                                        <img src="{{ asset('storage/products/' . $detail->product->image) }}"
                                                            alt="{{ $detail->product->name }}"
                                                            class="w-16 h-16 object-cover rounded-xl border border-gray-200 shadow">
                                                        @else
                                                        <div class="w-16 h-16 bg-gray-100 rounded-xl flex items-center justify-center">
                                                            <i class="fas fa-image text-gray-400"></i>
                                                        </div>
                                                        @endif
                                                        <div>
                                                            <p class="font-medium text-gray-900">{{ $detail->product->name }}</p>
                                                            <p class="text-sm text-gray-500">SKU: {{ $detail->product->sku ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 text-center">
                                                    <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-800 rounded-full font-bold">
                                                        {{ $detail->quantity }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 text-right font-medium text-gray-700">
                                                    {{ number_format($detail->price, 2) }} €
                                                </td>
                                                <td class="px-6 py-4 text-right font-bold text-gray-900">
                                                    {{ number_format($detail->quantity * $detail->price, 2) }} €
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                @php
                                $descuento = ($order->subtotal + $order->iva) - $order->total;
                                @endphp

                                <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 border border-gray-100">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                                                <i class="fas fa-credit-card text-blue-600"></i>
                                                {{ __('informacion_pago') }}
                                            </h4>
                                            <div class="space-y-2">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                                                        <i class="fas fa-wallet text-white text-sm"></i>
                                                    </div>
                                                    <div>
                                                        <p class="text-xs text-gray-500">{{ __('metodo_pago') }}</p>
                                                        <p class="font-medium text-gray-800">{{ ucfirst($order->payment_method) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                                                <i class="fas fa-calculator text-blue-600"></i>
                                                {{ __('resumen_pedido') }}
                                            </h4>
                                            <div class="space-y-3">
                                                <div class="flex justify-between items-center">
                                                    <span class="text-gray-600">{{ __('subtotal') }}:</span>
                                                    <span class="font-medium text-gray-800">{{ number_format($order->subtotal, 2) }} €</span>
                                                </div>
                                                <div class="flex justify-between items-center">
                                                    <span class="text-gray-600">IVA (21%):</span>
                                                    <span class="font-medium text-gray-800">{{ number_format($order->iva, 2) }} €</span>
                                                </div>
                                                @if ($descuento > 0)
                                                <div class="flex justify-between items-center">
                                                    <span class="text-green-700 font-medium">{{ __('descuento') }}:</span>
                                                    <span class="font-bold text-green-700">-{{ number_format($descuento, 2) }} €</span>
                                                </div>
                                                @endif
                                                <div class="border-t pt-3">
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-lg font-bold text-gray-800">{{ __('total') }}:</span>
                                                        <span class="text-2xl font-black bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                                            {{ number_format($order->total, 2) }} €
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 flex flex-wrap gap-3 justify-end">

                                    <a href="{{ url('/factura/' . $order->id) }}" target="_blank"
                                        class="group inline-flex items-center bg-white hover:bg-gray-50 text-gray-700 font-bold py-3 px-6 rounded-xl transition-all duration-300 border-2 border-gray-200">
                                        <i class="fas fa-download mr-2"></i>
                                        {{ __('descargar_factura') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
@endsection