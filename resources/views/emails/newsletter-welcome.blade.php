<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Gracias por suscribirte</title>
</head>

<body id="newsletter-welcome">
  <div class="container">
    <div class="header">
      <h1>¡Gracias por suscribirte!</h1>
    </div>
    <div class="content">
      <p>Hola,</p>
      <p>Gracias por unirte a la newsletter de <span class="highlight">TheJesStore</span>.</p>
      <p>Tu correo <strong>{{ $email }}</strong> ha sido registrado correctamente.</p>
      <p>Recibirás promociones exclusivas, lanzamientos tecnológicos y novedades de nuestra tienda.</p>

      <div id="div1">
        <a id="enlaceBaja"href="{{ url('/newsletter/unsubscribe?email=' . urlencode($email)) }}">
          Darse de baja
        </a>
      </div>

      <p id="p1">
        Si no deseas seguir recibiendo nuestros correos, puedes darte de baja haciendo clic en el botón.
      </p>
    </div>
    <div class="footer">
      &copy; 2025 TheJesStore. Todos los derechos reservados.
    </div>
  </div>
</body>

</html>