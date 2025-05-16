@extends('layouts.app')
@section('title', 'Correo no encontrado')

@section('content')
<div class="container mx-auto px-4 py-12 text-center">
  <h1 class="text-3xl font-bold text-yellow-600 mb-4">Correo no encontrado</h1>
  <p class="text-gray-700 text-lg">El correo <strong>{{ $email }}</strong> no está registrado en nuestra newsletter.</p>
  <a href="{{ route('home') }}" class="mt-6 inline-block bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700 transition">
    Volver al inicio
  </a>
</div>
@endsection