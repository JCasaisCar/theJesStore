@extends('layouts.app')
@section('title', 'Enviar Newsletter')

@section('content')

<body id="newsletter-send">


  <div class="relative bg-gradient-to-br from-slate-900 via-purple-900 to-indigo-900 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
      <div class="absolute top-20 left-10 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
      <div class="absolute top-40 right-20 w-80 h-80 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
      <div class="absolute bottom-10 left-1/3 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
    </div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3csvg width=" 40" height="40" xmlns="http://www.w3.org/2000/svg" %3e%3cdefs%3e%3cpattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse" %3e%3cpath d="m 40 0 l 0 40 m -40 0 l 40 0" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1" /%3e%3c/pattern%3e%3c/defs%3e%3crect width="100%25" height="100%25" fill="url(%23grid)" /%3e%3c/svg%3e')] opacity-30"></div>
    <div class="container mx-auto px-4 py-20 relative z-10">
      <div class="max-w-4xl mx-auto text-center">
        <div class="w-24 h-24 mx-auto bg-gradient-to-br from-blue-500 to-indigo-600 rounded-3xl flex items-center justify-center mb-8 shadow-2xl animate-bounce-slow">
          <i class="fas fa-envelope text-white text-3xl"></i>
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-6 bg-gradient-to-r from-white via-blue-200 to-indigo-200 bg-clip-text text-transparent animate__animated animate__fadeInUp">
          {{ __('enviar') }} <span class="bg-gradient-to-r from-blue-300 to-indigo-300 bg-clip-text text-transparent">Newsletter</span>
        </h1>
        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed animate__animated animate__fadeInUp animate__delay-1s">
          {{ __('redacta_y_envia_un_correo_a_todos_tus_suscriptores') }}
        </p>
      </div>
    </div>
  </div>

  <div class="bg-gradient-to-br from-gray-50 via-white to-gray-50 py-16">
    <div class="container mx-auto px-4 max-w-2xl">
      <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 border border-gray-100">
        <h2 class="text-3xl font-black text-blue-700 mb-6 text-center">{{ __('enviar_correo_a_todos_los_suscriptores') }}</h2>

        <form action="{{ route('admin.newsletter.send') }}" method="POST" class="space-y-6">
          @csrf

          <div class="group">
            <label for="subject" class="block text-sm font-bold text-gray-700 mb-2">{{ __('asunto') }}</label>
            <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required
              class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-6 py-4 text-gray-800 font-medium focus:border-blue-500 focus:bg-white focus:outline-none transition-all duration-300">
          </div>

          <div class="group">
            <label for="body" class="block text-sm font-bold text-gray-700 mb-2">{{ __('contenido_del_correo') }}</label>
            <textarea name="body" id="body" rows="8" required
              class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-6 py-4 text-gray-800 font-medium focus:border-blue-500 focus:bg-white focus:outline-none transition-all duration-300">{{ old('body') }}</textarea>
          </div>

          <div class="text-center">
            <button type="submit"
              class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-3 px-8 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
              <i class="fas fa-paper-plane mr-2"></i>{{ __('enviar_correo') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
@endsection