@extends('layouts.app')
@section('title', __('admin.usuarios'))

@section('content')

<!-- Cabecera Premium -->
<div class="relative bg-gradient-to-br from-slate-900 via-purple-900 to-indigo-900 overflow-hidden">
  <div class="absolute inset-0 opacity-20">
    <div class="absolute top-20 left-10 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
    <div class="absolute top-40 right-20 w-80 h-80 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
    <div class="absolute bottom-10 left-1/3 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
  </div>
  <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3csvg width="40" height="40" xmlns="http://www.w3.org/2000/svg"%3e%3cdefs%3e%3cpattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"%3e%3cpath d="m 40 0 l 0 40 m -40 0 l 40 0" fill="none" stroke='rgba(255,255,255,0.05)' stroke-width='1'/%3e%3c/pattern%3e%3c/defs%3e%3crect width='100%25' height='100%25' fill='url(%23grid)' /%3e%3c/svg%3e')] opacity-30"></div>
  <div class="container mx-auto px-6 py-20 relative z-10 text-center">
    <div class="max-w-4xl mx-auto">
      <div class="w-24 h-24 mx-auto bg-gradient-to-br from-emerald-500 to-green-500 rounded-3xl flex items-center justify-center mb-8 shadow-2xl animate-bounce-slow">
        <i class="fas fa-users text-white text-3xl"></i>
      </div>
      <h1 class="text-4xl md:text-6xl font-black mb-4 bg-gradient-to-r from-white via-green-200 to-emerald-200 bg-clip-text text-transparent">
        {{ __('admin.gestion_usuarios') }}
      </h1>
      <p class="text-gray-300 text-xl max-w-2xl mx-auto">{{ __('admin.bienvenido') }}, {{ Auth::user()->name }}</p>
    </div>
  </div>
</div>

<!-- Contenido Principal Premium -->
<div class="bg-gradient-to-br from-gray-50 via-white to-gray-50 py-16">
  <div class="container mx-auto px-6">

    <!-- Tarjetas de resumen -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
      <div class="bg-white rounded-3xl shadow-xl p-6 border-l-4 border-blue-500">
        <div class="flex justify-between items-start">
          <div>
            <p class="text-gray-500 text-sm">{{ __('admin.total_usuarios') }}</p>
            <h3 class="text-2xl font-black text-gray-800">{{ $users->total() }}</h3>
          </div>
          <div class="rounded-full bg-blue-100 p-3">
            <i class="fas fa-users text-blue-500 text-xl"></i>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-3xl shadow-xl p-6 border-l-4 border-green-500">
        <div class="flex justify-between items-start">
          <div>
            <p class="text-gray-500 text-sm">{{ __('admin.usuarios_activos') }}</p>
            <h3 class="text-2xl font-black text-gray-800">{{ $totalActivos }}</h3>
          </div>
          <div class="rounded-full bg-green-100 p-3">
            <i class="fas fa-user-check text-green-500 text-xl"></i>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-3xl shadow-xl p-6 border-l-4 border-red-500">
        <div class="flex justify-between items-start">
          <div>
            <p class="text-gray-500 text-sm">{{ __('admin.usuarios_inactivos') }}</p>
            <h3 class="text-2xl font-black text-gray-800">{{ $totalInactivos }}</h3>
          </div>
          <div class="rounded-full bg-red-100 p-3">
            <i class="fas fa-user-slash text-red-500 text-xl"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabla de usuarios -->
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
      <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">{{ __('admin.lista_usuarios') }}</h2>
        <form method="GET" action="{{ route('admin.users.index') }}" class="relative">
          <input type="text" name="search" value="{{ request('search') }}"
            placeholder="{{ __('admin.buscar_usuario') }}..."
            class="pl-10 pr-4 py-2 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
          <div class="absolute left-3 top-2.5 text-gray-400">
            <i class="fas fa-search"></i>
          </div>
        </form>
      </div>

      @if (session('status'))
      <div class="mx-6 mt-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-xl">
        <div class="flex items-center gap-3">
          <i class="fas fa-check-circle"></i>
          <p>{{ session('status') }}</p>
        </div>
      </div>
      @endif

      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-100 text-sm">
          <thead class="bg-gradient-to-r from-emerald-100 to-green-100 text-gray-700 font-semibold">
            <tr>
              <th class="px-6 py-3 text-left">{{ __('admin.nombre') }}</th>
              <th class="px-6 py-3 text-left">{{ __('admin.email') }}</th>
              <th class="px-6 py-3 text-left">{{ __('admin.registro') }}</th>
              <th class="px-6 py-3 text-left">{{ __('admin.verificado') }}</th>
              <th class="px-6 py-3 text-center">{{ __('admin.estado') }}</th>
              <th class="px-6 py-3 text-center">{{ __('admin.acciones') }}</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-100">
            @foreach ($users as $user)
            <tr class="hover:bg-gray-50 transition">
              <td class="px-6 py-4 whitespace-nowrap flex items-center gap-3">
                <div class="h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center">
                  <i class="fas fa-user text-gray-500"></i>
                </div>
                <div>
                  <div class="font-medium text-gray-900">{{ $user->name }}</div>
                  @if($user->role == 'admin')
                  <div class="text-xs text-blue-600">{{ __('admin.administrador') }}</div>
                  @endif
                </div>
              </td>
              <td class="px-6 py-4 text-gray-800">{{ $user->email }}</td>
              <td class="px-6 py-4 text-gray-600">{{ $user->created_at ? $user->created_at->format('d/m/Y') : __('admin.fecha_desconocida') }}</td>
              <td class="px-6 py-4">
                @if ($user->email_verified_at)
                <span class="text-green-600 font-medium">{{ __('admin.verificado') }}</span>
                @else
                <span class="text-red-600 font-medium">{{ __('admin.no_verificado') }}</span>
                @endif
              </td>
              <td class="px-6 py-4 text-center">
                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $user->active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                  {{ $user->active ? __('admin.activo') : __('admin.inactivo') }}
                </span>
              </td>
              <td class="px-6 py-4 text-center">
                <form method="POST" action="{{ route('admin.users.toggle', $user) }}">
                  @csrf
                  <button type="submit"
                    class="px-4 py-2 text-xs rounded-lg text-white font-semibold {{ $user->active ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700' }} transition">
                    {{ $user->active ? __('admin.desactivar') : __('admin.activar') }}
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
        {{ $users->links() }}
      </div>
    </div>
  </div>
</div>

<!-- Estilos y animaciones premium -->
<style>
.animation-delay-2000 {
  animation-delay: 2s;
}
.animation-delay-4000 {
  animation-delay: 4s;
}
@keyframes bounce-slow {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
}
.animate-bounce-slow {
  animation: bounce-slow 3s infinite;
}
html {
  scroll-behavior: smooth;
}
</style>
@endsection