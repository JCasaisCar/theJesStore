<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Confirmación de baja</title>
  <style>
    body {
      font-family: 'Helvetica Neue', Arial, sans-serif;
      max-width: 600px;
      margin: 0 auto;
      padding: 0;
      color: #333;
      background-color: #f2f4f8;
    }

    .container {
      background-color: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      margin: 30px auto;
    }

    .header {
      background: linear-gradient(135deg, #273c75 0%, #5b6ead 100%);
      text-align: center;
      padding: 30px 20px;
    }

    .header h1 {
      color: white;
      margin: 0;
      font-size: 22px;
    }

    .content {
      padding: 30px;
      font-size: 16px;
      line-height: 1.7;
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
      <h1>Te has dado de baja de la newsletter</h1>
    </div>
    <div class="content">
      <p>Hemos eliminado correctamente <strong>{{ $email }}</strong> de nuestra lista de suscripción.</p>
      <p>Sentimos verte partir. Si cambias de opinión, siempre puedes volver a suscribirte desde nuestra web.</p>
      <p>Gracias por haber formado parte de TheJesStore 💙</p>
    </div>
    <div class="footer">
      &copy; 2025 TheJesStore. Todos los derechos reservados.
    </div>
  </div>
</body>
</html>