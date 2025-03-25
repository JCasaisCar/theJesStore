@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
  <div class="flex justify-center">
    <div class="w-full max-w-2xl">
      <div class="bg-white shadow rounded-lg">
        <!-- Encabezado -->
        <div class="px-4 py-3 border-b border-gray-200 font-bold">
          {{ __('Reset Password') }}
        </div>
        <!-- Cuerpo del Card -->
        <div class="p-4">
          <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            
            <!-- Campo Email -->
            <div class="flex flex-wrap mb-4">
              <label for="email" class="w-full md:w-1/3 text-right md:pr-4 text-sm font-medium text-gray-700">
                {{ __('Email Address') }}
              </label>
              <div class="w-full md:w-2/3">
                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                @error('email')
                  <span class="text-red-500 text-sm mt-1" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            
            <!-- Campo Contraseña -->
            <div class="flex flex-wrap mb-4">
              <label for="password" class="w-full md:w-1/3 text-right md:pr-4 text-sm font-medium text-gray-700">
                {{ __('Password') }}
              </label>
              <div class="w-full md:w-2/3">
                <input id="password" type="password" name="password" required autocomplete="new-password" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror">
                @error('password')
                  <span class="text-red-500 text-sm mt-1" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            
            <!-- Campo Confirmar Contraseña -->
            <div class="flex flex-wrap mb-4">
              <label for="password-confirm" class="w-full md:w-1/3 text-right md:pr-4 text-sm font-medium text-gray-700">
                {{ __('Confirm Password') }}
              </label>
              <div class="w-full md:w-2/3">
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
              </div>
            </div>
            
            <!-- Botón Enviar -->
            <div class="flex justify-end">
              <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                {{ __('Reset Password') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection