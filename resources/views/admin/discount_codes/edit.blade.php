@extends('layouts.app')
@section('title', 'Editar Código de Descuento')
@section('content')
<div class="container mx-auto py-8 max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Editar Código: {{ $discountCode->code }}</h1>

    <form method="POST" action="{{ route('discount_codes.update', $discountCode) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium mb-1">Código *</label>
            <input name="code" value="{{ $discountCode->code }}" required class="w-full border px-4 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">% Descuento *</label>
            <input name="percentage" type="number" min="1" max="100" value="{{ $discountCode->percentage }}" required class="w-full border px-4 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Fecha de Expiración</label>
            <input name="expires_at" type="date" value="{{ $discountCode->expires_at ? \Carbon\Carbon::parse($discountCode->expires_at)->format('Y-m-d') : '' }}" class="w-full border px-4 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Usuarios asignados</label>
            <select name="users[]" class="w-full border px-4 py-2 rounded" multiple>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $discountCode->users->contains($user->id) ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ $discountCode->is_active ? 'checked' : '' }} class="mr-2">
                Activo
            </label>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Guardar Cambios</button>
    </form>
</div>
@endsection