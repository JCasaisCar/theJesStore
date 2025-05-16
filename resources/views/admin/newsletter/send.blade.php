@extends('layouts.app')
@section('title', 'Enviar Newsletter')

@section('content')
<div class="container mx-auto px-4 py-10">
  <h1 class="text-2xl font-bold mb-6 text-blue-700">Enviar correo a todos los suscriptores</h1>

  @if (session('success'))
    <div class="bg-green-100 text-green-700 border border-green-400 p-4 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

  <form action="{{ route('admin.newsletter.send') }}" method="POST" class="bg-white shadow-md rounded p-6">
    @csrf

    <div class="mb-4">
      <label for="subject" class="block text-gray-700 font-semibold mb-2">Asunto</label>
      <input type="text" name="subject" id="subject"
        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:border-blue-500"
        value="{{ old('subject') }}" required>
    </div>

    <div class="mb-6">
      <label for="body" class="block text-gray-700 font-semibold mb-2">Contenido del correo</label>
      <textarea name="body" id="body" rows="8"
        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:border-blue-500"
        required>{{ old('body') }}</textarea>
    </div>

    <button type="submit"
      class="bg-blue-600 text-white font-semibold px-6 py-2 rounded hover:bg-blue-700 transition">
      Enviar correo
    </button>
  </form>
</div>
@endsection