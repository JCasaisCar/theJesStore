<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmación de Pedido</title>
  <style>
    @isset($style) {
      ! ! $style ! !
    }

    @endisset
  </style>
</head>

<body id="order-confirmed">
  <div class="email-container">
    <div class="email-header">
      <img src="{{ asset('img/logo.png') }}" alt="TheJesStore Logo">
      <h1>¡Gracias por tu compra!</h1>
    </div>

    <div class="email-body">
      <p>Hola <span class="highlight">{{ $user->name }}</span>,</p>
      <p>Tu pedido <strong>#{{ $order->id }}</strong> ha sido confirmado con éxito.</p>

      <p><strong>Resumen del pedido:</strong></p>
      <ul>
        @foreach ($order->details as $detail)
        <li>{{ $detail->product->name }} x{{ $detail->quantity }} – {{ number_format($detail->price, 2) }}€</li>
        @endforeach
      </ul>

      <p><strong>Total:</strong> {{ number_format($order->total, 2) }}€<br>
        <strong>Método de pago:</strong> {{ ucfirst($order->payment_method) }}
      </p>

      <div class="button-container">
        <a href="{{ $invoiceUrl }}" class="button">Descargar Factura</a>
      </div>

      <p class="small-text">Si el botón no funciona, copia y pega este enlace en tu navegador:</p>
      <p class="small-text"><a href="{{ $invoiceUrl }}">{{ $invoiceUrl }}</a></p>

      <div class="divider"></div>

      <p>Gracias por confiar en <span class="highlight">TheJesStore</span>.</p>
      <p><strong>El equipo de TheJesStore</strong> 📱</p>
    </div>

    <div class="email-footer" style="background-color: #f8f8f8; padding: 20px; text-align: center; color: #666; font-size: 14px;">
      &copy; 2025 TheJesStore. Todos los derechos reservados.
    </div>
  </div>
</body>

</html>