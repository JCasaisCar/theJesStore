@extends('layouts.app')
@section('title', __('datos_envio'))
@section('content')

<body id="addres-page">
    <div class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-10 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute top-40 right-20 w-80 h-80 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
            <div class="absolute bottom-10 left-1/3 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
        </div>

        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3csvg width=\" 40\" height=\"40\" xmlns=\"http://www.w3.org/2000/svg\"%3e%3cdefs%3e%3cpattern id=\"grid\" width=\"40\" height=\"40\" patternUnits=\"userSpaceOnUse\"%3e%3cpath d=\"m 40 0 l 0 40 m -40 0 l 40 0\" fill=\"none\" stroke=\"rgba(255,255,255,0.05)\" stroke-width=\"1\"/%3e%3c/pattern%3e%3c/defs%3e%3crect width=\"100%25\" height=\"100%25\" fill=\"url(%23grid)\" /%3e%3c/svg%3e')] opacity-30"></div>

        <div class="container mx-auto px-4 py-20 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="w-24 h-24 mx-auto bg-gradient-to-br from-blue-500 to-cyan-500 rounded-3xl flex items-center justify-center mb-8 shadow-2xl">
                    <i class="fas fa-truck text-white text-3xl"></i>
                </div>

                <h1 class="text-4xl md:text-6xl font-black mb-6 bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                    {{ __('datos_envio') }}
                </h1>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                    {{ __('envio_descripcion') }}
                </p>

                <div class="flex items-center justify-center text-sm">
                    <a href="{{ route('home') }}" class="text-blue-300 hover:text-white transition-colors duration-300 font-medium flex items-center">
                        <i class="fas fa-home mr-2"></i>{{ __('inicio') }}
                    </a>
                    <div class="mx-3 text-gray-400">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </div>
                    <span class="text-white font-medium">{{ __('carrito') }}</span>
                    <div class="mx-3 text-gray-400">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </div>
                    <span class="text-white font-medium">{{ __('datos_envio') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-12 md:py-16">
        <div class="container mx-auto px-4">
            <div class="mb-12">
                <div class="flex justify-center">
                    <div class="w-full max-w-4xl">
                        <div class="flex items-center justify-between">
                            <div class="flex-1 text-center">
                                <div class="bg-gray-200 text-gray-500 rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-check text-blue-600"></i>
                                </div>
                                <p class="text-sm text-gray-500">{{ __('carrito') }}</p>
                                <div class="h-1 bg-gray-200 mt-2"></div>
                            </div>
                            <div class="w-1/6 h-1 bg-blue-600"></div>
                            <div class="flex-1 text-center">
                                <div class="bg-blue-600 text-white rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <p class="text-sm font-bold text-blue-600">{{ __('envio') }}</p>
                                <div class="h-1 bg-blue-600 mt-2"></div>
                            </div>
                            <div class="w-1/6 h-1 bg-gray-300"></div>
                            <div class="flex-1 text-center">
                                <div class="bg-gray-200 text-gray-500 rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <p class="text-sm text-gray-500">{{ __('pago') }}</p>
                                <div class="h-1 bg-gray-200 mt-2"></div>
                            </div>
                            <div class="w-1/6 h-1 bg-gray-300"></div>
                            <div class="flex-1 text-center">
                                <div class="bg-gray-200 text-gray-500 rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-check"></i>
                                </div>
                                <p class="text-sm text-gray-500">{{ __('confirmacion') }}</p>
                                <div class="h-1 bg-gray-200 mt-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                        <div class="bg-gray-50 p-4 border-b">
                            <h2 class="font-bold text-lg text-gray-800">{{ __('informacion_envio') }}</h2>
                        </div>

                        <div class="p-6">
                            <form id="shipping-form" method="POST" action="{{ route('addres.store') }}">
                                @csrf
                                <div class="mb-8">
                                    <h3 class="text-md font-semibold text-gray-700 mb-4 flex items-center">
                                        <i class="fas fa-user-circle mr-2 text-blue-600"></i>
                                        {{ __('datos_personales') }}
                                    </h3>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">{{ __('nombre') }} *</label>
                                            <input type="text" id="nombre" name="nombre" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                        </div>

                                        <div>
                                            <label for="apellidos" class="block text-sm font-medium text-gray-700 mb-1">{{ __('apellidos') }} *</label>
                                            <input type="text" id="apellidos" name="apellidos" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                        </div>

                                        <div>
                                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('email') }} *</label>
                                            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" readonly class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-600 cursor-not-allowed">
                                        </div>

                                        <div>
                                            <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">{{ __('telefono') }} *</label>
                                            <input type="tel" id="telefono" name="telefono" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-8">
                                    <h3 class="text-md font-semibold text-gray-700 mb-4 flex items-center">
                                        <i class="fas fa-map-marker-alt mr-2 text-blue-600"></i>
                                        {{ __('direccion_envio') }}
                                    </h3>

                                    <div class="grid grid-cols-1 gap-6">
                                        <div>
                                            <label for="direccion" class="block text-sm font-medium text-gray-700 mb-1">{{ __('direccion') }} *</label>
                                            <input type="text" id="direccion" name="direccion" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                        </div>

                                        <div>
                                            <label for="direccion2" class="block text-sm font-medium text-gray-700 mb-1">{{ __('direccion_adicional') }}</label>
                                            <input type="text" id="direccion2" name="direccion2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                            <div>
                                                <label for="ciudad" class="block text-sm font-medium text-gray-700 mb-1">{{ __('ciudad') }} *</label>
                                                <input type="text" id="ciudad" name="ciudad" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                            </div>

                                            <div>
                                                <label for="provincia" class="block text-sm font-medium text-gray-700 mb-1">{{ __('provincia') }} *</label>
                                                <input type="text" id="provincia" name="provincia" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                            </div>

                                            <div>
                                                <label for="codigo_postal" class="block text-sm font-medium text-gray-700 mb-1">{{ __('codigo_postal') }} *</label>
                                                <input type="text" id="codigo_postal" name="codigo_postal" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="pais" class="block text-sm font-medium text-gray-700 mb-1">{{ __('pais') }} *</label>
                                            <select id="pais" name="pais" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
                                                <option value="">{{ __('selecciona_pais') }}</option>
                                                <option value="ES">España</option>
                                                <option value="PT">Portugal</option>
                                                <option value="FR">Francia</option>
                                                <option value="IT">Italia</option>
                                                <option value="DE">Alemania</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-8">
                                    <h3 class="text-md font-semibold text-gray-700 mb-4 flex items-center">
                                        <i class="fas fa-shipping-fast mr-2 text-blue-600"></i>
                                        {{ __('metodo_envio') }}
                                    </h3>

                                    <div class="space-y-4">
                                        @foreach ($shippingMethods as $method)
                                        <div class="border border-gray-300 rounded-lg p-4 hover:border-blue-600 cursor-pointer transition" data-envio-container>
                                            <div class="flex items-center">
                                                <input type="radio" id="envio-{{ $method->id }}" name="shipping_method_id" value="{{ $method->id }}"
                                                    class="text-blue-600 focus:ring-blue-600 mr-3" {{ $loop->first ? 'checked' : '' }}>
                                                <label for="envio-{{ $method->id }}" class="flex-1 cursor-pointer">
                                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                                        <div>
                                                            <p class="font-medium text-gray-800">{{ $method->nombre }}</p>
                                                            <p class="text-sm text-gray-600">{{ $method->descripcion }}</p>
                                                        </div>
                                                        <div class="mt-2 md:mt-0">
                                                            <span class="font-bold text-blue-600">{{ number_format($method->precio, 2) }} €</span>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="bg-gray-50 p-4 sm:p-6 flex flex-wrap gap-3 justify-between items-center">
                            <a href="{{ route('cart') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition">
                                <i class="fas fa-arrow-left mr-2"></i>
                                {{ __('volver_carrito') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden sticky top-24">
                        <div class="bg-gray-50 p-4 border-b">
                            <h2 class="font-bold text-lg text-gray-800">{{ __('resumen_compra') }}</h2>
                        </div>

                        <div class="p-4 sm:p-6">
                            <div class="mb-6">
                                <h3 class="text-sm font-medium text-gray-700 mb-3">{{ __('productos') }} ({{ $cart->items->count() }})</h3>
                                <div class="space-y-3">
                                    @foreach ($cart->items as $item)
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gray-100 rounded-md overflow-hidden mr-3">
                                            <img src="{{ asset('img/products/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="object-cover w-full h-full">
                                        </div>
                                        <div class="flex-1 text-sm">
                                            <p class="text-gray-800 truncate">{{ $item->product->name }}</p>
                                            <p class="text-gray-500">{{ $item->quantity }} x {{ number_format($item->product->price, 2) }} €</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">{{ __('subtotal') }}</span>
                                    <span class="font-medium">{{ number_format($subtotal, 2) }} €</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">{{ __('envio') }}</span>
                                    <span class="font-medium" data-envio>{{ number_format($envio, 2) }} €</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">{{ __('impuestos') }}</span>
                                    <span class="font-medium">{{ number_format($iva, 2) }} €</span>
                                </div>

                                @if(isset($descuento) && $descuento > 0)
                                <div class="flex justify-between text-green-700 font-medium">
                                    <span>{{ __('cupón_aplicado') }} ({{ $codigo ?? '' }})</span>
                                    <span>-{{ number_format($descuento, 2) }} €</span>
                                </div>
                                @endif

                                <div class="pt-3 border-t border-gray-200 flex justify-between">
                                    <span class="font-bold text-gray-800">{{ __('total') }}</span>
                                    <span class="font-bold text-blue-600" data-total>{{ number_format($total, 2) }} €</span>
                                </div>
                                <span hidden data-subtotal="{{ $subtotal }}"></span>
                                <span hidden data-iva="{{ $iva }}"></span>
                            </div>

                            <button type="submit" form="shipping-form" class="block w-full bg-gradient-to-r from-blue-800 to-blue-600 hover:from-blue-700 hover:to-blue-500 text-white font-bold py-3 px-6 rounded-lg transition shadow-lg text-center">
                                {{ __('continuar_al_pago') }} <i class="fas fa-arrow-right ml-2"></i>
                            </button>

                            <div class="mt-6 text-center">
                                <p class="text-sm text-gray-500 flex items-center justify-center">
                                    <i class="fas fa-lock mr-2"></i>
                                    {{ __('informacion_segura') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


@endsection