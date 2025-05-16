<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>{{ $subject }}</title>
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
      font-size: 24px;
    }

    .content {
      padding: 30px;
      font-size: 16px;
      line-height: 1.7;
    }

    .content p {
      margin-bottom: 16px;
    }

    .footer {
      text-align: center;
      padding: 20px;
      font-size: 14px;
      background-color: #f8f8f8;
      color: #777;
    }

    .unsubscribe {
      display: inline-block;
      margin-top: 12px;
      font-size: 12px;
      color: #999;
      text-decoration: none;
      border: 1px solid #ddd;
      padding: 6px 12px;
      border-radius: 4px;
      transition: background-color 0.3s, color 0.3s;
    }

    .unsubscribe:hover {
      background-color: #eee;
      color: #555;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>{{ $subject }}</h1>
    </div>
    <div class="content">
      {!! nl2br(e($body)) !!}
    </div>
    <div class="footer">
      &copy; 2025 TheJesStore. Todos los derechos reservados.
      <br>
      <a href="{{ url('/newsletter/unsubscribe?email=' . urlencode($email)) }}" class="unsubscribe">
        Darse de baja de la newsletter
      </a>
    </div>
  </div>
</body>
</html>