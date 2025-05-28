<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo mensaje de contacto</title>
  <style>
    @isset($style) {
      ! ! $style ! !
    }

    @endisset
  </style>
</head>

<body id="contact-admin-email">
  <div class="email-container">
    <div class="email-header">
      <img src="{{ asset('img/logo.png') }}" alt="TheJesStore Logo">
      <h1>Nuevo mensaje de contacto</h1>
    </div>

    <div class="email-body">
      <p>Has recibido un nuevo mensaje desde el formulario de contacto:</p>

      <p><strong>Nombre:</strong> {{ $contact->nombre }}<br>
        <strong>Email:</strong> {{ $contact->email }}<br>
        @if($contact->telefono)
        <strong>Teléfono:</strong> {{ $contact->telefono }}<br>
        @endif
        <strong>Asunto:</strong> {{ $contact->asunto }}
      </p>

      <p><strong>Mensaje:</strong></p>
      <blockquote style="border-left: 4px solid #ccc; padding-left: 15px; color: #555;">
        {{ $contact->mensaje }}
      </blockquote>

      <div class="button-container">
        <a href="{{ route('admin') }}" class="button">Responder desde el panel</a>
      </div>

      <div class="divider"></div>

      <p>Gracias por estar al tanto,<br>
        <strong>El sistema de TheJesStore</strong>
      </p>
    </div>

    <div class="email-footer" style="background-color: #f8f8f8; padding: 20px; text-align: center; color: #666; font-size: 14px;">
      &copy; 2025 TheJesStore. Todos los derechos reservados.
    </div>
  </div>
</body>

</html>