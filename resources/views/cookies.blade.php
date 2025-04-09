@extends('layouts.app')
@section('title', __('política_cookies'))
@section('content')
<!-- Cabecera de la página -->
<div class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-bold mb-4">{{ __('política_cookies') }}</h1>
        <p class="text-lg text-gray-200">{{ __('información_cookies_uso') }}</p>
        <div class="flex items-center mt-4">
            <a href="{{ route('home') }}" class="text-blue-300 hover:text-white transition">{{ __('inicio') }}</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-white">{{ __('política_cookies') }}</span>
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
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('que_son_cookies') }}</h2>
                    <p class="text-gray-600 mb-4">{{ __('cookies_intro_1') }}</p>
                    <p class="text-gray-600">{{ __('cookies_intro_2') }}</p>
                </div>

                <!-- Tipos de cookies -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('tipos_cookies') }}</h2>
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('cookies_necesarias') }}</h3>
                            <p class="text-gray-600">{{ __('cookies_necesarias_desc') }}</p>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('cookies_preferencias') }}</h3>
                            <p class="text-gray-600">{{ __('cookies_preferencias_desc') }}</p>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('cookies_estadisticas') }}</h3>
                            <p class="text-gray-600">{{ __('cookies_estadisticas_desc') }}</p>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ __('cookies_marketing') }}</h3>
                            <p class="text-gray-600">{{ __('cookies_marketing_desc') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Cookies que utilizamos -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('cookies_utilizamos') }}</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-200 rounded-lg">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="border border-gray-200 px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">{{ __('nombre') }}</th>
                                    <th class="border border-gray-200 px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">{{ __('proveedor') }}</th>
                                    <th class="border border-gray-200 px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">{{ __('proposito') }}</th>
                                    <th class="border border-gray-200 px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">{{ __('caducidad') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">session</td>
                                    <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">thejesstore.com</td>
                                    <td class="border border-gray-200 px-6 py-4 text-sm text-gray-600">{{ __('sesion_usuario') }}</td>
                                    <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ __('sesion') }}</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">XSRF-TOKEN</td>
                                    <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">thejesstore.com</td>
                                    <td class="border border-gray-200 px-6 py-4 text-sm text-gray-600">{{ __('seguridad') }}</td>
                                    <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ __('sesion') }}</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">_ga</td>
                                    <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">Google</td>
                                    <td class="border border-gray-200 px-6 py-4 text-sm text-gray-600">{{ __('analitica') }}</td>
                                    <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">2 {{ __('anos') }}</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">_gid</td>
                                    <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">Google</td>
                                    <td class="border border-gray-200 px-6 py-4 text-sm text-gray-600">{{ __('analitica') }}</td>
                                    <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">24 {{ __('horas') }}</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">_fbp</td>
                                    <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">Facebook</td>
                                    <td class="border border-gray-200 px-6 py-4 text-sm text-gray-600">{{ __('marketing') }}</td>
                                    <td class="border border-gray-200 px-6 py-4 whitespace-nowrap text-sm text-gray-600">3 {{ __('meses') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Control de cookies -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('control_cookies') }}</h2>
                    <p class="text-gray-600 mb-4">{{ __('control_cookies_p1') }}</p>
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 my-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-info-circle text-blue-500"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-700">{{ __('control_cookies_info') }}</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">{{ __('control_cookies_p2') }}</p>
                </div>

                <!-- Ajustes de cookies -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('ajustes_cookies') }}</h2>
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-medium text-gray-800">{{ __('cookies_necesarias') }}</p>
                                    <p class="text-sm text-gray-600">{{ __('no_desactivar') }}</p>
                                </div>
                                <div class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ __('obligatorias') }}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-medium text-gray-800">{{ __('cookies_preferencias') }}</p>
                                    <p class="text-sm text-gray-600">{{ __('mejorar_experiencia') }}</p>
                                </div>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" checked>
                                </label>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-medium text-gray-800">{{ __('cookies_estadisticas') }}</p>
                                    <p class="text-sm text-gray-600">{{ __('analizar_uso') }}</p>
                                </div>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" checked>
                                </label>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-medium text-gray-800">{{ __('cookies_marketing') }}</p>
                                    <p class="text-sm text-gray-600">{{ __('mostrar_publicidad') }}</p>
                                </div>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" checked>
                                </label>
                            </div>
                        </div>
                        <div class="mt-6 text-center">
                            <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition">
                                {{ __('guardar_preferencias') }}
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Contacto -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('mas_info_cookies') }}</h2>
                    <p class="text-gray-600">{{ __('contacto_cookies_info') }}</p>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mt-4">
                        <p class="text-gray-700 font-medium">TheJesStore</p>
                        <p class="text-gray-600">{{ __('email') }}: cookies@thejesstore.com</p>
                        <p class="text-gray-600">{{ __('telefono') }}: +34 612 345 678</p>
                        <p class="text-gray-600">{{ __('direccion') }}: Sevilla, España</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Banner de cookies fijo -->
<div id="cookie-banner" class="fixed bottom-0 left-0 w-full bg-white shadow-lg border-t border-gray-200 p-4 z-50">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex-1">
                <p class="text-sm text-gray-700">
                    {{ __('cookie_banner_text') }}
                    <a href="{{ route('cookies') }}" class="text-blue-600 hover:underline">{{ __('política_cookies') }}</a>.
                </p>
            </div>
            <div class="flex flex-wrap gap-2">
                <button id="accept-cookies" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded-md transition">
                    {{ __('aceptar_todas') }}
                </button>
                <button id="customize-cookies" class="bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium py-2 px-4 rounded-md transition">
                    {{ __('personalizar') }}
                </button>
                <button id="reject-cookies" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium py-2 px-4 rounded-md transition">
                    {{ __('solo_necesarias') }}
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Funcionalidad para el banner de cookies
    document.addEventListener('DOMContentLoaded', function() {
        const cookieBanner = document.getElementById('cookie-banner');
        const acceptButton = document.getElementById('accept-cookies');
        const rejectButton = document.getElementById('reject-cookies');
        const customizeButton = document.getElementById('customize-cookies');
        
        // Comprobar si ya se han aceptado las cookies
        const cookiesAccepted = localStorage.getItem('cookies-accepted');
        
        if (cookiesAccepted) {
            cookieBanner.classList.add('hidden');
        }
        
        acceptButton.addEventListener('click', function() {
            localStorage.setItem('cookies-accepted', 'true');
            cookieBanner.classList.add('hidden');
        });
        
        rejectButton.addEventListener('click', function() {
            localStorage.setItem('cookies-accepted', 'necessary');
            cookieBanner.classList.add('hidden');
        });
        
        customizeButton.addEventListener('click', function() {
            window.location.href = "{{ route('cookies') }}";
        });
    });
</script>
@endsection