@extends('layouts.app')

@section('title', __('donde_estamos'))

@section('content')
<div class="bg-white py-12">
  <div class="container mx-auto px-4">
    <div class="text-center mb-10">
      <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ __('donde_estamos') }}</h1>
      <p class="text-lg text-gray-600">Encuentra nuestra ubicación física y ven a conocernos en persona.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-10 items-center mb-16">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3162.936518920257!2d-5.984458684692083!3d37.3890929798297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd126d2509fdc8b5%3A0xa4e5a885bf871345!2sSevilla!5e0!3m2!1ses!2ses!4v1700000000000!5m2!1ses!2ses" width="100%" height="350" style="border:0; border-radius: 0.5rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <div>
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Nuestra dirección</h2>
        <p class="text-gray-600 mb-2"><i class="fas fa-map-marker-alt text-blue-500 mr-2"></i>Calle Ejemplo 123, 41001 Sevilla</p>
        <p class="text-gray-600 mb-2"><i class="fas fa-phone-alt text-blue-500 mr-2"></i>+34 654 321 987</p>
        <p class="text-gray-600"><i class="fas fa-envelope text-blue-500 mr-2"></i>info@thejesstore.com</p>
      </div>
    </div>

    <div class="text-center">
      <h3 class="text-2xl font-semibold text-gray-800 mb-4">¿Cómo llegar?</h3>
      <p class="text-gray-600 max-w-2xl mx-auto mb-6">Nuestra tienda está ubicada en el centro de Sevilla. Puedes llegar fácilmente en metro, autobús o coche. ¡Te esperamos con una atención personalizada y los mejores productos tecnológicos!</p>
      <a href="https://www.google.com/maps" target="_blank" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-full transition">Abrir en Google Maps</a>
    </div>
  </div>
</div>
@endsection