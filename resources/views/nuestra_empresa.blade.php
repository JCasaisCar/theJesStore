@extends('layouts.app')

@section('title', __('nuestra_empresa'))

@section('content')
<div class="bg-white py-12">
  <div class="container mx-auto px-4">
    <div class="text-center mb-12">
      <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ __('nuestra_empresa') }}</h1>
      <p class="text-lg text-gray-600">Creamos experiencias únicas con tecnología y compromiso.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-10 items-center mb-16">
      <img src="{{ asset('img/empresa.jpg') }}" alt="Nuestra Empresa" class="rounded-lg shadow-md w-full h-auto">
      <div>
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Nuestra Historia</h2>
        <p class="text-gray-600">Desde nuestros inicios, en TheJesStore hemos apostado por la innovación, la excelencia y el compromiso con nuestros clientes. Somos mucho más que una tienda de tecnología: somos un espacio de confianza donde cada producto ha sido cuidadosamente seleccionado.</p>
      </div>
    </div>

    <div class="bg-blue-50 p-6 rounded-lg shadow-inner mb-16">
      <h2 class="text-2xl font-semibold text-blue-700 mb-4">Nuestros Valores</h2>
      <ul class="list-disc list-inside text-gray-700 space-y-2">
        <li>Compromiso con la calidad</li>
        <li>Atención personalizada</li>
        <li>Innovación constante</li>
        <li>Respeto y confianza</li>
        <li>Envíos rápidos y seguros</li>
      </ul>
    </div>

    <div class="text-center mb-16">
      <h2 class="text-2xl font-semibold text-gray-800 mb-2">Nuestro Equipo</h2>
      <p class="text-gray-600 max-w-2xl mx-auto">Somos un equipo joven, apasionado por la tecnología y el buen servicio. Creemos que la cercanía y la profesionalidad son la clave de nuestra relación con los clientes.</p>
    </div>

    <div class="bg-gray-100 p-8 rounded-lg text-center">
      <h3 class="text-xl font-semibold text-gray-800 mb-2">¿Tienes preguntas o propuestas?</h3>
      <p class="text-gray-600 mb-4">Estamos encantados de escucharte. ¡Contáctanos y hablemos!</p>
      <a href="{{ route('contacto') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-full transition">{{ __('contacto') }}</a>
    </div>
  </div>
</div>
@endsection