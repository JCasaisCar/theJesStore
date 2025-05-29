@extends('layouts.app')
@section('title', __('admin.usuarios'))

@section('content')

<body id="usersPage">
  <div class="relative bg-gradient-to-br from-slate-900 via-purple-900 to-indigo-900 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
      <div class="absolute top-20 left-10 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
      <div class="absolute top-40 right-20 w-80 h-80 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
      <div class="absolute bottom-10 left-1/3 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
    </div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3csvg width=" 40" height="40" xmlns="http://www.w3.org/2000/svg" %3e%3cdefs%3e%3cpattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse" %3e%3cpath d="m 40 0 l 0 40 m -40 0 l 40 0" fill="none" stroke='rgba(255,255,255,0.05)' stroke-width='1' /%3e%3c/pattern%3e%3c/defs%3e%3crect width='100%25' height='100%25' fill='url(%23grid)' /%3e%3c/svg%3e')] opacity-30"></div>
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

  <div class="bg-gradient-to-br from-gray-50 via-white to-gray-50 py-16">
    <div class="container mx-auto px-6">

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

@if($users->hasPages())
<div class="px-6 py-8 bg-gradient-to-br from-gray-50 via-white to-gray-50 border-t border-gray-200">
    <div class="flex flex-col items-center space-y-6">
        <div class="text-center">
            <p class="text-gray-600 font-medium">
                Mostrando {{ $users->firstItem() ?? 0 }} - {{ $users->lastItem() ?? 0 }} 
                de {{ $users->total() }} usuarios registrados
            </p>
        </div>

        <div class="flex items-center justify-center space-x-2 flex-wrap">
            @if ($users->onFirstPage())
                <span class="px-4 py-3 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed select-none">
                    <i class="fas fa-angle-double-left"></i>
                </span>
            @else
                <a href="{{ $users->url(1) }}" 
                   class="px-4 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-emerald-500 hover:to-green-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-angle-double-left"></i>
                </a>
            @endif

            @if ($users->onFirstPage())
                <span class="px-4 py-3 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed select-none">
                    <i class="fas fa-angle-left"></i>
                </span>
            @else
                <a href="{{ $users->previousPageUrl() }}" 
                   class="px-4 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-emerald-500 hover:to-green-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-angle-left"></i>
                </a>
            @endif

            @foreach ($users->getUrlRange(max(1, $users->currentPage() - 2), min($users->lastPage(), $users->currentPage() + 2)) as $page => $url)
                @if ($page == $users->currentPage())
                    <span class="px-5 py-3 text-white bg-gradient-to-r from-emerald-600 to-green-600 rounded-xl font-bold shadow-lg transform scale-110 border-2 border-emerald-300">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}" 
                       class="px-5 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-emerald-500 hover:to-green-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg font-medium">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            @if($users->currentPage() < $users->lastPage() - 3)
                <span class="px-3 py-3 text-gray-400 select-none">...</span>
                <a href="{{ $users->url($users->lastPage()) }}" 
                   class="px-5 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-emerald-500 hover:to-green-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg font-medium">
                    {{ $users->lastPage() }}
                </a>
            @endif

            @if ($users->hasMorePages())
                <a href="{{ $users->nextPageUrl() }}" 
                   class="px-4 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-emerald-500 hover:to-green-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-angle-right"></i>
                </a>
            @else
                <span class="px-4 py-3 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed select-none">
                    <i class="fas fa-angle-right"></i>
                </span>
            @endif

            @if ($users->hasMorePages())
                <a href="{{ $users->url($users->lastPage()) }}" 
                   class="px-4 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-emerald-500 hover:to-green-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-angle-double-right"></i>
                </a>
            @else
                <span class="px-4 py-3 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed select-none">
                    <i class="fas fa-angle-double-right"></i>
                </span>
            @endif
        </div>

        <div class="flex items-center space-x-4">
            <span class="text-gray-500 text-sm font-medium">Ir a página:</span>
            <select onchange="window.location.href=this.value" 
                    class="px-3 py-2 bg-white border border-gray-200 rounded-lg focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition-all duration-300 text-sm font-medium">
                @for($i = 1; $i <= $users->lastPage(); $i++)
                    <option value="{{ $users->url($i) }}" {{ $i == $users->currentPage() ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor
            </select>
        </div>

        <div class="flex flex-wrap justify-center gap-6 text-sm">
            <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-xl border border-gray-200 shadow-sm">
                <div class="w-3 h-3 bg-gradient-to-r from-emerald-500 to-green-500 rounded-full"></div>
                <span class="text-gray-600">Total de usuarios:</span>
                <span class="font-bold text-gray-900">{{ $users->total() }}</span>
            </div>
            <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-xl border border-gray-200 shadow-sm">
                <div class="w-3 h-3 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full"></div>
                <span class="text-gray-600">Páginas:</span>
                <span class="font-bold text-gray-900">{{ $users->lastPage() }}</span>
            </div>
        </div>
    </div>
</div>
@else
<div class="px-6 py-8 bg-gradient-to-br from-gray-50 via-white to-gray-50 border-t border-gray-200">
    <div class="text-center">
        <div class="w-16 h-16 mx-auto bg-gradient-to-br from-emerald-500 to-green-500 rounded-full flex items-center justify-center mb-4 shadow-lg">
            <i class="fas fa-users text-white text-xl"></i>
        </div>
        <p class="text-gray-600 font-medium">Mostrando todos los {{ $users->total() }} usuarios</p>
    </div>
</div>
@endif
      </div>
    </div>
  </div>
</body>
@endsection