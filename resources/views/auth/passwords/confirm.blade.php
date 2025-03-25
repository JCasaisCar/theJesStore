@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
  <div class="flex justify-center">
    <div class="w-full max-w-lg">
      <div class="bg-white shadow rounded-lg">
        <!-- Encabezado -->
        <div class="px-4 py-3 border-b border-gray-200 font-bold">
          {{ __('Confirm Password') }}
        </div>
        <!-- Cuerpo del Card -->
        <div class="p-4">
          <p class="mb-4 text-gray-700">
            {{ __('Please confirm your password before continuing.') }}
          </p>
          <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <!-- Campo de Contraseña -->
            <div class="flex flex-wrap mb-4">
              <label for="password" class="w-full md:w-1/3 text-right md:pr-4 text-sm font-medium text-gray-700">
                {{ __('Password') }}
              </label>
              <div class="w-full md:w-2/3">
                <input id="password" type="password" name="password" required autocomplete="current-password" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror">
                @error('password')
                  <span class="text-red-500 text-sm mt-1" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <!-- Botón y Enlace -->
            <div class="flex flex-wrap">
              <div class="w-full md:w-2/3 md:ml-auto md:pl-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                  {{ __('Confirm Password') }}
                </button>
                @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}" class="text-blue-500 hover:text-blue-700 font-semibold underline ml-4">
                    {{ __('Forgot Your Password?') }}
                  </a>
                @endif
              </div>
            </div>
          </form>
        </div>
        <!-- Fin del Card Body -->
      </div>
    </div>
  </div>
</div>
@endsection