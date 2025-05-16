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



<a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md shadow-sm text-sm font-medium transition">
                    {{ __('admin.gestionar') }}
                    <i class="fas fa-arrow-right ml-2"></i>
                    </a>


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
                    <a href="{{ route('admin.productos') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md shadow-sm text-sm font-medium transition">
                    {{ __('admin.gestionar') }}
                    <i class="fas fa-arrow-right ml-2"></i>
                    </a>
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

    <!-- Cupones de Descuento -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Cupones Activos</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $cuponesActivos }}</h3>
                    <p class="text-sm text-red-500">
                        Inactivos: {{ $cuponesInactivos }}
                    </p>
                    <a href="{{ route('discount_codes.index') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md shadow-sm text-sm font-medium transition">
                        {{ __('admin.gestionar') }}
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                <div class="rounded-full bg-green-100 p-3">
                    <i class="fas fa-percent text-green-500 text-xl"></i>
                </div>
            </div>
        </div>
</div>


<!-- Suscriptores Newsletter -->
<div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-indigo-500">
    <div class="flex justify-between items-start">
        <div>
            <p class="text-gray-500 text-sm">Suscriptores Newsletter</p>
            <h3 class="text-2xl font-bold text-gray-800">{{ $newsletterCount }}</h3>
            <p class="text-sm text-indigo-500">
                <i class="fas fa-envelope mr-1"></i>{{ __('admin.total_suscriptores') }}
            </p>
            <a href="{{ route('admin.newsletter.form') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md shadow-sm text-sm font-medium transition mt-2 inline-block">
                Enviar correo
                <i class="fas fa-paper-plane ml-2"></i>
            </a>
        </div>
        <div class="rounded-full bg-indigo-100 p-3">
            <i class="fas fa-newspaper text-indigo-500 text-xl"></i>
        </div>
    </div>
</div>


<!-- Modal de Pedidos -->
<div id="modalPedidos" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-50 overflow-y-auto py-10 px-4 hidden">
    <div class="bg-white rounded-lg w-full max-w-2xl mx-auto max-h-[90vh] overflow-y-auto p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">Todos los Pedidos</h2>
            <button onclick="cerrarModalPedidos()" class="text-gray-600 hover:text-red-600 text-2xl">&times;</button>
        </div>
        <table class="min-w-full text-sm mb-6">
            <thead>
                <tr class="border-b text-gray-600 uppercase text-xs">
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Estado</th>
                    <th>Tracking</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ultimosPedidos as $pedido)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-2">#{{ $pedido->id }}</td>
                        <td class="py-2">{{ $pedido->user->name ?? 'Sin cliente' }}</td>
                        <td class="py-2">
                            <select onchange="marcarCambio({{ $pedido->id }})" id="status-{{ $pedido->id }}" class="border rounded px-2 py-1">
                                <option value="Pendiente" {{ $pedido->status == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="Completado" {{ $pedido->status == 'Completado' ? 'selected' : '' }}>Completado</option>
                                <option value="Cancelado" {{ $pedido->status == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                        </td>
                        <td class="py-2">
                            <select onchange="marcarCambio({{ $pedido->id }})" id="tracking-{{ $pedido->id }}" class="border rounded px-2 py-1">
                                <option value="Pendiente" {{ $pedido->tracking == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="En preparación" {{ $pedido->tracking == 'En preparación' ? 'selected' : '' }}>En preparación</option>
                                <option value="Enviado" {{ $pedido->tracking == 'Enviado' ? 'selected' : '' }}>Enviado</option>
                                <option value="Entregado" {{ $pedido->tracking == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                            </select>
                        </td>
                        <td class="py-2">€{{ $pedido->total }}</td>
                        <td class="py-2">{{ $pedido->created_at->format('d/m/Y') }}</td>
                        <td class="py-2">
                            <button onclick="guardarCambios({{ $pedido->id }})"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs">Guardar</button>
                        </td>
                        <td class="py-2">
                            <button onclick="toggleDetallesPedido({{ $pedido->id }})" class="text-blue-600 hover:underline text-xs">Ver detalles</button>
                        </td>
                    </tr>
                    <tr id="detalles-pedido-{{ $pedido->id }}" class="hidden">
                        <td colspan="8" class="bg-gray-50 px-4 py-4">
                            <table class="w-full text-xs text-left text-gray-700">
                                <thead>
                                    <tr class="border-b text-gray-600">
                                        <th class="py-1">Imagen</th>
                                        <th class="py-1">Producto</th>
                                        <th class="py-1">Cantidad</th>
                                        <th class="py-1">Precio</th>
                                        <th class="py-1">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedido->details as $detail)
                                        <tr class="border-b">
                                            <td class="py-1 pr-2">
                                                @if($detail->product && $detail->product->image)
                                                    <img src="{{ asset('storage/products/' . $detail->product->image) }}"
                                                        alt="{{ $detail->product->name }}"
                                                        class="w-12 h-12 object-cover rounded border">
                                                @else
                                                    <span class="text-gray-400 italic">Sin imagen</span>
                                                @endif
                                            </td>
                                            <td class="py-1">{{ $detail->product->name ?? 'Producto eliminado' }}</td>
                                            <td class="py-1">{{ $detail->quantity }}</td>
                                            <td class="py-1">{{ number_format($detail->price, 2) }} €</td>
                                            <td class="py-1">{{ number_format($detail->price * $detail->quantity, 2) }} €</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-right mt-3 space-y-1 text-sm">
                                <p>Subtotal: <strong>{{ number_format($pedido->subtotal, 2) }} €</strong></p>
                                <p>IVA: <strong>{{ number_format($pedido->iva, 2) }} €</strong></p>
                                <p>Total: <strong>{{ number_format($pedido->total, 2) }} €</strong></p>
                                <p>Método de pago: <strong>{{ ucfirst($pedido->payment_method) }}</strong></p>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function toggleDetallesPedido(id) {
        const fila = document.getElementById(`detalles-pedido-${id}`);
        fila.classList.toggle('hidden');
    }
</script>






<!-- Modal para responder mensajes -->
<div id="respuestaModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-50 overflow-y-auto py-10 px-4 hidden">
    <div class="bg-white rounded-lg w-full max-w-2xl mx-auto max-h-[90vh] overflow-y-auto p-6">
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
