@extends('layouts.app')

@section('title', __('restablecer_contrasena'))

@section('content')
<body id="reset-passwordPage">

<div class="relative bg-gradient-to-br from-emerald-900 via-teal-900 to-cyan-800 overflow-hidden min-h-screen flex items-center">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
        <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-emerald-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-teal-500 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/3 transform -translate-x-1/2 -translate-y-1/2 w-1/5 h-1/5 bg-cyan-400 rounded-full blur-2xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-1/6 h-1/4 bg-green-400 rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 py-12 relative z-10">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white/95 backdrop-blur-sm shadow-2xl rounded-2xl border border-white/20 overflow-hidden">
                    <div class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-700 px-6 py-6 text-center">
                        <div class="w-16 h-16 mx-auto bg-white/20 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-key text-white text-3xl"></i>
                        </div>
                        <h1 class="text-2xl font-bold text-white">{{ __('restablecer_contrasena') }}</h1>
                        <p class="text-emerald-100 text-sm mt-2">{{ __('introducir_nueva_contrasena') }}</p>
                    </div>

                    <div class="p-6">
                        <div class="mb-6">
                            <div class="flex items-center justify-between text-xs text-gray-600 mb-2">
                                <span>{{ __('paso_2_de_2') }}</span>
                                <span>{{ __('casi_listo') }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-2 rounded-full w-full transition-all duration-500"></div>
                            </div>
                        </div>

                        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border border-blue-200 rounded-xl p-4 mb-6">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-info-circle text-blue-500 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-blue-800 mb-1">{{ __('nueva_contrasena_segura') }}</h3>
                                    <p class="text-xs text-blue-700">{{ __('crear_contrasena_fuerte') }}</p>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
                            @csrf
                            <input type="hidden" name="token" value="{{ request()->route('token') }}">

                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-semibold text-gray-700">
                                    <i class="fas fa-envelope mr-2 text-gray-500"></i>
                                    {{ __('correo_electronico') }}
                                </label>
                                <div class="relative">
                                    <input id="email" 
                                           type="email" 
                                           name="email" 
                                           value="{{ old('email', request()->email) }}" 
                                           required 
                                           autocomplete="email"
                                           class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300 @error('email') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror"
                                           placeholder="{{ __('placeholder_email') }}"
                                           readonly>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <i class="fas fa-check-circle text-emerald-500"></i>
                                    </div>
                                </div>
                                @error('email')
                                    <div class="flex items-center text-red-600 text-sm animate__animated animate__fadeInUp">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="password" class="block text-sm font-semibold text-gray-700">
                                    <i class="fas fa-lock mr-2 text-gray-500"></i>
                                    {{ __('nueva_contrasena') }}
                                </label>
                                <div class="relative">
                                    <input id="password" 
                                           type="password" 
                                           name="password" 
                                           required 
                                           autocomplete="new-password"
                                           class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300 @error('password') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror"
                                           placeholder="{{ __('placeholder_nueva_contrasena') }}"
                                           minlength="8">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <button type="button" onclick="togglePassword('password')" class="text-gray-400 hover:text-gray-600">
                                            <i id="password-eye" class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex space-x-1 mt-2">
                                    <div class="h-1 flex-1 bg-gray-200 rounded password-strength" data-strength="0"></div>
                                    <div class="h-1 flex-1 bg-gray-200 rounded password-strength" data-strength="1"></div>
                                    <div class="h-1 flex-1 bg-gray-200 rounded password-strength" data-strength="2"></div>
                                    <div class="h-1 flex-1 bg-gray-200 rounded password-strength" data-strength="3"></div>
                                </div>
                                <div class="flex items-center justify-between text-xs">
                                    <span class="text-gray-500">
                                        <i class="fas fa-shield-alt mr-1"></i>
                                        {{ __('fortaleza') }} <span id="strength-text" class="font-semibold">{{ __('debil') }}</span>
                                    </span>
                                    <span id="password-length" class="text-gray-500">0/8 {{ __('min_caracteres') }}</span>
                                </div>
                                @error('password')
                                    <div class="flex items-center text-red-600 text-sm animate__animated animate__fadeInUp">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">
                                    <i class="fas fa-check-double mr-2 text-gray-500"></i>
                                    {{ __('confirmar_contrasena') }}
                                </label>
                                <div class="relative">
                                    <input id="password_confirmation" 
                                           type="password" 
                                           name="password_confirmation" 
                                           required 
                                           autocomplete="new-password"
                                           class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300"
                                           placeholder="{{ __('placeholder_confirmar_nueva') }}">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <i id="password-match-icon" class="fas fa-times text-red-400 hidden"></i>
                                    </div>
                                </div>
                                <div id="password-match-message" class="text-xs text-gray-500 hidden">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    <span id="match-text">{{ __('contraseñas_no_coinciden') }}</span>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200 rounded-xl p-4">
                                <h4 class="text-sm font-semibold text-emerald-800 mb-2">
                                    <i class="fas fa-lightbulb mr-1"></i>
                                    {{ __('consejos_contrasena_segura') }}
                                </h4>
                                <ul class="text-xs text-emerald-700 space-y-1">
                                    <li class="flex items-center">
                                        <i class="fas fa-check mr-2 text-emerald-500"></i>
                                        {{ __('usa_8_caracteres') }}
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-check mr-2 text-emerald-500"></i>
                                        {{ __('combina_mayusculas') }}
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-check mr-2 text-emerald-500"></i>
                                        {{ __('incluye_numeros') }}
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-check mr-2 text-emerald-500"></i>
                                        {{ __('evita_palabras_comunes') }}
                                    </li>
                                </ul>
                            </div>

                            <div class="pt-4">
                                <button type="submit" 
                                        class="w-full bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-700 hover:from-emerald-700 hover:via-teal-700 hover:to-cyan-800 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition transform hover:scale-105 hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed"
                                        id="reset-btn">
                                    <i class="fas fa-shield-alt mr-2"></i>
                                    {{ __('restablecer_contrasena') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-6">
                    <p class="text-white/80 text-sm">
                        {{ __('recordaste_contrasena') }} 
                        <a href="{{ route('login') }}" class="text-white font-semibold hover:text-emerald-200 transition">
                            <i class="fas fa-arrow-left mr-1"></i>
                            {{ __('volver_login') }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute top-20 left-10 w-16 h-16 bg-emerald-400/20 rounded-full animate-float-slow"></div>
    <div class="absolute top-1/4 right-20 w-12 h-12 bg-teal-400/20 rounded-full animate-float-medium"></div>
    <div class="absolute bottom-20 left-1/4 w-10 h-10 bg-cyan-400/20 rounded-full animate-float-fast"></div>
    <div class="absolute bottom-1/3 right-10 w-14 h-14 bg-green-400/20 rounded-full animate-float-slow"></div>
    <div class="absolute top-1/2 left-1/6 w-8 h-8 bg-emerald-300/20 rounded-full animate-float-medium"></div>
    <div class="absolute bottom-1/4 left-1/2 w-6 h-6 bg-teal-300/20 rounded-full animate-float-fast"></div>
</div>
</body>



@endsection