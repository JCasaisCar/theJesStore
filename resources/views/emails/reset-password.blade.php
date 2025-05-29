<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restablece tu contraseña - TheJesStore</title>
  <link rel="stylesheet" href="{{ public_path('css/email/reset-password.css') }}">
</head>

<body id="reset-password">
  <div class="email-container">
    <div class="email-header">
      <img src="https://i.imgur.com/iRS2538.png" alt="TheJesStore Logo">
      <h1>Restablece tu contraseña</h1>
    </div>

    <div class="email-body">
      <p>Hola <span class="highlight">{{ $user->name ?? 'Usuario' }}</span>,</p>
      <p>Recibimos una solicitud para restablecer tu contraseña en <span class="highlight">TheJesStore</span>.</p>

      <div class="button-container">
        <a href="{{ $url }}" class="button">Restablecer contraseña</a>
      </div>

      <p>Este enlace de recuperación será válido por 60 minutos.</p>

      <p class="small-text">Si no solicitaste restablecer tu contraseña, puedes ignorar este mensaje con total seguridad.</p>

      <div class="divider"></div>

      <p class="small-text">Si el botón no funciona, copia y pega este enlace en tu navegador:</p>
      <p class="small-text"><a href="{{ $url }}">{{ $url }}</a></p>

      <div class="divider"></div>

      <p>Gracias por confiar en <span class="highlight">TheJesStore</span>.</p>
      <p><span class="highlight">El equipo de TheJesStore</span> 🔐</p>
    </div>

    <div class="email-footer">
      <p>&copy; 2025 TheJesStore. Todos los derechos reservados.</p>
    </div>
  </div>
</body>

</html>