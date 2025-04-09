@extends('layouts.app')
@section('title', __('contacto'))
@section('content')
<!-- Hero Banner de Contacto -->
<div class="relative bg-gradient-to-r from-blue-900 to-blue-700 overflow-hidden">
    <div class="container mx-auto px-4 py-16 md:py-20">
        <div class="text-center text-white z-10 relative">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 animate__animated animate__fadeInUp">
                {{ __('contactanos') }} <span class="text-blue-300">{{ __('estamos_aqui') }}</span>
            </h1>
            <p class="text-lg max-w-2xl mx-auto mb-6 text-gray-200 animate__animated animate__fadeInUp animate__delay-1s">
                {{ __('contacto_descripcion_principal') }}
            </p>
        </div>
        <!-- Decoraciones de fondo -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
            <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-blue-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-purple-500 rounded-full blur-3xl"></div>
        </div>
    </div>
</div>

<!-- Información de Contacto y Formulario -->
<div class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-12">
            <!-- Información de Contacto -->
            <div class="lg:col-span-2">
                <h2 class="text-2xl md:text-3xl font-bold mb-4 text-gray-800">{{ __('informacion_contacto') }}</h2>
                <div class="w-20 h-1 bg-blue-600 mb-6"></div>

                <div class="space-y-6">
                    <!-- Dirección -->
                    <div class="flex items-start">
                        <div class="bg-blue-100 rounded-full p-3 mr-4">
                            <i class="fas fa-map-marker-alt text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">{{ __('direccion') }}</h3>
                            <p class="text-gray-600">{{ __('direccion_completa') }}</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start">
                        <div class="bg-blue-100 rounded-full p-3 mr-4">
                            <i class="fas fa-envelope text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">{{ __('email') }}</h3>
                            <p class="text-gray-600">info@thejesstore.com</p>
                            <p class="text-gray-600">soporte@thejesstore.com</p>
                        </div>
                    </div>

                    <!-- Teléfono -->
                    <div class="flex items-start">
                        <div class="bg-blue-100 rounded-full p-3 mr-4">
                            <i class="fas fa-phone-alt text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">{{ __('telefono') }}</h3>
                            <p class="text-gray-600">+34 91 234 56 78</p>
                            <p class="text-gray-600">+34 600 12 34 56</p>
                        </div>
                    </div>

                    <!-- Horario -->
                    <div class="flex items-start">
                        <div class="bg-blue-100 rounded-full p-3 mr-4">
                            <i class="fas fa-clock text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">{{ __('horario_atencion') }}</h3>
                            <p class="text-gray-600">{{ __('horario_dias_laborables') }}</p>
                            <p class="text-gray-600">{{ __('horario_fin_semana') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Redes Sociales -->
                <div class="mt-8">
                    <h3 class="font-bold text-gray-800 mb-3">{{ __('siguenos') }}</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-full p-3 transition transform hover:scale-110">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-full p-3 transition transform hover:scale-110">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-full p-3 transition transform hover:scale-110">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-full p-3 transition transform hover:scale-110">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-full p-3 transition transform hover:scale-110">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Formulario de Contacto -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 relative">
                    <!-- Elemento decorativo -->
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-blue-100 rounded-full opacity-50"></div>
                    
                    <div class="relative z-10">
                        <h2 class="text-2xl md:text-3xl font-bold mb-4 text-gray-800">{{ __('envianos_mensaje') }}</h2>
                        <div class="w-20 h-1 bg-blue-600 mb-6"></div>
                        <p class="text-gray-600 mb-6">{{ __('formulario_descripcion') }}</p>

                        <form action="" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nombre -->
                                <div>
                                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">{{ __('nombre') }} <span class="text-red-500">*</span></label>
                                    <input type="text" id="nombre" name="nombre" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition" required>
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('email') }} <span class="text-red-500">*</span></label>
                                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition" required>
                                </div>
                            </div>

                            <!-- Teléfono -->
                            <div>
                                <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">{{ __('telefono') }}</label>
                                <input type="tel" id="telefono" name="telefono" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition">
                            </div>

                            <!-- Asunto -->
                            <div>
                                <label for="asunto" class="block text-sm font-medium text-gray-700 mb-1">{{ __('asunto') }} <span class="text-red-500">*</span></label>
                                <input type="text" id="asunto" name="asunto" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition" required>
                            </div>

                            <!-- Mensaje -->
                            <div>
                                <label for="mensaje" class="block text-sm font-medium text-gray-700 mb-1">{{ __('mensaje') }} <span class="text-red-500">*</span></label>
                                <textarea id="mensaje" name="mensaje" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition resize-none" required></textarea>
                            </div>

                            <!-- Política de Privacidad -->
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="privacidad" name="privacidad" type="checkbox" class="focus:ring-blue-600 h-4 w-4 text-blue-600 border-gray-300 rounded" required>
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="privacidad" class="font-medium text-gray-700">{{ __('acepto_politica') }} <a href="{{ route('privacidad') }}" class="text-blue-600 hover:underline">{{ __('politica_privacidad') }}</a></label>
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="w-full bg-gradient-to-r from-blue-800 to-blue-600 hover:from-blue-700 hover:to-blue-500 text-white font-bold py-3 px-6 rounded-lg transition shadow-lg transform hover:scale-105">
                                    {{ __('enviar_mensaje') }} <i class="fas fa-paper-plane ml-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mapa de ubicación -->
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 text-gray-800">{{ __('nuestra_ubicacion') }}</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">{{ __('ubicacion_descripcion') }}</p>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Aquí iría el mapa de Google Maps o alternativa -->
            <div class="relative w-full h-96">
                <!-- Reemplazar con tu mapa real -->
                <div class="absolute inset-0 bg-gray-200 flex items-center justify-center">
                    <p class="text-gray-500">
                        <i class="fas fa-map-marked-alt text-4xl mb-3"></i><br>
                        {{ __('mapa_aqui') }}
                    </p>
                </div>
                <!-- 
                Para integrar Google Maps:
                <iframe src="https://www.google.com/maps/embed?pb=TU_CODIGO_DE_MAPA" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                -->
            </div>
        </div>
    </div>
