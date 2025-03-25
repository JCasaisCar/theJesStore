@extends('layouts.app')

@section('title', __('nuestra_tienda'))

@section('content')
<div class="bg-white py-12">
  <div class="container mx-auto px-4">
    <div class="text-center mb-12">
      <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ __('nuestra_tienda') }}</h1>
      <p class="text-lg text-gray-600">Todo lo que necesitas para tu móvil, en un solo lugar.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-10 items-center mb-16">
      <img src="{{ asset('img/tienda.jpg') }}" alt="Nuestra Tienda" class="rounded-lg shadow-md w-full h-auto">
      <div>
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Una tienda pensada para ti</h2>
        <p class="text-gray-600">En TheJesStore encontrarás una selección premium de móviles, fundas, cargadores, auriculares, protectores de pantalla y mucho más. Nuestro catálogo está cuidadosamente organizado por modelos y marcas para facilitar tu experiencia de compra.</p>
      </div>
    </div>

    <div class="bg-blue-50 p-6 rounded-lg shadow-inner mb-16">
      <h2 class="text-2xl font-semibold text-blue-700 mb-4">¿Qué nos hace diferentes?</h2>
      <ul class="list-disc list-inside text-gray-700 space-y-2">
        <li>Productos 100% originales</li>
        <li>Compatibilidad garantizada por modelo</li>
        <li>Precios competitivos y promociones exclusivas</li>
        <li>Atención al cliente personalizada</li>
        <li>Compras seguras y envíos rápidos</li>
      </ul>
    </div>

    <div class="text-center">
      <h2 class="text-2xl font-semibold text-gray-800 mb-2">Descubre, elige y recibe sin complicaciones</h2>
      <p class="text-gray-600 max-w-2xl mx-auto mb-6">Diseñamos nuestra tienda online para ofrecerte una experiencia sencilla, rápida y cómoda. Desde la búsqueda hasta el pago, todo está pensado para ti.</p>
      <a href="{{ route('home') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-full transition">Ver productos</a>
    </div>
  </div>
</div>
@endsection