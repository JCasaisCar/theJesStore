@extends('layouts.app')
@section('title', __('inicio'))
@section('content')
<!-- Hero Banner con Animación -->
<div class="relative bg-gradient-to-r from-blue-900 to-blue-700 overflow-hidden">
    <div class="container mx-auto px-4 py-16 md:py-24">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Texto del banner -->
            <div class="text-white z-10">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 animate__animated animate__fadeInUp">
                    {{ __('descubre_lo_ultimo') }} <span class="text-blue-300">{{ __('en_tecnologia') }}</span>
                </h1>
                <p class="text-lg mb-6 text-gray-200 animate__animated animate__fadeInUp animate__delay-1s">
                    {{ __('moviles_premium_accesorios') }}
                </p>
                <div class="flex flex-wrap gap-4 animate__animated animate__fadeInUp animate__delay-2s">
                    <a href="{{ route('tienda') }}" class="bg-white hover:bg-gray-100 text-blue-800 font-bold py-3 px-6 rounded-lg transition shadow-lg transform hover:scale-105">
                        {{ __('explorar_ahora') }} <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="{{ route('nosotros') }}" class="bg-transparent hover:bg-blue-600 text-white border border-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105">
                        {{ __('conocenos') }}
                    </a>
                </div>
            </div>
            <!-- Animación del móvil -->
            <div class="hidden md:block relative h-full">
                <div class="phone-animation relative w-64 h-96 mx-auto z-10">
                    <!-- Móvil base -->
                    <div class="absolute inset-0 bg-black rounded-3xl shadow-2xl transform rotate-3 border-4 border-gray-800">
                        <!-- Pantalla -->
                        <div class="absolute inset-2 bg-gradient-to-br from-blue-400 to-purple-600 rounded-2xl overflow-hidden flex items-center justify-center">
                            <div class="text-center text-white">
                                <i class="fas fa-mobile-alt text-4xl mb-2"></i>
                                <p class="font-bold">TheJesStore</p>
                                <p class="text-xs mt-2">{{ __('calidad_garantizada') }}</p>
                            </div>
                        </div>
                        <!-- Botones laterales -->
                        <div class="absolute -right-1 top-20 w-1 h-8 bg-gray-600 rounded"></div>
                        <div class="absolute -right-1 top-32 w-1 h-8 bg-gray-600 rounded"></div>
                        <div class="absolute -left-1 top-24 w-1 h-6 bg-gray-600 rounded"></div>
                    </div>
                    <!-- Elementos flotantes decorativos -->
                    <div class="absolute -top-4 -right-8 w-16 h-16 bg-blue-500 rounded-full opacity-20 animate-float-slow"></div>
                    <div class="absolute top-20 -left-10 w-12 h-12 bg-purple-500 rounded-full opacity-20 animate-float-medium"></div>
                    <div class="absolute bottom-10 right-0 w-10 h-10 bg-pink-500 rounded-full opacity-20 animate-float-fast"></div>
                </div>
                <!-- Sombra bajo el móvil -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-48 h-8 bg-black opacity-20 rounded-full blur-md"></div>
            </div>
        </div>
        <!-- Decoraciones de fondo -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
            <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-blue-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-purple-500 rounded-full blur-3xl"></div>
        </div>
    </div>
</div>

<!-- Categorías destacadas -->
<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-2">{{ __('categorias_destacadas') }}</h2>
        <p class="text-gray-600 text-center mb-8">{{ __('explora_nuestras_categorias') }}</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
            @foreach ($categorias as $categoria)
                <a href="{{ route('categoria', $categoria->slug) }}" class="bg-white rounded-xl shadow-md overflow-hidden transform transition hover:scale-105 hover:shadow-lg">
                    <div class="p-4 text-center">
                        <div class="w-16 h-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-3">
                            <i class="fas fa-tags text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800">{{ __($categoria->name) }}</h3>
                        <p class="text-sm text-gray-500 mt-1">{{ __('explorar_ahora') }}</p>
                    </div>
                </a>
            @endforeach
        </div>

        @if ($categorias->isEmpty())
            <p class="text-center text-gray-400 mt-8 italic">
                {{ __('noCategorias') }}
            </p>
        @endif
    </div>
</div>
@endsection