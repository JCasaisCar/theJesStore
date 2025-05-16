<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gracias por suscribirte</title>
  <style>
    body {
      font-family: 'Helvetica Neue', Arial, sans-serif;
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      color: #333;
    }
    .container {
      background-color: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .header {
      background: linear-gradient(135deg, #273c75 0%, #5b6ead 100%);
      text-align: center;
      padding: 30px 20px;
    }
    .header h1 {
      color: white;
      margin: 0;
      font-size: 26px;
    }
    .content {
      padding: 30px;
      font-size: 16px;
      line-height: 1.6;
    }
    .highlight {
      color: #273c75;
      font-weight: bold;
    }
    .footer {
      text-align: center;
      padding: 20px;
      font-size: 14px;
      background-color: #f8f8f8;
      color: #777;
    }
  </style>
</head>
<body>
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