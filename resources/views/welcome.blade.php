@extends('layouts.app') {{-- Extiende la plantilla principal --}}
@section('title', __('inicio')) {{-- Título de la pestaña del navegador --}}
@section('content')

{{-- Hero principal con fondo degradado y animaciones --}}
<div class="relative bg-gradient-to-r from-blue-900 to-blue-700 overflow-hidden">
    <div class="container mx-auto px-4 py-20 md:py-28">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center relative z-10">
            {{-- Sección de texto a la izquierda --}}
            <div class="text-white">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 animate__animated animate__fadeInUp">
                    {{ __('descubre_lo_ultimo') }} <span class="text-blue-300">{{ __('en_tecnologia') }}</span>
                </h1>
                <p class="text-lg md:text-xl mb-8 text-gray-200 animate__animated animate__fadeInUp animate__delay-1s">
                    {{ __('moviles_premium_accesorios') }}
                </p>
                {{-- Botones de llamada a la acción --}}
                <div class="flex flex-wrap gap-4 animate__animated animate__fadeInUp animate__delay-2s">
                    <a href="{{ route('tienda') }}" class="bg-white hover:bg-gray-100 text-blue-800 font-bold py-3 px-6 rounded-lg shadow-lg transition transform hover:scale-105">
                        {{ __('explorar_ahora') }} <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="{{ route('nosotros') }}" class="bg-transparent border border-white text-white hover:bg-white hover:text-blue-800 font-bold py-3 px-6 rounded-lg transition transform hover:scale-105">
                        {{ __('conocenos') }}
                    </a>
                </div>
            </div>

            {{-- Imagen decorativa tipo "mockup" a la derecha (solo en escritorio) --}}
            <div class="hidden md:block relative">
                <div class="relative w-64 h-96 mx-auto z-10">
                    {{-- Simulación de pantalla de móvil con contenido --}}
                    <div class="absolute inset-0 rounded-3xl shadow-2xl bg-black border-4 border-gray-800 transform rotate-3">
                        <div class="absolute inset-2 rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 flex flex-col items-center justify-center text-white text-center p-4">
                            <i class="fas fa-mobile-alt text-5xl mb-3"></i>
                            <p class="text-xl font-bold">TheJesStore</p>
                            <p class="text-sm mt-2">{{ __('calidad_garantizada') }}</p>
                        </div>
                        {{-- Botones decorativos a los lados del móvil --}}
                        <div class="absolute -right-1 top-20 w-1 h-8 bg-gray-500 rounded"></div>
                        <div class="absolute -right-1 top-32 w-1 h-8 bg-gray-500 rounded"></div>
                        <div class="absolute -left-1 top-24 w-1 h-6 bg-gray-500 rounded"></div>
                    </div>
                    {{-- Burbujas flotantes de fondo --}}
                    <div class="absolute -top-4 -right-8 w-16 h-16 bg-blue-500 rounded-full opacity-20 animate-float-slow"></div>
                    <div class="absolute top-20 -left-10 w-12 h-12 bg-purple-500 rounded-full opacity-20 animate-float-medium"></div>
                    <div class="absolute bottom-10 right-0 w-10 h-10 bg-pink-500 rounded-full opacity-20 animate-float-fast"></div>
                </div>
                {{-- Sombra inferior del móvil --}}
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-48 h-8 bg-black opacity-25 rounded-full blur-lg"></div>
            </div>
        </div>

        {{-- Elementos decorativos en el fondo --}}
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
            <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-blue-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-purple-500 rounded-full blur-3xl"></div>
        </div>
    </div>
</div>

{{-- Sección de categorías destacadas --}}
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">{{ __('categorias_destacadas') }}</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto my-4"></div>
            <p class="text-gray-600">{{ __('explora_nuestras_categorias') }}</p>
        </div>

        {{-- Tarjetas de categoría --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($categorias as $categoria)
            <a href="{{ route('tienda', ['category' => $categoria->slug]) }}" class="bg-white rounded-2xl shadow-md overflow-hidden transform transition hover:scale-105 hover:shadow-xl text-center p-6 group">
                <div class="w-16 h-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-4 group-hover:bg-blue-200 transition">
                    <i class="fas fa-tags text-blue-600 text-2xl"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-800 mb-1">{{ __($categoria->name) }}</h3>
                <p class="text-sm text-gray-500">{{ __('explorar_ahora') }}</p>
            </a>
            @endforeach
        </div>

        {{-- Mensaje cuando no hay categorías --}}
        @if ($categorias->isEmpty())
        <p class="text-center text-gray-400 mt-12 italic">
            {{ __('noCategorias') }}
        </p>
        @endif
    </div>
</div>

@endsection