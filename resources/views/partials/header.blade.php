<nav class="bg-gradient-to-r from-blue-900 to-blue-700 text-white shadow-lg sticky top-0 z-50">
  <div class="container mx-auto px-4 py-3">
    <div class="hidden md:flex items-center justify-between">
      <a class="flex items-center text-xl font-bold" href="{{ auth()->check() ? (auth()->user()->role === 'restaurant' ? route('schedules.index1') : route('home')) : route('home') }}">
        <img src="{{ asset('img/logo.png') }}" alt="{{ __('logoalt') }}" class="h-10 mr-2 hover:scale-110 transition duration-300">
        <span class="text-white font-bold tracking-wider">TheJesStore</span>
      </a>

      @if ((!Auth::check() || (Auth::check() && Auth::user()->role !== 'admin')) && !Route::is('tienda'))
      <div class="w-1/3 mx-4">
        <form action="{{ route('tienda') }}" method="GET" class="relative">
          <input type="text" name="search" placeholder="{{ __('Buscar productos, modelos, accesorios...') }}"
            class="w-full px-5 py-2 rounded-full border-2 border-blue-300 focus:outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-300 shadow-md text-gray-800 text-sm transition duration-300">
          <button type="submit"
            class="absolute right-1 top-1 bottom-1 my-auto px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-full transition duration-300 flex items-center justify-center">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
      @endif

      <div class="flex items-center gap-3">
        <a href="{{ url()->current() }}?lang={{ app()->getLocale() == 'es' ? 'en' : 'es' }}" class="bg-blue-600 hover:bg-blue-700 text-white py-1.5 px-3 rounded text-xs flex items-center gap-1 transition transform hover:scale-105 shadow-md">
          {{ app()->getLocale() == 'es' ? '🇬🇧 EN' : '🇪🇸 ES' }}
        </a>

        @if (!Auth::check())
        <a class="bg-pink-500 hover:bg-pink-600 text-white py-1.5 px-3 rounded-full text-xs flex items-center gap-1 transition transform hover:scale-105 shadow-md" href="{{ route('login') }}">
          <i class="fas fa-heart"></i> <span>{{ __('lista_deseos') }}</span>
        </a>
        <a class="bg-blue-500 hover:bg-blue-600 text-white py-1.5 px-3 rounded-full text-xs flex items-center gap-1 transition transform hover:scale-105 shadow-md" href="{{ route('login') }}">
          <i class="fas fa-shopping-cart"></i> <span>{{ __('carrito') }}</span>
        </a>
        <div class="h-8 border-r border-blue-400 mx-1"></div>
        <a class="bg-blue-500 hover:bg-blue-600 text-white py-1.5 px-4 rounded-lg text-xs flex items-center gap-1 transition transform hover:scale-105 shadow-md" href="{{ route('login') }}">
          <i class="fas fa-user"></i> {{ __('iniciar_sesion') }}
        </a>
        <a class="bg-gray-600 hover:bg-gray-700 text-white py-1.5 px-4 rounded-lg text-xs flex items-center gap-1 transition transform hover:scale-105 shadow-md" href="{{ route('register') }}">
          <i class="fas fa-user-plus"></i> {{ __('registrarse') }}
        </a>

        @elseif (Auth::user()->role !== 'admin')
        <a class="bg-pink-500 hover:bg-pink-600 text-white py-1.5 px-3 rounded-full text-xs flex items-center gap-1 transition transform hover:scale-105 shadow-md" href="{{ route('wishlist') }}">
          <i class="fas fa-heart"></i> <span>{{ __('lista_deseos') }}</span>
        </a>
        <a class="bg-blue-500 hover:bg-blue-600 text-white py-1.5 px-3 rounded-full text-xs flex items-center gap-1 transition transform hover:scale-105 shadow-md relative" href="{{ route('cart') }}">
          <i class="fas fa-shopping-cart"></i> <span>{{ __('carrito') }}</span>
          @if ($cartItemCount > 0)
          <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
            {{ $cartItemCount }}
          </span>
          @endif
        </a>
        <a class="bg-green-600 hover:bg-green-700 text-white py-1.5 px-3 rounded-full text-xs flex items-center gap-1 transition transform hover:scale-105 shadow-md" href="{{ route('orders.index') }}">
          <i class="fas fa-box"></i> <span>Mis Pedidos</span>
        </a>
        <div class="h-8 border-r border-blue-400 mx-1"></div>
        <a class="bg-red-500 hover:bg-red-600 text-white py-1.5 px-4 rounded-lg text-xs flex items-center gap-1 transition transform hover:scale-105 shadow-md" href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> {{ __('cerrar_sesion') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>

        @else
        <a class="bg-red-500 hover:bg-red-600 text-white py-1.5 px-4 rounded-lg text-xs flex items-center gap-1 transition transform hover:scale-105 shadow-md" href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> {{ __('cerrar_sesion') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
        @endif
      </div>
    </div>

    <div class="md:hidden flex items-center justify-between">
      <a class="flex items-center text-lg font-bold" href="{{ auth()->check() ? (auth()->user()->role === 'restaurant' ? route('schedules.index1') : route('home')) : route('home') }}">
        <img src="{{ asset('img/logo.png') }}" alt="{{ __('logoalt') }}" class="h-8 mr-2">
        <span class="text-white font-bold">TheJesStore</span>
      </a>

      <button class="text-white focus:outline-none" id="mobile-menu-button">
        <i class="fas fa-bars text-2xl"></i>
      </button>
    </div>

    <div id="mobile-menu" class="md:hidden mt-4 hidden">
      @if (!Auth::check() || (Auth::check() && Auth::user()->role !== 'admin'))
      <div class="mb-4">
        <form action="{{ route('tienda') }}" method="GET" class="relative">
          <input type="text" name="search" placeholder="{{ __('Buscar productos, modelos, accesorios...') }}"
            class="w-full px-5 py-2 rounded-full border-2 border-blue-300 focus:outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-300 shadow-md text-gray-800 text-sm">
          <button type="submit"
            class="absolute right-1 top-1 bottom-1 my-auto px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-full transition duration-300 flex items-center justify-center">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
      @endif

      <div class="space-y-2 pb-2">
        <a href="{{ url()->current() }}?lang={{ app()->getLocale() == 'es' ? 'en' : 'es' }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-sm flex items-center justify-center gap-2 w-full">
          {{ app()->getLocale() == 'es' ? '🇬🇧 English' : '🇪🇸 Español' }}
        </a>

        @if (!Auth::check())
        <a class="bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-full text-sm flex items-center justify-center gap-2 w-full" href="{{ route('login') }}">
          <i class="fas fa-heart"></i> {{ __('lista_deseos') }}
        </a>
        <a class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-full text-sm flex items-center justify-center gap-2 w-full" href="{{ route('login') }}">
          <i class="fas fa-shopping-cart"></i> {{ __('carrito') }}
        </a>
        <a class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md text-sm flex items-center justify-center gap-2 w-full" href="{{ route('login') }}">
          <i class="fas fa-user"></i> {{ __('iniciar_sesion') }}
        </a>
        <a class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-md text-sm flex items-center justify-center gap-2 w-full" href="{{ route('register') }}">
          <i class="fas fa-user-plus"></i> {{ __('registrarse') }}
        </a>

        @elseif (Auth::user()->role !== 'admin')
        <a class="bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-full text-sm flex items-center justify-center gap-2 w-full" href="{{ route('wishlist') }}">
          <i class="fas fa-heart"></i> {{ __('lista_deseos') }}
        </a>
        <a class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-full text-sm flex items-center justify-center gap-2 w-full relative" href="{{ route('cart') }}">
          <i class="fas fa-shopping-cart"></i> {{ __('carrito') }}
          <span class="absolute top-0 right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
        </a>
        <a class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md text-sm flex items-center justify-center gap-2 w-full" href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> {{ __('cerrar_sesion') }}
        </a>
        @endif
      </div>
    </div>
  </div>
</nav>

<nav class="bg-gray-100 border-b border-gray-200 shadow-sm py-1">
  <div class="container mx-auto px-4">
    <div class="hidden md:flex flex-wrap justify-center gap-8 text-sm text-gray-700">
      @forelse ($categoriasHeader as $categoria)
      <a href="{{ route('tienda', ['category' => $categoria->slug]) }}"
        class="py-2 border-b-2 border-transparent hover:border-blue-500 hover:text-blue-600 transition-all font-medium">
        {{ __($categoria->name) }}
      </a>
      @empty
      <span class="text-gray-400 italic">{{ __('noCategorias') }}</span>
      @endforelse
    </div>

    <div class="md:hidden">
      <button id="categories-button" class="flex items-center justify-between w-full py-2 px-3 text-sm font-medium text-gray-700">
        <span>{{ __('categorías') }}</span>
        <i class="fas fa-chevron-down text-xs transition-transform" id="categories-icon"></i>
      </button>
      <div id="categories-menu" class="hidden bg-white rounded-b-lg shadow-lg mt-1 py-2">
        @forelse ($categoriasHeader as $categoria)
        <a href="{{ route('tienda', ['category' => $categoria->slug]) }}"
          class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
          {{ __($categoria->name) }}
        </a>
        @empty
        <div class="px-4 py-2 text-sm text-gray-400 italic">
          {{ __('No hay categorías disponibles.') }}
        </div>
        @endforelse
      </div>
    </div>
  </div>
</nav>