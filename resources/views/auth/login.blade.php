@extends('layouts.app')

@section('content')
<body id="loginPage">

<div class="relative bg-gradient-to-r from-blue-900 to-blue-700 overflow-hidden min-h-screen flex items-center">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
        <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-blue-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-purple-500 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-1/5 h-1/5 bg-pink-400 rounded-full blur-2xl"></div>
    </div>

    <div class="container mx-auto px-4 py-12 relative z-10">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white/95 backdrop-blur-sm shadow-2xl rounded-2xl border border-white/20 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-6 py-6 text-center">
                        <div class="w-16 h-16 mx-auto bg-white/20 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-user-circle text-white text-3xl"></i>
                        </div>
                        <h1 class="text-2xl font-bold text-white">{{ __('iniciar_sesion') }}</h1>
                        <p class="text-blue-100 text-sm mt-2">{{ __('accede_a_tu_cuenta') }}</p>
                    </div>

                    <div class="p-6">
                        @if (session('message'))
                            <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 border border-yellow-200 text-yellow-800 px-4 py-3 rounded-lg mb-6 animate__animated animate__fadeInDown">
                                <div class="flex items-center">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    {{ session('message') }}
                                </div>
                            </div>
                        @endif

                        @if (Auth::check() && !Auth::user()->hasVerifiedEmail())
                            <div class="bg-gradient-to-r from-red-50 to-red-100 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-6 animate__animated animate__fadeInDown">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-exclamation-triangle mr-2"></i>
                                    {{ __('cuenta_no_verificada') }}
                                </div>
                                <form method="POST" action="{{ route('verification.send') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition transform hover:scale-105 shadow-md">
                                        <i class="fas fa-envelope mr-1"></i>
                                        {{ __('reenviar_correo') }}
                                    </button>
                                </form>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
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
                                           autofocus 
                                           class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 @error('email') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror"
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
                                           autocomplete="current-password" 
                                           class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 @error('password') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror"
                                           placeholder="Tu contraseña">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <i class="fas fa-key text-gray-400"></i>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="flex items-center text-red-600 text-sm animate__animated animate__fadeInUp">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="flex flex-col space-y-4 pt-4">
                                <button type="submit" 
                                        class="w-full bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition transform hover:scale-105 hover:shadow-xl">
                                    <i class="fas fa-sign-in-alt mr-2"></i>
                                    {{ __('iniciar_sesion') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <div class="text-center">
                                        <a href="{{ route('password.request') }}" 
                                           class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold text-sm transition transform hover:scale-105">
                                            <i class="fas fa-key mr-1"></i>
                                            {{ __('olvido_contrasena') }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-6">
                    <p class="text-white/80 text-sm">
                        {{ __('no_tienes_cuenta') }} 
                        <a href="{{ route('register') }}" class="text-white font-semibold hover:text-blue-200 transition">
                            {{ __('registrate_aqui') }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute top-20 left-10 w-16 h-16 bg-blue-400/20 rounded-full animate-float-slow"></div>
    <div class="absolute top-1/3 right-20 w-12 h-12 bg-purple-400/20 rounded-full animate-float-medium"></div>
    <div class="absolute bottom-20 left-1/4 w-10 h-10 bg-pink-400/20 rounded-full animate-float-fast"></div>
    <div class="absolute bottom-1/3 right-10 w-14 h-14 bg-blue-300/20 rounded-full animate-float-slow"></div>
</div>

</body>
@endsection