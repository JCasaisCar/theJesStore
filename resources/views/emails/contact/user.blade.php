<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gracias por contactarnos</title>
</head>

<body id="contact-user-email">
  <div class="email-container">
    <div class="email-header">
      <img src="https://i.imgur.com/iRS2538.png" alt="TheJesStore Logo">
      <h1>¡Gracias por contactarnos!</h1>
    </div>

    <div class="email-body">
      <p>Hola <span class="highlight">{{ $contact->nombre }}</span>,</p>

      <p>Hemos recibido tu mensaje con el asunto:</p>
      <p><strong>"{{ $contact->asunto }}"</strong></p>

      <p><strong>Tu mensaje:</strong></p>
      <blockquote>{{ $contact->mensaje }}</blockquote>

      <p>Nos pondremos en contacto contigo lo antes posible.</p>

      <div class="button-container">
        <a href="{{ route('home') }}" class="button">Ir a TheJesStore</a>
      </div>

      <div class="divider"></div>

      <p>Gracias por confiar en <span class="highlight">TheJesStore</span>.</p>
      <p><strong>El equipo de TheJesStore</strong> 📱</p>
    </div>

    <div class="email-footer">
      &copy; 2025 TheJesStore. Todos los derechos reservados.
    </div>
  </div>
</body>

</html>