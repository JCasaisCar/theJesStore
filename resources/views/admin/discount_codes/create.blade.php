@extends('layouts.app')
@section('title', 'Crear Código de Descuento')
@section('content')
<div class="container mx-auto py-8 max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Crear Código de Descuento</h1>
    <form method="POST" action="{{ route('discount_codes.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block font-medium mb-1">Código *</label>
            <input name="code" required class="w-full border px-4 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">% Descuento *</label>
            <input name="percentage" type="number" min="1" max="100" required class="w-full border px-4 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Fecha de Expiración</label>
            <input name="expires_at" type="date" class="w-full border px-4 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Usuarios asignados (opcional)</label>
            <select name="users[]" class="w-full border px-4 py-2 rounded" multiple>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
            <p class="text-sm text-gray-500 mt-1">Si no seleccionas usuarios, se aplicará a todos.</p>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Estado *</label>
            <select name="is_active" required class="w-full border px-4 py-2 rounded">
                <option value="1" selected>Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Crear</button>
    </form>
</div>
@endsection