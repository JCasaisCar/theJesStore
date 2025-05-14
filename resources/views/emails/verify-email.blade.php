<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido a TheJesStore</title>
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
    .welcome-message {
      font-size: 18px;
      margin-bottom: 25px;
      color: #444;
    }
    .highlight {
      color: #273c75;
      font-weight: bold;
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
    .email-footer {
      background-color: #f8f8f8;
      padding: 20px;
      text-align: center;
      color: #666;
      font-size: 14px;
    }
    .social-icons {
      margin: 15px 0;
    }
    .social-icon {
      display: inline-block;
      width: 32px;
      height: 32px;
      background-color: #ddd;
      border-radius: 50%;
      margin: 0 5px;
      line-height: 32px;
      text-align: center;
    }
    .product-showcase {
      display: flex;
      justify-content: space-around;
      margin: 20px 0;
      flex-wrap: wrap;
    }
    .product-item {
      text-align: center;
      margin: 10px;
      width: 120px;
    }
    .product-item img {
      width: 100%;
      height: auto;
      border-radius: 5px;
    }
    .product-name {
      font-size: 12px;
      color: #555;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <div class="email-container">
    <div class="email-header">
      <img src="{{ asset('img/logo.png') }}" alt="TheJesStore Logo">
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
          <img src="{{ asset('img/products/galaxy_s23_ultra.jpg') }}" alt="Smartphone">
          <div class="product-name">Smartphones Premium</div>
        </div>
        <div class="product-item">
          <img src="{{ asset('img/products/ipad_pro_m2.jpg') }}" alt="Tablet">
          <div class="product-name">Tablets de Última Generación</div>
        </div>
        <div class="product-item">
          <img src="{{ asset('img/products/funda_magsafe_transparente_iphone_14_pro_max.jpeg') }}" alt="Accesorios">
          <div class="product-name">Accesorios Exclusivos</div>
        </div>
      </div>
      
      <p>Como miembro de TheJesStore disfrutarás de:</p>
      <ul>
        <li>Acceso a los últimos lanzamientos tecnológicos</li>
        <li>Envío gratuito en compras superiores a 50€</li>
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