@extends('layouts.app')
@section('title', 'Códigos de Descuento')
@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Códigos de Descuento</h1>
    <a href="{{ route('discount_codes.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Nuevo Código</a>
    <table class="mt-6 w-full table-auto border-collapse border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">Código</th>
                <th class="p-2 border">% Descuento</th>
                <th class="p-2 border">Usuarios</th>
                <th class="p-2 border">Expira</th>
                <th class="p-2 border">Activo</th>
                <th class="p-2 border">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($codes as $code)
            <tr>
                <td class="border p-2">{{ $code->code }}</td>
                <td class="border p-2">{{ $code->percentage }}%</td>
                <td class="border p-2">{{ $code->users->count() }}</td>
                <td class="border p-2">
                    {{ $code->expires_at ? \Carbon\Carbon::parse($code->expires_at)->format('d/m/Y') : 'Sin fecha' }}
                </td>
                <td class="border p-2">{{ $code->is_active ? 'Sí' : 'No' }}</td>
                <td class="border p-2 flex gap-2">
                    <!-- Botón activar/desactivar -->
                    <form action="{{ route('discount_codes.toggle', $code) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="text-white px-3 py-1 rounded {{ $code->is_active ? 'bg-red-600' : 'bg-green-600' }}">
                            {{ $code->is_active ? 'Desactivar' : 'Activar' }}
                        </button>
                    </form>

                    <!-- Botón editar -->
                    <a href="{{ route('discount_codes.edit', $code) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                        Editar
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection