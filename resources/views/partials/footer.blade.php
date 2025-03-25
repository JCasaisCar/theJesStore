<footer class="bg-gray-900 text-white py-10">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <!-- Información de la tienda -->
      <div>
        <h4 class="text-lg font-bold mb-2">TheJesStore</h4>
        <p class="text-sm text-gray-300">{{ __('tu_tienda_tecnologia') }}.<br>{{ __('productos_móviles_accesorios') }}</p>
      </div>

      <!-- Contacto -->
      <div>
        <h4 class="text-lg font-bold mb-2">{{ __('contacto') }}</h4>
        <ul class="text-sm text-gray-300 space-y-1">
          <li><i class="fa-solid fa-location-dot mr-2"></i> Sevilla, España</li>
          <li><i class="fa-solid fa-phone mr-2"></i> +34 612 345 678</li>
          <li><i class="fa-solid fa-envelope mr-2"></i> contacto@thejesstore.com</li>
        </ul>
      </div>

      <!-- Redes Sociales + Mapa del sitio -->
      <div>
        <h4 class="text-lg font-bold mb-2">{{ __('siguenos') }}</h4>
        <div class="flex space-x-4 text-xl mb-4">
          <a href="#" class="hover:text-blue-400"><i class="fa-brands fa-facebook"></i></a>
          <a href="#" class="hover:text-pink-400"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" class="hover:text-blue-300"><i class="fa-brands fa-twitter"></i></a>
        </div>

        <p class="cursor-pointer font-semibold text-sm text-gray-200 hover:text-white" id="sitemap-toggle">{{ __('mapa_sitio') }}</p>
        <div class="mt-2 hidden text-sm text-gray-300" id="sitemap">
          <ul class="space-y-1">
            <li><a class="hover:underline" href="{{ url('/') }}">{{ __('inicio') }}</a></li>
            <li><a class="hover:underline" href="{{ route('nosotros') }}">{{ __('sobre_nosotros') }}</a></li>
            <li><a class="hover:underline" href="{{ route('contacto') }}">{{ __('contacto') }}</a></li>
            <li><a class="hover:underline" href="#">{{ __('nuestra_tienda') }}</a></li>
            <li><a class="hover:underline" href="#">{{ __('condiciones_uso') }}</a></li>
          </ul>
        </div>
      </div>

    </div>
    <hr class="my-6 border-gray-700">
    <div class="text-center text-sm text-gray-400">
      <p>© 2025 TheJesStore. {{ __('todos_derechos') }}</p>
    </div>
  </div>

  <!-- Botón volver arriba -->
  <a href="#" id="volver-arriba" class="fixed bottom-4 right-4 bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg transition">
    <i class="fas fa-arrow-up"></i>
  </a>
</footer>

<script>
  document.getElementById('sitemap-toggle')?.addEventListener('click', function () {
    const sitemap = document.getElementById('sitemap');
    sitemap.classList.toggle('hidden');
  });
</script>
