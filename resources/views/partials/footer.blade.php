<footer class="bg-gradient-to-b from-gray-900 to-blue-900 text-white pt-16 pb-6">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      <div class="text-center md:text-left">
        <div class="flex justify-center md:justify-start items-center mb-4">
          <img src="{{ asset('img/logo.png') }}" alt="{{ __('logoalt') }}" class="h-10 mr-2">
          <h3 class="text-xl font-bold text-white">TheJesStore</h3>
        </div>
        <p class="text-gray-300 text-sm">{{ __('tu_tienda_tecnologia') }}.<br>{{ __('productos_móviles_accesorios') }}.</p>
        <div class="mt-6">
          <h5 class="text-white font-semibold mb-2">{{ __('metodos_pago') }}</h5>
          <div class="flex justify-center md:justify-start space-x-3">
            <i class="fab fa-cc-paypal text-2xl text-gray-300 hover:text-white transition" title="PayPal"></i>
            <i class="fab fa-stripe text-2xl text-gray-300 hover:text-white transition" title="Stripe"></i>
          </div>
        </div>
      </div>

      <div class="text-center md:text-left">
        <h4 class="text-lg font-bold mb-4 relative">
          <span class="relative z-10">{{ __('enlaces_rapidos') }}</span>
          <span class="absolute bottom-0 left-0 w-12 h-1 bg-blue-500 z-0"></span>
        </h4>
        <ul class="space-y-2 text-sm text-gray-300">
          <li><a href="{{ route('home') }}" class="hover:text-blue-300 transition flex items-center justify-center md:justify-start">
              <i class="fas fa-chevron-right text-xs mr-2 text-blue-400"></i> {{ __('inicio') }}
            </a></li>
          <li><a href="{{ route('tienda') }}" class="hover:text-blue-300 transition flex items-center justify-center md:justify-start">
              <i class="fas fa-chevron-right text-xs mr-2 text-blue-400"></i> {{ __('tienda') }}
            </a></li>
          <li><a href="{{ route('privacy') }}" class="hover:text-blue-300 transition flex items-center justify-center md:justify-start">
              <i class="fas fa-chevron-right text-xs mr-2 text-blue-400"></i> {{ __('privacidad') }}
            </a></li>
          <li><a href="{{ route('terms') }}" class="hover:text-blue-300 transition flex items-center justify-center md:justify-start">
              <i class="fas fa-chevron-right text-xs mr-2 text-blue-400"></i> {{ __('terminos') }}
            </a></li>
          <li><a href="{{ route('cookies') }}" class="hover:text-blue-300 transition flex items-center justify-center md:justify-start">
              <i class="fas fa-chevron-right text-xs mr-2 text-blue-400"></i> {{ __('cookies') }}
            </a></li>
          <li><a href="{{ route('contacto') }}" class="hover:text-blue-300 transition flex items-center justify-center md:justify-start">
              <i class="fas fa-chevron-right text-xs mr-2 text-blue-400"></i> {{ __('contacto') }}
            </a></li>
        </ul>
      </div>

      <div class="text-center md:text-left">
        <h4 class="text-lg font-bold mb-4 relative">
          <span class="relative z-10">{{ __('contacto') }}</span>
          <span class="absolute bottom-0 left-0 w-12 h-1 bg-blue-500 z-0"></span>
        </h4>
        <ul class="space-y-3 text-sm text-gray-300">
          <li class="flex items-center justify-center md:justify-start">
            <div class="w-8 h-8 bg-blue-800 rounded-full flex items-center justify-center mr-3">
              <i class="fa-solid fa-location-dot text-blue-300"></i>
            </div>
            <span>{{ __('direccion_completa') }}</span>
          </li>
          <li class="flex items-center justify-center md:justify-start">
            <div class="w-8 h-8 bg-blue-800 rounded-full flex items-center justify-center mr-3">
              <i class="fa-solid fa-envelope text-blue-300"></i>
            </div>
            <span>{{ __('mail') }}</span>
          </li>
          <li class="flex items-center justify-center md:justify-start">
            <div class="w-8 h-8 bg-blue-800 rounded-full flex items-center justify-center mr-3">
              <i class="fa-solid fa-clock text-blue-300"></i>
            </div>
            <span>{{ __('horario') }}</span>
          </li>
        </ul>
      </div>

      <div class="text-center md:text-left">
        <h4 class="text-lg font-bold mb-4 relative">
          <span class="relative z-10">{{ __('newsletter') }}</span>
          <span class="absolute bottom-0 left-0 w-12 h-1 bg-blue-500 z-0"></span>
        </h4>
        <p class="text-sm text-gray-300 mb-3">{{ __('suscribete_ofertas') }}</p>

        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="mb-4">
          @csrf
          <div class="flex">
            <input type="email" name="email" placeholder="{{ __('tu_email') }}"
              class="px-4 py-2 bg-gray-800 text-white rounded-l-md border border-gray-700 focus:outline-none focus:border-blue-500 w-full text-sm" required>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r-md transition">
              <i class="fas fa-paper-plane"></i>
            </button>
          </div>
        </form>



        
        </div>
      </div>
    </div>

    <hr class="my-8 border-gray-700">

    <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-400">
      <p>© 2025 TheJesStore. {{ __('todos_derechos') }}</p>
      <div class="mt-4 md:mt-0 flex space-x-6">
        <a href="{{ route('privacy') }}" class="hover:text-white transition">{{ __('privacidad') }}</a>
        <a href="{{ route('terms') }}" class="hover:text-white transition">{{ __('terminos') }}</a>
        <a href="{{ route('cookies') }}" class="hover:text-white transition">{{ __('cookies') }}</a>
      </div>
    </div>
  </div>

  <a href="#" id="volver-arriba" class="fixed bottom-6 right-6 bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg transition transform hover:scale-110 opacity-0 invisible">
    <i class="fas fa-arrow-up"></i>
  </a>
</footer>