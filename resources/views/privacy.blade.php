@extends('layouts.app')
@section('title', __('política_privacidad'))
@section('content')

<body id="privacyPage">
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
                    <i class="fas fa-shield-alt text-white text-3xl"></i>
                </div>

                <h1 class="text-4xl md:text-6xl font-black mb-6 bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                    {{ __('política_privacidad') }}
                </h1>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                    {{ __('informacion_datos_personales') }}
                </p>

                <div class="flex items-center justify-center text-sm">
                    <a href="{{ route('home') }}" class="text-blue-300 hover:text-white transition-colors duration-300 font-medium flex items-center">
                        <i class="fas fa-home mr-2"></i>{{ __('inicio') }}
                    </a>
                    <div class="mx-3 text-gray-400">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </div>
                    <span class="text-white font-medium">{{ __('política_privacidad') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-gray-50 via-white to-gray-50 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100 backdrop-blur-sm">
                    <div class="p-8 md:p-12">

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-blue-500 to-cyan-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-info-circle text-white"></i>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('introduccion') }}</h2>
                            </div>
                            <div class="ml-16 space-y-4">
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('privacidad_intro_1') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('privacidad_intro_2') }}</p>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-emerald-500 to-teal-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-database text-white"></i>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('recopilacion_datos') }}</h2>
                            </div>
                            <div class="ml-16">
                                <p class="text-gray-700 leading-relaxed text-lg mb-6">{{ __('recopilacion_datos_p1') }}</p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-4 rounded-2xl border border-emerald-100">
                                        <i class="fas fa-user text-emerald-600 mb-2"></i>
                                        <p class="text-gray-700 font-medium">{{ __('datos_personales') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-4 rounded-2xl border border-emerald-100">
                                        <i class="fas fa-envelope text-emerald-600 mb-2"></i>
                                        <p class="text-gray-700 font-medium">{{ __('datos_contacto') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-4 rounded-2xl border border-emerald-100">
                                        <i class="fas fa-credit-card text-emerald-600 mb-2"></i>
                                        <p class="text-gray-700 font-medium">{{ __('datos_pago') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-4 rounded-2xl border border-emerald-100">
                                        <i class="fas fa-mouse-pointer text-emerald-600 mb-2"></i>
                                        <p class="text-gray-700 font-medium">{{ __('datos_navegacion') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-4 rounded-2xl border border-emerald-100 md:col-span-2">
                                        <i class="fas fa-mobile-alt text-emerald-600 mb-2"></i>
                                        <p class="text-gray-700 font-medium">{{ __('datos_dispositivo') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-purple-500 to-pink-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-cogs text-white"></i>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('uso_informacion') }}</h2>
                            </div>
                            <div class="ml-16">
                                <p class="text-gray-700 leading-relaxed text-lg mb-6">{{ __('uso_informacion_p1') }}</p>
                                <div class="space-y-3">
                                    <div class="flex items-center gap-4 p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl border border-purple-100">
                                        <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                            <i class="fas fa-shopping-bag text-white text-sm"></i>
                                        </div>
                                        <p class="text-gray-700 font-medium">{{ __('procesar_pedidos') }}</p>
                                    </div>
                                    <div class="flex items-center gap-4 p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl border border-purple-100">
                                        <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                            <i class="fas fa-chart-line text-white text-sm"></i>
                                        </div>
                                        <p class="text-gray-700 font-medium">{{ __('mejorar_servicios') }}</p>
                                    </div>
                                    <div class="flex items-center gap-4 p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl border border-purple-100">
                                        <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                            <i class="fas fa-paper-plane text-white text-sm"></i>
                                        </div>
                                        <p class="text-gray-700 font-medium">{{ __('enviar_comunicaciones') }}</p>
                                    </div>
                                    <div class="flex items-center gap-4 p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl border border-purple-100">
                                        <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                            <i class="fas fa-shield-alt text-white text-sm"></i>
                                        </div>
                                        <p class="text-gray-700 font-medium">{{ __('prevenir_fraude') }}</p>
                                    </div>
                                    <div class="flex items-center gap-4 p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl border border-purple-100">
                                        <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                            <i class="fas fa-user-cog text-white text-sm"></i>
                                        </div>
                                        <p class="text-gray-700 font-medium">{{ __('personalizar_experiencia') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-amber-500 to-orange-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-share-alt text-white"></i>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('compartir_informacion') }}</h2>
                            </div>
                            <div class="ml-16">
                                <p class="text-gray-700 leading-relaxed text-lg mb-6">{{ __('compartir_informacion_p1') }}</p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-gradient-to-br from-amber-50 to-orange-50 p-6 rounded-2xl border border-amber-100">
                                        <i class="fas fa-handshake text-amber-600 text-2xl mb-3"></i>
                                        <p class="text-gray-700 font-medium">{{ __('proveedores_servicios') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-amber-50 to-orange-50 p-6 rounded-2xl border border-amber-100">
                                        <i class="fas fa-users text-amber-600 text-2xl mb-3"></i>
                                        <p class="text-gray-700 font-medium">{{ __('socios_comerciales') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-amber-50 to-orange-50 p-6 rounded-2xl border border-amber-100">
                                        <i class="fas fa-gavel text-amber-600 text-2xl mb-3"></i>
                                        <p class="text-gray-700 font-medium">{{ __('cumplimiento_legal') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-amber-50 to-orange-50 p-6 rounded-2xl border border-amber-100">
                                        <i class="fas fa-lock text-amber-600 text-2xl mb-3"></i>
                                        <p class="text-gray-700 font-medium">{{ __('proteccion_derechos') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-red-500 to-rose-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-rose-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-lock text-white"></i>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('seguridad_datos') }}</h2>
                            </div>
                            <div class="ml-16 bg-gradient-to-br from-red-50 to-rose-50 p-8 rounded-3xl border border-red-100">
                                <p class="text-gray-700 leading-relaxed text-lg mb-4">{{ __('seguridad_datos_p1') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('seguridad_datos_p2') }}</p>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-indigo-500 to-blue-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-blue-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-balance-scale text-white"></i>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('derechos_usuario') }}</h2>
                            </div>
                            <div class="ml-16">
                                <p class="text-gray-700 leading-relaxed text-lg mb-6">{{ __('derechos_usuario_p1') }}</p>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    <div class="bg-gradient-to-br from-indigo-50 to-blue-50 p-4 rounded-2xl border border-indigo-100 text-center">
                                        <i class="fas fa-eye text-indigo-600 text-xl mb-2"></i>
                                        <p class="text-gray-700 font-medium text-sm">{{ __('derecho_acceso') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-indigo-50 to-blue-50 p-4 rounded-2xl border border-indigo-100 text-center">
                                        <i class="fas fa-edit text-indigo-600 text-xl mb-2"></i>
                                        <p class="text-gray-700 font-medium text-sm">{{ __('derecho_rectificacion') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-indigo-50 to-blue-50 p-4 rounded-2xl border border-indigo-100 text-center">
                                        <i class="fas fa-trash text-indigo-600 text-xl mb-2"></i>
                                        <p class="text-gray-700 font-medium text-sm">{{ __('derecho_supresion') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-indigo-50 to-blue-50 p-4 rounded-2xl border border-indigo-100 text-center">
                                        <i class="fas fa-pause text-indigo-600 text-xl mb-2"></i>
                                        <p class="text-gray-700 font-medium text-sm">{{ __('derecho_limitacion') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-indigo-50 to-blue-50 p-4 rounded-2xl border border-indigo-100 text-center">
                                        <i class="fas fa-download text-indigo-600 text-xl mb-2"></i>
                                        <p class="text-gray-700 font-medium text-sm">{{ __('derecho_portabilidad') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-indigo-50 to-blue-50 p-4 rounded-2xl border border-indigo-100 text-center">
                                        <i class="fas fa-ban text-indigo-600 text-xl mb-2"></i>
                                        <p class="text-gray-700 font-medium text-sm">{{ __('derecho_oposicion') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-green-500 to-emerald-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-sync-alt text-white"></i>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('cambios_politica') }}</h2>
                            </div>
                            <div class="ml-16 bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-2xl border border-green-100">
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('cambios_politica_p1') }}</p>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-cyan-500 to-blue-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-envelope text-white"></i>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('contacto_privacidad') }}</h2>
                            </div>
                            <div class="ml-16">
                                <p class="text-gray-700 leading-relaxed text-lg mb-6">{{ __('contacto_privacidad_p1') }}</p>
                                <div class="bg-gradient-to-br from-cyan-50 to-blue-50 p-8 rounded-3xl border border-cyan-100">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="text-2xl font-black text-gray-900 mb-4">TheJesStore</h4>
                                            <div class="space-y-3">
                                                <div class="flex items-center gap-3">
                                                    <i class="fas fa-envelope text-cyan-600"></i>
                                                    <span class="text-gray-700">{{ __('email') }}: {{ __('mail') }}</span>
                                                </div>
                                                <div class="flex items-center gap-3">
                                                    <i class="fas fa-map-marker-alt text-cyan-600"></i>
                                                    <span class="text-gray-700">{{ __('direccion') }}: {{ __('direccion_completa') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-center">
                                            <div class="w-32 h-32 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-full flex items-center justify-center shadow-2xl">
                                                <i class="fas fa-headset text-white text-4xl"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-500 to-cyan-500 rounded-3xl flex items-center justify-center mb-8 shadow-2xl">
                    <i class="fas fa-question-circle text-white text-2xl"></i>
                </div>

                <h3 class="text-3xl md:text-4xl font-black text-white mb-6 bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                    {{ __('tienes_preguntas') }}
                </h3>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                    {{ __('contactanos_dudas') }}
                </p>

                <a href="{{ route('contacto') }}" class="group inline-flex items-center bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl focus:ring-4 focus:ring-blue-500/20">
                    {{ __('contactanos') }}
                    <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
                </a>
            </div>
        </div>
    </div>
</body>
@endsection