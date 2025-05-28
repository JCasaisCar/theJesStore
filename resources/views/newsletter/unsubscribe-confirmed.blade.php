@extends('layouts.app')
@section('title', __('baja_newsletter'))

@section('content')
<body id="unsubscribe-confirmed">
  

{{-- Hero principal con fondo degradado --}}
<div class="relative bg-gradient-to-br from-red-900 via-pink-900 to-rose-800 overflow-hidden min-h-screen flex items-center">
    {{-- Elementos decorativos en el fondo --}}
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
        <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-red-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-pink-500 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/3 transform -translate-x-1/2 -translate-y-1/2 w-1/5 h-1/5 bg-rose-400 rounded-full blur-2xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-1/6 h-1/4 bg-orange-400 rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 py-12 relative z-10">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                {{-- Tarjeta principal --}}
                <div class="bg-white/95 backdrop-blur-sm shadow-2xl rounded-2xl border border-white/20 overflow-hidden">
                    {{-- Encabezado con degradado --}}
                    <div class="bg-gradient-to-r from-red-600 via-pink-600 to-rose-700 px-6 py-8 text-center">
                        <div class="w-20 h-20 mx-auto bg-white/20 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-user-times text-white text-4xl"></i>
                        </div>
                        <h1 class="text-3xl font-bold text-white mb-2">{{ __('te_has_dado_baja') }}</h1>
                        <p class="text-red-100 text-sm">{{ __('proceso_completado_exitosamente') }}</p>
                    </div>

                    <div class="p-8 text-center">
                        {{-- Mensaje principal --}}
                        <div class="bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 rounded-xl p-6 mb-6">
                            <div class="flex items-center justify-center mb-4">
                                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-envelope-open text-red-600 text-xl"></i>
                                </div>
                            </div>
                            <p class="text-gray-700 text-lg leading-relaxed">
                                {{ __('tu_correo') }} <strong class="text-red-600">{{ $email }}</strong> {{ __('eliminado_newsletter') }}
                            </p>
                        </div>

                        {{-- Información adicional --}}
                        <div class="bg-gray-50 rounded-xl p-4 mb-6">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-info-circle text-blue-500 text-lg mt-0.5"></i>
                                </div>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {{ __('si_error_resuscribirse') }}
                                </p>
                            </div>
                        </div>

                        {{-- Estadísticas o información adicional --}}
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <div class="text-center p-3 bg-white rounded-lg border border-gray-100">
                                <i class="fas fa-check-circle text-green-500 text-xl mb-2 block"></i>
                                <span class="text-xs text-gray-600">{{ __('baja_procesada') }}</span>
                            </div>
                            <div class="text-center p-3 bg-white rounded-lg border border-gray-100">
                                <i class="fas fa-shield-alt text-blue-500 text-xl mb-2 block"></i>
                                <span class="text-xs text-gray-600">{{ __('datos_seguros') }}</span>
                            </div>
                            <div class="text-center p-3 bg-white rounded-lg border border-gray-100">
                                <i class="fas fa-heart text-red-500 text-xl mb-2 block"></i>
                                <span class="text-xs text-gray-600">{{ __('te_extranaremos') }}</span>
                            </div>
                        </div>

                        {{-- Botones de acción --}}
                        <div class="space-y-3">
                            <a href="{{ route('home') }}" 
                               class="w-full bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition transform hover:scale-105 hover:shadow-xl inline-flex items-center justify-center">
                                <i class="fas fa-home mr-2"></i>
                                {{ __('volver_inicio') }}
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Mensaje de despedida --}}
                <div class="text-center mt-6">
                    <p class="text-white/80 text-sm">
                        {{ __('gracias_por_acompanarnos') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Burbujas flotantes decorativas --}}
    <div class="absolute top-20 left-10 w-16 h-16 bg-red-400/20 rounded-full animate-float-slow"></div>
    <div class="absolute top-1/4 right-20 w-12 h-12 bg-pink-400/20 rounded-full animate-float-medium"></div>
    <div class="absolute bottom-20 left-1/4 w-10 h-10 bg-rose-400/20 rounded-full animate-float-fast"></div>
    <div class="absolute bottom-1/3 right-10 w-14 h-14 bg-orange-400/20 rounded-full animate-float-slow"></div>
    <div class="absolute top-1/2 left-1/6 w-8 h-8 bg-red-300/20 rounded-full animate-float-medium"></div>
    <div class="absolute bottom-1/4 left-1/2 w-6 h-6 bg-pink-300/20 rounded-full animate-float-fast"></div>
</div>

</body>
@endsection