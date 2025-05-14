@extends('layouts.app')

@section('title', 'Mis Pedidos')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Mis Pedidos</h1>

    @if ($orders->isEmpty())
        <p class="text-gray-600">No tienes pedidos registrados.</p>
    @else
        <div class="space-y-6">
            @foreach ($orders as $order)
                <div class="border rounded-lg shadow p-4 bg-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-700 font-semibold">Pedido #{{ $order->id }}</p>
                            <p class="text-sm text-gray-500">Fecha: {{ $order->created_at->format('d/m/Y H:i') }}</p>
                            <p class="text-sm text-gray-500">Estado: <span class="font-medium text-blue-600">{{ ucfirst($order->status) }}</span></p>
                            <p class="text-sm text-gray-500">Seguimiento: {{ $order->tracking }}</p>
                        </div>
                        <button class="text-blue-600 hover:underline text-sm" onclick="toggleDetails({{ $order->id }})">
                            Ver detalles
                        </button>
                    </div>

                    <div id="order-details-{{ $order->id }}" class="mt-4 hidden">
                        <table class="w-full text-sm text-left text-gray-700">
                            <thead class="text-gray-600 border-b">
                                <tr>
                                    <th class="py-2">Imagen</th>
                                    <th class="py-2">Producto</th>
                                    <th class="py-2">Cantidad</th>
                                    <th class="py-2">Precio</th>
                                    <th class="py-2">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->details as $detail)
                                    <tr class="border-b">
                                        <td class="py-2">
                                            @if ($detail->product->image)
                                                <img src="{{ asset('storage/products/' . $detail->product->image) }}" alt="{{ $detail->product->name }}" class="w-16 h-16 object-cover rounded border">
                                            @else
                                                <span class="text-gray-400 italic">Sin imagen</span>
                                            @endif
                                        </td>
                                        <td class="py-2">{{ $detail->product->name }}</td>
                                        <td class="py-2">{{ $detail->quantity }}</td>
                                        <td class="py-2">{{ number_format($detail->price, 2) }} €</td>
                                        <td class="py-2">{{ number_format($detail->quantity * $detail->price, 2) }} €</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4 text-right space-y-1 text-sm">
                            <p>Subtotal: <span class="font-medium">{{ number_format($order->subtotal, 2) }} €</span></p>
                            <p>IVA: <span class="font-medium">{{ number_format($order->iva, 2) }} €</span></p>
                            <p>Total: <span class="font-bold text-lg">{{ number_format($order->total, 2) }} €</span></p>
                            <p>Método de pago: <span class="font-medium">{{ ucfirst($order->payment_method) }}</span></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script>
    function toggleDetails(orderId) {
        const details = document.getElementById(`order-details-${orderId}`);
        details.classList.toggle('hidden');
    }
</script>
@endsection
