@extends('layouts.app')
@section('title', __('admin.panel_control'))

@section('content')

<body id="admin-page">
    <div class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-10 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute top-40 right-20 w-80 h-80 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
            <div class="absolute bottom-10 left-1/3 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
        </div>

        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3csvg width=" 40" height="40" xmlns="http://www.w3.org/2000/svg" %3e%3cdefs%3e%3cpattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse" %3e%3cpath d="m 40 0 l 0 40 m -40 0 l 40 0" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1" /%3e%3c/pattern%3e%3c/defs%3e%3crect width="100%25" height="100%25" fill="url(%23grid)" /%3e%3c/svg%3e')] opacity-30"></div>

        <div class="container mx-auto px-6 py-16 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-white mb-8 md:mb-0">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-3xl flex items-center justify-center mb-6 shadow-2xl">
                        <i class="fas fa-tachometer-alt text-white text-2xl"></i>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-black mb-4 bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                        {{ __('admin.panel_administracion') }}
                    </h1>
                    <p class="text-xl text-gray-300 leading-relaxed">{{ __('admin.bienvenido') }}, {{ Auth::user()->name }}</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('tienda') }}" class="group inline-flex items-center bg-white/10 backdrop-blur-md hover:bg-white/20 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl border border-white/20">
                        <i class="fas fa-store mr-3"></i>{{ __('admin.ver_tienda') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-gray-50 via-white to-gray-50 py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="group bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 backdrop-blur-sm hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="w-1 h-16 bg-gradient-to-b from-blue-500 to-cyan-500 rounded-full mb-4"></div>
                            <p class="text-gray-500 text-sm font-medium">{{ __('admin.ventas_totales_completadas') }}</p>
                            <h3 class="text-3xl font-black text-gray-900 mb-2">€{{ number_format($totalVentas, 2, ',', '.') }}</h3>
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-arrow-up text-white text-xs"></i>
                                </div>
                                <p class="text-sm text-green-600 font-medium">{{ $totalPedidos }} {{ __('ventas') }}</p>
                            </div>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-shopping-cart text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="group bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 backdrop-blur-sm hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="w-1 h-16 bg-gradient-to-b from-yellow-500 to-orange-500 rounded-full mb-4"></div>
                            <p class="text-gray-500 text-sm font-medium">{{ __('admin.pedidos_preparacion') }}</p>
                            <h3 class="text-3xl font-black text-gray-900 mb-2">{{ $pedidosEnPreparacion }}</h3>
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-truck-loading text-white text-xs"></i>
                                </div>
                                <p class="text-sm text-yellow-600 font-medium">{{ __('admin.en_preparacion') }}</p>
                            </div>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-box-open text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="group bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 backdrop-blur-sm hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="w-1 h-16 bg-gradient-to-b from-purple-500 to-pink-500 rounded-full mb-4"></div>
                            <p class="text-gray-500 text-sm font-medium">{{ __('admin.clientes_totales') }}</p>
                            <h3 class="text-3xl font-black text-gray-900 mb-2">{{ $totalClientes }}</h3>
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-6 h-6 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user-plus text-white text-xs"></i>
                                </div>
                                <p class="text-sm text-green-600 font-medium">+ {{ $nuevosUsuarios }} {{ __('admin.nuevos') }}</p>
                            </div>
                            <a href="{{ route('admin.users.index') }}" class="group inline-flex items-center bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold py-2 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 text-sm">
                                {{ __('admin.gestionar') }}
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-users text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="group bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 backdrop-blur-sm hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="w-1 h-16 bg-gradient-to-b from-red-500 to-rose-500 rounded-full mb-4"></div>
                            <p class="text-gray-500 text-sm font-medium">{{ __('admin.productos_activos') }}</p>
                            <h3 class="text-3xl font-black text-gray-900 mb-2">{{ $productosActivos }}</h3>
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-6 h-6 bg-gradient-to-br from-amber-500 to-orange-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-exclamation-triangle text-white text-xs"></i>
                                </div>
                                <p class="text-sm text-amber-600 font-medium">{{ __('admin.productos_inactivos') }}: {{ $productosInactivos }}</p>
                            </div>
                            <a href="{{ route('admin.productos') }}" class="group inline-flex items-center bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 text-white font-bold py-2 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 text-sm">
                                {{ __('admin.gestionar') }}
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-rose-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-mobile-alt text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-16">
                <div class="lg:col-span-2 bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 backdrop-blur-sm">
                    <div class="flex justify-between items-center mb-8">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-chart-line text-white"></i>
                            </div>
                            <h3 class="text-2xl font-black text-gray-900">{{ __('admin.ventas_recientes_completadas') }}</h3>
                        </div>
                        <div class="flex space-x-2">
                            <button id="btn-mensual" class="text-sm px-4 py-2 rounded-xl bg-gradient-to-r from-blue-500 to-cyan-500 text-white periodo-btn active font-medium shadow-lg">{{ __('admin.mensual') }}</button>
                            <button id="btn-trimestral" class="text-sm px-4 py-2 rounded-xl text-gray-500 hover:bg-gray-100 periodo-btn font-medium transition-all">{{ __('admin.trimestral') }}</button>
                            <button id="btn-anual" class="text-sm px-4 py-2 rounded-xl text-gray-500 hover:bg-gray-100 periodo-btn font-medium transition-all">{{ __('admin.anual') }}</button>
                        </div>
                    </div>
                    <div class="h-64 flex items-center justify-center bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl" id="chart-container">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 backdrop-blur-sm">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                        <h3 class="text-2xl font-black text-gray-900">{{ __('admin.productos_stock_bajo') }}</h3>
                    </div>

                    <div class="overflow-hidden rounded-2xl shadow-lg">
                        <table class="min-w-full">
                            <thead>
                                <tr class="bg-gradient-to-r from-amber-500 to-orange-500 text-white">
                                    <th class="py-4 px-4 text-left text-sm font-bold uppercase tracking-wider">ID</th>
                                    <th class="py-4 px-4 text-left text-sm font-bold uppercase tracking-wider">{{ __('admin.nombre') }}</th>
                                    <th class="py-4 px-4 text-left text-sm font-bold uppercase tracking-wider">{{ __('admin.stock') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($productosConStockBajo as $producto)
                                <tr class="hover:bg-amber-50 transition-colors">
                                    <td class="py-4 px-4 text-sm font-medium text-gray-900">{{ $producto->id }}</td>
                                    <td class="py-4 px-4 text-sm text-gray-700">{{ $producto->name }}</td>
                                    <td class="py-4 px-4 text-sm text-gray-700">
                                        <span class="px-3 py-1 bg-gradient-to-r from-red-500 to-rose-500 text-white text-xs font-bold rounded-full">
                                            {{ $producto->stock }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-16">
                <div class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 backdrop-blur-sm">
                    <div class="flex justify-between items-center mb-8">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-shopping-bag text-white"></i>
                            </div>
                            <h3 class="text-2xl font-black text-gray-900">{{ __('admin.pedidos') }}</h3>
                        </div>
                        <a href="#" onclick="abrirModalPedidos()" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                            {{ __('admin.ver_todos') }}
                        </a>
                    </div>

                    <div class="overflow-hidden rounded-2xl shadow-lg">
                        <table class="min-w-full">
                            <thead>
                                <tr class="bg-gradient-to-r from-green-500 to-emerald-500 text-white">
                                    <th class="py-4 px-4 text-left text-xs font-bold uppercase tracking-wider">ID</th>
                                    <th class="py-4 px-4 text-left text-xs font-bold uppercase tracking-wider">{{ __('admin.cliente') }}</th>
                                    <th class="py-4 px-4 text-left text-xs font-bold uppercase tracking-wider">{{ __('admin.estado') }}</th>
                                    <th class="py-4 px-4 text-left text-xs font-bold uppercase tracking-wider">{{ __('admin.total') }}</th>
                                    <th class="py-4 px-4 text-left text-xs font-bold uppercase tracking-wider">{{ __('admin.fecha') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($ultimosPedidos as $pedido)
                                <tr class="hover:bg-green-50 transition-colors">
                                    <td class="py-4 px-4 text-sm font-medium text-gray-900">#{{ $pedido->id }}</td>
                                    <td class="py-4 px-4 text-sm text-gray-700">{{ $pedido->user->name ?? 'Sin cliente' }}</td>
                                    <td class="py-4 px-4 text-sm">
                                        <span class="px-3 py-1 text-xs rounded-full bg-gradient-to-r from-green-500 to-emerald-500 text-white font-bold">
                                            {{ $pedido->status }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 text-sm font-medium text-gray-900">€{{ number_format($pedido->total, 2) }}</td>
                                    <td class="py-4 px-4 text-sm text-gray-700">{{ $pedido->created_at->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $ultimosPedidos->links() }}
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 backdrop-blur-sm">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <h2 class="text-2xl font-black text-gray-900">{{ __('mensajes_recientes') }}</h2>
                    </div>

                    <div class="space-y-6">
                        @foreach ($ultimosContactos as $contacto)
                        <div class="bg-gradient-to-br from-gray-50 to-white p-6 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-bold text-gray-900 mb-1">{{ $contacto->user->name ?? $contacto->name }}</p>
                                    <p class="text-sm text-gray-500 mb-2">{{ $contacto->created_at->format('d/m/Y H:i') }}</p>
                                    <p class="text-gray-700 font-medium mb-3">{{ __('asunto') }}: {{ $contacto->asunto }}</p>
                                    <button
                                        class="group inline-flex items-center bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold py-2 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 text-sm"
                                        onclick="openModal({{ $contacto->id }}, 
                                            '{{ addslashes($contacto->user->name ?? $contacto->name) }}', 
                                            '{{ addslashes($contacto->user->email ?? $contacto->email) }}', 
                                            '{{ addslashes($contacto->telefono ?? '') }}', 
                                            '{{ addslashes($contacto->asunto) }}', 
                                            '{{ addslashes($contacto->mensaje) }}', 
                                            '{{ addslashes($contacto->answer ?? '') }}', 
                                            '{{ $contacto->created_at->format('d/m/Y H:i') }}'
                                        )">
                                        <i class="fas fa-reply mr-2"></i>
                                        {{ __('ver_responder') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $ultimosContactos->links() }}
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-16">
                <div class="group bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 backdrop-blur-sm hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="w-1 h-16 bg-gradient-to-b from-green-500 to-emerald-500 rounded-full mb-4"></div>
                            <p class="text-gray-500 text-sm font-medium">{{ __('cupones_activos') }}</p>
                            <h3 class="text-3xl font-black text-gray-900 mb-2">{{ $cuponesActivos }}</h3>
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-6 h-6 bg-gradient-to-br from-red-500 to-rose-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-times text-white text-xs"></i>
                                </div>
                                <p class="text-sm text-red-600 font-medium">{{ __('inactivos') }}: {{ $cuponesInactivos }}</p>
                            </div>
                            <a href="{{ route('discount_codes.index') }}" class="group inline-flex items-center bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105">
                                {{ __('admin.gestionar') }}
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-percent text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="group bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 backdrop-blur-sm hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="w-1 h-16 bg-gradient-to-b from-indigo-500 to-purple-500 rounded-full mb-4"></div>
                            <p class="text-gray-500 text-sm font-medium">{{ __('suscriptores_newsletter') }}</p>
                            <h3 class="text-3xl font-black text-gray-900 mb-2">{{ $newsletterCount }}</h3>
                            <div class="flex items-center gap-2 mb-4">
                                <div class="w-6 h-6 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-envelope text-white text-xs"></i>
                                </div>
                                <p class="text-sm text-indigo-600 font-medium">{{ __('admin.total_suscriptores') }}</p>
                            </div>
                            <a href="{{ route('admin.newsletter.form') }}" class="group inline-flex items-center bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105">
                                {{ __('enviar_correo') }}
                                <i class="fas fa-paper-plane ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-newspaper text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="respuestaModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm overflow-y-auto py-10 px-4 hidden">
        <div class="bg-white rounded-3xl w-full max-w-3xl mx-auto max-h-[95vh] overflow-hidden shadow-2xl border border-gray-100">
            <div class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 p-8">
                <div class="absolute inset-0 opacity-20">
                    <div class="absolute top-4 left-6 w-32 h-32 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
                    <div class="absolute top-8 right-8 w-24 h-24 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
                </div>

                <div class="relative z-10 flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-reply text-white text-lg"></i>
                        </div>
                        <h2 class="text-2xl font-black text-white bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                            {{ __('responder_mensaje') }}
                        </h2>
                    </div>
                    <button onclick="cerrarModal()" class="group w-10 h-10 bg-white/10 backdrop-blur-md hover:bg-white/20 rounded-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 border border-white/20">
                        <i class="fas fa-times text-white group-hover:rotate-90 transition-transform duration-300"></i>
                    </button>
                </div>
            </div>

            <div class="p-8 overflow-y-auto max-h-[calc(95vh-120px)]">
                <form method="POST" action="{{ route('contact.answer') }}">
                    @csrf
                    <input type="hidden" name="contact_id" id="contact_id">

                    <div class="bg-gradient-to-br from-gray-50 via-white to-gray-50 rounded-2xl p-6 mb-8 border border-gray-100">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                            {{ __('informacion_cliente') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="group">
                                <label class="text-sm font-medium text-gray-500 mb-1 block">{{ __('nombre') }}</label>
                                <p id="nombreUsuario" class="text-gray-900 font-semibold bg-white rounded-xl p-3 border border-gray-200 group-hover:border-blue-300 transition-colors"></p>
                            </div>
                            <div class="group">
                                <label class="text-sm font-medium text-gray-500 mb-1 block">{{ __('email') }}</label>
                                <p id="emailUsuario" class="text-gray-900 font-semibold bg-white rounded-xl p-3 border border-gray-200 group-hover:border-blue-300 transition-colors"></p>
                            </div>
                            <div class="group">
                                <label class="text-sm font-medium text-gray-500 mb-1 block">{{ __('telefono') }}</label>
                                <p id="telefonoUsuario" class="text-gray-900 font-semibold bg-white rounded-xl p-3 border border-gray-200 group-hover:border-blue-300 transition-colors"></p>
                            </div>
                            <div class="group">
                                <label class="text-sm font-medium text-gray-500 mb-1 block">{{ __('fecha') }}</label>
                                <p id="fechaCreacion" class="text-gray-900 font-semibold bg-white rounded-xl p-3 border border-gray-200 group-hover:border-blue-300 transition-colors"></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-blue-50 via-white to-cyan-50 rounded-2xl p-6 mb-8 border border-blue-100">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-envelope text-white text-sm"></i>
                            </div>
                            {{ __('Mensaje_original') }}
                        </h3>
                        <div class="space-y-4">
                            <div class="group">
                                <label class="text-sm font-medium text-gray-500 mb-2 block">{{ __('asunto') }}</label>
                                <p id="asuntoUsuario" class="text-gray-900 font-semibold bg-white rounded-xl p-4 border border-blue-200 group-hover:border-blue-300 transition-colors"></p>
                            </div>
                            <div class="group">
                                <label class="text-sm font-medium text-gray-500 mb-2 block">{{ __('mensaje') }}</label>
                                <div id="mensajeUsuario" class="text-gray-900 bg-white rounded-xl p-4 border border-blue-200 group-hover:border-blue-300 transition-colors min-h-[100px] whitespace-pre-wrap"></div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-green-50 via-white to-emerald-50 rounded-2xl p-6 border border-green-100">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-reply text-white text-sm"></i>
                            </div>
                            {{ __('tu_respuesta') }}
                        </h3>
                        <div class="relative">
                            <textarea
                                name="answer"
                                id="answerTextarea"
                                rows="6"
                                class="w-full border-2 border-green-200 rounded-xl p-4 focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all duration-300 resize-none bg-white/50 backdrop-blur-sm"
                                placeholder="{{ __('escribe_tu_respuesta') }}"
                                required></textarea>
                            <div class="absolute bottom-3 right-3 text-xs text-gray-400">
                                <span id="charCount">0</span> {{ __('caracteres') }}
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-end gap-4 mt-8 pt-6 border-t border-gray-200">
                        <button
                            type="button"
                            onclick="cerrarModal()"
                            class="group inline-flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:scale-105 border border-gray-200">
                            <i class="fas fa-times mr-2 group-hover:rotate-90 transition-transform duration-300"></i>
                            {{ __('cancelar') }}
                        </button>
                        <button
                            type="submit"
                            class="group inline-flex items-center justify-center bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <i class="fas fa-paper-plane mr-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                            {{ __('enviar_respuesta') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div id="modalPedidos" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm overflow-y-auto py-10 px-4 hidden">
        <div class="bg-white rounded-3xl w-full max-w-7xl mx-auto max-h-[95vh] overflow-hidden shadow-2xl border border-gray-100">
            <div class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 p-8">
                <div class="absolute inset-0 opacity-20">
                    <div class="absolute top-4 left-6 w-32 h-32 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
                    <div class="absolute top-8 right-8 w-24 h-24 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
                    <div class="absolute bottom-4 left-1/2 w-20 h-20 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
                </div>

                <div class="relative z-10 flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-shopping-cart text-white text-lg"></i>
                        </div>
                        <h2 class="text-2xl font-black text-white bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                            {{ __('gestion_pedidos') }}
                        </h2>
                    </div>
                    <button onclick="cerrarModalPedidos()" class="group w-10 h-10 bg-white/10 backdrop-blur-md hover:bg-white/20 rounded-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 border border-white/20">
                        <i class="fas fa-times text-white group-hover:rotate-90 transition-transform duration-300"></i>
                    </button>
                </div>
            </div>

            <div class="p-8 overflow-y-auto max-h-[calc(95vh-120px)]">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">{{ __('cliente') }}</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">{{ __('estado') }}</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">{{ __('tracking') }}</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Total</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">{{ __('fecha') }}</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">{{ __('accion') }}</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">{{ __('detalles') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($ultimosPedidos as $pedido)
                                <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 transition-all duration-300">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center shadow-sm">
                                                <span class="text-white text-xs font-bold">#</span>
                                            </div>
                                            <span class="ml-2 text-sm font-semibold text-gray-900">{{ $pedido->id }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center shadow-sm">
                                                <i class="fas fa-user text-white text-xs"></i>
                                            </div>
                                            <span class="ml-2 text-sm font-medium text-gray-900">{{ $pedido->user->name ?? 'Sin cliente' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <select onchange="marcarCambio({{ $pedido->id }})" id="status-{{ $pedido->id }}" class="bg-white border-2 border-gray-200 rounded-xl px-3 py-2 text-sm font-medium focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300">
                                            <option value="Pendiente" {{ $pedido->status == 'Pendiente' ? 'selected' : '' }}>🟡 {{ __('pendiente') }}</option>
                                            <option value="Completado" {{ $pedido->status == 'Completado' ? 'selected' : '' }}>🟢 {{ __('completado') }}</option>
                                            <option value="Cancelado" {{ $pedido->status == 'Cancelado' ? 'selected' : '' }}>🔴 {{ __('cancelado') }}</option>
                                        </select>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <select onchange="marcarCambio({{ $pedido->id }})" id="tracking-{{ $pedido->id }}" class="bg-white border-2 border-gray-200 rounded-xl px-3 py-2 text-sm font-medium focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all duration-300">
                                            <option value="Pendiente" {{ $pedido->tracking == 'Pendiente' ? 'selected' : '' }}>⏳ {{ __('pendiente') }}</option>
                                            <option value="En preparación" {{ $pedido->tracking == 'En preparación' ? 'selected' : '' }}>📦 {{ __('en_preparacion') }}</option>
                                            <option value="Enviado" {{ $pedido->tracking == 'Enviado' ? 'selected' : '' }}>🚚 {{ __('enviado') }}</option>
                                            <option value="Entregado" {{ $pedido->tracking == 'Entregado' ? 'selected' : '' }}>✅ {{ __('entregado') }}</option>
                                        </select>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-500 rounded-lg flex items-center justify-center shadow-sm">
                                                <i class="fas fa-euro-sign text-white text-xs"></i>
                                            </div>
                                            <span class="ml-2 text-sm font-bold text-gray-900">€{{ $pedido->total }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-red-500 rounded-lg flex items-center justify-center shadow-sm">
                                                <i class="fas fa-calendar text-white text-xs"></i>
                                            </div>
                                            <span class="ml-2 text-sm font-medium text-gray-900">{{ $pedido->created_at->format('d/m/Y') }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button onclick="guardarCambios({{ $pedido->id }})" class="group inline-flex items-center bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold py-2 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                                            <i class="fas fa-save mr-2 group-hover:rotate-12 transition-transform duration-300"></i>
                                            {{ __('guardar') }}
                                        </button>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button onclick="toggleDetallesPedido({{ $pedido->id }})" class="group inline-flex items-center bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold py-2 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                                            <i class="fas fa-eye mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                                            {{ __('ver') }}
                                        </button>
                                    </td>
                                </tr>
                                <tr id="detalles-pedido-{{ $pedido->id }}" class="hidden">
                                    <td colspan="8" class="px-6 py-6 bg-gradient-to-br from-gray-50 via-white to-gray-50">
                                        <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                                            <h4 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                                                <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center">
                                                    <i class="fas fa-list text-white text-sm"></i>
                                                </div>
                                                {{ __('detalles_pedido') }} #{{ $pedido->id }}
                                            </h4>
                                            <div class="overflow-x-auto">
                                                <table class="w-full text-sm">
                                                    <thead>
                                                        <tr class="bg-gradient-to-r from-gray-100 to-gray-200 rounded-xl">
                                                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">{{ __('imagen') }}</th>
                                                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">{{ __('producto') }}</th>
                                                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">{{ __('cantidad') }}</th>
                                                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">{{ __('precio') }}</th>
                                                            <th class="px-4 py-3 text-left text-xs font-bold text-gray-600 uppercase">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="divide-y divide-gray-200">
                                                        @foreach ($pedido->details as $detail)
                                                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                                                            <td class="px-4 py-3">
                                                                @if($detail->product && $detail->product->image)
                                                                <img src="{{ asset('storage/products/' . $detail->product->image) }}"
                                                                    alt="{{ $detail->product->name }}"
                                                                    class="w-16 h-16 object-cover rounded-xl border-2 border-gray-200 shadow-sm">
                                                                @else
                                                                <div class="w-16 h-16 bg-gradient-to-br from-gray-200 to-gray-300 rounded-xl flex items-center justify-center">
                                                                    <i class="fas fa-image text-gray-400"></i>
                                                                </div>
                                                                @endif
                                                            </td>
                                                            <td class="px-4 py-3">
                                                                <span class="font-semibold text-gray-900">{{ $detail->product->name ?? 'Producto eliminado' }}</span>
                                                            </td>
                                                            <td class="px-4 py-3">
                                                                <div class="flex items-center">
                                                                    <div class="w-6 h-6 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center">
                                                                        <span class="text-white text-xs font-bold">{{ $detail->quantity }}</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-4 py-3">
                                                                <span class="font-semibold text-gray-900">{{ number_format($detail->price, 2) }} €</span>
                                                            </td>
                                                            <td class="px-4 py-3">
                                                                <span class="font-bold text-green-600">{{ number_format($detail->price * $detail->quantity, 2) }} €</span>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="mt-6 bg-gradient-to-br from-green-50 via-white to-emerald-50 rounded-xl p-4 border border-green-100">
                                                <div class="flex justify-between items-center space-y-2 text-sm">
                                                    <div class="space-y-2">
                                                        <div class="flex items-center gap-2">
                                                            <div class="w-4 h-4 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full"></div>
                                                            <span class="text-gray-600">{{ __('subtotal') }}:</span>
                                                            <span class="font-semibold text-gray-900">{{ number_format($pedido->subtotal, 2) }} €</span>
                                                        </div>
                                                        <div class="flex items-center gap-2">
                                                            <div class="w-4 h-4 bg-gradient-to-br from-orange-500 to-red-500 rounded-full"></div>
                                                            <span class="text-gray-600">IVA:</span>
                                                            <span class="font-semibold text-gray-900">{{ number_format($pedido->iva, 2) }} €</span>
                                                        </div>
                                                    </div>
                                                    <div class="text-right space-y-2">
                                                        <div class="flex items-center gap-2">
                                                            <span class="text-gray-600">Total:</span>
                                                            <span class="font-bold text-green-600 text-lg">{{ number_format($pedido->total, 2) }} €</span>
                                                        </div>
                                                        <div class="flex items-center gap-2">
                                                            <div class="w-4 h-4 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full"></div>
                                                            <span class="text-gray-600">{{ __('metodo') }}:</span>
                                                            <span class="font-semibold text-gray-900">{{ ucfirst($pedido->payment_method) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6 px-4">
                        {{ $ultimosPedidos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection