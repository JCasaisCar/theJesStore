@extends('layouts.app')
@section('title', __('error.403_titulo'))
@section('content')

<body id="error403-page">
    <div class="relative bg-gradient-to-br from-slate-900 via-red-900 to-orange-900 overflow-hidden min-h-screen flex items-center">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-10 left-10 w-72 h-72 bg-red-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute top-10 right-10 w-72 h-72 bg-orange-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-rose-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
        </div>

        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3csvg width=" 40" height="40" xmlns="http://www.w3.org/2000/svg" %3e%3cdefs%3e%3cpattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse" %3e%3cpath d="m 40 0 l 0 40 m -40 0 l 40 0" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1" /%3e%3c/pattern%3e%3c/defs%3e%3crect width="100%25" height="100%25" fill="url(%23grid)" /%3e%3c/svg%3e')] opacity-30"></div>

        <div class="container mx-auto px-4 py-16 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <!-- Icono de error -->
                <div class="w-32 h-32 mx-auto bg-gradient-to-br from-red-500 to-orange-500 rounded-full flex items-center justify-center mb-8 shadow-2xl animate-bounce-slow">
                    <i class="fas fa-shield-alt text-white text-5xl"></i>
                </div>

                <!-- Código de error -->
                <h1 class="text-8xl md:text-9xl font-black mb-6 bg-gradient-to-r from-white via-red-200 to-orange-200 bg-clip-text text-transparent animate__animated animate__fadeInUp">
                    403
                </h1>

                <!-- Título del error -->
                <h2 class="text-3xl md:text-5xl font-black mb-6 bg-gradient-to-r from-white via-red-200 to-orange-200 bg-clip-text text-transparent animate__animated animate__fadeInUp animate__delay-1s">
                    {{ __('error.403_titulo') }}
                </h2>

                <!-- Descripción del error -->
                <p class="text-xl text-gray-300 mb-12 max-w-2xl mx-auto leading-relaxed animate__animated animate__fadeInUp animate__delay-2s">
                    {{ __('error.403_descripcion') }}
                </p>

                <!-- Línea decorativa -->
                <div class="flex justify-center mb-12 animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="w-24 h-1 bg-gradient-to-r from-red-400 to-orange-400 rounded-full"></div>
                </div>

                <!-- Botones de acción -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-6 animate__animated animate__fadeInUp animate__delay-4s">
                    <a href="{{ route('home') }}" 
                       class="group inline-flex items-center bg-gradient-to-r from-red-600 to-orange-600 hover:from-red-700 hover:to-orange-700 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                        <i class="fas fa-home mr-3 group-hover:bounce"></i>
                        {{ __('error.volver_inicio') }}
                    </a>
                </div>

                <!-- Información adicional -->
                <div class="mt-16 bg-white/5 backdrop-blur-md rounded-3xl p-8 border border-white/10 animate__animated animate__fadeInUp animate__delay-5s">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-info-circle text-white text-2xl"></i>
                        </div>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-white mb-4">{{ __('error.que_significa_esto') }}</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left">
                        <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-red-500 to-rose-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user-slash text-white text-sm"></i>
                                </div>
                                <h4 class="text-lg font-bold text-white">{{ __('error.acceso_denegado') }}</h4>
                            </div>
                            <p class="text-gray-300 leading-relaxed">{{ __('error.acceso_denegado_descripcion') }}</p>
                        </div>

                        <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-amber-500 to-orange-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-key text-white text-sm"></i>
                                </div>
                                <h4 class="text-lg font-bold text-white">{{ __('error.permisos_necesarios') }}</h4>
                            </div>
                            <p class="text-gray-300 leading-relaxed">{{ __('error.permisos_necesarios_descripcion') }}</p>
                        </div>
                    </div>

                    <!-- Contacto de ayuda -->
                    <div class="mt-8 pt-6 border-t border-white/10">
                        <p class="text-gray-300 mb-4">{{ __('error.necesitas_ayuda') }}</p>
                        <a href="{{ route('contacto') }}" 
                           class="group inline-flex items-center bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                            <i class="fas fa-envelope mr-2 group-hover:rotate-12 transition-transform duration-300"></i>
                            {{ __('error.contactar_soporte') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Partículas flotantes decorativas -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-red-400 rounded-full animate-ping opacity-20"></div>
        <div class="absolute top-1/3 right-1/3 w-3 h-3 bg-orange-400 rounded-full animate-pulse opacity-30"></div>
        <div class="absolute bottom-1/4 left-1/3 w-2 h-2 bg-rose-400 rounded-full animate-bounce opacity-25"></div>
        <div class="absolute bottom-1/3 right-1/4 w-1 h-1 bg-yellow-400 rounded-full animate-ping opacity-20"></div>
    </div>
</body>
@endsection