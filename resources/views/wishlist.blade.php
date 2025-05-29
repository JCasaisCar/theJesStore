@extends('layouts.app')
@section('title', __('lista_de_deseos')) 
@section('content')

<div class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-10 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
        <div class="absolute top-40 right-20 w-80 h-80 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
        <div class="absolute bottom-10 left-1/3 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
    </div>

    <div class="absolute inset-0 bg-[url('data:image/svg+xml,...')] opacity-30"></div>

    <div class="container mx-auto px-4 py-20 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <div class="w-24 h-24 mx-auto bg-gradient-to-br from-blue-500 to-cyan-500 rounded-3xl flex items-center justify-center mb-8 shadow-2xl">
                <i class="fas fa-heart text-white text-3xl"></i>
            </div>

            <h1 class="text-4xl md:text-6xl font-black mb-6 bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                {{ __('mi_lista_de') }} <span class="text-blue-300">{{ __('deseos') }}</span>
            </h1>

            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                {{ __('guarda_tus_productos_favoritos') }}
            </p>

            <div class="flex items-center justify-center text-sm">
                <a href="{{ route('home') }}" class="text-blue-300 hover:text-white transition-colors duration-300 font-medium flex items-center">
                    <i class="fas fa-home mr-2"></i>{{ __('inicio') }}
                </a>
                <div class="mx-3 text-gray-400">
                    <i class="fas fa-chevron-right text-xs"></i>
                </div>
                <span class="text-white font-medium">{{ __('lista_de_deseos') }}</span>
            </div>
        </div>
    </div>
</div>

<div class="bg-gradient-to-br from-gray-50 via-white to-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-10">
            <div>
                <h2 class="text-3xl font-black text-gray-800 mb-2">{{ __('tus_productos_guardados') }}</h2>
                <p class="text-gray-600 text-lg">{{ __('tienes_x_productos_en_tu_lista', ['count' => $wishlist->count()]) }}</p>
            </div>
            <a href="{{ route('tienda') }}" class="bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold py-3 px-6 rounded-xl transition transform hover:scale-105 mt-4 md:mt-0 shadow-lg">
                <i class="fas fa-shopping-cart mr-2"></i>{{ __('seguir_comprando') }}
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($wishlist as $item)
            @php $product = $item->product; @endphp
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transform transition duration-300">
                <div class="relative">
                    <img src="{{ asset('img/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-52 object-cover">
                </div>
                <div class="p-6">
                    <h3 class="font-black text-gray-800 text-xl mb-1">{{ $product->name }}</h3>
                    <p class="text-gray-500 text-sm mb-1">{{ $product->brand->name ?? '' }}</p>
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($product->description, 60) }}</p>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-lg font-bold text-blue-700">{{ number_format($product->price, 2) }}€</span>
                    </div>
                    <p class="text-sm text-gray-600">
                        @if($product->stock > 0)
                        {{ __('stock_disponible') }}: {{ $product->stock }}
                        @else
                        <span class="text-red-600 font-semibold">{{ __('sin_stock') }}</span>
                        @endif
                    </p>

                    <div class="mt-4 flex gap-2">
                        @if($product->stock > 0)
                        <form action="{{ route('cart.add') }}" method="POST" class="w-full">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-2 px-4 rounded-lg w-full flex items-center justify-center shadow-md">
                                <i class="fas fa-shopping-cart mr-1"></i>{{ __('añadir') }}
                            </button>
                        </form>
                        @else
                        <button type="button" disabled class="bg-gray-400 text-white py-2 px-4 rounded-lg w-full flex items-center justify-center cursor-not-allowed">
                            <i class="fas fa-shopping-cart mr-1"></i> {{ __('sin_stock') }}
                        </button>
                        @endif
                        <form action="{{ route('wishlist.remove', $product->id) }}" method="POST" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-bold py-2 px-4 rounded-lg w-full flex items-center justify-center shadow-md">
                                <i class="fas fa-times mr-1"></i>{{ __('quitar') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center text-gray-600 text-lg">
                {{ __('lista_deseos_vacia') }}
            </div>
            @endforelse
@if($wishlist->hasPages())
<div class="mt-20 flex flex-col items-center space-y-6">
    <div class="text-center">
        <p class="text-gray-600 font-medium">
            Mostrando {{ $wishlist->firstItem() ?? 0 }} - {{ $wishlist->lastItem() ?? 0 }} 
            de {{ $wishlist->total() }} productos guardados
        </p>
    </div>

    <div class="flex items-center justify-center space-x-2">
        @if ($wishlist->onFirstPage())
            <span class="px-4 py-3 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed select-none">
                <i class="fas fa-angle-double-left"></i>
            </span>
        @else
            <a href="{{ $wishlist->url(1) }}" 
               class="px-4 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                <i class="fas fa-angle-double-left"></i>
            </a>
        @endif

        @if ($wishlist->onFirstPage())
            <span class="px-4 py-3 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed select-none">
                <i class="fas fa-angle-left"></i>
            </span>
        @else
            <a href="{{ $wishlist->previousPageUrl() }}" 
               class="px-4 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                <i class="fas fa-angle-left"></i>
            </a>
        @endif

        @foreach ($wishlist->getUrlRange(max(1, $wishlist->currentPage() - 2), min($wishlist->lastPage(), $wishlist->currentPage() + 2)) as $page => $url)
            @if ($page == $wishlist->currentPage())
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

        @if($wishlist->currentPage() < $wishlist->lastPage() - 3)
            <span class="px-3 py-3 text-gray-400 select-none">...</span>
            <a href="{{ $wishlist->url($wishlist->lastPage()) }}" 
               class="px-5 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg font-medium">
                {{ $wishlist->lastPage() }}
            </a>
        @endif

        @if ($wishlist->hasMorePages())
            <a href="{{ $wishlist->nextPageUrl() }}" 
               class="px-4 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                <i class="fas fa-angle-right"></i>
            </a>
        @else
            <span class="px-4 py-3 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed select-none">
                <i class="fas fa-angle-right"></i>
            </span>
        @endif

        @if ($wishlist->hasMorePages())
            <a href="{{ $wishlist->url($wishlist->lastPage()) }}" 
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
            @for($i = 1; $i <= $wishlist->lastPage(); $i++)
                <option value="{{ $wishlist->url($i) }}" {{ $i == $wishlist->currentPage() ? 'selected' : '' }}>
                    {{ $i }}
                </option>
            @endfor
        </select>
    </div>
</div>
@endif
        </div>

        @if($wishlist->isEmpty())
        <div class="mt-12 text-center">
            <div class="bg-white rounded-3xl shadow-xl p-10 max-w-lg mx-auto">
                <div class="w-24 h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-heart-broken text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-black text-gray-800 mb-2">{{ __('lista_deseos_vacia') }}</h3>
                <p class="text-gray-600 mb-6">{{ __('todavia_no_has_añadido_productos') }}</p>
                <a href="{{ route('tienda') }}" class="inline-block bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold py-3 px-6 rounded-xl transition transform hover:scale-105 shadow-lg">
                    {{ __('explorar_productos') }}
                </a>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection