@extends('layouts.app')
@section('title', __('lista_de_deseos'))
@section('content')
<!-- Banner de Encabezado -->
<div class="relative bg-gradient-to-r from-blue-900 to-blue-700 overflow-hidden">
    <div class="container mx-auto px-4 py-10 md:py-16">
        <div class="text-center text-white z-10">
            <h1 class="text-3xl md:text-4xl font-bold mb-3 animate__animated animate__fadeInUp">
                {{ __('mi_lista_de') }} <span class="text-blue-300">{{ __('deseos') }}</span>
            </h1>
            <p class="text-lg mb-4 text-gray-200 animate__animated animate__fadeInUp animate__delay-1s">
                {{ __('guarda_tus_productos_favoritos') }}
            </p>
        </div>
        <!-- Decoraciones de fondo -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
            <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-blue-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-purple-500 rounded-full blur-3xl"></div>
        </div>
    </div>
</div>

<!-- Lista de Deseos -->
<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <!-- Estado de la lista -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">{{ __('tus_productos_guardados') }}</h2>
<p class="text-gray-600">
    {{ __('tienes_x_productos_en_tu_lista', ['count' => $wishlist->count()]) }}
</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('tienda') }}" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-lg transition transform hover:scale-105">
                    <i class="fas fa-shopping-cart mr-2"></i>{{ __('seguir_comprando') }}
                </a>
            </div>
        </div>

        <!-- Lista de productos -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($wishlist as $item)
    @php
        $product = $item->product;
    @endphp
    <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition hover:shadow-lg">
        <div class="relative">
            <img src="{{ asset('img/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
        </div>
        <div class="p-4">
            <h3 class="font-bold text-gray-800 text-lg">{{ $product->name }}</h3>
            <p class="text-gray-500 text-sm mb-2">{{ $product->brand->name ?? '' }}</p>
            <p class="text-gray-600 text-sm mb-2">{{ Str::limit($product->description, 60) }}</p>
            <div class="flex justify-between items-center mb-2">
                <span class="font-bold text-lg text-blue-700">{{ number_format($product->price, 2) }}€</span>
            </div>

            <!-- Mostrar el stock -->
            <p class="text-sm text-gray-600">
                @if($product->stock > 0)
                    {{ __('stock_disponible') }}: {{ $product->stock }}
                @else
                    <span class="text-red-600">{{ __('sin_stock') }}</span>
                @endif
            </p>

            <!-- Acciones -->
            <div class="mt-4 flex gap-2">
                <!-- Añadir al carrito -->
                @if($product->stock > 0)
                    <form action="{{ route('cart.add') }}" method="POST" class="w-full">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg w-full flex items-center justify-center">
                            <i class="fas fa-shopping-cart mr-1"></i> {{ __('añadir') }}
                        </button>
                    </form>
                @else
                    <button type="button" class="bg-gray-400 text-white font-medium py-2 px-4 rounded-lg w-full flex items-center justify-center cursor-not-allowed" disabled>
                        <i class="fas fa-shopping-cart mr-1"></i> {{ __('sin_stock') }}
                    </button>
                @endif

                <!-- Botón para quitar de la wishlist (opcional) -->
                <form action="{{ route('wishlist.remove', $product->id) }}" method="POST" class="w-full">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-lg w-full flex items-center justify-center">
                        <i class="fas fa-times mr-1"></i> {{ __('quitar') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@empty
    <div class="col-span-3 text-center text-gray-600">
        {{ __('lista_deseos_vacia') }}
    </div>
@endforelse
        </div>

        <!-- Lista vacía (condicional) -->
        <div class="hidden bg-white rounded-xl shadow-md p-8 text-center">
            <div class="w-24 h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-heart-broken text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ __('lista_deseos_vacia') }}</h3>
            <p class="text-gray-600 mb-6">{{ __('todavia_no_has_añadido_productos') }}</p>
            <a href="{{ route('tienda') }}" class="inline-block bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105">
                {{ __('explorar_productos') }}
            </a>
        </div>
    </div>
</div>
@endsection