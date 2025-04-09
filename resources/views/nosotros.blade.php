@extends('layouts.app')
@section('title', __('sobre_nosotros'))
@section('content')
<!-- Hero Banner de Sobre Nosotros -->
<div class="relative bg-gradient-to-r from-blue-900 to-blue-700 overflow-hidden">
    <div class="container mx-auto px-4 py-16 md:py-20">
        <div class="text-center text-white z-10 relative">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 animate__animated animate__fadeInUp">
                {{ __('conoce') }} <span class="text-blue-300">{{ __('thejesstore') }}</span>
            </h1>
            <p class="text-lg max-w-2xl mx-auto mb-6 text-gray-200 animate__animated animate__fadeInUp animate__delay-1s">
                {{ __('sobre_nosotros_descripcion') }}
            </p>
        </div>
        <!-- Decoraciones de fondo -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
            <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-blue-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-purple-500 rounded-full blur-3xl"></div>
        </div>
    </div>
</div>

<!-- Nuestra Historia -->
<div class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="order-2 md:order-1">
                <h2 class="text-2xl md:text-3xl font-bold mb-4 text-gray-800">{{ __('nuestra_historia') }}</h2>
                <div class="w-20 h-1 bg-blue-600 mb-6"></div>
                <p class="text-gray-600 mb-4">{{ __('historia_p1') }}</p>
                <p class="text-gray-600 mb-4">{{ __('historia_p2') }}</p>
                <p class="text-gray-600">{{ __('historia_p3') }}</p>
            </div>
            <div class="order-1 md:order-2 relative">
                <div class="relative z-10 rounded-lg overflow-hidden shadow-xl transform transition hover:scale-105">
                    <img src="{{ asset('images/about/historia.jpg') }}" alt="{{ __('nuestra_historia') }}" class="w-full h-auto">
                </div>
                <!-- Decoración detrás de la imagen -->
                <div class="absolute -bottom-4 -right-4 w-3/4 h-3/4 bg-blue-100 rounded-lg -z-10"></div>
            </div>
        </div>
    </div>
</div>

