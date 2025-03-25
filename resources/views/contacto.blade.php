@extends('layouts.app')

@section('title', __('contacto'))

@section('content')
<div class="container mx-auto mt-5">
    <div class="text-center mb-4">
        <h1 class="font-bold text-4xl">{{ __('contacto') }}</h1>
        <p class="text-gray-500">{{ __('contacto_mensaje') }}</p>
    </div>

    <div class="bg-white shadow-lg p-4 rounded">
        <form action="{{ route('contacto.enviar') }}" method="POST">
            @csrf
            <div class="flex flex-wrap -mx-2">
                <div class="w-full md:w-1/2 px-2 mb-3">
                    <label for="nombre" class="block text-sm font-medium text-gray-700">{{ __('nombre') }}</label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" id="nombre" name="nombre" value="{{ $usuario->name }}" readonly>
                </div>
                <div class="w-full md:w-1/2 px-2 mb-3">
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('correo_electronico') }}</label>
                    <input type="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" id="email" name="email" value="{{ $usuario->email }}" readonly>
                </div>
            </div>
            <div class="mb-3">
                <label for="asunto" class="block text-sm font-medium text-gray-700">{{ __('asunto') }}</label>
                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" id="asunto" name="asunto" required>
            </div>
            <div class="mb-3">
                <label for="mensaje" class="block text-sm font-medium text-gray-700">{{ __('mensaje') }}</label>
                <textarea class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" id="mensaje" name="mensaje" rows="5" placeholder="{{ __('mensaje_aqui') }}" required></textarea>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded flex items-center">
                    <i class="fas fa-paper-plane mr-2"></i> {{ __('enviar_mensaje') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
