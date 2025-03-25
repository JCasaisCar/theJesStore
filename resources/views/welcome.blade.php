@extends('layouts.app')

@section('title', __('inicio'))

@section('content')
<div class="container mx-auto mt-5">
  <div class="flex flex-wrap -mx-2">
    @if ($products->isEmpty())
      <p class="text-center text-red-500 w-full">{{ __('no_hay_restaurantes') }}</p>
    @endif

    @foreach ($products as $product)
      <div class="w-full md:w-1/3 px-2 mb-4">
        <div class="bg-white shadow-sm rounded overflow-hidden h-full flex flex-col">
          <div class="h-60 overflow-hidden">
            <img src="{{ asset('img/' . $product->image) }}" class="w-full h-full object-cover" alt="{{ $product->name }}">
          </div>
          <div class="p-4 text-center flex flex-col justify-between flex-grow">
            <div>
              <h5 class="text-lg font-bold">{{ $product->name }}</h5>
              <p class="text-gray-700">{{ $product->category->name ?? __('sin_categoria') }}</p>
            </div>

            @if (Auth::guest())
              <div class="flex justify-center gap-4 mt-4">
                <a href="{{ route('login') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-full">
                  <i class="fas fa-heart"></i>
                </a>
                <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                  <i class="fas fa-cart-plus"></i>
                </a>
              </div>
            @elseif (Auth::check() && Auth::user()->role == 'user')
              <div class="flex justify-center gap-4 mt-4">
                <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-full">
                  <i class="fas fa-heart"></i>
                </button>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                  <i class="fas fa-cart-plus"></i>
                </button>
              </div>
            @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
