@extends('layouts.app')
@section('title',__('crear_codigo_descuento'))
@section('content')

<body id="discount-codes-create">

    <div class="relative bg-gradient-to-br from-slate-900 via-purple-900 to-indigo-900 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-10 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute top-40 right-20 w-80 h-80 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
            <div class="absolute bottom-10 left-1/3 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
        </div>

        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3csvg width=" 40" height="40" xmlns="http://www.w3.org/2000/svg" %3e%3cdefs%3e%3cpattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse" %3e%3cpath d="m 40 0 l 0 40 m -40 0 l 40 0" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1" /%3e%3c/pattern%3e%3c/defs%3e%3crect width="100%25" height="100%25" fill="url(%23grid)" /%3e%3c/svg%3e')] opacity-30"></div>

        <div class="container mx-auto px-4 py-20 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="w-24 h-24 mx-auto bg-gradient-to-br from-emerald-500 to-green-500 rounded-3xl flex items-center justify-center mb-8 shadow-2xl animate-bounce-slow">
                    <i class="fas fa-tags text-white text-3xl"></i>
                </div>

                <h1 class="text-4xl md:text-6xl font-black mb-6 bg-gradient-to-r from-white via-green-200 to-emerald-200 bg-clip-text text-transparent animate__animated animate__fadeInUp">
                    {{ __('crear') }} <span class="bg-gradient-to-r from-green-300 to-emerald-300 bg-clip-text text-transparent">{{ __('codigos_de_descuento') }}</span>
                </h1>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed animate__animated animate__fadeInUp animate__delay-1s">
                    {{ __('genera_codigos_promocionales_para_tus_clientes') }}
                </p>

                <div class="flex items-center justify-center text-sm animate__animated animate__fadeInUp animate__delay-2s">
                    <a href="{{ route('home') }}" class="text-blue-300 hover:text-white transition-colors duration-300 font-medium flex items-center">
                        <i class="fas fa-home mr-2"></i>{{ __('inicio') }}
                    </a>
                    <div class="mx-3 text-gray-400">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </div>
                    <span class="text-white font-medium">{{ __('crear_codigo_de_descuento') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-gray-50 via-white to-gray-50 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto">
                <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 border border-gray-100">
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 mx-auto bg-gradient-to-br from-emerald-500 to-green-500 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                            <i class="fas fa-percent text-white text-2xl"></i>
                        </div>
                        <h2 class="text-3xl font-black text-gray-800 mb-2 bg-gradient-to-r from-emerald-600 to-green-600 bg-clip-text text-transparent">
                            {{ __('Nuevo_codigo_promocional') }}
                        </h2>
                        <p class="text-gray-600">{{ __('completa_los_datos_para_crear_tu_codigo_de_descuento') }}</p>
                    </div>

                    <form method="POST" action="{{ route('discount_codes.store') }}" class="space-y-6">
                        @csrf

                        <div class="group">
                            <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                                <i class="fas fa-tag text-emerald-500"></i>
                                {{ __('codigo') }} *
                            </label>
                            <div class="relative">
                                <input name="code" required
                                    class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-6 py-4 text-gray-800 font-medium focus:border-emerald-500 focus:bg-white focus:outline-none transition-all duration-300 group-hover:border-gray-300">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-6">
                                    <i class="fas fa-keyboard text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                                <i class="fas fa-percent text-emerald-500"></i>
                                % {{ __('Descuento') }} *
                            </label>
                            <div class="relative">
                                <input name="percentage" type="number" min="1" max="100" required
                                    class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-6 py-4 text-gray-800 font-medium focus:border-emerald-500 focus:bg-white focus:outline-none transition-all duration-300 group-hover:border-gray-300">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-6">
                                    <span class="text-gray-400 font-bold">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                                <i class="fas fa-calendar-alt text-emerald-500"></i>
                                {{ __('fecha_de_expiracion') }}
                            </label>
                            <div class="relative">
                                <input name="expires_at" type="date"
                                    class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-6 py-4 text-gray-800 font-medium focus:border-emerald-500 focus:bg-white focus:outline-none transition-all duration-300 group-hover:border-gray-300">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-6">
                                    <i class="fas fa-clock text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                                <i class="fas fa-users text-emerald-500"></i>
                                {{ __('usuarios_asignados_opcional') }}
                            </label>
                            <div class="relative">
                                <select name="users[]" multiple
                                    class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-6 py-4 text-gray-800 font-medium focus:border-emerald-500 focus:bg-white focus:outline-none transition-all duration-300 group-hover:border-gray-300 min-h-[120px]">
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" class="py-2">{{ $user->name }} ({{ $user->email }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2 p-3 bg-blue-50 rounded-xl border border-blue-200">
                                <p class="text-sm text-blue-700 flex items-center gap-2">
                                    <i class="fas fa-info-circle"></i>
                                    {{ __('si_no_seleccionas_usuarios_se_aplicara_a_todos') }}
                                </p>
                            </div>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                                <i class="fas fa-toggle-on text-emerald-500"></i>
                                {{ __('estado') }} *
                            </label>
                            <div class="relative">
                                <select name="is_active" required
                                    class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-6 py-4 text-gray-800 font-medium focus:border-emerald-500 focus:bg-white focus:outline-none transition-all duration-300 group-hover:border-gray-300 appearance-none">
                                    <option value="1" selected>{{ __('activo') }}</option>
                                    <option value="0">{{ __('inactivo') }}</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-6 pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4 pt-6">
                            <button type="submit"
                                class="group flex-1 bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl flex items-center justify-center gap-3">
                                <i class="fas fa-plus-circle"></i>
                                {{ __('crear_codigo_de_descuento') }}
                                <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform duration-300"></i>
                            </button>

                            <a href="{{ route('discount_codes.index') }}"
                                class="group flex-none bg-white hover:bg-gray-50 text-gray-700 font-bold py-4 px-8 rounded-2xl transition-all duration-300 border-2 border-gray-200 hover:border-gray-300 flex items-center justify-center gap-3">
                                <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform duration-300"></i>
                                {{ __('cancelar') }}
                            </a>
                        </div>
                    </form>
                </div>

                <div class="mt-8 bg-gradient-to-r from-blue-50 to-purple-50 rounded-3xl p-8 border border-blue-100">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-500 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-lightbulb text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-2">{{ __('consejos_para_codigos_efectivos') }}</h3>
                            <ul class="text-gray-600 space-y-1 text-sm">
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-check text-green-500 text-xs"></i>
                                    {{ __('usa_codigos_faciles_de_recordar_pero_unicos') }}
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-check text-green-500 text-xs"></i>
                                    {{ __('establece_fechas_de_expiracion_para_crear_urgencia') }}
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="fas fa-check text-green-500 text-xs"></i>
                                    {{ __('considera_limitar_a_usuarios_especificos_para_promociones_exclusivas') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection