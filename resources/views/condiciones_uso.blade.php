@extends('layouts.app')

@section('title', __('condiciones_uso'))

@section('content')
<div class="bg-white py-12">
  <div class="container mx-auto px-4">
    <div class="text-center mb-10">
      <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ __('condiciones_uso') }}</h1>
      <p class="text-lg text-gray-600">Por favor, revisa nuestras condiciones de uso antes de realizar una compra o navegar por nuestro sitio.</p>
    </div>

    <div class="bg-gray-50 p-6 rounded-lg shadow-md space-y-6 text-gray-700">
      <div>
        <h2 class="text-xl font-semibold text-blue-600 mb-2">1. Aceptación de Términos</h2>
        <p>Al acceder y utilizar este sitio web, aceptas estar sujeto a los presentes términos y condiciones de uso, todas las leyes y regulaciones aplicables, y aceptas que eres responsable de cumplir con todas las leyes locales correspondientes.</p>
      </div>

      <div>
        <h2 class="text-xl font-semibold text-blue-600 mb-2">2. Uso Permitido</h2>
        <p>Se permite la descarga temporal de una copia de los materiales (información o software) del sitio web de TheJesStore sólo para visualización transitoria personal y no comercial. No se permite modificar ni copiar los materiales.</p>
      </div>

      <div>
        <h2 class="text-xl font-semibold text-blue-600 mb-2">3. Limitación de Responsabilidad</h2>
        <p>TheJesStore no será responsable de ningún daño (incluidos, sin limitación, daños por pérdida de datos o beneficios) que surjan del uso o la imposibilidad de usar los materiales del sitio.</p>
      </div>

      <div>
        <h2 class="text-xl font-semibold text-blue-600 mb-2">4. Enlaces Externos</h2>
        <p>Nuestro sitio puede contener enlaces a sitios externos. TheJesStore no se responsabiliza del contenido ni prácticas de privacidad de dichos sitios.</p>
      </div>

      <div>
        <h2 class="text-xl font-semibold text-blue-600 mb-2">5. Cambios en los Términos</h2>
        <p>Podemos revisar estos términos de uso en cualquier momento sin previo aviso. Al usar este sitio, aceptas estar sujeto a la versión actual de estos términos.</p>
      </div>
    </div>
  </div>
</div>
@endsection