<!-- Misión, Visión y Valores -->
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 text-gray-800">{{ __('mision_vision_valores') }}</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">{{ __('mvv_descripcion') }}</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Misión -->
            <div class="bg-white rounded-xl shadow-md p-6 transform transition hover:scale-105 hover:shadow-lg">
                <div class="w-16 h-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-bullseye text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center text-gray-800 mb-3">{{ __('nuestra_mision') }}</h3>
                <p class="text-gray-600 text-center">{{ __('mision_texto') }}</p>
            </div>
            
            <!-- Visión -->
            <div class="bg-white rounded-xl shadow-md p-6 transform transition hover:scale-105 hover:shadow-lg">
                <div class="w-16 h-16 mx-auto bg-purple-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-eye text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center text-gray-800 mb-3">{{ __('nuestra_vision') }}</h3>
                <p class="text-gray-600 text-center">{{ __('vision_texto') }}</p>
            </div>
            
            <!-- Valores -->
            <div class="bg-white rounded-xl shadow-md p-6 transform transition hover:scale-105 hover:shadow-lg">
                <div class="w-16 h-16 mx-auto bg-green-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-heart text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center text-gray-800 mb-3">{{ __('nuestros_valores') }}</h3>
                <p class="text-gray-600 text-center">{{ __('valores_texto') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Nuestro Equipo -->
<div class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 text-gray-800">{{ __('nuestro_equipo') }}</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">{{ __('equipo_descripcion') }}</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Miembro 1 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition hover:scale-105 hover:shadow-lg">
                <div class="relative">
                    <img src="{{ asset('images/team/member1.jpg') }}" alt="Miembro del equipo" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900 to-transparent opacity-70"></div>
                </div>
                <div class="p-4 text-center">
                    <h3 class="font-bold text-lg text-gray-800">{{ __('nombre_miembro1') }}</h3>
                    <p class="text-blue-600 text-sm mb-2">{{ __('cargo_miembro1') }}</p>
                    <p class="text-gray-600 text-sm">{{ __('descripcion_miembro1') }}</p>
                    <div class="flex justify-center mt-4 space-x-3">
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            <i class="far fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Miembro 2 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition hover:scale-105 hover:shadow-lg">
                <div class="relative">
                    <img src="{{ asset('images/team/member2.jpg') }}" alt="Miembro del equipo" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900 to-transparent opacity-70"></div>
                </div>
                <div class="p-4 text-center">
                    <h3 class="font-bold text-lg text-gray-800">{{ __('nombre_miembro2') }}</h3>
                    <p class="text-blue-600 text-sm mb-2">{{ __('cargo_miembro2') }}</p>
                    <p class="text-gray-600 text-sm">{{ __('descripcion_miembro2') }}</p>
                    <div class="flex justify-center mt-4 space-x-3">
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            <i class="far fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Miembro 3 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition hover:scale-105 hover:shadow-lg">
                <div class="relative">
                    <img src="{{ asset('images/team/member3.jpg') }}" alt="Miembro del equipo" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900 to-transparent opacity-70"></div>
                </div>
                <div class="p-4 text-center">
                    <h3 class="font-bold text-lg text-gray-800">{{ __('nombre_miembro3') }}</h3>
                    <p class="text-blue-600 text-sm mb-2">{{ __('cargo_miembro3') }}</p>
                    <p class="text-gray-600 text-sm">{{ __('descripcion_miembro3') }}</p>
                    <div class="flex justify-center mt-4 space-x-3">
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            <i class="far fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Miembro 4 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transform transition hover:scale-105 hover:shadow-lg">
                <div class="relative">
                    <img src="{{ asset('images/team/member4.jpg') }}" alt="Miembro del equipo" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900 to-transparent opacity-70"></div>
                </div>
                <div class="p-4 text-center">
                    <h3 class="font-bold text-lg text-gray-800">{{ __('nombre_miembro4') }}</h3>
                    <p class="text-blue-600 text-sm mb-2">{{ __('cargo_miembro4') }}</p>
                    <p class="text-gray-600 text-sm">{{ __('descripcion_miembro4') }}</p>
                    <div class="flex justify-center mt-4 space-x-3">
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            <i class="far fa-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Por qué elegirnos -->
<div class="bg-gradient-to-r from-blue-900 to-blue-700 py-16 text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">{{ __('por_que_elegirnos') }}</h2>
            <div class="w-20 h-1 bg-blue-300 mx-auto mb-6"></div>
            <p class="text-gray-200 max-w-2xl mx-auto">{{ __('elegirnos_descripcion') }}</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Razón 1 -->
            <div class="bg-white bg-opacity-10 rounded-xl p-6 backdrop-filter backdrop-blur-sm transform transition hover:scale-105 border border-white border-opacity-20">
                <div class="w-16 h-16 mx-auto bg-blue-100 bg-opacity-20 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-shield-alt text-blue-300 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center mb-3">{{ __('garantia_calidad') }}</h3>
                <p class="text-gray-300 text-center">{{ __('garantia_texto') }}</p>
            </div>
            
            <!-- Razón 2 -->
            <div class="bg-white bg-opacity-10 rounded-xl p-6 backdrop-filter backdrop-blur-sm transform transition hover:scale-105 border border-white border-opacity-20">
                <div class="w-16 h-16 mx-auto bg-blue-100 bg-opacity-20 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-shipping-fast text-blue-300 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center mb-3">{{ __('entrega_rapida') }}</h3>
                <p class="text-gray-300 text-center">{{ __('entrega_texto') }}</p>
            </div>
            
            <!-- Razón 3 -->
            <div class="bg-white bg-opacity-10 rounded-xl p-6 backdrop-filter backdrop-blur-sm transform transition hover:scale-105 border border-white border-opacity-20">
                <div class="w-16 h-16 mx-auto bg-blue-100 bg-opacity-20 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-headset text-blue-300 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-center mb-3">{{ __('servicio_cliente') }}</h3>
                <p class="text-gray-300 text-center">{{ __('servicio_texto') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Experiencia del cliente -->
<div class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 text-gray-800">{{ __('opiniones_clientes') }}</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">{{ __('opiniones_descripcion') }}</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-gray-50 rounded-xl shadow-md p-6 transform transition hover:scale-105 hover:shadow-lg relative">
                <div class="absolute top-4 right-4 text-5xl text-blue-200 opacity-50">
                    <i class="fas fa-quote-right"></i>
                </div>
                <div class="relative z-10">
                    <p class="text-gray-600 mb-4 italic">{{ __('testimonio_1') }}</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="{{ asset('images/testimonials/client1.jpg') }}" alt="Cliente" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">{{ __('cliente_nombre_1') }}</h4>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="bg-gray-50 rounded-xl shadow-md p-6 transform transition hover:scale-105 hover:shadow-lg relative">
                <div class="absolute top-4 right-4 text-5xl text-blue-200 opacity-50">
                    <i class="fas fa-quote-right"></i>
                </div>
                <div class="relative z-10">
                    <p class="text-gray-600 mb-4 italic">{{ __('testimonio_2') }}</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="{{ asset('images/testimonials/client2.jpg') }}" alt="Cliente" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">{{ __('cliente_nombre_2') }}</h4>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="bg-gray-50 rounded-xl shadow-md p-6 transform transition hover:scale-105 hover:shadow-lg relative">
                <div class="absolute top-4 right-4 text-5xl text-blue-200 opacity-50">
                    <i class="fas fa-quote-right"></i>
                </div>
                <div class="relative z-10">
                    <p class="text-gray-600 mb-4 italic">{{ __('testimonio_3') }}</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="{{ asset('images/testimonials/client3.jpg') }}" alt="Cliente" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">{{ __('cliente_nombre_3') }}</h4>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contacto CTA -->
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="bg-gradient-to-r from-blue-900 to-blue-700 rounded-2xl p-8 md:p-12 shadow-xl relative overflow-hidden">
            <!-- Decoraciones de fondo -->
            <div class="absolute top-0 right-0 w-1/3 h-full bg-blue-400 opacity-10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-1/4 h-full bg-purple-500 opacity-10 rounded-full blur-3xl"></div>
            
            <div class="relative z-10 text-center md:text-left md:flex md:items-center md:justify-between">
                <div class="mb-6 md:mb-0 md:mr-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-3">{{ __('tienes_preguntas') }}</h2>
                    <p class="text-gray-200">{{ __('contacto_descripcion') }}</p>
                </div>
                <div class="flex flex-wrap justify-center md:justify-end gap-4">
                    <a href="{{ route('contacto') }}" class="bg-white hover:bg-gray-100 text-blue-800 font-bold py-3 px-6 rounded-lg transition shadow-lg transform hover:scale-105">
                        {{ __('contactanos') }} <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="{{ route('faq') }}" class="bg-transparent hover:bg-blue-600 text-white border border-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105">
                        {{ __('ver_faq') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection