<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gracias por contactarnos</title>
  <style>
    body {
      font-family: 'Helvetica Neue', Arial, sans-serif;
      line-height: 1.6;
      color: #333;
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }
    .email-container {
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      overflow: hidden;
    }
    .email-header {
      background: linear-gradient(135deg, #273c75 0%, #5b6ead 100%);
      padding: 30px 20px;
      text-align: center;
    }
    .email-header h1 {
      color: white;
      margin: 0;
      font-size: 28px;
      font-weight: 700;
    }
    .email-header img {
      width: 80px;
      height: auto;
      margin-bottom: 15px;
    }
    .email-body {
      padding: 30px 25px;
      background-color: #fff;
    }
    .highlight {
      color: #273c75;
      font-weight: bold;
    }
    blockquote {
      border-left: 4px solid #ccc;
      padding-left: 15px;
      margin: 15px 0;
      color: #555;
    }
    .button-container {
      text-align: center;
      margin: 30px 0;
    }
    .button {
      display: inline-block;
      background-color: #4361ee;
      color: white;
      text-decoration: none;
      padding: 12px 28px;
      border-radius: 4px;
      font-weight: bold;
      font-size: 16px;
      transition: background-color 0.3s;
    }
    .button:hover {
      background-color: #3a56d4;
    }
    .divider {
      border-top: 1px solid #eee;
      margin: 25px 0;
    }
    .small-text {
      font-size: 14px;
      color: #777;
    }
  </style>
</head>
<body>
  <div class="email-container">
    <div class="email-header">
      <img src="{{ asset('img/logo.png') }}" alt="TheJesStore Logo">
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

    <div class="email-footer" style="background-color: #f8f8f8; padding: 20px; text-align: center; color: #666; font-size: 14px;">
      &copy; 2025 TheJesStore. Todos los derechos reservados.
    </div>
  </div>
</body>
</html>