@extends('layouts.app')
@section('title', __('terminos_condiciones'))
@section('content')
<!-- Cabecera de la página -->
<div class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-bold mb-4">{{ __('terminos_condiciones') }}</h1>
        <p class="text-lg text-gray-200">{{ __('condiciones_uso_sitio') }}</p>
        <div class="flex items-center mt-4">
            <a href="{{ route('home') }}" class="text-blue-300 hover:text-white transition">{{ __('inicio') }}</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-white">{{ __('terminos_condiciones') }}</span>
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
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">1. {{ __('introduccion') }}</h2>
                    <p class="text-gray-600 mb-4">{{ __('terminos_intro_1') }}</p>
                    <p class="text-gray-600">{{ __('terminos_intro_2') }}</p>
                </div>

                <!-- Definiciones -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">2. {{ __('definiciones') }}</h2>
                    <p class="text-gray-600 mb-4">{{ __('definiciones_intro') }}</p>
                    <ul class="space-y-3 text-gray-600">
                        <li><strong>{{ __('sitio') }}:</strong> {{ __('def_sitio') }}</li>
                        <li><strong>{{ __('usuario') }}:</strong> {{ __('def_usuario') }}</li>
                        <li><strong>{{ __('cliente') }}:</strong> {{ __('def_cliente') }}</li>
                        <li><strong>{{ __('cuenta') }}:</strong> {{ __('def_cuenta') }}</li>
                        <li><strong>{{ __('contenido') }}:</strong> {{ __('def_contenido') }}</li>
                        <li><strong>{{ __('condiciones') }}:</strong> {{ __('def_condiciones') }}</li>
                    </ul>
                </div>

                <!-- Acceso al sitio -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">3. {{ __('acceso_sitio') }}</h2>
                    <div class="space-y-4 text-gray-600">
                        <p>{{ __('acceso_sitio_p1') }}</p>
                        <p>{{ __('acceso_sitio_p2') }}</p>
                        <p>{{ __('acceso_sitio_p3') }}</p>
                    </div>
                </div>

                <!-- Cuenta de usuario -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">4. {{ __('cuenta_usuario') }}</h2>
                    <div class="space-y-4 text-gray-600">
                        <p>{{ __('cuenta_usuario_p1') }}</p>
                        <p>{{ __('cuenta_usuario_p2') }}</p>
                        <p>{{ __('cuenta_usuario_p3') }}</p>
                    </div>
                </div>

                <!-- Productos y pedidos -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">5. {{ __('productos_pedidos') }}</h2>
                    <div class="space-y-4 text-gray-600">
                        <p>{{ __('productos_pedidos_p1') }}</p>
                        <p>{{ __('productos_pedidos_p2') }}</p>
                        <p>{{ __('productos_pedidos_p3') }}</p>
                    </div>
                </div>

                <!-- Precios y pagos -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">6. {{ __('precios_pagos') }}</h2>
                    <div class="space-y-4 text-gray-600">
                        <p>{{ __('precios_pagos_p1') }}</p>
                        <p>{{ __('precios_pagos_p2') }}</p>
                        <p>{{ __('precios_pagos_p3') }}</p>
                        <div class="bg-blue-50 border-l-4 border-blue-500 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-info-circle text-blue-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-blue-700">{{ __('precios_pagos_info') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Envíos y entregas -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">7. {{ __('envios_entregas') }}</h2>
                    <div class="space-y-4 text-gray-600">
                        <p>{{ __('envios_entregas_p1') }}</p>
                        <p>{{ __('envios_entregas_p2') }}</p>
                        <p>{{ __('envios_entregas_p3') }}</p>
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-200 rounded-lg">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="border border-gray-200 px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">{{ __('tipo_envio') }}</th>
                                        <th class="border border-gray-200 px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">{{ __('tiempo_entrega') }}</th>
                                        <th class="border border-gray-200 px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">{{ __('costo') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ __('envio_estandar') }}</td>
                                        <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ __('tiempo_estandar') }}</td>
                                        <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ __('costo_estandar') }}</td>
                                    </tr>
                                    <tr class="bg-gray-50">
                                        <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ __('envio_express') }}</td>
                                        <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ __('tiempo_express') }}</td>
                                        <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ __('costo_express') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ __('envio_premium') }}</td>
                                        <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ __('tiempo_premium') }}</td>
                                        <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ __('costo_premium') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Devoluciones y reembolsos -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">8. {{ __('devoluciones_reembolsos') }}</h2>
                    <div class="space-y-4 text-gray-600">
                        <p>{{ __('devoluciones_p1') }}</p>
                        <p>{{ __('devoluciones_p2') }}</p>
                        <p>{{ __('devoluciones_p3') }}</p>
                        <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-exclamation-circle text-yellow-500"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-yellow-700">{{ __('devoluciones_aviso') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Propiedad intelectual -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">9. {{ __('propiedad_intelectual') }}</h2>
                    <div class="space-y-4 text-gray-600">
                        <p>{{ __('propiedad_p1') }}</p>
                        <p>{{ __('propiedad_p2') }}</p>
                        <p>{{ __('propiedad_p3') }}</p>
                    </div>
                </div>

                <!-- Privacidad y datos personales -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">10. {{ __('privacidad_datos') }}</h2>
                    <div class="space-y-4 text-gray-600">
                        <p>{{ __('privacidad_p1') }}</p>
                        <p>{{ __('privacidad_p2') }}</p>
                        <p>{{ __('privacidad_p3') }}</p>
                        <p>
                            <a href="{{ route('privacy') }}" class="text-blue-600 hover:text-blue-800 transition">{{ __('ver_politica_privacidad') }}</a>
                        </p>
                    </div>
                </div>

                <!-- Limitación de responsabilidad -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">11. {{ __('limitacion_responsabilidad') }}</h2>
                    <div class="space-y-4 text-gray-600">
                        <p>{{ __('limitacion_p1') }}</p>
                        <p>{{ __('limitacion_p2') }}</p>
                        <p>{{ __('limitacion_p3') }}</p>
                    </div>
                </div>

                <!-- Modificaciones -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">12. {{ __('modificaciones') }}</h2>
                    <div class="space-y-4 text-gray-600">
                        <p>{{ __('modificaciones_p1') }}</p>
                        <p>{{ __('modificaciones_p2') }}</p>
                    </div>
                </div>

                <!-- Legislación aplicable -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">13. {{ __('legislacion_aplicable') }}</h2>
                    <div class="space-y-4 text-gray-600">
                        <p>{{ __('legislacion_p1') }}</p>
                        <p>{{ __('legislacion_p2') }}</p>
                    </div>
                </div>

                <!-- Contacto -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">14. {{ __('contacto') }}</h2>
                    <div class="space-y-4 text-gray-600">
                        <p>{{ __('contacto_p1') }}</p>
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-700 mb-3">{{ __('informacion_contacto') }}</h3>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i class="fas fa-envelope mt-1 text-blue-600 mr-3"></i>
                                    <span>{{ __('email') }}: <a href="mailto:{{ __('email_contacto') }}" class="text-blue-600 hover:underline">{{ __('email_contacto') }}</a></span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-phone-alt mt-1 text-blue-600 mr-3"></i>
                                    <span>{{ __('telefono') }}: {{ __('telefono_contacto') }}</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-map-marker-alt mt-1 text-blue-600 mr-3"></i>
                                    <span>{{ __('direccion') }}: {{ __('direccion_contacto') }}</span>
                                </li>
                            </ul>
                            <div class="mt-6">
                                <a href="{{ route('contacto') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <i class="fas fa-paper-plane mr-2"></i>
                                    {{ __('formulario_contacto') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection