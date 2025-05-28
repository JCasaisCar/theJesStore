<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Gracias por suscribirte</title>
  <style>
    @isset($style) {
      ! ! $style ! !
    }

    @endisset
  </style>
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

      <div style="text-align: center; margin: 30px 0;">
        <a href="{{ url('/newsletter/unsubscribe?email=' . urlencode($email)) }}"
          style="display: inline-block; background-color: #e84118; color: white; text-decoration: none;
              padding: 12px 28px; border-radius: 4px; font-weight: bold; font-size: 15px; transition: background-color 0.3s;">
          Darse de baja
        </a>
      </div>

      <p style="font-size: 13px; color: #777; text-align: center;">
        Si no deseas seguir recibiendo nuestros correos, puedes darte de baja haciendo clic en el botón.
      </p>
    </div>
    <div class="footer">
      &copy; 2025 TheJesStore. Todos los derechos reservados.
    </div>
  </div>
</body>

</html>