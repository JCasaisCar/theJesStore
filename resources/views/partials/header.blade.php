<nav class="bg-white shadow">
  <div class="container mx-auto px-4 py-4 flex flex-col md:grid md:grid-cols-3 gap-4 items-center">

    <!-- Celda 1,1: Logo -->
    <div class="flex items-center justify-between w-full md:justify-start">
      <a class="flex items-center text-xl font-bold text-gray-800" href="{{ auth()->check() ? (auth()->user()->role === 'restaurant' ? route('schedules.index1') : route('home')) : route('home') }}">
        <img src="{{ asset('img/logo.png') }}" alt="{{ __('logoalt') }}" class="h-8 mr-2">
        TheJesStore
      </a>
      <!-- Botón hamburguesa -->
      <button class="md:hidden text-gray-700" id="mobile-menu-button">
        <i class="fas fa-bars text-2xl"></i>
      </button>
    </div>

    <!-- Celda 1,2: Buscador -->
    <div class="w-full mt-4 md:mt-0">
      @if (!Auth::check() || (Auth::check() && Auth::user()->role !== 'admin'))
        <form action="" method="GET" class="relative">
          <input type="text" name="q" placeholder="{{ __('Buscar productos, modelos, accesorios...') }}"
                 class="w-full px-5 py-2 rounded-full border border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm text-sm">
          <button type="submit"
                  class="absolute right-1 top-1 bottom-1 my-auto px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-full">
            <i class="fas fa-search"></i>
          </button>
        </form>
      @endif
    </div>

    <!-- Celda 1,3: Botones superiores visibles solo en escritorio -->
    <div class="hidden md:flex justify-end gap-2 flex-wrap">
      <div class="flex gap-2 flex-wrap justify-end">
        <a href="{{ url()->current() }}?lang={{ app()->getLocale() == 'es' ? 'en' : 'es' }}" class="bg-green-500 hover:bg-green-600 text-white py-1.5 px-3 rounded text-xs whitespace-nowrap">
          {{ app()->getLocale() == 'es' ? '🇬🇧' : '🇪🇸' }}
        </a>

        @if (!Auth::check())
          <a class="bg-pink-500 hover:bg-pink-600 text-white py-1.5 px-3 rounded-full text-xs inline-flex items-center whitespace-nowrap" href="{{ route('login') }}">
            <i class="fas fa-heart mr-1"></i> {{ __('lista_deseos') }}
          </a>
          <a class="bg-blue-500 hover:bg-blue-600 text-white py-1.5 px-3 rounded-full text-xs inline-flex items-center whitespace-nowrap" href="{{ route('login') }}">
            <i class="fas fa-shopping-cart mr-1"></i> {{ __('carrito') }}
          </a>
          <a class="bg-blue-500 hover:bg-blue-600 text-white py-1.5 px-3 rounded text-xs whitespace-nowrap" href="{{ route('login') }}">{{ __('iniciar_sesion') }}</a>
          <a class="bg-gray-600 hover:bg-gray-700 text-white py-1.5 px-3 rounded text-xs whitespace-nowrap" href="{{ route('register') }}">{{ __('registrarse') }}</a>

        @elseif (Auth::user()->role !== 'admin')
          <a class="bg-pink-500 hover:bg-pink-600 text-white py-1.5 px-3 rounded-full text-xs inline-flex items-center whitespace-nowrap" href="">
            <i class="fas fa-heart mr-1"></i> {{ __('lista_deseos') }}
          </a>
          <a class="bg-blue-500 hover:bg-blue-600 text-white py-1.5 px-3 rounded-full text-xs inline-flex items-center whitespace-nowrap" href="">
            <i class="fas fa-shopping-cart mr-1"></i> {{ __('carrito') }}
          </a>
          <a class="bg-red-500 hover:bg-red-600 text-white py-1.5 px-3 rounded text-xs inline-flex items-center whitespace-nowrap" href="{{ route('logout') }}"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt mr-1"></i> {{ __('cerrar_sesion') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>

        @else
          <a class="bg-red-500 hover:bg-red-600 text-white py-1.5 px-3 rounded text-xs inline-flex items-center whitespace-nowrap" href="{{ route('logout') }}"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt mr-1"></i> {{ __('cerrar_sesion') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
        @endif
      </div>
    </div>

    <!-- Menú móvil desplegable -->
    <div id="mobile-menu" class="w-full mt-4 hidden md:hidden">
      <div class="flex flex-col items-center gap-2">
        <a href="{{ url()->current() }}?lang={{ app()->getLocale() == 'es' ? 'en' : 'es' }}" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded text-sm w-full text-center">
          {{ app()->getLocale() == 'es' ? '🇬🇧 ' : '🇪🇸' }}
        </a>

        @if (!Auth::check())
          <a class="bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-full text-sm w-full text-center" href="{{ route('login') }}">
            <i class="fas fa-heart mr-1"></i> {{ __('lista_deseos') }}
          </a>
          <a class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-full text-sm w-full text-center" href="{{ route('login') }}">
            <i class="fas fa-shopping-cart mr-1"></i> {{ __('carrito') }}
          </a>
          <a class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded text-sm w-full text-center" href="{{ route('login') }}">{{ __('iniciar_sesion') }}</a>
          <a class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded text-sm w-full text-center" href="{{ route('register') }}">{{ __('registrarse') }}</a>

        @elseif (Auth::user()->role !== 'admin')
          <a class="bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-full text-sm w-full text-center" href="">
            <i class="fas fa-heart mr-1"></i> {{ __('lista_deseos') }}
          </a>
          <a class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-full text-sm w-full text-center" href="">
            <i class="fas fa-shopping-cart mr-1"></i> {{ __('carrito') }}
          </a>
          <a class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded text-sm w-full text-center" href="{{ route('logout') }}"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt mr-1"></i> {{ __('cerrar_sesion') }}
          </a>
        @endif
      </div>
    </div>
  </div>
</nav>

<nav class="bg-gray-50 border-t border-gray-200 shadow-sm">
  <div class="container mx-auto px-4 py-2 flex flex-wrap justify-center gap-6 text-sm text-gray-700">
    <a href="{{ route('empresa') }}" class="hover:text-blue-500 transition">{{ __('nuestra_empresa') }}</a>
    <a href="{{ route('nosotros') }}" class="hover:text-blue-500 transition">{{ __('sobre_nosotros') }}</a>
    <a href="{{ route('tienda') }}" class="hover:text-blue-500 transition">{{ __('nuestra_tienda') }}</a>
    <a href="{{ route('ubicacion') }}" class="hover:text-blue-500 transition">{{ __('donde_estamos') }}</a>
    <!--<a href="" class="hover:text-blue-500 transition">{{ __('nuestro_blog') }}</a>-->
    <a href="{{ route('condiciones') }}" class="hover:text-blue-500 transition">{{ __('condiciones_uso') }}</a>
  </div>
</nav>

<script>
  document.getElementById('mobile-menu-button')?.addEventListener('click', function () {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  });
</script>