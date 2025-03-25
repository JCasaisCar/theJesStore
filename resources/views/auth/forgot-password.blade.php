@extends('layouts.app')

@section('title', __('recuperar_contrasena'))

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-2">{{ __('olvidaste_contrasena') }}</h2>
    <p class="mb-4 text-gray-600">{{ __('ingresa_correo_para_restaurar') }}</p>

    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('correo_electronico') }}</label>
            <input type="email" id="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            {{ __('enviar_enlace_restauracion') }}
        </button>
    </form>
</div>
@endsection