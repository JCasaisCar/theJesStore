@extends('layouts.app')

@section('title', __('recuperar_contrasena'))

@section('content')
<body id="forgot-passwordPage">
<div class="relative bg-gradient-to-br from-amber-900 via-orange-900 to-red-800 overflow-hidden min-h-screen flex items-center">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
        <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-amber-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-orange-500 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/3 transform -translate-x-1/2 -translate-y-1/2 w-1/5 h-1/5 bg-red-400 rounded-full blur-2xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-1/6 h-1/4 bg-yellow-400 rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 py-12 relative z-10">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white/95 backdrop-blur-sm shadow-2xl rounded-2xl border border-white/20 overflow-hidden">
                    <div class="bg-gradient-to-r from-amber-600 via-orange-600 to-red-700 px-6 py-6 text-center">
                        <div class="w-16 h-16 mx-auto bg-white/20 rounded-full flex items-center justify-center mb-4 animate-pulse">
                            <i class="fas fa-unlock-alt text-white text-3xl"></i>
                        </div>
                        <h1 class="text-2xl font-bold text-white">{{ __('olvidaste_contrasena') }}</h1>
                        <p class="text-amber-100 text-sm mt-2">{{ __('ingresa_correo_para_restaurar') }}</p>
                    </div>

                    <div class="p-6">
                        <div class="mb-6">
                            <div class="flex items-center justify-between text-xs text-gray-600 mb-2">
                                <span>{{ __('paso_1_de_2') }}</span>
                                <span>{{ __('verificacion') }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-amber-500 to-orange-500 h-2 rounded-full w-1/2 transition-all duration-500"></div>
                            </div>
                        </div>

                        @if (session('status'))
                            <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl p-4 mb-6 animate__animated animate__fadeInDown">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-paper-plane text-green-600"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-semibold text-green-800 mb-1">{{ __('enlace_enviado') }}</h3>
                                        <p class="text-sm text-green-700">{{ session('status') }}</p>
                                        <div class="mt-3 flex items-center space-x-4">
                                            <span class="text-xs text-green-600">
                                                <i class="fas fa-clock mr-1"></i>
                                                {{ __('revisa_bandeja') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (!session('status'))
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-xl p-4 mb-6">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-info-circle text-blue-500 text-lg"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-semibold text-blue-800 mb-1">{{ __('recuperacion_segura') }}</h3>
                                        <p class="text-xs text-blue-700">{{ __('enlace_valido_60min') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('password.email') }}" method="POST" class="space-y-6" id="forgot-form">
                            @csrf

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
                                           class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-300 @error('email') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror"
                                           placeholder="{{ __('placeholder_email') }}">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <i id="email-icon" class="fas fa-at text-gray-400"></i>
                                    </div>
                                </div>
                                @error('email')
                                    <div class="flex items-center text-red-600 text-sm animate__animated animate__fadeInUp">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                <div class="text-xs text-gray-500">
                                    <i class="fas fa-shield-alt mr-1"></i>
                                    {{ __('email_registro') }}
                                </div>
                            </div>

                            <div class="pt-4">
                                <button type="submit" 
                                        class="w-full bg-gradient-to-r from-amber-600 via-orange-600 to-red-700 hover:from-amber-700 hover:via-orange-700 hover:to-red-800 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition transform hover:scale-105 hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed"
                                        id="submit-btn">
                                    <span id="btn-text">
                                        <i class="fas fa-paper-plane mr-2"></i>
                                        {{ __('enviar_enlace_restauracion') }}
                                    </span>
                                    <span id="btn-loading" class="hidden">
                                        <i class="fas fa-spinner fa-spin mr-2"></i>
                                        {{ __('enviando_enlace') }}
                                    </span>
                                </button>
                            </div>
                        </form>

                        @if (session('status'))
                            <div class="mt-6 space-y-4">
                                <div class="text-center">
                                    <button onclick="toggleEmailInstructions()" 
                                            class="text-amber-600 hover:text-amber-800 font-semibold text-sm transition">
                                        <i class="fas fa-question-circle mr-1"></i>
                                        {{ __('no_recibiste_email') }}
                                    </button>
                                </div>
                                
                                <div id="email-instructions" class="hidden bg-gray-50 rounded-xl p-4">
                                    <h4 class="text-sm font-semibold text-gray-800 mb-2">
                                        <i class="fas fa-search mr-1"></i>
                                        {{ __('revisa_lugares') }}
                                    </h4>
                                    <ul class="text-xs text-gray-600 space-y-1">
                                        <li class="flex items-center">
                                            <i class="fas fa-inbox mr-2 text-blue-500"></i>
                                            {{ __('bandeja_entrada') }}
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fas fa-filter mr-2 text-yellow-500"></i>
                                            {{ __('carpeta_spam') }}
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fas fa-clock mr-2 text-green-500"></i>
                                            {{ __('tardar_minutos') }}
                                        </li>
                                    </ul>
                                    <div class="mt-3 pt-3 border-t border-gray-200">
                                        <form action="{{ route('password.email') }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="email" value="{{ old('email') }}">
                                            <button type="submit" class="text-amber-600 hover:text-amber-800 font-semibold text-xs">
                                                <i class="fas fa-redo mr-1"></i>
                                                {{ __('reenviar_enlace') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="text-center mt-6">
                    <p class="text-white/80 text-sm">
                        {{ __('recordaste_contrasena') }} 
                        <a href="{{ route('login') }}" class="text-white font-semibold hover:text-amber-200 transition">
                            <i class="fas fa-arrow-left mr-1"></i>
                            {{ __('volver_login') }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute top-20 left-10 w-16 h-16 bg-amber-400/20 rounded-full animate-float-slow"></div>
    <div class="absolute top-1/4 right-20 w-12 h-12 bg-orange-400/20 rounded-full animate-float-medium"></div>
    <div class="absolute bottom-20 left-1/4 w-10 h-10 bg-red-400/20 rounded-full animate-float-fast"></div>
    <div class="absolute bottom-1/3 right-10 w-14 h-14 bg-yellow-400/20 rounded-full animate-float-slow"></div>
    <div class="absolute top-1/2 left-1/6 w-8 h-8 bg-amber-300/20 rounded-full animate-float-medium"></div>
    <div class="absolute bottom-1/4 left-1/2 w-6 h-6 bg-orange-300/20 rounded-full animate-float-fast"></div>
</div>

</body>


@endsection