@extends('layouts.app')
@section('title', 'Baja de la Newsletter')

@section('content')
<div class="container mx-auto px-4 py-12 text-center">
  <h1 class="text-3xl font-bold text-red-600 mb-4">¡Te has dado de baja!</h1>
  <p class="text-gray-700 text-lg">Tu correo <strong>{{ $email }}</strong> ha sido eliminado de nuestra newsletter.</p>
  <p class="mt-4 text-gray-500">Si esto ha sido un error, puedes volver a suscribirte desde nuestra página principal.</p>
  <a href="{{ route('home') }}" class="mt-6 inline-block bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700 transition">
    Volver al inicio
  </a>
</div>
@endsection