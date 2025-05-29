<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>{{ $subject }}</title>
</head>

<body id="admin-newsletter">
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