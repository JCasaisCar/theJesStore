@extends('layouts.app')
@section('title', __('admin.panel_control'))

@section('content')
<!-- Header del Panel de Administración -->
<div class="bg-gradient-to-r from-blue-900 to-blue-700 shadow-lg">
    <div class="container mx-auto px-6 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="text-white mb-4 md:mb-0">
                <h1 class="text-3xl font-bold">{{ __('admin.panel_administracion') }}</h1>
                <p class="text-blue-100">{{ __('admin.bienvenido') }},</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="#" class="bg-blue-800 hover:bg-blue-700 text-white p-2 rounded-lg">
                    <i class="fas fa-cog"></i>
                </a>
                <a href="{{ route('tienda') }}" class="bg-white hover:bg-gray-100 text-blue-800 font-semibold py-2 px-4 rounded-lg transition shadow">
                    <i class="fas fa-store mr-2"></i>{{ __('admin.ver_tienda') }}
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Estadísticas Rápidas -->
<div class="container mx-auto px-6 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Ventas -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">{{ __('admin.ventas_totales') }}</p>
                    <h3 class="text-2xl font-bold text-gray-800">€</h3>
                    <p class="text-sm text-green-500"><i class="fas fa-arrow-up mr-1"></i></p>
                </div>
                <div class="rounded-full bg-blue-100 p-3">
                    <i class="fas fa-shopping-cart text-blue-500 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Pedidos -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">{{ __('admin.pedidos_nuevos') }}</p>
                    <h3 class="text-2xl font-bold text-gray-800"></h3>
                    <p class="text-sm text-gray-500">{{ __('admin.pendientes') }}:</p>
                </div>
                <div class="rounded-full bg-green-100 p-3">
                    <i class="fas fa-box text-green-500 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Clientes -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">{{ __('admin.clientes_totales') }}</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalClientes }}</h3>
                    <p class="text-sm text-green-500">
    <i class="fas fa-user-plus mr-1"></i>+ {{ $nuevosUsuarios }} {{ __('admin.nuevos') }}
</p>
                </div>
                <div class="rounded-full bg-purple-100 p-3">
                    <i class="fas fa-users text-purple-500 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Productos -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-red-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">{{ __('admin.productos_activos') }}</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $productosActivos }}</h3>
                    <p class="text-sm text-amber-500">
                        <i class="fas fa-exclamation-triangle mr-1"></i>{{ __('admin.stock_bajo') }}: {{ $stockBajo }}
                    </p>
                </div>
                <div class="rounded-full bg-red-100 p-3">
                    <i class="fas fa-mobile-alt text-red-500 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráficos y Actividad Reciente -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
        <!-- Gráfico de Ventas -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-800">{{ __('admin.ventas_recientes') }}</h3>
                <div class="flex space-x-2">
                    <button class="text-sm px-3 py-1 rounded-md bg-blue-100 text-blue-700">{{ __('admin.mensual') }}</button>
                    <button class="text-sm px-3 py-1 rounded-md text-gray-500 hover:bg-gray-100">{{ __('admin.trimestral') }}</button>
                    <button class="text-sm px-3 py-1 rounded-md text-gray-500 hover:bg-gray-100">{{ __('admin.anual') }}</button>
                </div>
            </div>
            <div class="h-64 flex items-center justify-center">
                <canvas id="salesChart"></canvas>
            </div>
        </div>

        <!-- Actividad Reciente -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ __('admin.actividad_reciente') }}</h3>
            <div class="space-y-4">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                            <i class="fas fa-shopping-bag text-green-500"></i>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm text-gray-800"></p>
                        <p class="text-xs text-gray-500"></p>
                    </div>
                </div>
                <a href="#" class="block text-center text-sm text-blue-600 hover:text-blue-800 mt-2">
                    {{ __('admin.ver_todas_actividades') }}
                </a>
            </div>
        </div>
    </div>

    <!-- Pedidos y Mensajes -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
        <!-- Pedidos Recientes -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-800">{{ __('admin.pedidos_recientes') }}</h3>
                <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">{{ __('admin.ver_todos') }}</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('admin.cliente') }}</th>
                            <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('admin.estado') }}</th>
                            <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('admin.total') }}</th>
                            <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('admin.fecha') }}</th>
                            <th class="py-3 text-xs font-medium text-gray-500 uppercase"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 text-sm">#</td>
                            <td class="py-3 text-sm"></td>
                            <td class="py-3 text-sm">
                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">{{ __('admin.completado') }}</span>
                            </td>
                            <td class="py-3 text-sm">€</td>
                            <td class="py-3 text-sm"></td>
                            <td class="py-3 text-right">
                                <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Mensajes -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-800">{{ __('admin.mensajes_recientes') }}</h3>
                <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">{{ __('admin.ver_todos') }}</a>
            </div>
            <div class="space-y-4">
                <div class="p-4 rounded-lg bg-gray-50 hover:bg-gray-100">
                    <div class="flex justify-between">
                        <h4 class="font-semibold text-gray-800"></h4>
                        <span class="text-xs text-gray-500"></span>
                    </div>
                    <p class="text-sm text-gray-600 mt-1"></p>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xs text-gray-500"></span>
                        <a href="#" class="text-sm text-blue-600 hover:text-blue-800">
                            {{ __('admin.ver_mensaje') }}
                        </a>
                    </div>
                </div>

                <div class="text-center py-4 text-gray-500">
                    <i class="fas fa-inbox text-2xl mb-2"></i>
                    <p>{{ __('admin.no_mensajes_nuevos') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Productos Totales -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mt-8">
        <div class="flex items-center p-6">
            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 text-blue-600">
                <i class="fas fa-box-open text-xl"></i>
            </div>
            <div class="ml-5 w-0 flex-1">
                <dl>
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        {{ __('admin.productos_totales') }}
                    </dt>
                    <dd>
                        <div class="text-lg font-bold text-gray-900">
                            {{ $totalProductos }}
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="ml-4 flex-shrink-0">
                <a href="{{ route('admin.productos') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md shadow-sm text-sm font-medium transition">
                    {{ __('admin.gestionar') }}
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
        <div class="bg-gray-50 px-6 py-3">
            <a href="{{ route('admin.productos.create') }}" class="text-sm text-blue-600 hover:text-blue-500 font-medium transition">
                <i class="fas fa-plus mr-1"></i>{{ __('admin.añadir_producto') }}
            </a>
        </div>
    </div>
</div>
@endsection
