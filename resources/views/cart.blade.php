@extends('layouts.app')
@section('title', __('carrito_compra'))
@section('content')

<body id="cartPage">
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
                    <i class="fas fa-shopping-cart text-white text-3xl"></i>
                </div>

                <h1 class="text-4xl md:text-6xl font-black mb-6 bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                    {{ __('tu_carrito') }} <span class="text-blue-100">{{ __('de_compra') }}</span>
                </h1>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                    {{ __('carrito_descripcion') }}
                </p>

                <div class="flex items-center justify-center text-sm">
                    <a href="{{ route('home') }}" class="text-blue-300 hover:text-white transition-colors duration-300 font-medium flex items-center">
                        <i class="fas fa-home mr-2"></i>{{ __('inicio') }}
                    </a>
                    <div class="mx-3 text-gray-400">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </div>
                    <span class="text-white font-medium">{{ __('carrito') }}</span>
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
                            @foreach (['carrito', 'envio', 'pago', 'confirmacion'] as $step)
                            <div class="flex-1 text-center">
                                <div class="rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2 
                                    {{ $loop->first ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-500' }}">
                                    <i class="fas fa-{{ ['shopping-cart','truck','credit-card','check'][$loop->index] }}"></i>
                                </div>
                                <p class="text-sm {{ $loop->first ? 'font-bold text-blue-600' : 'text-gray-500' }}">{{ __($step) }}</p>
                                <div class="h-1 {{ $loop->first ? 'bg-blue-600' : 'bg-gray-200' }} mt-2"></div>
                            </div>
                            @if (!$loop->last)
                            <div class="w-1/6 h-1 bg-gray-300"></div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div id="cart-content">
                <div id="cart-with-items">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div class="lg:col-span-2">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                                <div class="bg-gray-50 p-4 border-b">
                                    <h2 class="font-bold text-lg text-gray-800">{{ __('productos_en_carrito') }}</h2>
                                </div>
                                <div class="divide-y divide-gray-200">
                                    @foreach($items as $item)
                                    <div class="p-4 sm:p-6">
                                        <div class="flex flex-col sm:flex-row">
                                            <div class="mb-4 sm:mb-0 sm:mr-6">
                                                <div class="w-24 h-24 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center">
                                                    <img src="{{ asset('storage/products/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="object-cover w-full h-full">
                                                </div>
                                            </div>
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
                                                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="inline">
                                                            @csrf
                                                            <input type="hidden" name="action" value="decrease">
                                                            <button type="submit" class="px-2 py-1 bg-gray-200 rounded">-</button>
                                                        </form>
                                                        <input type="number" value="{{ $item->quantity }}" readonly class="w-12 text-center border rounded">
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
@if($items->hasPages())
<div class="mt-8 flex flex-col items-center space-y-6 px-4">
    <div class="text-center">
        <p class="text-gray-600 font-medium">
            Mostrando {{ $items->firstItem() ?? 0 }} - {{ $items->lastItem() ?? 0 }} 
            de {{ $items->total() }} productos en tu carrito
        </p>
    </div>

    <div class="flex items-center justify-center space-x-2 flex-wrap">
        @if ($items->onFirstPage())
            <span class="px-4 py-3 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed select-none">
                <i class="fas fa-angle-double-left"></i>
            </span>
        @else
            <a href="{{ $items->url(1) }}" 
               class="px-4 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                <i class="fas fa-angle-double-left"></i>
            </a>
        @endif

        @if ($items->onFirstPage())
            <span class="px-4 py-3 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed select-none">
                <i class="fas fa-angle-left"></i>
            </span>
        @else
            <a href="{{ $items->previousPageUrl() }}" 
               class="px-4 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                <i class="fas fa-angle-left"></i>
            </a>
        @endif

        @foreach ($items->getUrlRange(max(1, $items->currentPage() - 2), min($items->lastPage(), $items->currentPage() + 2)) as $page => $url)
            @if ($page == $items->currentPage())
                <span class="px-5 py-3 text-white bg-gradient-to-r from-blue-600 to-cyan-600 rounded-xl font-bold shadow-lg transform scale-110 border-2 border-blue-300">
                    {{ $page }}
                </span>
            @else
                <a href="{{ $url }}" 
                   class="px-5 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg font-medium">
                    {{ $page }}
                </a>
            @endif
        @endforeach

        @if($items->currentPage() < $items->lastPage() - 3)
            <span class="px-3 py-3 text-gray-400 select-none">...</span>
            <a href="{{ $items->url($items->lastPage()) }}" 
               class="px-5 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg font-medium">
                {{ $items->lastPage() }}
            </a>
        @endif

        @if ($items->hasMorePages())
            <a href="{{ $items->nextPageUrl() }}" 
               class="px-4 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                <i class="fas fa-angle-right"></i>
            </a>
        @else
            <span class="px-4 py-3 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed select-none">
                <i class="fas fa-angle-right"></i>
            </span>
        @endif

        @if ($items->hasMorePages())
            <a href="{{ $items->url($items->lastPage()) }}" 
               class="px-4 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                <i class="fas fa-angle-double-right"></i>
            </a>
        @else
            <span class="px-4 py-3 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed select-none">
                <i class="fas fa-angle-double-right"></i>
            </span>
        @endif
    </div>

    <div class="flex items-center space-x-4">
        <span class="text-gray-500 text-sm font-medium">Ir a página:</span>
        <select onchange="window.location.href=this.value" 
                class="px-3 py-2 bg-white border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300 text-sm font-medium">
            @for($i = 1; $i <= $items->lastPage(); $i++)
                <option value="{{ $items->url($i) }}" {{ $i == $items->currentPage() ? 'selected' : '' }}>
                    {{ $i }}
                </option>
            @endfor
        </select>
    </div>
</div>
@endif
                                </div>
                                <div class="bg-gray-50 p-4 sm:p-6 flex flex-wrap gap-3 justify-between items-center">
                                    <a href="{{ route('tienda') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition">
                                        <i class="fas fa-arrow-left mr-2"></i>{{ __('seguir_comprando') }}
                                    </a>
                                    <form action="{{ route('cart.clear') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition inline-flex items-center">
                                            <i class="far fa-trash-alt mr-2"></i>{{ __('vaciar_carrito') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-1">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden sticky top-24">
                                <div class="bg-gray-50 p-4 border-b">
                                    <h2 class="font-bold text-lg text-gray-800">{{ __('resumen_compra') }}</h2>
                                </div>
                                <div class="p-4 sm:p-6">
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

                                        @if(isset($codigo) && $descuento > 0)
                                        <div class="flex justify-between text-green-700 font-medium">
                                            <span>{{ __('cupón_aplicado') }} ({{ $codigo }})</span>
                                            <span>-{{ number_format($descuento, 2) }} €</span>
                                        </div>
                                        @endif

                                        <div class="pt-3 border-t border-gray-200 flex justify-between">
                                            <span class="font-bold text-gray-800">{{ __('total') }}</span>
                                            <span class="font-bold text-blue-600">{{ number_format($totalFinal, 2) }} €</span>
                                        </div>
                                    </div>

                                    <form action="{{ route('cart.applyCoupon') }}" method="POST" class="mb-6">
                                        @csrf
                                        <label for="coupon" class="block text-sm font-medium text-gray-700 mb-2">{{ __('codigo_promocional') }}</label>
                                        <div class="flex">
                                            <input type="text" name="coupon" id="coupon" placeholder="{{ __('introduce_codigo') }}"
                                                class="flex-1 px-4 py-2 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition"
                                                value="{{ old('coupon', $codigo ?? '') }}">
                                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r-lg transition">
                                                {{ __('aplicar') }}
                                            </button>
                                        </div>
                                    </form>

                                    <a href="{{ route('addres') }}" class="block w-full bg-gradient-to-r from-blue-800 to-blue-600 hover:from-blue-700 hover:to-blue-500 text-white font-bold py-3 px-6 rounded-lg transition shadow-lg text-center">
                                        {{ __('siguiente') }} <i class="fas fa-arrow-right ml-2"></i>
                                    </a>

                                    <div class="mt-6 text-center">
                                        <p class="text-sm text-gray-500 flex items-center justify-center">
                                            <i class="fas fa-lock mr-2"></i> {{ __('pago_seguro') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <a href="#" class="bg-transparent hover:bg-gray-100 text-blue-600 border border-blue-600 font-bold py-3 px-6 rounded-lg transition text-center">
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