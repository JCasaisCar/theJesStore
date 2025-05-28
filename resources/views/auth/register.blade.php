@extends('layouts.app')

@section('content')
<body id="registerPage">

<div class="relative bg-gradient-to-br from-purple-900 via-blue-900 to-indigo-800 overflow-hidden min-h-screen flex items-center">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
        <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-purple-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-blue-500 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/3 transform -translate-x-1/2 -translate-y-1/2 w-1/5 h-1/5 bg-indigo-400 rounded-full blur-2xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-1/6 h-1/4 bg-pink-400 rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 py-12 relative z-10">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                <div class="bg-white/95 backdrop-blur-sm shadow-2xl rounded-2xl border border-white/20 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-700 px-6 py-6 text-center">
                        <div class="w-16 h-16 mx-auto bg-white/20 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-user-plus text-white text-3xl"></i>
                        </div>
                        <h1 class="text-2xl font-bold text-white">{{ __('registrarse') }}</h1>
                        <p class="text-purple-100 text-sm mt-2">{{ __('crea_tu_cuenta_nueva') }}</p>
                    </div>

                    <div class="p-6">
                        <form method="POST" action="{{ route('register') }}" class="space-y-6">
                            @csrf
                            
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-semibold text-gray-700">
                                    <i class="fas fa-user mr-2 text-gray-500"></i>
                                    {{ __('nombre') }}
                                </label>
                                <div class="relative">
                                    <input id="name" 
                                           type="text" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                                           required 
                                           autocomplete="name" 
                                           autofocus 
                                           class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300 @error('name') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror"
                                           placeholder="Tu nombre completo">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <i class="fas fa-id-card text-gray-400"></i>
                                    </div>
                                </div>
                                @error('name')
                                    <div class="flex items-center text-red-600 text-sm animate__animated animate__fadeInUp">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-semibold text-gray-700">
                                    <i class="fas fa-envelope mr-2 text-gray-500"></i>
                                    {{ __('correo_electronico') }}
                                </label>
                                <div class="relative">
                                    <input id="email" 
                                           type="email" 
                                           name="email" 
                                           value="{{ old('email') }}" 
                                           required 
                                           autocomplete="email" 
                                           class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300 @error('email') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror"
                                           placeholder="tu@email.com">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <i class="fas fa-at text-gray-400"></i>
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
                                    {{ __('contrasena') }}
                                </label>
                                <div class="relative">
                                    <input id="password" 
                                           type="password" 
                                           name="password" 
                                           required 
                                           autocomplete="new-password" 
                                           class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300 @error('password') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror"
                                           placeholder="Mínimo 8 caracteres"
                                           minlength="8">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <i class="fas fa-key text-gray-400"></i>
                                    </div>
                                </div>
                                <div class="flex space-x-1 mt-2">
                                    <div class="h-1 flex-1 bg-gray-200 rounded password-strength" data-strength="0"></div>
                                    <div class="h-1 flex-1 bg-gray-200 rounded password-strength" data-strength="1"></div>
                                    <div class="h-1 flex-1 bg-gray-200 rounded password-strength" data-strength="2"></div>
                                    <div class="h-1 flex-1 bg-gray-200 rounded password-strength" data-strength="3"></div>
                                </div>
                                <p class="text-xs text-gray-500">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Usa mayúsculas, minúsculas, números y símbolos
                                </p>
                                @error('password')
                                    <div class="flex items-center text-red-600 text-sm animate__animated animate__fadeInUp">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="password-confirm" class="block text-sm font-semibold text-gray-700">
                                    <i class="fas fa-check-double mr-2 text-gray-500"></i>
                                    {{ __('confirmar_contrasena') }}
                                </label>
                                <div class="relative">
                                    <input id="password-confirm" 
                                           type="password" 
                                           name="password_confirmation" 
                                           required 
                                           autocomplete="new-password" 
                                           class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300"
                                           placeholder="Repite tu contraseña">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <i id="password-match-icon" class="fas fa-times text-red-400 hidden"></i>
                                    </div>
                                </div>
                                <div id="password-match-message" class="text-xs text-gray-500 hidden">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    <span id="match-text">Las contraseñas no coinciden</span>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3 p-4 bg-gray-50 rounded-xl">
                                <input type="checkbox" 
                                       id="terms" 
                                       name="terms" 
                                       required 
                                       class="mt-1 w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                                <label for="terms" class="text-sm text-gray-700 leading-relaxed">
                                    <i class="fas fa-file-contract mr-1 text-gray-500"></i>
                                    {{ __('acepto_los') }} 
                                    <a href="{{ route('terms') }}" class="text-purple-600 hover:text-purple-800 font-semibold underline">{{ __('terminos_condiciones') }}</a> 
                                    {{ __('y_la') }} 
                                    <a href="{{ route('privacy') }}" class="text-purple-600 hover:text-purple-800 font-semibold underline">{{ __('politica_privacidad') }}</a>
                                </label>
                            </div>

                            <div class="pt-4">
                                <button type="submit" 
                                        class="w-full bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-700 hover:from-purple-700 hover:via-blue-700 hover:to-indigo-800 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition transform hover:scale-105 hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed"
                                        id="register-btn">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    {{ __('registrarse') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-6">
                    <p class="text-white/80 text-sm">
                        {{ __('ya_tienes_cuenta') }} 
                        <a href="{{ route('login') }}" class="text-white font-semibold hover:text-purple-200 transition">
                            {{ __('inicia_sesion_aqui') }}
                        </a>
                    </p>
                </div>

                
            </div>
        </div>
    </div>

    <div class="absolute top-20 left-10 w-16 h-16 bg-purple-400/20 rounded-full animate-float-slow"></div>
    <div class="absolute top-1/4 right-20 w-12 h-12 bg-blue-400/20 rounded-full animate-float-medium"></div>
    <div class="absolute bottom-20 left-1/4 w-10 h-10 bg-indigo-400/20 rounded-full animate-float-fast"></div>
    <div class="absolute bottom-1/3 right-10 w-14 h-14 bg-pink-400/20 rounded-full animate-float-slow"></div>
    <div class="absolute top-1/2 left-1/6 w-8 h-8 bg-purple-300/20 rounded-full animate-float-medium"></div>
    <div class="absolute bottom-1/4 left-1/2 w-6 h-6 bg-blue-300/20 rounded-full animate-float-fast"></div>
</div>

</body>


@endsection