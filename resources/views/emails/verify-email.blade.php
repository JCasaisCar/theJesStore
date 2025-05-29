<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido a TheJesStore</title>
</head>

<body id="verify-email">
  <div class="email-container">
    <div class="email-header">
      <img src="https://i.imgur.com/iRS2538.png" alt="TheJesStore Logo">
      <h1>¡Bienvenido a TheJesStore!</h1>
    </div>

    <div class="email-body">
      <div class="welcome-message">
        <p>Hola <span class="highlight">{{ $user->name }}</span>,</p>
        <p>¡Estamos emocionados de darte la bienvenida a <span class="highlight">TheJesStore</span>! Has tomado una excelente decisión al unirte a nuestra tienda online de tecnología premium, donde encontrarás los mejores smartphones, tablets y accesorios del mercado.</p>
      </div>

      <p>Para comenzar a disfrutar de todos nuestros servicios, solo necesitamos que confirmes tu dirección de correo electrónico:</p>

      <div class="button-container">
        <a href="{{ $verificationUrl }}" class="button">CONFIRMAR MI CUENTA</a>
      </div>

      <p class="small-text">Si no solicitaste esta cuenta, puedes ignorar este mensaje con toda seguridad.</p>

      <div class="divider"></div>

      <p class="small-text">Si el botón no funciona, copia y pega este enlace en tu navegador:</p>
      <p class="small-text"><a href="{{ $verificationUrl }}">{{ $verificationUrl }}</a></p>

      <div class="divider"></div>

      <p><span class="highlight">Descubre lo último en tecnología</span> con TheJesStore:</p>

      <div class="product-showcase">
        <div class="product-item">
          <img src="https://i.imgur.com/qYK9bk3.jpeg" alt="Smartphone">
          <div class="product-name">Smartphones Premium</div>
        </div>
        <div class="product-item">
          <img src="https://i.imgur.com/GbJfjtN.jpeg" alt="Tablet">
          <div class="product-name">Tablets de Última Generación</div>
        </div>
        <div class="product-item">
          <img src="https://i.imgur.com/b4kBXJK.jpeg" alt="Accesorios">
          <div class="product-name">Accesorios Exclusivos</div>
        </div>
      </div>

      <p>Como miembro de TheJesStore disfrutarás de:</p>
      <ul>
        <li>Acceso a los últimos lanzamientos tecnológicos</li>
        <li>Garantía extendida en todos nuestros productos</li>
        <li>Ofertas exclusivas para miembros registrados</li>
      </ul>

      <p>Estamos aquí para ofrecerte la mejor experiencia en tu compra de tecnología.</p>

      <p>¡Gracias por confiar en nosotros!</p>
      <p><span class="highlight">El equipo de TheJesStore</span> 📱</p>
    </div>

    <div class="email-footer">
      <p>&copy; 2025 TheJesStore. Todos los derechos reservados.</p>
    </div>
  </div>
</body>

</html>