@extends('layouts.app')
@section('title', __('admin.panel_control'))

@section('content')
<body id="admin-page">
<!-- Header del Panel de Administración -->
<div class="bg-gradient-to-r from-blue-900 to-blue-700 shadow-lg">
    <div class="container mx-auto px-6 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="text-white mb-4 md:mb-0">
                <h1 class="text-3xl font-bold">{{ __('admin.panel_administracion') }}</h1>
                <p class="text-blue-100">{{ __('admin.bienvenido') }}, {{ Auth::user()->name }}</p>
            </div>
            <div class="flex items-center space-x-3">
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
                    <p class="text-gray-500 text-sm">{{ __('admin.ventas_totales_completadas') }}</p>
                    <h3 class="text-2xl font-bold text-gray-800">€{{ number_format($totalVentas, 2, ',', '.') }}</h3>
                    <p class="text-sm text-green-500">
                        <i class="fas fa-arrow-up mr-1"></i>{{ $totalPedidos }} ventas
                    </p>
                </div>
                <div class="rounded-full bg-blue-100 p-3">
                    <i class="fas fa-shopping-cart text-blue-500 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Pedidos en Preparación -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-yellow-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">{{ __('admin.pedidos_preparacion') }}</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $pedidosEnPreparacion }}</h3>
                    <p class="text-sm text-yellow-500"><i class="fas fa-truck-loading mr-1"></i>{{ __('admin.en_preparacion') }}</p>
                </div>
                <div class="rounded-full bg-yellow-100 p-3">
                    <i class="fas fa-box-open text-yellow-500 text-xl"></i>
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
                        <i class="fas fa-exclamation-triangle mr-1"></i>{{ __('admin.productos_inactivos') }}: {{ $productosInactivos }}
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
        <!-- Actualización para el Gráfico de Ventas -->
<div class="lg:col-span-2 bg-white rounded-xl shadow-md p-6">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-semibold text-gray-800">{{ __('admin.ventas_recientes_completadas') }}</h3>
        <div class="flex space-x-2">
            <button id="btn-mensual" class="text-sm px-3 py-1 rounded-md bg-blue-100 text-blue-700 periodo-btn active">{{ __('admin.mensual') }}</button>
            <button id="btn-trimestral" class="text-sm px-3 py-1 rounded-md text-gray-500 hover:bg-gray-100 periodo-btn">{{ __('admin.trimestral') }}</button>
            <button id="btn-anual" class="text-sm px-3 py-1 rounded-md text-gray-500 hover:bg-gray-100 periodo-btn">{{ __('admin.anual') }}</button>
        </div>
    </div>
    <div class="h-64 flex items-center justify-center" id="chart-container">
        <canvas id="salesChart"></canvas>
    </div>
</div>

        <!-- Productos con stock bajo -->
