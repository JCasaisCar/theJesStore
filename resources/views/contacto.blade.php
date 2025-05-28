@extends('layouts.app')
@section('title', __('contacto'))
@section('content')

<body id="contactoPage">

    <div class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-10 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute top-40 right-20 w-80 h-80 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
            <div class="absolute bottom-10 left-1/3 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
        </div>

        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3csvg width=" 40" height="40" xmlns="http://www.w3.org/2000/svg" %3e%3cdefs%3e%3cpattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse" %3e%3cpath d="m 40 0 l 0 40 m -40 0 l 40 0" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1" /%3e%3c/pattern%3e%3c/defs%3e%3crect width="100%25" height="100%25" fill="url(%23grid)" /%3e%3c/svg%3e')] opacity-30"></div>

        <div class="container mx-auto px-4 py-20 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="w-24 h-24 mx-auto bg-gradient-to-br from-blue-500 to-cyan-500 rounded-3xl flex items-center justify-center mb-8 shadow-2xl animate-bounce-slow">
                    <i class="fas fa-headset text-white text-3xl"></i>
                </div>

                <h1 class="text-4xl md:text-6xl font-black mb-6 animate__animated animate__fadeInUp">
                    <span class="bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                        {{ __('contactanos') }}
                    </span>
                    <span class="bg-gradient-to-r from-cyan-300 to-blue-300 bg-clip-text text-transparent">
                        {{ __('estamos_aqui') }}
                    </span>
                </h1>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed animate__animated animate__fadeInUp animate__delay-1s">
                    {{ __('contacto_descripcion_principal') }}
                </p>

                <div class="flex items-center justify-center text-sm animate__animated animate__fadeInUp animate__delay-2s">
                    <a href="{{ route('home') }}" class="text-blue-300 hover:text-white transition-colors duration-300 font-medium flex items-center">
                        <i class="fas fa-home mr-2"></i>{{ __('inicio') }}
                    </a>
                    <div class="mx-3 text-gray-400">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </div>
                    <span class="text-white font-medium">{{ __('contacto') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-gray-50 via-white to-gray-50 py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 max-w-7xl mx-auto">
                <div class="lg:col-span-2">
                    <div class="sticky top-8">
                        <h2 class="text-3xl font-black text-gray-800 mb-2 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            {{ __('informacion_contacto') }}
                        </h2>
                        <div class="w-20 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mb-8 rounded-full"></div>

                        <div class="space-y-6">
                            <div class="group flex items-start p-4 rounded-2xl hover:bg-white hover:shadow-lg transition-all duration-300">
                                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mr-4 shadow-lg group-hover:scale-110 transition-transform">
                                    <i class="fas fa-map-marker-alt text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 mb-1 text-lg">{{ __('direccion') }}</h3>
                                    <p class="text-gray-600">{{ __('direccion_completa') }}</p>
                                </div>
                            </div>

                            <div class="group flex items-start p-4 rounded-2xl hover:bg-white hover:shadow-lg transition-all duration-300">
                                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mr-4 shadow-lg group-hover:scale-110 transition-transform">
                                    <i class="fas fa-envelope text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 mb-1 text-lg">{{ __('email') }}</h3>
                                    <a href="mailto:{{ __('mail') }}" class="text-gray-600 hover:text-blue-600 transition-colors">{{ __('mail') }}</a><br>
                                </div>
                            </div>

                            <div class="group flex items-start p-4 rounded-2xl hover:bg-white hover:shadow-lg transition-all duration-300">
                                <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center mr-4 shadow-lg group-hover:scale-110 transition-transform">
                                    <i class="fas fa-clock text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 mb-1 text-lg">{{ __('horario_atencion') }}</h3>
                                    <p class="text-gray-600">{{ __('horario_dias_laborables') }}</p>
                                    <p class="text-gray-600">{{ __('horario_fin_semana') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-10 relative overflow-hidden border border-gray-100">
                        <div class="absolute -top-20 -right-20 w-40 h-40 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full opacity-50"></div>
                        <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-gradient-to-br from-cyan-100 to-blue-100 rounded-full opacity-50"></div>

                        <div class="relative z-10">
                            <h2 class="text-3xl font-black text-gray-800 mb-2">{{ __('envianos_mensaje') }}</h2>
                            <div class="w-20 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mb-6 rounded-full"></div>
                            <p class="text-gray-600 mb-8">{{ __('formulario_descripcion') }}</p>

                            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="group">
                                        <label for="nombre" class="block text-sm font-bold text-gray-700 mb-2">
                                            {{ __('nombre') }} <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-user text-gray-400 group-focus-within:text-blue-600 transition-colors"></i>
                                            </div>
                                            <input type="text" id="nombre" name="nombre"
                                                value="{{ auth()->user()->name ?? old('nombre') }}"
                                                class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-0 focus:border-gray-300 bg-gray-100 cursor-not-allowed"
                                                readonly required>
                                        </div>
                                    </div>

                                    <div class="group">
                                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2">
                                            {{ __('email') }} <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-envelope text-gray-400 group-focus-within:text-blue-600 transition-colors"></i>
                                            </div>
                                            <input type="email" id="email" name="email"
                                                value="{{ auth()->user()->email ?? old('email') }}"
                                                class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-0 focus:border-gray-300 bg-gray-100 cursor-not-allowed"
                                                readonly required>
                                        </div>
                                    </div>
                                </div>

                                <div class="group">
                                    <label for="telefono" class="block text-sm font-bold text-gray-700 mb-2">{{ __('telefono') }}</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-phone text-gray-400 group-focus-within:text-blue-600 transition-colors"></i>
                                        </div>
                                        <input type="tel" id="telefono" name="telefono"
                                            class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition-all duration-300">
                                    </div>
                                </div>

                                <div class="group">
                                    <label for="asunto" class="block text-sm font-bold text-gray-700 mb-2">
                                        {{ __('asunto') }} <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-tag text-gray-400 group-focus-within:text-blue-600 transition-colors"></i>
                                        </div>
                                        <input type="text" id="asunto" name="asunto"
                                            class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition-all duration-300"
                                            required>
                                    </div>
                                </div>

                                <div class="group">
                                    <label for="mensaje" class="block text-sm font-bold text-gray-700 mb-2">
                                        {{ __('mensaje') }} <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <textarea id="mensaje" name="mensaje" rows="5"
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition-all duration-300 resize-none"
                                            required></textarea>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="privacidad" name="privacidad" type="checkbox"
                                            class="w-5 h-5 text-blue-600 border-2 border-gray-300 rounded focus:ring-4 focus:ring-blue-100 transition-all duration-300"
                                            required>
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="privacidad" class="font-medium text-gray-700">
                                            {{ __('acepto_politica') }}
                                            <a href="{{ route('privacy') }}" class="text-blue-600 hover:text-blue-800 font-bold transition-colors">
                                                {{ __('politica_privacidad') }}
                                            </a>
                                        </label>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="group w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold py-4 px-6 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl flex items-center justify-center gap-3">
                                        {{ __('enviar_mensaje') }}
                                        <i class="fas fa-paper-plane group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform duration-300"></i>
                                    </button>
                                </div>
                            </form>

                            @if(auth()->check())
                            <div class="mt-8 text-center">
                                <button onclick="openMessagesModal()" class="group inline-flex items-center bg-white hover:bg-gray-50 text-gray-700 font-bold py-3 px-6 rounded-xl transition-all duration-300 border-2 border-gray-200 hover:border-blue-300">
                                    <i class="fas fa-history mr-2"></i>
                                    {{ __('mensajes_enviados') }}
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-black text-gray-800 mb-4">
                    <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        {{ __('nuestra_ubicacion') }}
                    </span>
                </h2>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mx-auto mb-6 rounded-full"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ __('ubicacion_descripcion') }}</p>
            </div>

            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                <div class="relative w-full h-96 bg-gradient-to-br from-gray-100 to-gray-200">
                    <iframe
                        class="mapa-ubicacion"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3169.280220536992!2d-5.932571524246962!3d37.406851033268836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1269414d8c133d%3A0x498ce95cde9f9931!2sILERNA%20Sevilla!5e0!3m2!1ses!2ses!4v1748421640301!5m2!1ses!2ses"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        <div class="bg-white py-16">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-black text-gray-800 mb-4">{{ __('preguntas_frecuentes') }}</h2>
                    <div class="w-20 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mx-auto mb-6 rounded-full"></div>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ __('faq_descripcion') }}</p>
                </div>

                <div class="max-w-3xl mx-auto space-y-4">
                    <div class="bg-gradient-to-r from-gray-50 to-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-xl">
                        <button class="flex justify-between items-center w-full p-6 text-left focus:outline-none group" onclick="toggleFAQ(this)">
                            <span class="font-bold text-gray-800 text-lg group-hover:text-blue-600 transition-colors">{{ __('pregunta_1') }}</span>
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-500 rounded-xl flex items-center justify-center shadow">
                                <i class="fas fa-chevron-down text-white transition-transform duration-300"></i>
                            </div>
                        </button>
                        <div class="faq-answer hidden px-6 pb-6">
                            <p class="text-gray-600 leading-relaxed">{{ __('respuesta_1') }}</p>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-gray-50 to-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-xl">
                        <button class="flex justify-between items-center w-full p-6 text-left focus:outline-none group" onclick="toggleFAQ(this)">
                            <span class="font-bold text-gray-800 text-lg group-hover:text-blue-600 transition-colors">{{ __('pregunta_2') }}</span>
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-500 rounded-xl flex items-center justify-center shadow">
                                <i class="fas fa-chevron-down text-white transition-transform duration-300"></i>
                            </div>
                        </button>
                        <div class="faq-answer hidden px-6 pb-6">
                            <p class="text-gray-600 leading-relaxed">{{ __('respuesta_2') }}</p>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-gray-50 to-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-xl">
                        <button class="flex justify-between items-center w-full p-6 text-left focus:outline-none group" onclick="toggleFAQ(this)">
                            <span class="font-bold text-gray-800 text-lg group-hover:text-blue-600 transition-colors">{{ __('pregunta_3') }}</span>
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-500 rounded-xl flex items-center justify-center shadow">
                                <i class="fas fa-chevron-down text-white transition-transform duration-300"></i>
                            </div>
                        </button>
                        <div class="faq-answer hidden px-6 pb-6">
                            <p class="text-gray-600 leading-relaxed">{{ __('respuesta_3') }}</p>
                        </div>
                    </div>

                    <div class="text-center mt-10">
                        <a href="{{ route('faq') }}" class="group inline-flex items-center bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold py-3 px-6 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                            {{ __('ver_todas_faq') }}
                            <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div id="messagesModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center p-4">
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-3xl relative overflow-hidden animate-fadeInScale">
                <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-6 text-white">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-black flex items-center gap-3">
                            <i class="fas fa-history"></i>
                            {{ __('mensajes_enviados') }}
                        </h2>
                        <button onclick="closeMessagesModal()" class="w-10 h-10 bg-white/20 hover:bg-white/30 rounded-xl flex items-center justify-center transition-all duration-300">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                </div>

                <div id="messagesContent" class="p-6 max-h-[60vh] overflow-y-auto">
                    <div class="flex items-center justify-center py-8">
                        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
                    </div>
                </div>
            </div>
        </div>

        <div id="translations"
            data-json="{{ json_encode([
        'asunto' => __('asunto'),
        'mensaje' => __('mensaje'),
        'respuesta' => __('respuesta'),
        'respondido_el' => __('respondido_el'),
        'enviado_el' => __('enviado_el'),
        'sin_respuesta' => __('sin_respuesta'),
     ], JSON_HEX_APOS | JSON_HEX_QUOT) }}">
        </div>
</body>
@endsection