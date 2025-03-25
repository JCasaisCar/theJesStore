@extends('layouts.app')

@section('title', __('restablecer_contrasena'))

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-2">{{ __('restablecer_contrasena') }}</h2>
    <p class="text-gray-600 mb-4">{{ __('introducir_nueva_contrasena') }}</p>

    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('correo_electronico') }}</label>
            <input type="email" id="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">{{ __('nueva_contrasena') }}</label>
            <input type="password" id="password" name="password" required class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">{{ __('confirmar_contrasena') }}</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            {{ __('restablecer_contrasena') }}
        </button>
    </form>
</div>
@endsection