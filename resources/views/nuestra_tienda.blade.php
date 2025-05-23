@extends('layouts.app')
@section('title', __('tienda'))
@section('content')

<!-- Hero Banner Tienda - Premium -->
<div class="relative bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 overflow-hidden min-h-[60vh] flex items-center">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-10 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
        <div class="absolute top-10 right-10 w-72 h-72 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
    </div>
    
    <!-- Grid Pattern Overlay -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3csvg width="40" height="40" xmlns="http://www.w3.org/2000/svg"%3e%3cdefs%3e%3cpattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"%3e%3cpath d="m 40 0 l 0 40 m -40 0 l 40 0" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/%3e%3c/pattern%3e%3c/defs%3e%3crect width="100%25" height="100%25" fill="url(%23grid)" /%3e%3c/svg%3e')] opacity-30"></div>

    <div class="container mx-auto px-4 py-16 relative z-10">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6 animate__animated animate__fadeInUp bg-gradient-to-r from-white via-purple-200 to-cyan-200 bg-clip-text text-transparent">
                {{ __('explora_nuestra') }} <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">{{ __('coleccion') }}</span>
            </h1>
            <p class="text-xl mb-8 text-gray-300 max-w-3xl mx-auto leading-relaxed animate__animated animate__fadeInUp animate__delay-1s font-light">
                {{ __('descubre_dispositivos_premium') }}
            </p>
            <div class="flex justify-center animate__animated animate__fadeInUp animate__delay-2s">
                <div class="w-24 h-1 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full"></div>
            </div>
        </div>
    </div>
</div>

<!-- Filtros y Búsqueda - Premium -->
<div class="bg-white/95 backdrop-blur-sm shadow-2xl border-b border-gray-100 sticky top-0 z-40">
    <div class="container mx-auto px-4 py-6">
        <form method="GET" class="flex flex-col lg:flex-row justify-between items-center gap-6">
            <!-- Búsqueda Premium -->
            <div class="relative w-full lg:w-80">
                <input name="search" value="{{ request('search') }}" type="text"
                    placeholder="{{ __('buscar_productos') }}"
                    class="w-full pl-12 pr-4 py-4 rounded-2xl border-2 border-gray-200 focus:outline-none focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all duration-300 bg-gray-50 hover:bg-white text-gray-900 placeholder-gray-500 font-medium">
                <div class="absolute left-4 top-4 text-gray-400">
                    <i class="fas fa-search text-lg"></i>
                </div>
                <div class="absolute right-4 top-4">
                    <div class="w-6 h-6 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full opacity-20"></div>
                </div>
            </div>

            <!-- Filtros Premium -->
            <div class="flex flex-wrap items-center gap-4">
                <span class="text-gray-800 font-bold text-lg">{{ __('filtrar_por') }}:</span>

                <!-- Categoría -->
                <select name="category" class="py-3 px-4 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 bg-gray-50 hover:bg-white transition-all duration-300 font-medium text-gray-700 min-w-[140px]">
                    <option value="">{{ __('categoria') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}"
                            {{ request('category') == $category->slug ? 'selected' : '' }}>
                            {{ __($category->name) }}
                        </option>
                    @endforeach
                </select>

                <!-- Precio -->
                <select name="price" class="py-3 px-4 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 bg-gray-50 hover:bg-white transition-all duration-300 font-medium text-gray-700 min-w-[140px]">
                    <option value="">{{ __('precio') }}</option>
                    <option value="asc" {{ request('price') == 'asc' ? 'selected' : '' }}>{{ __('menor_precio') }}</option>
                    <option value="desc" {{ request('price') == 'desc' ? 'selected' : '' }}>{{ __('mayor_precio') }}</option>
                </select>

                <!-- Marca -->
                <select name="brand" class="py-3 px-4 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 bg-gray-50 hover:bg-white transition-all duration-300 font-medium text-gray-700 min-w-[140px]">
                    <option value="">{{ __('marca') }}</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->slug }}"
                            {{ request('brand') == $brand->slug ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit"
                    class="bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl focus:ring-4 focus:ring-purple-500/20 group">
                    <i class="fas fa-filter mr-2 group-hover:rotate-12 transition-transform duration-300"></i> {{ __('aplicar') }}
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Productos - Premium -->
<div class="bg-gradient-to-br from-gray-50 via-white to-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">{{ __('nuestros_productos') }}</h2>
            <div class="w-32 h-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse($products as $product)
                <div class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-purple-200 transform hover:-translate-y-2 relative">
                    <!-- Premium Badge -->
                    <div class="absolute top-4 right-4 z-10">
                        <div class="bg-gradient-to-r from-purple-500 to-pink-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                            PREMIUM
                        </div>
                    </div>
                    
                    <!-- Image Container -->
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" 
                             class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6">
                        <div class="mb-3">
                            <h3 class="font-bold text-gray-900 text-xl mb-1 group-hover:text-purple-700 transition-colors duration-300">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500 font-medium">{{ $product->brand->name ?? '' }}</p>
                        </div>
                        
                        <p class="text-gray-600 mb-4 leading-relaxed">{{ \Illuminate\Support\Str::limit($product->description, 60) }}</p>
                        
                        <!-- Price -->
                        <div class="mb-4">
                            <span class="text-2xl font-black text-transparent bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text">{{ number_format($product->price, 2) }}€</span>
                        </div>

                        <!-- Stock Premium -->
                        <div class="mb-6">
                            @if($product->stock > 0)
                                <div class="flex items-center text-sm text-green-600 bg-green-50 px-3 py-2 rounded-lg">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    {{ __('stock_disponible') }}: {{ $product->stock }}
                                </div>
                            @else
                                <div class="flex items-center text-sm text-red-600 bg-red-50 px-3 py-2 rounded-lg">
                                    <i class="fas fa-times-circle mr-2"></i>
                                    <span>{{ __('sin_stock') }}</span>
                                </div>
                            @endif
                        </div>

                        @if (!Auth::check() || Auth::user()->role !== 'admin')
                        <div class="space-y-3">
                            <!-- Botón Añadir al carrito Premium -->
                            @if($product->stock > 0)
                                <form action="{{ route('cart.add') }}" method="POST" class="w-full">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl focus:ring-4 focus:ring-purple-500/20 group">
                                        <i class="fas fa-shopping-cart mr-2 group-hover:bounce"></i> {{ __('añadir') }}
                                    </button>
                                </form>
                            @else
                                <button type="button" class="w-full bg-gray-300 text-gray-500 font-bold py-3 px-6 rounded-xl cursor-not-allowed" disabled>
                                    <i class="fas fa-shopping-cart mr-2"></i> {{ __('sin_stock') }}
                                </button>
                            @endif

                            <!-- Botón Lista de deseos Premium -->
                            <form action="{{ route('wishlist.add', $product) }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="w-full bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl focus:ring-4 focus:ring-rose-500/20 group">
                                    <i class="fas fa-heart mr-2 group-hover:pulse"></i> {{ __('lista_deseos') }}
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16">
                    <div class="w-24 h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-search text-gray-400 text-2xl"></i>
                    </div>
                    <p class="text-gray-600 text-lg font-medium">{{ __('no_hay_productos') }}</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16 flex justify-center">
            {{ $products->withQueryString()->links() }}
        </div>
    </div>
</div>

<!-- Newsletter Premium -->
<div class="relative bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 py-20 overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-black text-white mb-6 bg-gradient-to-r from-white via-purple-200 to-cyan-200 bg-clip-text text-transparent">
                {{ __('suscribete_newsletter') }}
            </h2>
            <p class="text-xl text-gray-300 mb-10 leading-relaxed">{{ __('recibe_ofertas_exclusivas') }}</p>

            <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col md:flex-row gap-4 max-w-lg mx-auto">
                @csrf
                <div class="flex-grow relative">
                    <input type="email" name="email" placeholder="{{ __('tu_email') }}"
                        class="w-full px-6 py-4 rounded-2xl border-2 border-gray-300 focus:outline-none focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition-all duration-300 bg-white/95 backdrop-blur-sm text-gray-900 font-medium @error('email') ring-4 ring-red-500/20 border-red-500 @enderror">
                </div>
                <button type="submit"
                    class="bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl focus:ring-4 focus:ring-purple-500/20 whitespace-nowrap">
                    {{ __('suscribirse') }} <i class="fas fa-paper-plane ml-2"></i>
                </button>
            </form>

            @error('email')
                <p class="text-red-400 text-sm mt-4 bg-red-500/10 px-4 py-2 rounded-lg">{{ $message }}</p>
            @enderror

            <p class="text-gray-400 text-sm mt-6 font-light">{{ __('privacidad_garantizada') }}</p>
        </div>
    </div>
</div>

<!-- Badges/Ventajas Premium -->
<div class="bg-white py-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="group text-center p-8 hover:bg-gradient-to-br hover:from-purple-50 hover:to-pink-50 rounded-2xl transition-all duration-300">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <i class="fas fa-shipping-fast text-white text-2xl"></i>
                </div>
                <h3 class="font-black text-gray-900 text-xl mb-2">{{ __('envio_gratuito') }}</h3>
                <p class="text-gray-600 leading-relaxed">{{ __('pedidos_superiores') }}</p>
            </div>
            
            <div class="group text-center p-8 hover:bg-gradient-to-br hover:from-green-50 hover:to-emerald-50 rounded-2xl transition-all duration-300">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="font-black text-gray-900 text-xl mb-2">{{ __('pago_seguro') }}</h3>
                <p class="text-gray-600 leading-relaxed">{{ __('transacciones_protegidas') }}</p>
            </div>
            
            <div class="group text-center p-8 hover:bg-gradient-to-br hover:from-purple-50 hover:to-pink-50 rounded-2xl transition-all duration-300">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <i class="fas fa-exchange-alt text-white text-2xl"></i>
                </div>
                <h3 class="font-black text-gray-900 text-xl mb-2">{{ __('devoluciones_faciles') }}</h3>
                <p class="text-gray-600 leading-relaxed">{{ __('garantia_dias') }}</p>
            </div>
            
            <div class="group text-center p-8 hover:bg-gradient-to-br hover:from-amber-50 hover:to-orange-50 rounded-2xl transition-all duration-300">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <i class="fas fa-headset text-white text-2xl"></i>
                </div>
                <h3 class="font-black text-gray-900 text-xl mb-2">{{ __('support') }}</h3>
                <p class="text-gray-600 leading-relaxed">{{ __('atention') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}

@keyframes bounce {
    0%, 20%, 53%, 80%, 100% {
        animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
        transform: translate3d(0, 0, 0);
    }
    40%, 43% {
        animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
        transform: translate3d(0, -5px, 0);
    }
    70% {
        animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
        transform: translate3d(0, -3px, 0);
    }
    90% {
        transform: translate3d(0, -1px, 0);
    }
}

.group:hover .group-hover\:bounce {
    animation: bounce 1s;
}

.group:hover .group-hover\:pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

.group:hover .group-hover\:rotate-12 {
    transform: rotate(12deg);
}
</style>

@endsection