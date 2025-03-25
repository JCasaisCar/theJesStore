@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-center">
        <div class="w-full max-w-2xl">
            <div class="bg-white shadow rounded-lg">
                <!-- Encabezado del Card -->
                <div class="px-4 py-3 border-b border-gray-200 font-bold">
                    {{ __('iniciar_sesion') }}
                </div>
                <div class="p-4">
                    <!-- Mensaje de alerta (warning) -->
                    @if (session('message'))
                        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
                            {{ session('message') }}
                        </div>
                    @endif

                    <!-- Alerta para cuenta no verificada -->
                    @if (Auth::check() && !Auth::user()->hasVerifiedEmail())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            {{ __('cuenta_no_verificada') }}
                            <form method="POST" action="{{ route('verification.send') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-blue-500 hover:text-blue-700 font-semibold underline">
                                    {{ __('reenviar_correo') }}
                                </button>
                            </form>
                        </div>
                    @endif

                    <!-- Formulario de Inicio de Sesión -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Campo Correo Electrónico -->
                        <div class="mb-4 flex flex-wrap items-center">
                            <label for="email" class="w-full md:w-1/3 text-right md:pr-4 text-sm font-medium text-gray-700">
                                {{ __('correo_electronico') }}
                            </label>
                            <div class="w-full md:w-2/3">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                                @error('email')
                                    <span class="text-red-500 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Campo Contraseña -->
                        <div class="mb-4 flex flex-wrap items-center">
                            <label for="password" class="w-full md:w-1/3 text-right md:pr-4 text-sm font-medium text-gray-700">
                                {{ __('contrasena') }}
                            </label>
                            <div class="w-full md:w-2/3">
                                <input id="password" type="password" name="password" required autocomplete="current-password" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror">
                                @error('password')
                                    <span class="text-red-500 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Botón de Envío y Enlace Olvidé Contraseña -->
                        <div class="mb-0 flex flex-wrap items-center">
                            <div class="w-full md:w-2/3 md:ml-1 md:pl-4">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                    {{ __('iniciar_sesion') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-blue-500 hover:text-blue-700 font-semibold underline ml-4">
                                        {{ __('olvido_contrasena') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <!-- Fin del formulario -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection