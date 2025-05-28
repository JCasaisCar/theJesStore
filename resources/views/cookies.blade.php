@extends('layouts.app')
@section('title', __('política_cookies'))
@section('content')

<body id="cookiesPage">
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
                    <i class="fas fa-cookie-bite text-white text-3xl"></i>
                </div>

                <h1 class="text-4xl md:text-6xl font-black mb-6 bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                    {{ __('política_cookies') }}
                </h1>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                    {{ __('información_cookies_uso') }}
                </p>

                <div class="flex items-center justify-center text-sm">
                    <a href="{{ route('home') }}" class="text-blue-300 hover:text-white transition-colors duration-300 font-medium flex items-center">
                        <i class="fas fa-home mr-2"></i>{{ __('inicio') }}
                    </a>
                    <div class="mx-3 text-gray-400">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </div>
                    <span class="text-white font-medium">{{ __('política_cookies') }}</span>
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
                                    <i class="fas fa-question-circle text-white"></i>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('que_son_cookies') }}</h2>
                            </div>
                            <div class="ml-16 space-y-4">
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('cookies_intro_1') }}</p>
                                <p class="text-gray-700 leading-relaxed text-lg">{{ __('cookies_intro_2') }}</p>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-emerald-500 to-teal-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-layer-group text-white"></i>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('tipos_cookies') }}</h2>
                            </div>
                            <div class="ml-16 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-6 rounded-2xl border border-emerald-100">
                                    <div class="flex items-center gap-3 mb-3">
                                        <i class="fas fa-check-circle text-emerald-600 text-xl"></i>
                                        <h3 class="text-xl font-bold text-gray-800">{{ __('cookies_necesarias') }}</h3>
                                    </div>
                                    <p class="text-gray-700">{{ __('cookies_necesarias_desc') }}</p>
                                </div>
                                <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-2xl border border-purple-100">
                                    <div class="flex items-center gap-3 mb-3">
                                        <i class="fas fa-user-cog text-purple-600 text-xl"></i>
                                        <h3 class="text-xl font-bold text-gray-800">{{ __('cookies_preferencias') }}</h3>
                                    </div>
                                    <p class="text-gray-700">{{ __('cookies_preferencias_desc') }}</p>
                                </div>
                                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-2xl border border-blue-100">
                                    <div class="flex items-center gap-3 mb-3">
                                        <i class="fas fa-chart-bar text-blue-600 text-xl"></i>
                                        <h3 class="text-xl font-bold text-gray-800">{{ __('cookies_estadisticas') }}</h3>
                                    </div>
                                    <p class="text-gray-700">{{ __('cookies_estadisticas_desc') }}</p>
                                </div>
                                <div class="bg-gradient-to-br from-amber-50 to-orange-50 p-6 rounded-2xl border border-amber-100">
                                    <div class="flex items-center gap-3 mb-3">
                                        <i class="fas fa-bullhorn text-amber-600 text-xl"></i>
                                        <h3 class="text-xl font-bold text-gray-800">{{ __('cookies_marketing') }}</h3>
                                    </div>
                                    <p class="text-gray-700">{{ __('cookies_marketing_desc') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-12 relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-purple-500 to-pink-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-list-ul text-white"></i>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('cookies_utilizamos') }}</h2>
                            </div>
                            <div class="ml-16">
                                <div class="overflow-hidden rounded-2xl shadow-lg">
                                    <table class="min-w-full">
                                        <thead>
                                            <tr class="bg-gradient-to-r from-purple-500 to-pink-500 text-white">
                                                <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider">{{ __('nombre') }}</th>
                                                <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider">{{ __('proveedor') }}</th>
                                                <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider">{{ __('proposito') }}</th>
                                                <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider">{{ __('caducidad') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                            <tr class="hover:bg-purple-50 transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">laravel_session</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">thejesstore.com</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">{{ __('sesion_usuario') }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">{{ __('sesion') }}</td>
                                            </tr>

                                            <tr class="hover:bg-purple-50 transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">XSRF-TOKEN</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">thejesstore.com</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">{{ __('seguridad') }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">{{ __('sesion') }}</td>
                                            </tr>

                                            <tr class="hover:bg-purple-50 transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">__stripe_mid</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">Stripe</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">{{ __('pago_seguro') }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">1 {{ __('ano') }}</td>
                                            </tr>

                                            <tr class="hover:bg-purple-50 transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">cfz_google-analytics_v4</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">Google</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">{{ __('analitica') }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">1 {{ __('ano') }}</td>
                                            </tr>

                                            <tr class="hover:bg-purple-50 transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">cfz_facebook-pixel</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">Facebook</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">{{ __('marketing') }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">1 {{ __('ano') }}</td>
                                            </tr>

                                            <tr class="hover:bg-purple-50 transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">q_state_*</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">Cloudflare</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">{{ __('seguridad') }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-700">1 {{ __('ano') }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>





                        <div class="relative">
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-indigo-500 to-blue-500 rounded-full"></div>
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-blue-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-info text-white"></i>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 flex-1">{{ __('mas_info_cookies') }}</h2>
                            </div>
                            <div class="ml-16">
                                <p class="text-gray-700 leading-relaxed text-lg mb-6">{{ __('contacto_cookies_info') }}</p>
                                <div class="bg-gradient-to-br from-indigo-50 to-blue-50 p-8 rounded-3xl border border-indigo-100">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <h4 class="text-2xl font-black text-gray-900 mb-4">TheJesStore</h4>
                                            <div class="space-y-3">
                                                <div class="flex items-center gap-3">
                                                    <i class="fas fa-envelope text-indigo-600"></i>
                                                    <span class="text-gray-700">{{ __('email') }}: {{ __('mail') }}</span>
                                                </div>
                                                <div class="flex items-center gap-3">
                                                    <i class="fas fa-map-marker-alt text-indigo-600"></i>
                                                    <span class="text-gray-700">{{ __('direccion') }}: {{ __('direccion_completa') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-center">
                                            <div class="w-32 h-32 bg-gradient-to-br from-indigo-500 to-blue-500 rounded-full flex items-center justify-center shadow-2xl">
                                                <i class="fas fa-cookie text-white text-4xl"></i>
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

    <div id="cookie-banner" class="fixed bottom-0 left-0 w-full bg-white/95 backdrop-blur-md shadow-2xl border-t border-gray-200 p-6 z-50">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex-1 flex items-start gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg flex-shrink-0">
                        <i class="fas fa-cookie-bite text-white"></i>
                    </div>
                    <div>
                        <p class="text-gray-800 font-medium mb-1">{{ __('utilizamos_cookies') }}</p>
                        <p class="text-sm text-gray-600">
                            {{ __('cookie_banner_text') }}
                            <a href="{{ route('cookies') }}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">{{ __('política_cookies') }}</a>.
                        </p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-3">
                    <button id="accept-cookies" class="group inline-flex items-center bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        <i class="fas fa-check mr-2"></i>
                        {{ __('aceptar_todas') }}
                    </button>
                    <button id="customize-cookies" class="group inline-flex items-center bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-sliders-h mr-2"></i>
                        {{ __('personalizar') }}
                    </button>
                    <button id="reject-cookies" class="group inline-flex items-center bg-white hover:bg-gray-100 text-gray-700 font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 border border-gray-300">
                        <i class="fas fa-times mr-2"></i>
                        {{ __('solo_necesarias') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection