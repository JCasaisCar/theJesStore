<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Factura #{{ $order->id }}</title>
    <link rel="stylesheet" href="{{ public_path('css/style.css') }}">
</head>

<body id="invoice">
    <div class="header">
        <h1 class="text-blue">Factura #{{ $order->id }}</h1>
        <p>Fecha: {{ $order->created_at->format('d/m/Y') }}</p>
    </div>

    <div class="section">
        <h2 class="section-title">Datos del cliente</h2>
        <p>{{ $shippingAddress->nombre }} {{ $shippingAddress->apellidos }}</p>
        <p>{{ $shippingAddress->direccion }}</p>
        <p>{{ $shippingAddress->codigo_postal }} {{ $shippingAddress->ciudad }}, {{ $shippingAddress->provincia }}</p>
        <p>{{ $shippingAddress->pais }}</p>
    </div>

    <div class="section">
        <h2 class="section-title">Detalles del pedido</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->details as $detail)
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ number_format($detail->price, 2) }} €</td>
                    <td>{{ number_format($detail->quantity * $detail->price, 2) }} €</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <h2 class="section-title">Resumen</h2>
        <table class="table">
            <tbody>
                <tr>
                    <td>Subtotal</td>
                    <td class="text-right">{{ number_format($order->subtotal, 2) }} €</td>
                </tr>
                <tr>
                    <td>IVA (21%)</td>
                    <td class="text-right">{{ number_format($order->iva, 2) }} €</td>
                </tr>
                <tr>
                    <td>Envío</td>
                    <td class="text-right">{{ number_format($shippingPrice, 2) }} €</td>
                </tr>
                @if($order->subtotal + $order->iva > $order->total)
                <tr class="text-green">
                    <td>Descuento aplicado</td>
                    <td class="text-right">-{{ number_format(($order->subtotal + $order->iva) - $order->total, 2) }} €</td>
                </tr>
                @endif
                <tr class="total-line">
                    <td>Total a pagar</td>
                    <td class="text-right text-blue">{{ number_format($order->total, 2) }} €</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <p><strong>Método de pago:</strong> {{ ucfirst($order->payment_method) }}</p>
        <p><strong>Método de envío:</strong> {{ $order->shippingAddress?->shippingMethod?->nombre ?? 'No especificado' }}</p>
    </div>

    <div class="section">
        <p class="text-sm text-gray-500">Gracias por tu compra. Esta factura ha sido generada automáticamente.</p>
    </div>
</body>

</html>