@extends('layouts.app')
@section('title', __('correo_no_encontrado'))

@section('content')
<body id="unsubscribe-notfound">
{{-- Hero principal con fondo degradado --}}
<div class="relative bg-gradient-to-br from-yellow-900 via-amber-900 to-orange-800 overflow-hidden min-h-screen flex items-center">
    {{-- Elementos decorativos en el fondo --}}
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
        <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-yellow-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-amber-500 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/3 transform -translate-x-1/2 -translate-y-1/2 w-1/5 h-1/5 bg-orange-400 rounded-full blur-2xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-1/6 h-1/4 bg-yellow-300 rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 py-12 relative z-10">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                {{-- Tarjeta principal --}}
                <div class="bg-white/95 backdrop-blur-sm shadow-2xl rounded-2xl border border-white/20 overflow-hidden">
                    {{-- Encabezado con degradado --}}
                    <div class="bg-gradient-to-r from-yellow-600 via-amber-600 to-orange-700 px-6 py-8 text-center">
                        <div class="w-20 h-20 mx-auto bg-white/20 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-search text-white text-4xl"></i>
                        </div>
                        <h1 class="text-3xl font-bold text-white mb-2">{{ __('correo_no_encontrado') }}</h1>
                        <p class="text-yellow-100 text-sm">{{ __('email_no_registrado') }}</p>
                    </div>

                    <div class="p-8 text-center">
                        {{-- Mensaje principal --}}
                        <div class="bg-gradient-to-r from-yellow-50 to-amber-50 border border-yellow-200 rounded-xl p-6 mb-6">
                            <div class="flex items-center justify-center mb-4">
                                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-exclamation-triangle text-yellow-600 text-xl"></i>
                                </div>
                            </div>
                            <p class="text-gray-700 text-lg leading-relaxed">
                                {{ __('el_correo') }} <strong class="text-amber-600">{{ $email }}</strong> {{ __('no_esta_registrado_newsletter') }}
                            </p>
                        </div>

                        {{-- Opciones disponibles --}}
                        <div class="bg-blue-50 rounded-xl p-4 mb-6">
                            <h3 class="text-sm font-semibold text-blue-800 mb-3">
                                <i class="fas fa-lightbulb mr-1"></i>
                                {{ __('que_puedes_hacer') }}
                            </h3>
                            <ul class="text-xs text-blue-700 space-y-2 text-left">
                                <li class="flex items-center">
                                    <i class="fas fa-check mr-2 text-blue-500"></i>
                                    {{ __('verificar_email_correcto') }}
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check mr-2 text-blue-500"></i>
                                    {{ __('suscribirse_si_deseas') }}
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check mr-2 text-blue-500"></i>
                                    {{ __('contactar_soporte_ayuda') }}
                                </li>
                            </ul>
                        </div>

                        {{-- Estadísticas informativas --}}
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <div class="text-center p-3 bg-white rounded-lg border border-gray-100">
                                <i class="fas fa-database text-blue-500 text-xl mb-2 block"></i>
                                <span class="text-xs text-gray-600">{{ __('busqueda_completa') }}</span>
                            </div>
                            <div class="text-center p-3 bg-white rounded-lg border border-gray-100">
                                <i class="fas fa-shield-alt text-green-500 text-xl mb-2 block"></i>
                                <span class="text-xs text-gray-600">{{ __('privacidad_protegida') }}</span>
                            </div>
                            <div class="text-center p-3 bg-white rounded-lg border border-gray-100">
                                <i class="fas fa-user-plus text-amber-500 text-xl mb-2 block"></i>
                                <span class="text-xs text-gray-600">{{ __('facil_suscripcion') }}</span>
                            </div>
                        </div>

                        {{-- Botones de acción --}}
                        <div class="space-y-3">
                            
                            <a href="{{ route('home') }}" 
                               class="w-full bg-gradient-to-r from-amber-600 to-orange-700 hover:from-amber-700 hover:to-orange-800 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition transform hover:scale-105 hover:shadow-xl inline-flex items-center justify-center">
                                <i class="fas fa-home mr-2"></i>
                                {{ __('volver_inicio') }}
                            </a>

                            <a href="{{ route('contacto') }}" 
                               class="w-full bg-white border-2 border-gray-200 hover:border-blue-300 text-gray-700 hover:text-blue-600 font-semibold py-3 px-6 rounded-xl transition transform hover:scale-105 inline-flex items-center justify-center">
                                <i class="fas fa-headset mr-2"></i>
                                {{ __('contactar_soporte') }}
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Información adicional --}}
                <div class="text-center mt-6">
                    <p class="text-white/80 text-sm">
                        {{ __('necesitas_ayuda') }}
                        <a href="{{ route('faq') }}" class="text-white font-semibold hover:text-yellow-200 transition underline">
                            {{ __('consulta_faq') }}
                        </a>
                    </p>
                </div>

                

    {{-- Burbujas flotantes decorativas --}}
    <div class="absolute top-20 left-10 w-16 h-16 bg-yellow-400/20 rounded-full animate-float-slow"></div>
    <div class="absolute top-1/4 right-20 w-12 h-12 bg-amber-400/20 rounded-full animate-float-medium"></div>
    <div class="absolute bottom-20 left-1/4 w-10 h-10 bg-orange-400/20 rounded-full animate-float-fast"></div>
    <div class="absolute bottom-1/3 right-10 w-14 h-14 bg-yellow-300/20 rounded-full animate-float-slow"></div>
    <div class="absolute top-1/2 left-1/6 w-8 h-8 bg-amber-300/20 rounded-full animate-float-medium"></div>
    <div class="absolute bottom-1/4 left-1/2 w-6 h-6 bg-orange-300/20 rounded-full animate-float-fast"></div>
</div>

</body>
@endsection