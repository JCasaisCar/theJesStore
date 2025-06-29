@extends('layouts.app')
@section('title', __('preguntas_frecuentes'))
@section('content')

<body id="faqPage">
    <div class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-10 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute top-40 right-20 w-80 h-80 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
            <div class="absolute bottom-10 left-1/3 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
        </div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3csvg width=" 40" height="40" xmlns="http://www.w3.org/2000/svg" %3e%3cdefs%3e%3cpattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse" %3e%3cpath d="m 40 0 l 0 40 m -40 0 l 40 0" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1" /%3e%3c/pattern%3e%3c/defs%3e%3crect width="100%25" height="100%25" fill="url(%23grid)" /%3e%3c/svg%3e')] opacity-30"></div>

        <div class="container mx-auto px-4 py-20 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="w-24 h-24 mx-auto bg-gradient-to-br from-blue-500 to-cyan-500 rounded-3xl flex items-center justify-center mb-8 shadow-2xl">
                    <i class="fas fa-question-circle text-white text-3xl"></i>
                </div>

                <h1 class="text-4xl md:text-6xl font-black mb-6 bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                    {{ __('preguntas_frecuentes') }}
                </h1>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                    {{ __('faq_descripcion_principal') }}
                </p>

                <div class="flex items-center justify-center text-sm">
                    <a href="{{ route('home') }}" class="text-blue-300 hover:text-white transition-colors duration-300 font-medium flex items-center">
                        <i class="fas fa-home mr-2"></i>{{ __('inicio') }}
                    </a>
                    <div class="mx-3 text-gray-400">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </div>
                    <span class="text-white font-medium">{{ __('preguntas_frecuentes') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-3xl font-bold mb-4 text-gray-800">{{ __('categorias_faq') }}</h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto mb-10">{{ __('categorias_descripcion') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl shadow-lg p-6 transition hover:shadow-xl hover:transform hover:scale-105 cursor-pointer" onclick="filterFAQByCategory('pedidos')">
                    <div class="bg-blue-100 rounded-full p-4 w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shopping-cart text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="font-bold text-lg text-center text-gray-800 mb-2">{{ __('categoria_pedidos') }}</h3>
                    <p class="text-center text-gray-600 text-sm">{{ __('categoria_pedidos_desc') }}</p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 transition hover:shadow-xl hover:transform hover:scale-105 cursor-pointer" onclick="filterFAQByCategory('productos')">
                    <div class="bg-blue-100 rounded-full p-4 w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-box-open text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="font-bold text-lg text-center text-gray-800 mb-2">{{ __('categoria_productos') }}</h3>
                    <p class="text-center text-gray-600 text-sm">{{ __('categoria_productos_desc') }}</p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 transition hover:shadow-xl hover:transform hover:scale-105 cursor-pointer" onclick="filterFAQByCategory('cuenta')">
                    <div class="bg-blue-100 rounded-full p-4 w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-shield text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="font-bold text-lg text-center text-gray-800 mb-2">{{ __('categoria_cuenta') }}</h3>
                    <p class="text-center text-gray-600 text-sm">{{ __('categoria_cuenta_desc') }}</p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 transition hover:shadow-xl hover:transform hover:scale-105 cursor-pointer" onclick="filterFAQByCategory('soporte')">
                    <div class="bg-blue-100 rounded-full p-4 w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-headset text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="font-bold text-lg text-center text-gray-800 mb-2">{{ __('categoria_soporte') }}</h3>
                    <p class="text-center text-gray-600 text-sm">{{ __('categoria_soporte_desc') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold mb-4 text-gray-800">{{ __('buscar_preguntas') }}</h2>
                    <div class="w-20 h-1 bg-blue-600 mx-auto mb-6"></div>
                </div>

                <div class="relative">
                    <input type="text" id="searchFAQ" placeholder="{{ __('buscar_placeholder') }}" class="w-full px-5 py-4 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition shadow-sm" onkeyup="searchFAQs()">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div id="faqContainer" class="max-w-3xl mx-auto">
                <div class="faq-category mb-12" data-category="pedidos">
                    <h3 class="text-xl md:text-2xl font-bold mb-6 text-gray-800 flex items-center">
                        <i class="fas fa-shopping-cart text-blue-600 mr-3"></i>
                        {{ __('categoria_pedidos') }}
                    </h3>

                    <div class="faq-item mb-6">
                        <button class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 p-4 rounded-lg text-left focus:outline-none transition" onclick="toggleFAQ(this)">
                            <span class="font-bold text-gray-800">{{ __('pregunta_pedidos_1') }}</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="faq-answer hidden bg-white p-4 rounded-b-lg border-t border-gray-200">
                            <p class="text-gray-600">{{ __('respuesta_pedidos_1') }}</p>
                        </div>
                    </div>

                    <div class="faq-item mb-6">
                        <button class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 p-4 rounded-lg text-left focus:outline-none transition" onclick="toggleFAQ(this)">
                            <span class="font-bold text-gray-800">{{ __('pregunta_pedidos_2') }}</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="faq-answer hidden bg-white p-4 rounded-b-lg border-t border-gray-200">
                            <p class="text-gray-600">{{ __('respuesta_pedidos_2') }}</p>
                        </div>
                    </div>

                    <div class="faq-item mb-6">
                        <button class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 p-4 rounded-lg text-left focus:outline-none transition" onclick="toggleFAQ(this)">
                            <span class="font-bold text-gray-800">{{ __('pregunta_pedidos_3') }}</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="faq-answer hidden bg-white p-4 rounded-b-lg border-t border-gray-200">
                            <p class="text-gray-600">{{ __('respuesta_pedidos_3') }}</p>
                        </div>
                    </div>
                </div>

                <div class="faq-category mb-12" data-category="productos">
                    <h3 class="text-xl md:text-2xl font-bold mb-6 text-gray-800 flex items-center">
                        <i class="fas fa-box-open text-blue-600 mr-3"></i>
                        {{ __('categoria_productos') }}
                    </h3>

                    <div class="faq-item mb-6">
                        <button class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 p-4 rounded-lg text-left focus:outline-none transition" onclick="toggleFAQ(this)">
                            <span class="font-bold text-gray-800">{{ __('pregunta_productos_1') }}</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="faq-answer hidden bg-white p-4 rounded-b-lg border-t border-gray-200">
                            <p class="text-gray-600">{{ __('respuesta_productos_1') }}</p>
                        </div>
                    </div>

                    <div class="faq-item mb-6">
                        <button class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 p-4 rounded-lg text-left focus:outline-none transition" onclick="toggleFAQ(this)">
                            <span class="font-bold text-gray-800">{{ __('pregunta_productos_2') }}</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="faq-answer hidden bg-white p-4 rounded-b-lg border-t border-gray-200">
                            <p class="text-gray-600">{{ __('respuesta_productos_2') }}</p>
                        </div>
                    </div>

                    <div class="faq-item mb-6">
                        <button class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 p-4 rounded-lg text-left focus:outline-none transition" onclick="toggleFAQ(this)">
                            <span class="font-bold text-gray-800">{{ __('pregunta_productos_3') }}</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="faq-answer hidden bg-white p-4 rounded-b-lg border-t border-gray-200">
                            <p class="text-gray-600">{{ __('respuesta_productos_3') }}</p>
                        </div>
                    </div>
                </div>

                <div class="faq-category mb-12" data-category="cuenta">
                    <h3 class="text-xl md:text-2xl font-bold mb-6 text-gray-800 flex items-center">
                        <i class="fas fa-user-shield text-blue-600 mr-3"></i>
                        {{ __('categoria_cuenta') }}
                    </h3>

                    <div class="faq-item mb-6">
                        <button class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 p-4 rounded-lg text-left focus:outline-none transition" onclick="toggleFAQ(this)">
                            <span class="font-bold text-gray-800">{{ __('pregunta_cuenta_1') }}</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="faq-answer hidden bg-white p-4 rounded-b-lg border-t border-gray-200">
                            <p class="text-gray-600">{{ __('respuesta_cuenta_1') }}</p>
                        </div>
                    </div>

                    <div class="faq-item mb-6">
                        <button class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 p-4 rounded-lg text-left focus:outline-none transition" onclick="toggleFAQ(this)">
                            <span class="font-bold text-gray-800">{{ __('pregunta_cuenta_2') }}</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="faq-answer hidden bg-white p-4 rounded-b-lg border-t border-gray-200">
                            <p class="text-gray-600">{{ __('respuesta_cuenta_2') }}</p>
                        </div>
                    </div>

                    <div class="faq-item mb-6">
                        <button class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 p-4 rounded-lg text-left focus:outline-none transition" onclick="toggleFAQ(this)">
                            <span class="font-bold text-gray-800">{{ __('pregunta_cuenta_3') }}</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="faq-answer hidden bg-white p-4 rounded-b-lg border-t border-gray-200">
                            <p class="text-gray-600">{{ __('respuesta_cuenta_3') }}</p>
                        </div>
                    </div>
                </div>

                <div class="faq-category mb-12" data-category="soporte">
                    <h3 class="text-xl md:text-2xl font-bold mb-6 text-gray-800 flex items-center">
                        <i class="fas fa-headset text-blue-600 mr-3"></i>
                        {{ __('categoria_soporte') }}
                    </h3>

                    <div class="faq-item mb-6">
                        <button class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 p-4 rounded-lg text-left focus:outline-none transition" onclick="toggleFAQ(this)">
                            <span class="font-bold text-gray-800">{{ __('pregunta_soporte_1') }}</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="faq-answer hidden bg-white p-4 rounded-b-lg border-t border-gray-200">
                            <p class="text-gray-600">{{ __('respuesta_soporte_1') }}</p>
                        </div>
                    </div>

                    <div class="faq-item mb-6">
                        <button class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 p-4 rounded-lg text-left focus:outline-none transition" onclick="toggleFAQ(this)">
                            <span class="font-bold text-gray-800">{{ __('pregunta_soporte_2') }}</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="faq-answer hidden bg-white p-4 rounded-b-lg border-t border-gray-200">
                            <p class="text-gray-600">{{ __('respuesta_soporte_2') }}</p>
                        </div>
                    </div>

                    <div class="faq-item mb-6">
                        <button class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 p-4 rounded-lg text-left focus:outline-none transition" onclick="toggleFAQ(this)">
                            <span class="font-bold text-gray-800">{{ __('pregunta_soporte_3') }}</span>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="faq-answer hidden bg-white p-4 rounded-b-lg border-t border-gray-200">
                            <p class="text-gray-600">{{ __('respuesta_soporte_3') }}</p>
                        </div>
                    </div>
                </div>

                <div id="noResults" class="hidden py-12 text-center">
                    <div class="bg-blue-50 p-6 rounded-xl">
                        <i class="fas fa-search text-4xl text-blue-600 mb-4"></i>
                        <h3 class="font-bold text-xl text-gray-800 mb-2">{{ __('no_resultados') }}</h3>
                        <p class="text-gray-600 mb-4">{{ __('no_resultados_desc') }}</p>
                        <button onclick="resetSearch()" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition">
                            {{ __('ver_todas_preguntas') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <div class="bg-gradient-to-r from-blue-900 to-blue-700 rounded-2xl p-8 md:p-12 shadow-xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-1/3 h-full bg-blue-400 opacity-10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-1/4 h-full bg-purple-500 opacity-10 rounded-full blur-3xl"></div>

                <div class="relative z-10 text-center">
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">{{ __('no_encuentras_respuesta') }}</h2>
                    <p class="text-gray-200 max-w-2xl mx-auto mb-8">{{ __('contacto_ayuda_desc') }}</p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="{{ route('contacto') }}" class="bg-white hover:bg-gray-100 text-blue-800 font-bold py-3 px-6 rounded-lg transition shadow-lg transform hover:scale-105">
                            <i class="fas fa-envelope mr-2"></i> {{ __('enviar_consulta') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection