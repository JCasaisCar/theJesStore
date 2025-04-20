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
            <!-- Producto 1 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition hover:shadow-lg">
                <div class="relative">
                    <img src="{{ asset('img/products/smartphone-1.jpg') }}" alt="{{ __('smartphone') }}" class="w-full h-48 object-cover">
                    <button class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-md hover:bg-red-100 transition">
                        <i class="fas fa-heart text-red-500"></i>
                    </button>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-lg">iPhone 14 Pro</h3>
                    <div class="flex items-center mt-1 mb-2">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="text-gray-500 text-sm ml-2">(128)</span>
                    </div>
                    <p class="text-gray-500 text-sm mb-4">256GB, Gris Espacial, 5G</p>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-lg text-blue-700">999€</span>
                        <a href="" class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded-lg transition transform hover:scale-105 text-sm">
                            {{ __('ver_detalles') }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Producto 2 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition hover:shadow-lg">
                <div class="relative">
                    <img src="{{ asset('img/products/headphones-1.jpg') }}" alt="{{ __('auriculares') }}" class="w-full h-48 object-cover">
                    <button class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-md hover:bg-red-100 transition">
                        <i class="fas fa-heart text-red-500"></i>
                    </button>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-lg">AirPods Pro</h3>
                    <div class="flex items-center mt-1 mb-2">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="text-gray-500 text-sm ml-2">(94)</span>
                    </div>
                    <p class="text-gray-500 text-sm mb-4">Cancelación de ruido, Carga inalámbrica</p>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-lg text-blue-700">249€</span>
                        <a href="" class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded-lg transition transform hover:scale-105 text-sm">
                            {{ __('ver_detalles') }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Producto 3 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition hover:shadow-lg">
                <div class="relative">
                    <img src="{{ asset('img/products/smartwatch-1.jpg') }}" alt="{{ __('smartwatch') }}" class="w-full h-48 object-cover">
                    <button class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-md hover:bg-red-100 transition">
                        <i class="fas fa-heart text-red-500"></i>
                    </button>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-lg">Galaxy Watch 5</h3>
                    <div class="flex items-center mt-1 mb-2">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <span class="text-gray-500 text-sm ml-2">(76)</span>
                    </div>
                    <p class="text-gray-500 text-sm mb-4">44mm, Negro, Bluetooth + LTE</p>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-lg text-blue-700">329€</span>
                        <a href="" class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded-lg transition transform hover:scale-105 text-sm">
                            {{ __('ver_detalles') }}
                        </a>
                    </div>
                </div>
            </div>
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

<!-- Recomendaciones personalizadas -->
<div class="bg-white py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-2">{{ __('tambien_podria_gustarte') }}</h2>
        <p class="text-gray-600 text-center mb-8">{{ __('basado_en_tus_favoritos') }}</p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            <!-- Producto recomendado 1 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition hover:scale-105 hover:shadow-lg">
                <div class="relative">
                    <img src="{{ asset('img/products/smartphone-2.jpg') }}" alt="{{ __('smartphone') }}" class="w-full h-32 object-cover">
                    <button class="absolute top-2 right-2 bg-white rounded-full p-1.5 shadow-md hover:bg-red-100 transition">
                        <i class="far fa-heart text-gray-400 text-sm"></i>
                    </button>
                </div>
                <div class="p-3">
                    <h3 class="font-bold text-gray-800 text-sm">Samsung Galaxy S23</h3>
                    <div class="flex items-center mt-1">
                        <span class="font-bold text-blue-700 text-sm">899€</span>
                    </div>
                </div>
            </div>

            <!-- Producto recomendado 2 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition hover:scale-105 hover:shadow-lg">
                <div class="relative">
                    <img src="{{ asset('img/products/tablet-1.jpg') }}" alt="{{ __('tablet') }}" class="w-full h-32 object-cover">
                    <button class="absolute top-2 right-2 bg-white rounded-full p-1.5 shadow-md hover:bg-red-100 transition">
                        <i class="far fa-heart text-gray-400 text-sm"></i>
                    </button>
                </div>
                <div class="p-3">
                    <h3 class="font-bold text-gray-800 text-sm">iPad Air</h3>
                    <div class="flex items-center mt-1">
                        <span class="font-bold text-blue-700 text-sm">649€</span>
                    </div>
                </div>
            </div>

            <!-- Producto recomendado 3 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition hover:scale-105 hover:shadow-lg">
                <div class="relative">
                    <img src="{{ asset('img/products/accessory-1.jpg') }}" alt="{{ __('accesorio') }}" class="w-full h-32 object-cover">
                    <button class="absolute top-2 right-2 bg-white rounded-full p-1.5 shadow-md hover:bg-red-100 transition">
                        <i class="far fa-heart text-gray-400 text-sm"></i>
                    </button>
                </div>
                <div class="p-3">
                    <h3 class="font-bold text-gray-800 text-sm">Apple MagSafe</h3>
                    <div class="flex items-center mt-1">
                        <span class="font-bold text-blue-700 text-sm">49€</span>
                    </div>
                </div>
            </div>

            <!-- Producto recomendado 4 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition hover:scale-105 hover:shadow-lg">
                <div class="relative">
                    <img src="{{ asset('img/products/smartwatch-2.jpg') }}" alt="{{ __('smartwatch') }}" class="w-full h-32 object-cover">
                    <button class="absolute top-2 right-2 bg-white rounded-full p-1.5 shadow-md hover:bg-red-100 transition">
                        <i class="far fa-heart text-gray-400 text-sm"></i>
                    </button>
                </div>
                <div class="p-3">
                    <h3 class="font-bold text-gray-800 text-sm">Apple Watch SE</h3>
                    <div class="flex items-center mt-1">
                        <span class="font-bold text-blue-700 text-sm">279€</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection