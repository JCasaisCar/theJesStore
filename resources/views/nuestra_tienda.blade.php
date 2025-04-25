@extends('layouts.app')
@section('title', __('tienda'))
@section('content')
<!-- Hero Banner Tienda -->
<div class="relative bg-gradient-to-r from-indigo-900 to-purple-700 overflow-hidden">
    <div class="container mx-auto px-4 py-12">
        <div class="text-center text-white z-10 relative">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 animate__animated animate__fadeInUp">
                {{ __('explora_nuestra') }} <span class="text-purple-300">{{ __('coleccion') }}</span>
            </h1>
            <p class="text-lg mb-6 text-gray-200 max-w-2xl mx-auto animate__animated animate__fadeInUp animate__delay-1s">
                {{ __('descubre_dispositivos_premium') }}
            </p>
        </div>
        <!-- Decoraciones de fondo -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
            <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-pink-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-indigo-500 rounded-full blur-3xl"></div>
        </div>
    </div>
</div>

<!-- Filtros y Búsqueda -->
<div class="bg-white shadow-md border-b">
    <div class="container mx-auto px-4 py-4">
        <form method="GET" class="flex flex-col md:flex-row justify-between items-center gap-4">
            <!-- Búsqueda -->
            <div class="relative w-full md:w-64">
                <input name="search" value="{{ request('search') }}" type="text"
                    placeholder="{{ __('buscar_productos') }}"
                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <div class="absolute left-3 top-2.5 text-gray-400">
                    <i class="fas fa-search"></i>
                </div>
            </div>

            <!-- Filtros -->
            <div class="flex flex-wrap items-center gap-3">
                <span class="text-gray-700 font-medium">{{ __('filtrar_por') }}:</span>

                <!-- Categoría -->
                <select name="category" class="py-2 px-3 rounded border border-gray-300">
                    <option value="">{{ __('categoria') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}"
                            {{ request('category') == $category->slug ? 'selected' : '' }}>
                            {{ __($category->name) }}
                        </option>
                    @endforeach
                </select>

                <!-- Precio -->
                <select name="price" class="py-2 px-3 rounded border border-gray-300">
                    <option value="">{{ __('precio') }}</option>
                    <option value="asc" {{ request('price') == 'asc' ? 'selected' : '' }}>{{ __('menor_precio') }}</option>
                    <option value="desc" {{ request('price') == 'desc' ? 'selected' : '' }}>{{ __('mayor_precio') }}</option>
                </select>

                <!-- Marca -->
                <select name="brand" class="py-2 px-3 rounded border border-gray-300">
                    <option value="">{{ __('marca') }}</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->slug }}"
                            {{ request('brand') == $brand->slug ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition transform hover:scale-105">
                    <i class="fas fa-filter mr-1"></i> {{ __('aplicar') }}
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Productos -->
<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8">{{ __('nuestros_productos') }}</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition">
                    <img src="{{ asset('img/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-gray-800 text-lg">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-500 mb-2">{{ $product->brand->name ?? '' }}</p>
                        <p class="text-sm text-gray-600">{{ \Illuminate\Support\Str::limit($product->description, 60) }}</p>
                        <div class="mt-3">
                            <span class="text-xl font-bold text-blue-700">{{ number_format($product->price, 2) }}€</span>
                        </div>
                        @if (!Auth::check() || Auth::user()->role !== 'admin')
                        <div class="mt-4 flex gap-2">
                            <!-- Botón Añadir al carrito -->
                            <form action="{{ route('cart.add') }}" method="POST" class="w-full">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg w-full flex items-center justify-center">
                                    <i class="fas fa-shopping-cart mr-1"></i> {{ __('añadir') }}
                                </button>
                            </form>

                            <!-- Botón Lista de deseos -->
                            <form action="{{ route('wishlist.add', $product) }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white font-medium py-2 px-4 rounded-lg w-full flex items-center justify-center">
                                    <i class="fas fa-heart mr-1"></i> {{ __('lista_deseos') }}
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-600">{{ __('no_hay_productos') }}</p>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $products->withQueryString()->links() }}
        </div>
    </div>
</div>

<!-- Newsletter -->
<div class="bg-gray-900 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">{{ __('suscribete_newsletter') }}</h2>
            <p class="text-gray-300 mb-6">{{ __('recibe_ofertas_exclusivas') }}</p>
            <form class="flex flex-col md:flex-row gap-2">
                <input type="email" placeholder="{{ __('tu_email') }}" class="flex-grow px-4 py-3 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105">
                    {{ __('suscribirse') }} <i class="fas fa-paper-plane ml-2"></i>
                </button>
            </form>
            <p class="text-gray-400 text-sm mt-4">{{ __('privacidad_garantizada') }}</p>
        </div>
    </div>
</div>

<!-- Badges/Ventajas -->
<div class="bg-white py-10">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <div class="flex items-center justify-center text-center p-4">
                <div>
                    <div class="w-16 h-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-3">
                        <i class="fas fa-shipping-fast text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">{{ __('envio_gratuito') }}</h3>
                    <p class="text-sm text-gray-600 mt-1">{{ __('pedidos_superiores') }}</p>
                </div>
            </div>
            <div class="flex items-center justify-center text-center p-4">
                <div>
                    <div class="w-16 h-16 mx-auto bg-green-100 rounded-full flex items-center justify-center mb-3">
                        <i class="fas fa-shield-alt text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">{{ __('pago_seguro') }}</h3>
                    <p class="text-sm text-gray-600 mt-1">{{ __('transacciones_protegidas') }}</p>
                </div>
            </div>
            <div class="flex items-center justify-center text-center p-4">
                <div>
                    <div class="w-16 h-16 mx-auto bg-purple-100 rounded-full flex items-center justify-center mb-3">
                        <i class="fas fa-exchange-alt text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">{{ __('devoluciones_faciles') }}</h3>
                    <p class="text-sm text-gray-600 mt-1">{{ __('garantia_dias') }}</p>
                </div>
            </div>
            
@endsection