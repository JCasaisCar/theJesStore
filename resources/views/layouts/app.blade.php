<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TheJesStore - @yield('title')</title> <!-- Título de la página -->

    {{-- Vite para importar Tailwind CSS --}}
    @vite(['resources/js/app.js', 'resources/css/app.css']) <!-- Importar archivos de Vite -->

    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Archivo CSS personalizado -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Montserrat:wght@400&display=swap" rel="stylesheet"> <!-- Fuentes de Google -->
    <!-- Font Awesome (Íconos) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> <!-- Font Awesome -->
    <link rel="icon" href="{{ asset('../../img/logo.png') }}" type="image/x-icon"> <!-- Favicon -->
</head>

<body>

    @include('partials.header') <!-- Encabezado -->

    <main class="p-0">
        @yield('content') <!-- Contenido principal -->
    </main>

    @include('partials.footer') <!-- Pie de página -->

    <!-- Toast de Notificaciones -->
    <div class="fixed top-0 right-0 p-3">
        @if(session('success'))
        <div id="toastSuccess" class="flex items-center text-white bg-green-500 border-0 shadow-lg" role="alert">
            <div class="flex-1 p-4">
                {{ session('success') }} <!-- Mensaje de éxito -->
            </div>
            <button type="button" class="mr-2 p-2" onclick="document.getElementById('toastSuccess').classList.add('hidden')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        @endif

        @if(session('error'))
        <div id="toastError" class="flex items-center text-white bg-red-500 border-0 shadow-lg" role="alert">
            <div class="flex-1 p-4">
                {{ session('error') }} <!-- Mensaje de error -->
            </div>
            <button type="button" class="mr-2 p-2" onclick="document.getElementById('toastError').classList.add('hidden')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        @endif
    </div>

    <script>
        // Ocultar los toasts después de 5 segundos
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(() => {
                let successToast = document.getElementById("toastSuccess");
                let errorToast = document.getElementById("toastError");

                if (successToast) {
                    successToast.classList.add('hidden');
                }

                if (errorToast) {
                    errorToast.classList.add('hidden');
                }
            }, 5000);
        });
    </script>

</body>

</html>
