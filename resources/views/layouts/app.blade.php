<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TheJesStore - @yield('title')</title>

    @stack('head')


    <script src="https://js.stripe.com/v3/"></script>

    @vite(['resources/js/app.js', 'resources/css/app.css'])

    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Montserrat:wght@400&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> 
    <link rel="icon" href="{{ asset('../../img/logo.png') }}" type="image/x-icon"> 
</head>

<body>

    @include('partials.header')

    <main class="p-0">
        @yield('content')
    </main>

    @include('partials.footer')

<div class="fixed top-0 right-0 p-3 z-[9999]">
            @if(session('success'))
        <div id="toastSuccess" class="flex items-center text-white bg-green-500 border-0 shadow-lg" role="alert">
            <div class="flex-1 p-4">
                {{ session('success') }}
            </div>
            <button type="button" class="mr-2 p-2" onclick="document.getElementById('toastSuccess').classList.add('hidden')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        @endif

        @if(session('error'))
        <div id="toastError" class="flex items-center text-white bg-red-500 border-0 shadow-lg" role="alert">
            <div class="flex-1 p-4">
                {{ session('error') }}
            </div>
            <button type="button" class="mr-2 p-2" onclick="document.getElementById('toastError').classList.add('hidden')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        @endif
    </div>
</body>

</html>