@extends('layouts.app')
@section('title', __('política_privacidad'))
@section('content')
<!-- Cabecera de la página -->
<div class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-bold mb-4">{{ __('política_privacidad') }}</h1>
        <p class="text-lg text-gray-200">{{ __('informacion_datos_personales') }}</p>
        <div class="flex items-center mt-4">
            <a href="{{ route('home') }}" class="text-blue-300 hover:text-white transition">{{ __('inicio') }}</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-white">{{ __('política_privacidad') }}</span>
        </div>
    </div>
</div>

<!-- Contenido principal -->
<div class="bg-white py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-8">
                <!-- Introducción -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('introduccion') }}</h2>
                    <p class="text-gray-600 mb-4">{{ __('privacidad_intro_1') }}</p>
                    <p class="text-gray-600">{{ __('privacidad_intro_2') }}</p>
                </div>

                <!-- Recopilación de datos -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('recopilacion_datos') }}</h2>
                    <p class="text-gray-600 mb-4">{{ __('recopilacion_datos_p1') }}</p>
                    <ul class="list-disc pl-6 space-y-2 text-gray-600">
                        <li>{{ __('datos_personales') }}</li>
                        <li>{{ __('datos_contacto') }}</li>
                        <li>{{ __('datos_pago') }}</li>
                        <li>{{ __('datos_navegacion') }}</li>
                        <li>{{ __('datos_dispositivo') }}</li>
                    </ul>
                </div>

                <!-- Uso de la información -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('uso_informacion') }}</h2>
                    <p class="text-gray-600 mb-4">{{ __('uso_informacion_p1') }}</p>
                    <ul class="list-disc pl-6 space-y-2 text-gray-600">
                        <li>{{ __('procesar_pedidos') }}</li>
                        <li>{{ __('mejorar_servicios') }}</li>
                        <li>{{ __('enviar_comunicaciones') }}</li>
                        <li>{{ __('prevenir_fraude') }}</li>
                        <li>{{ __('personalizar_experiencia') }}</li>
                    </ul>
                </div>

                <!-- Compartir información -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('compartir_informacion') }}</h2>
                    <p class="text-gray-600 mb-4">{{ __('compartir_informacion_p1') }}</p>
                    <ul class="list-disc pl-6 space-y-2 text-gray-600">
                        <li>{{ __('proveedores_servicios') }}</li>
                        <li>{{ __('socios_comerciales') }}</li>
                        <li>{{ __('cumplimiento_legal') }}</li>
                        <li>{{ __('proteccion_derechos') }}</li>
                    </ul>
                </div>

                <!-- Seguridad de datos -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('seguridad_datos') }}</h2>
                    <p class="text-gray-600 mb-4">{{ __('seguridad_datos_p1') }}</p>
                    <p class="text-gray-600">{{ __('seguridad_datos_p2') }}</p>
                </div>

                <!-- Derechos del usuario -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('derechos_usuario') }}</h2>
                    <p class="text-gray-600 mb-4">{{ __('derechos_usuario_p1') }}</p>
                    <ul class="list-disc pl-6 space-y-2 text-gray-600">
                        <li>{{ __('derecho_acceso') }}</li>
                        <li>{{ __('derecho_rectificacion') }}</li>
                        <li>{{ __('derecho_supresion') }}</li>
                        <li>{{ __('derecho_limitacion') }}</li>
                        <li>{{ __('derecho_portabilidad') }}</li>
                        <li>{{ __('derecho_oposicion') }}</li>
                    </ul>
                </div>

                <!-- Cambios en la política -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('cambios_politica') }}</h2>
                    <p class="text-gray-600">{{ __('cambios_politica_p1') }}</p>
                </div>

                <!-- Contacto -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('contacto_privacidad') }}</h2>
                    <p class="text-gray-600 mb-4">{{ __('contacto_privacidad_p1') }}</p>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <p class="text-gray-700 font-medium">TheJesStore</p>
                        <p class="text-gray-600">{{ __('email') }}: privacidad@thejesstore.com</p>
                        <p class="text-gray-600">{{ __('telefono') }}: +34 612 345 678</p>
                        <p class="text-gray-600">{{ __('direccion') }}: Sevilla, España</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sección CTA -->
<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ __('tienes_preguntas') }}</h3>
            <p class="text-gray-600 mb-6">{{ __('contactanos_dudas') }}</p>
            <a href="{{ route('contacto') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition shadow-lg transform hover:scale-105">
                {{ __('contactanos') }} <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>
@endsection