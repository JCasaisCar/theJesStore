@extends('layouts.app')
@section('title', __('terminos_condiciones'))
@section('content')

<body id="termsPage">
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
                    <i class="fas fa-file-contract text-white text-3xl"></i>
                </div>

                <h1 class="text-4xl md:text-6xl font-black mb-6 bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                    {{ __('terminos_condiciones') }}
                </h1>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                    {{ __('condiciones_uso_sitio') }}
                </p>

                <div class="flex items-center justify-center text-sm">
                    <a href="{{ route('home') }}" class="text-blue-300 hover:text-white transition-colors duration-300 font-medium flex items-center">
                        <i class="fas fa-home mr-2"></i>{{ __('inicio') }}
                    </a>
                    <div class="mx-3 text-gray-400">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </div>
                    <span class="text-white font-medium">{{ __('terminos_condiciones') }}</span>
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
                                    <span class="text-white font-bold text-lg">1</span>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('introduccion') }}</h2>
                            </div>
                            <div class="ml-16 space-y-4">
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('terminos_intro_1') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('terminos_intro_2') }}</p>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-emerald-500 to-teal-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-lg">2</span>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('definiciones') }}</h2>
                            </div>
                            <div class="ml-16">
                                <p class="text-gray-700 leading-relaxed text-lg mb-6">{{ __('definiciones_intro') }}</p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-4 rounded-2xl border border-emerald-100">
                                        <h4 class="font-bold text-emerald-700 mb-2">{{ __('sitio') }}</h4>
                                        <p class="text-gray-700 text-sm">{{ __('def_sitio') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-4 rounded-2xl border border-emerald-100">
                                        <h4 class="font-bold text-emerald-700 mb-2">{{ __('usuario') }}</h4>
                                        <p class="text-gray-700 text-sm">{{ __('def_usuario') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-4 rounded-2xl border border-emerald-100">
                                        <h4 class="font-bold text-emerald-700 mb-2">{{ __('cliente') }}</h4>
                                        <p class="text-gray-700 text-sm">{{ __('def_cliente') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-4 rounded-2xl border border-emerald-100">
                                        <h4 class="font-bold text-emerald-700 mb-2">{{ __('cuenta') }}</h4>
                                        <p class="text-gray-700 text-sm">{{ __('def_cuenta') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-4 rounded-2xl border border-emerald-100">
                                        <h4 class="font-bold text-emerald-700 mb-2">{{ __('contenido') }}</h4>
                                        <p class="text-gray-700 text-sm">{{ __('def_contenido') }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-4 rounded-2xl border border-emerald-100">
                                        <h4 class="font-bold text-emerald-700 mb-2">{{ __('condiciones') }}</h4>
                                        <p class="text-gray-700 text-sm">{{ __('def_condiciones') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-purple-500 to-pink-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-lg">3</span>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('acceso_sitio') }}</h2>
                            </div>
                            <div class="ml-16 space-y-4">
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('acceso_sitio_p1') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('acceso_sitio_p2') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('acceso_sitio_p3') }}</p>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-amber-500 to-orange-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-lg">4</span>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('cuenta_usuario') }}</h2>
                            </div>
                            <div class="ml-16 space-y-4">
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('cuenta_usuario_p1') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('cuenta_usuario_p2') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('cuenta_usuario_p3') }}</p>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-red-500 to-rose-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-rose-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-lg">5</span>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('productos_pedidos') }}</h2>
                            </div>
                            <div class="ml-16 space-y-4">
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('productos_pedidos_p1') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('productos_pedidos_p2') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('productos_pedidos_p3') }}</p>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-indigo-500 to-blue-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-blue-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-lg">6</span>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('precios_pagos') }}</h2>
                            </div>
                            <div class="ml-16 space-y-4">
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('precios_pagos_p1') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('precios_pagos_p2') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('precios_pagos_p3') }}</p>
                                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 border-l-4 border-blue-500 p-6 rounded-2xl">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-info-circle text-blue-500 text-xl"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-blue-700 leading-relaxed">{{ __('precios_pagos_info') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-green-500 to-emerald-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-lg">7</span>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('envios_entregas') }}</h2>
                            </div>
                            <div class="ml-16 space-y-4">
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('envios_entregas_p1') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('envios_entregas_p2') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg mb-6">{{ __('envios_entregas_p3') }}</p>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-yellow-500 to-amber-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-lg">8</span>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('devoluciones_reembolsos') }}</h2>
                            </div>
                            <div class="ml-16 space-y-4">
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('devoluciones_p1') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('devoluciones_p2') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('devoluciones_p3') }}</p>
                                <div class="bg-gradient-to-br from-yellow-50 to-amber-50 border-l-4 border-yellow-500 p-6 rounded-2xl">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-exclamation-circle text-yellow-500 text-xl"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-yellow-700 leading-relaxed">{{ __('devoluciones_aviso') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-purple-500 to-indigo-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-lg">9</span>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('propiedad_intelectual') }}</h2>
                            </div>
                            <div class="ml-16 space-y-4">
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('propiedad_p1') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('propiedad_p2') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('propiedad_p3') }}</p>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-cyan-500 to-teal-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-teal-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-lg">10</span>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('privacidad_datos') }}</h2>
                            </div>
                            <div class="ml-16 space-y-4">
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('privacidad_p1') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('privacidad_p2') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('privacidad_p3') }}</p>
                                <p>
                                    <a href="{{ route('privacy') }}" class="inline-flex items-center text-cyan-600 hover:text-cyan-800 transition-colors duration-300 font-medium">
                                        <i class="fas fa-shield-alt mr-2"></i>
                                        {{ __('ver_politica_privacidad') }}
                                        <i class="fas fa-arrow-right ml-2"></i>
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-red-500 to-pink-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-lg">11</span>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('limitacion_responsabilidad') }}</h2>
                            </div>
                            <div class="ml-16 space-y-4">
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('limitacion_p1') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('limitacion_p2') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('limitacion_p3') }}</p>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-emerald-500 to-green-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-green-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-lg">12</span>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('modificaciones') }}</h2>
                            </div>
                            <div class="ml-16 space-y-4">
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('modificaciones_p1') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('modificaciones_p2') }}</p>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-indigo-500 to-purple-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-lg">13</span>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('legislacion_aplicable') }}</h2>
                            </div>
                            <div class="ml-16 space-y-4">
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('legislacion_p1') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('legislacion_p2') }}</p>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-blue-500 to-cyan-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-lg">14</span>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('contacto') }}</h2>
                            </div>
                            <div class="ml-16">
                                <p class="text-gray-700 leading-relaxed text-lg mb-6">{{ __('contacto_p1') }}</p>
                                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-8 rounded-3xl border border-blue-100">
                                    <h3 class="text-2xl font-black text-gray-900 mb-6">{{ __('informacion_contacto') }}</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-4">
                                            <div class="flex items-start">
                                                <i class="fas fa-envelope text-blue-600 mt-1 mr-3 text-lg"></i>
                                                <span class="text-gray-700">{{ __('email') }}: <a href="mailto:{{ __('mail') }}" class="text-blue-600 hover:text-blue-800 transition-colors font-medium">{{ __('mail') }}</a></span>
                                            </div>
                                            <div class="flex items-start">
                                                <i class="fas fa-map-marker-alt text-blue-600 mt-1 mr-3 text-lg"></i>
                                                <span class="text-gray-700">{{ __('direccion') }}: {{ __('direccion_completa') }}</span>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-center">
                                            <a href="{{ route('contacto') }}" class="group inline-flex items-center bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl focus:ring-4 focus:ring-blue-500/20">
                                                <i class="fas fa-paper-plane mr-3"></i>
                                                {{ __('formulario_contacto') }}
                                                <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
                                            </a>
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
                    <i class="fas fa-handshake text-white text-2xl"></i>
                </div>

                <h3 class="text-3xl md:text-4xl font-black text-white mb-6 bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                    {{ __('acepta_terminos') }}
                </h3>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                    {{ __('uso_sitio_implica') }}
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}" class="group inline-flex items-center bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl focus:ring-4 focus:ring-blue-500/20">
                        {{ __('ir_compras') }}
                        <i class="fas fa-shopping-cart ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                    <a href="{{ route('privacy') }}" class="group inline-flex items-center bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:scale-105 border border-white/20">
                        {{ __('politica_privacidad') }}
                        <i class="fas fa-shield-alt ml-3"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection