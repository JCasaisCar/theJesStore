@extends('layouts.app')

@section('title', __('sobre_nosotros'))

@section('content')
<!-- Sección Hero con Parallax -->
<section class="hero flex flex-col items-center justify-center py-5 sh relative">
    <!-- Imagen de fondo con parallax (asegúrate de que estas clases estén definidas o ajústalas) -->
    <div class="parallax-background fp absolute inset-0"></div>
    <!-- Capa overlay para resaltar el texto -->
    <div class="overlay rt absolute inset-0"></div>

    <div class="container text-center mb-5 c1 relative">
        <h1 class="font-bold text-5xl text-white">{{ __('quienes_somos') }}</h1>
        <p class="text-xl text-white">{{ __('descripcion_empresa') }}</p>
    </div>

    <!-- Mensaje de ventajas -->
    <div class="container text-center mb-4 c1 relative">
        <h2 class="font-bold text-4xl text-white">{{ __('disfruta_ventajas') }}</h2>
    </div>

    <!-- Carrusel -->
    <div class="container flex justify-center mb-5 c1 relative">
        <div id="carousel" class="w-full max-w-4xl overflow-hidden relative">
            <!-- Contenedor de slides -->
            <div id="carouselInner" class="flex transition-transform duration-500" style="transform: translateX(0%);">
                <!-- Slide 1 -->
                <div class="w-full flex-shrink-0 text-center">
                    <h3 class="text-white text-2xl">{{ __('carrusel11') }}</h3>
                    <img src="../../img/carrousel1.svg" class="w-full ci" alt="{{ __('carrusel1alt') }}">
                    <p class="text-white">{{ __('carrusel12') }}</p>
                </div>
                <!-- Slide 2 -->
                <div class="w-full flex-shrink-0 text-center">
                    <h3 class="text-white text-2xl">{{ __('carrusel21') }}</h3>
                    <img src="../../img/carrousel2.svg" class="w-full ci" alt="{{ __('carrusel2alt') }}">
                    <p class="text-white">{{ __('carrusel22') }}</p>
                </div>
                <!-- Slide 3 -->
                <div class="w-full flex-shrink-0 text-center">
                    <h3 class="text-white text-2xl">{{ __('carrusel31') }}</h3>
                    <img src="../../img/carrousel3.svg" class="w-full ci" alt="{{ __('carrusel3alt') }}">
                    <p class="text-white">{{ __('carrusel32') }}</p>
                </div>
            </div>
            <!-- Botón Anterior -->
            <button id="prevButton" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-700 bg-opacity-50 hover:bg-opacity-75 text-white p-2">
                &larr;
            </button>
            <!-- Botón Siguiente -->
            <button id="nextButton" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-700 bg-opacity-50 hover:bg-opacity-75 text-white p-2">
                &rarr;
            </button>
        </div>
    </div>
</section>

<script>
    // Script sencillo para el carrusel
    document.addEventListener('DOMContentLoaded', function() {
        const carouselInner = document.getElementById('carouselInner');
        const totalSlides = carouselInner.children.length;
        let currentIndex = 0;

        document.getElementById('prevButton').addEventListener('click', function() {
            currentIndex = (currentIndex === 0) ? totalSlides - 1 : currentIndex - 1;
            carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;
        });

        document.getElementById('nextButton').addEventListener('click', function() {
            currentIndex = (currentIndex === totalSlides - 1) ? 0 : currentIndex + 1;
            carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;
        });
    });
</script>
@endsection