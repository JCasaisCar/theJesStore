@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-center">
        <div class="w-full max-w-2xl">
            <div class="bg-white shadow rounded">
                <div class="px-4 py-2 border-b border-gray-200 font-bold">
                    {{ __('verificacion_correo') }}
                </div>
                <div class="p-4">
                    @if (session('message'))
                        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
                            {{ session('message') }}
                        </div>
                    @endif

                    <p>{{ __('correo_verificacion_enviado') }}</p>
                    <p>{{ __('reenviar_correo_mensaje') }}</p>

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            {{ __('reenviar_correo_verificacion') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection