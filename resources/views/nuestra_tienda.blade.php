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
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <!-- Búsqueda -->
            <div class="relative w-full md:w-64">
                <input type="text" placeholder="{{ __('buscar_productos') }}" class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <div class="absolute left-3 top-2.5 text-gray-400">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            
            <!-- Filtros -->
            <div class="flex flex-wrap items-center gap-3">
                <span class="text-gray-700 font-medium">{{ __('filtrar_por') }}:</span>
                <select class="py-2 px-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">{{ __('categoria') }}</option>
                    <option value="smartphones">{{ __('smartphones') }}</option>
                    <option value="tablets">{{ __('tablets') }}</option>
                    <option value="accesorios">{{ __('accesorios') }}</option>
                    <option value="smartwatches">{{ __('smartwatches') }}</option>
                </select>
                <select class="py-2 px-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">{{ __('precio') }}</option>
                    <option value="asc">{{ __('menor_precio') }}</option>
                    <option value="desc">{{ __('mayor_precio') }}</option>
                </select>
                <select class="py-2 px-3 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">{{ __('marca') }}</option>
                    <option value="apple">Apple</option>
                    <option value="samsung">Samsung</option>
                    <option value="xiaomi">Xiaomi</option>
                    <option value="huawei">Huawei</option>
                </select>
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition transform hover:scale-105">
                    <i class="fas fa-filter mr-1"></i> {{ __('aplicar') }}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Productos Grid -->
<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold">{{ __('nuestros_productos') }}</h2>
            <div class="flex items-center gap-2 text-gray-600">
                <span>{{ __('ver') }}:</span>
                <button class="bg-white p-2 rounded-md shadow-sm hover:bg-gray-100 transition">
                    <i class="fas fa-th"></i>
                </button>
                <button class="bg-white p-2 rounded-md shadow-sm hover:bg-gray-100 transition">
                    <i class="fas fa-list"></i>
                </button>
            </div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Producto 1 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="relative">
                    <img src="{{ asset('images/products/phone-1.jpg') }}" alt="{{ __('smartphone_premium') }}" class="w-full h-64 object-cover">
                    <div class="absolute top-2 right-2">
                        <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">-15%</span>
                    </div>
                    <button class="absolute top-2 left-2 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition">
                        <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                    </button>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-lg">iPhone 14 Pro Max</h3>
                    <div class="flex text-yellow-400 mt-1 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span class="text-gray-500 ml-1">(120)</span>
                    </div>
                    <div class="mt-2 space-y-2">
                        <p class="text-sm text-gray-600">6.7" Super Retina XDR, 256GB</p>
                        <div class="flex items-end gap-2">
                            <span class="text-xl font-bold text-blue-700">999€</span>
                            <span class="text-sm text-gray-500 line-through">1,199€</span>
                        </div>
                        <div class="flex items-center gap-2 pt-2">
                            <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex-grow transition transform hover:scale-105">
                                <i class="fas fa-shopping-cart mr-1"></i> {{ __('añadir') }}
                            </button>
                            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-2 rounded-lg transition">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Producto 2 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="relative">
                    <img src="{{ asset('images/products/phone-2.jpg') }}" alt="{{ __('smartphone_android') }}" class="w-full h-64 object-cover">
                    <div class="absolute top-2 right-2">
                        <span class="bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">{{ __('nuevo') }}</span>
                    </div>
                    <button class="absolute top-2 left-2 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition">
                        <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                    </button>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-lg">Samsung Galaxy S23 Ultra</h3>
                    <div class="flex text-yellow-400 mt-1 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span class="text-gray-500 ml-1">(85)</span>
                    </div>
                    <div class="mt-2 space-y-2">
                        <p class="text-sm text-gray-600">6.8" AMOLED, 512GB, S Pen</p>
                        <div class="flex items-end gap-2">
                            <span class="text-xl font-bold text-blue-700">1,199€</span>
                        </div>
                        <div class="flex items-center gap-2 pt-2">
                            <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex-grow transition transform hover:scale-105">
                                <i class="fas fa-shopping-cart mr-1"></i> {{ __('añadir') }}
                            </button>
                            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-2 rounded-lg transition">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Producto 3 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="relative">
                    <img src="{{ asset('images/products/tablet-1.jpg') }}" alt="{{ __('tablet') }}" class="w-full h-64 object-cover">
                    <button class="absolute top-2 left-2 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition">
                        <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                    </button>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-lg">iPad Pro M2</h3>
                    <div class="flex text-yellow-400 mt-1 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span class="text-gray-500 ml-1">(62)</span>
                    </div>
                    <div class="mt-2 space-y-2">
                        <p class="text-sm text-gray-600">11" Liquid Retina, 256GB, WiFi</p>
                        <div class="flex items-end gap-2">
                            <span class="text-xl font-bold text-blue-700">899€</span>
                            <span class="text-sm text-gray-500 line-through">949€</span>
                        </div>
                        <div class="flex items-center gap-2 pt-2">
                            <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex-grow transition transform hover:scale-105">
                                <i class="fas fa-shopping-cart mr-1"></i> {{ __('añadir') }}
                            </button>
                            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-2 rounded-lg transition">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Producto 4 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="relative">
                    <img src="{{ asset('images/products/watch-1.jpg') }}" alt="{{ __('smartwatch') }}" class="w-full h-64 object-cover">
                    <div class="absolute top-2 right-2">
                        <span class="bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded">{{ __('destacado') }}</span>
                    </div>
                    <button class="absolute top-2 left-2 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition">
                        <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                    </button>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-lg">Apple Watch Series 8</h3>
                    <div class="flex text-yellow-400 mt-1 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span class="text-gray-500 ml-1">(94)</span>
                    </div>
                    <div class="mt-2 space-y-2">
                        <p class="text-sm text-gray-600">45mm, GPS + Cellular, Aluminio</p>
                        <div class="flex items-end gap-2">
                            <span class="text-xl font-bold text-blue-700">499€</span>
                        </div>
                        <div class="flex items-center gap-2 pt-2">
                            <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex-grow transition transform hover:scale-105">
                                <i class="fas fa-shopping-cart mr-1"></i> {{ __('añadir') }}
                            </button>
                            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-2 rounded-lg transition">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Producto 5 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="relative">
                    <img src="{{ asset('images/products/phone-3.jpg') }}" alt="{{ __('smartphone_android') }}" class="w-full h-64 object-cover">
                    <button class="absolute top-2 left-2 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition">
                        <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                    </button>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-lg">Google Pixel 7 Pro</h3>
                    <div class="flex text-yellow-400 mt-1 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span class="text-gray-500 ml-1">(57)</span>
                    </div>
                    <div class="mt-2 space-y-2">
                        <p class="text-sm text-gray-600">6.7" OLED, 128GB, Android 13</p>
                        <div class="flex items-end gap-2">
                            <span class="text-xl font-bold text-blue-700">889€</span>
                            <span class="text-sm text-gray-500 line-through">999€</span>
                        </div>
                        <div class="flex items-center gap-2 pt-2">
                            <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex-grow transition transform hover:scale-105">
                                <i class="fas fa-shopping-cart mr-1"></i> {{ __('añadir') }}
                            </button>
                            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-2 rounded-lg transition">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Producto 6 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="relative">
                    <img src="{{ asset('images/products/accessory-1.jpg') }}" alt="{{ __('auriculares') }}" class="w-full h-64 object-cover">
                    <div class="absolute top-2 right-2">
                        <span class="bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded">{{ __('oferta') }}</span>
                    </div>
                    <button class="absolute top-2 left-2 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition">
                        <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                    </button>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-lg">AirPods Pro 2</h3>
                    <div class="flex text-yellow-400 mt-1 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span class="text-gray-500 ml-1">(128)</span>
                    </div>
                    <div class="mt-2 space-y-2">
                        <p class="text-sm text-gray-600">Cancelación de ruido, Audio espacial</p>
                        <div class="flex items-end gap-2">
                            <span class="text-xl font-bold text-blue-700">239€</span>
                            <span class="text-sm text-gray-500 line-through">279€</span>
                        </div>
                        <div class="flex items-center gap-2 pt-2">
                            <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex-grow transition transform hover:scale-105">
                                <i class="fas fa-shopping-cart mr-1"></i> {{ __('añadir') }}
                            </button>
                            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-2 rounded-lg transition">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Producto 7 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="relative">
                    <img src="{{ asset('images/products/tablet-2.jpg') }}" alt="{{ __('tablet_android') }}" class="w-full h-64 object-cover">
                    <button class="absolute top-2 left-2 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition">
                        <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                    </button>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-lg">Samsung Galaxy Tab S8+</h3>
                    <div class="flex text-yellow-400 mt-1 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span class="text-gray-500 ml-1">(42)</span>
                    </div>
                    <div class="mt-2 space-y-2">
                        <p class="text-sm text-gray-600">12.4" AMOLED, 256GB, S Pen incluido</p>
                        <div class="flex items-end gap-2">
                            <span class="text-xl font-bold text-blue-700">849€</span>
                            <span class="text-sm text-gray-500 line-through">899€</span>
                        </div>
                        <div class="flex items-center gap-2 pt-2">
                            <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex-grow transition transform hover:scale-105">
                                <i class="fas fa-shopping-cart mr-1"></i> {{ __('añadir') }}
                            </button>
                            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-2 rounded-lg transition">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Producto 8 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="relative">
                    <img src="{{ asset('images/products/watch-2.jpg') }}" alt="{{ __('smartwatch') }}" class="w-full h-64 object-cover">
                    <div class="absolute top-2 right-2">
                        <span class="bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">{{ __('nuevo') }}</span>
                    </div>
                    <button class="absolute top-2 left-2 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition">
                        <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                    </button>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 text-lg">Samsung Galaxy Watch 5 Pro</h3>
                    <div class="flex text-yellow-400 mt-1 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span class="text-gray-500 ml-1">(73)</span>
                    </div>
                    <div class="mt-2 space-y-2">
                        <p class="text-sm text-gray-600">45mm, GPS, Titanio, BioActive</p>
                        <div class="flex items-end gap-2">
                            <span class="text-xl font-bold text-blue-700">429€</span>
                        </div>
                        <div class="flex items-center gap-2 pt-2">
                            <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex-grow transition transform hover:scale-105">
                                <i class="fas fa-shopping-cart mr-1"></i> {{ __('añadir') }}
                            </button>
                            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-2 rounded-lg transition">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Paginación -->
        <div class="mt-12 flex justify-center">
            <nav class="flex items-center space-x-1">
                <a href="#" class="px-3 py-2 rounded-md bg-gray-200 text-gray-600 hover:bg-gray-300 transition">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" class="px-4 py-2 rounded-md bg-blue-600 text-white font-medium hover:bg-blue-700 transition">1</a>
                <a href="#" class="px-4 py-2 rounded-md hover:bg-gray-200 text-gray-700 transition">2</a>
                <a href="#" class="px-4 py-2 rounded-md hover:bg-gray-200 text-gray-700 transition">3</a>
                <span class="px-4 py-2 text-gray-600">...</span>
                <a href="#" class="px-4 py-2 rounded-md hover:bg-gray-200 text-gray-700 transition">8</a>
                <a href="#" class="px-3 py-2 rounded-md bg-gray-200 text-gray-600 hover:bg-gray-300 transition">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
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