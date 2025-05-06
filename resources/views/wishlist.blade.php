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
                <p class="text-gray-600">{{ __('tienes_x_productos_en_tu_lista', ['count' => 3]) }}</p>
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
                <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition hover:shadow-lg">
                    <div class="relative">
                        <img src="{{ asset('img/products/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-gray-800 text-lg">{{ $item->product->name }}</h3>
                        <p class="text-gray-500 text-sm mb-4">{{ Str::limit($item->product->description, 60) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-lg text-blue-700">{{ number_format($item->product->price, 2) }}€</span>
                            <a href="{{ route('tienda') }}" class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded-lg text-sm transition transform hover:scale-105">
                                {{ __('ver_detalles') }}
                            </a>
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