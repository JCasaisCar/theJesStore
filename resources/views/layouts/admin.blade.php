<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/tu_token_aki.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    @yield('content')
</body>
</html>