</div>

<!-- Preguntas Frecuentes -->
<div class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 text-gray-800">{{ __('preguntas_frecuentes') }}</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">{{ __('faq_descripcion') }}</p>
        </div>
        
        <div class="max-w-3xl mx-auto">
            <!-- FAQ 1 -->
            <div class="mb-6">
                <button class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 p-4 rounded-lg text-left focus:outline-none transition" onclick="toggleFAQ(this)">
                    <span class="font-bold text-gray-800">{{ __('pregunta_1') }}</span>
                    <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                </button>
                <div class="faq-answer hidden bg-white p-4 rounded-b-lg border-t border-gray-200">
                    <p class="text-gray-600">{{ __('respuesta_1') }}</p>
                </div>
            </div>
            
            <!-- FAQ 2 -->
            <div class="mb-6">
                <button class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 p-4 rounded-lg text-left focus:outline-none transition" onclick="toggleFAQ(this)">
                    <span class="font-bold text-gray-800">{{ __('pregunta_2') }}</span>
                    <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                </button>
                <div class="faq-answer hidden bg-white p-4 rounded-b-lg border-t border-gray-200">
                    <p class="text-gray-600">{{ __('respuesta_2') }}</p>
                </div>
            </div>
            
            <!-- FAQ 3 -->
            <div class="mb-6">
                <button class="flex justify-between items-center w-full bg-gray-50 hover:bg-gray-100 p-4 rounded-lg text-left focus:outline-none transition" onclick="toggleFAQ(this)">
                    <span class="font-bold text-gray-800">{{ __('pregunta_3') }}</span>
                    <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                </button>
                <div class="faq-answer hidden bg-white p-4 rounded-b-lg border-t border-gray-200">
                    <p class="text-gray-600">{{ __('respuesta_3') }}</p>
                </div>
            </div>
            
            <div class="text-center mt-8">
                <a href="{{ route('faq') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-bold transition">
                    {{ __('ver_todas_faq') }} <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Script para las FAQ -->
<script>
    function toggleFAQ(element) {
        // Buscar el elemento de respuesta adyacente
        const answer = element.nextElementSibling;
        
        // Alternar visibilidad
        answer.classList.toggle('hidden');
        
        // Rotar el icono
        const icon = element.querySelector('.fa-chevron-down');
        if (answer.classList.contains('hidden')) {
            icon.style.transform = 'rotate(0deg)';
        } else {
            icon.style.transform = 'rotate(180deg)';
        }
    }
</script>
@endsection