<div class="bg-white rounded-xl shadow-md p-6">
    <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ __('admin.productos_stock_bajo') }}</h3>
    
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('admin.nombre') }}</th>
                    <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('admin.stock') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productosConStockBajo as $producto)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 text-sm">{{ $producto->id }}</td>
                        <td class="py-3 text-sm">{{ $producto->name }}</td>
                        <td class="py-3 text-sm">{{ $producto->stock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    </div>

    <!-- Pedidos y Mensajes -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
        <!-- Pedidos Recientes -->
        <div class="bg-white rounded-xl shadow-md p-6">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-semibold text-gray-800">{{ __('admin.pedidos') }}</h3>
        <a href="#" onclick="abrirModalPedidos()" class="text-blue-600 hover:text-blue-800 text-sm">
            {{ __('admin.ver_todos') }}
        </a>
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
                </tr>
            </thead>
            <tbody>
                @foreach ($ultimosPedidos as $pedido)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 text-sm">#{{ $pedido->id }}</td>
                        <td class="py-3 text-sm">{{ $pedido->user->name ?? 'Sin cliente' }}</td>
                        <td class="py-3 text-sm">
                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">
                                {{ $pedido->status }}
                            </span>
                        </td>
                        <td class="py-3 text-sm">€{{ number_format($pedido->total, 2) }}</td>
                        <td class="py-3 text-sm">{{ $pedido->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $ultimosPedidos->links() }}
    </div>
</div>

        <!-- Mensajes -->
        <div class="bg-white p-4 rounded shadow mb-6">
        <h2 class="text-xl font-bold mb-4">Mensajes recientes</h2>

        @foreach ($ultimosContactos as $contacto)
            <div class="border-b py-2">
                <p><strong>{{ $contacto->user->name ?? $contacto->name }}</strong> ({{ $contacto->created_at->format('d/m/Y H:i') }})</p>
                <p class="text-gray-700">Asunto: {{ $contacto->asunto }}</p>
                <button 
                    class="mt-2 text-blue-600 hover:underline"
                    onclick="openModal({{ $contacto->id }}, 
                        '{{ addslashes($contacto->user->name ?? $contacto->name) }}', 
                        '{{ addslashes($contacto->user->email ?? $contacto->email) }}', 
                        '{{ addslashes($contacto->telefono ?? '') }}', 
                        '{{ addslashes($contacto->asunto) }}', 
                        '{{ addslashes($contacto->mensaje) }}', 
                        '{{ addslashes($contacto->answer ?? '') }}', 
                        '{{ $contacto->created_at->format('d/m/Y H:i') }}'
                    )"
                >
                    Ver y responder o editar respuesta
                </button>
            </div>
        @endforeach

        <div class="mt-4">
            {{ $ultimosContactos->links() }}
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
    </div>
</div>


<!-- Modal de Pedidos -->
<div id="modalPedidos" class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden justify-center items-center">
    <div class="bg-white w-11/12 max-w-6xl rounded-xl shadow-lg p-6 overflow-auto max-h-[90vh]">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">Todos los Pedidos</h2>
            <button onclick="cerrarModalPedidos()" class="text-gray-600 hover:text-red-600">&times;</button>
        </div>
        <table class="min-w-full text-sm">
            <thead>
                <tr class="border-b text-gray-600 uppercase text-xs">
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Estado</th>
                    <th>Tracking</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ultimosPedidos as $pedido)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-2">#{{ $pedido->id }}</td>
                        <td class="py-2">{{ $pedido->user->name ?? 'Sin cliente' }}</td>
                        <td class="py-2">
                            <select onchange="marcarCambio({{ $pedido->id }})" id="status-{{ $pedido->id }}" class="border rounded px-2 py-1">
                                <option value="pendiente" {{ $pedido->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="completado" {{ $pedido->status == 'completado' ? 'selected' : '' }}>Completado</option>
                                <option value="cancelado" {{ $pedido->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                        </td>
                        <td class="py-2">
                            <select onchange="marcarCambio({{ $pedido->id }})" id="tracking-{{ $pedido->id }}" class="border rounded px-2 py-1">
                                <option value="pending" {{ $pedido->tracking == 'pending' ? 'selected' : '' }}>Pendiente</option>
                                <option value="preparation" {{ $pedido->tracking == 'preparation' ? 'selected' : '' }}>En preparación</option>
                                <option value="shipped" {{ $pedido->tracking == 'shipped' ? 'selected' : '' }}>Enviado</option>
                                <option value="delivered" {{ $pedido->tracking == 'delivered' ? 'selected' : '' }}>Entregado</option>
                            </select>
                        </td>
                        <td class="py-2">€{{ $pedido->total }}</td>
                        <td class="py-2">{{ $pedido->created_at->format('d/m/Y') }}</td>
                        <td class="py-2">
                            <button onclick="guardarCambios({{ $pedido->id }})"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs">Guardar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>





<!-- Modal para responder mensajes -->
<div id="respuestaModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded shadow w-full max-w-lg">
        <h2 class="text-xl font-bold mb-4">Responder mensaje</h2>
        <form method="POST" action="{{ route('contact.answer') }}">
            @csrf
            <input type="hidden" name="contact_id" id="contact_id">
            
            <p id="nombreUsuario" class="text-gray-600 mb-2"></p>
            <p id="emailUsuario" class="text-gray-600 mb-2"></p>
            <p id="telefonoUsuario" class="text-gray-600 mb-2"></p>
            <p id="asuntoUsuario" class="text-gray-600 mb-2"></p>
            <p id="mensajeUsuario" class="text-gray-600 mb-2"></p>
            <p id="fechaCreacion" class="text-gray-600 mb-2"></p>
            
            <p class="text-lg font-bold text-blue-600 mt-4">Responder:</p>

            <textarea name="answer" id="answerTextarea" rows="4" class="w-full border rounded p-2" placeholder="Escribe tu respuesta..."></textarea>
            
            <div class="mt-4 flex justify-end">
                <button type="button" onclick="cerrarModal()" class="mr-2 px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Enviar</button>
            </div>
        </form>
    </div>
</div>
</body>
@endsection
