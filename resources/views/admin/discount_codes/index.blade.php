@extends('layouts.app')
@section('title', __('codigos_descuento'))
@section('content')

<body id="discount-codes-index">
    <div class="relative bg-gradient-to-br from-slate-900 via-purple-900 to-indigo-900 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-10 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute top-40 right-20 w-80 h-80 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
            <div class="absolute bottom-10 left-1/3 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
        </div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3csvg width=" 40" height="40" xmlns="http://www.w3.org/2000/svg" %3e%3cdefs%3e%3cpattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse" %3e%3cpath d="m 40 0 l 0 40 m -40 0 l 40 0" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1" /%3e%3c/pattern%3e%3c/defs%3e%3crect width="100%25" height="100%25" fill="url(%23grid)" /%3e%3c/svg%3e')] opacity-30"></div>
        <div class="container mx-auto px-4 py-20 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="w-24 h-24 mx-auto bg-gradient-to-br from-emerald-500 to-green-500 rounded-3xl flex items-center justify-center mb-8 shadow-2xl animate-bounce-slow">
                    <i class="fas fa-tags text-white text-3xl"></i>
                </div>
                <h1 class="text-4xl md:text-6xl font-black mb-6 bg-gradient-to-r from-white via-green-200 to-emerald-200 bg-clip-text text-transparent animate__animated animate__fadeInUp">
                    {{ __('codigos_de') }} <span class="bg-gradient-to-r from-green-300 to-emerald-300 bg-clip-text text-transparent">{{ __('descuento') }}</span>
                </h1>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed animate__animated animate__fadeInUp animate__delay-1s">
                    {{ __('administra_y_gestiona_tus_codigos_promocionales') }}
                </p>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-gray-50 via-white to-gray-50 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-2xl p-8 md:p-12 border border-gray-100">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-3xl font-black text-gray-800">{{ __('codigos_de_descuento') }}</h2>
                    <a href="{{ route('discount_codes.create') }}" class="bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white font-bold py-3 px-6 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                        <i class="fas fa-plus mr-2"></i>{{ __('nuevo_codigo') }}
                    </a>
                </div>
                <div class="overflow-x-auto rounded-2xl shadow-lg">
                    <table class="w-full text-sm text-left text-gray-700 overflow-hidden">
                        <thead class="bg-gradient-to-r from-emerald-100 to-green-100 text-gray-800 font-semibold rounded-t-2xl">
                            <tr>
                                <th class="p-4">{{ __('codigo') }}</th>
                                <th class="p-4">% {{ __('descuento') }}</th>
                                <th class="p-4">{{ __('usuarios') }}</th>
                                <th class="p-4">{{ __('expira') }}</th>
                                <th class="p-4">{{ __('activo') }}</th>
                                <th class="p-4">{{ __('accion') }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100 rounded-b-2xl">
                            @foreach ($codes as $code)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4">{{ $code->code }}</td>
                                <td class="p-4">{{ $code->percentage }}%</td>
                                <td class="p-4">{{ $code->users->count() }}</td>
                                <td class="p-4">
                                    {{ $code->expires_at ? \Carbon\Carbon::parse($code->expires_at)->format('d/m/Y') : 'Sin fecha' }}
                                </td>
                                <td class="p-4">
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $code->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $code->is_active ? 'Sí' : 'No' }}
                                    </span>
                                </td>
                                <td class="p-4 flex flex-wrap gap-2">
                                    <form action="{{ route('discount_codes.toggle', $code) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-4 py-2 rounded-lg text-white font-medium {{ $code->is_active ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700' }}">
                                            {{ $code->is_active ? 'Desactivar' : 'Activar' }}
                                        </button>
                                    </form>
                                    <a href="{{ route('discount_codes.edit', $code) }}" class="px-4 py-2 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-white font-medium">
                                        {{ __('editar') }}
                                    </a>
                                    <button type="button" onclick="toggleUsers(this, '{{ $code->id }}')" class="px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white font-medium">
                                        {{ __('ver_usuarios') }}
                                    </button>
                                </td>
                            </tr>
                            <tr id="users-row-{{ $code->id }}" class="hidden bg-gray-50">
                                <td colspan="6" class="p-4 border-t border-gray-200 rounded-b-2xl">
                                    <div class="text-sm text-gray-700">
                                        @if($code->users->isEmpty())
                                        <p>{{ __('este_codigo_aplica_a_todos_los_usuarios') }}</p>
                                        @else
                                        <ul class="list-disc ml-6 space-y-1">
                                            @foreach ($code->users as $user)
                                            <li>{{ $user->name }} ({{ $user->email }})</li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
@if($codes->hasPages())
<div class="px-6 py-8 bg-gradient-to-br from-gray-50 via-white to-gray-50 border-t border-gray-200 rounded-b-2xl">
    <div class="flex flex-col items-center space-y-6">
        <div class="text-center">
            <p class="text-gray-600 font-medium">
                Mostrando {{ $codes->firstItem() ?? 0 }} - {{ $codes->lastItem() ?? 0 }} 
                de {{ $codes->total() }} códigos promocionales
            </p>
        </div>

        <div class="flex items-center justify-center space-x-2 flex-wrap">
            @if ($codes->onFirstPage())
                <span class="px-4 py-3 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed select-none">
                    <i class="fas fa-angle-double-left"></i>
                </span>
            @else
                <a href="{{ $codes->url(1) }}" 
                   class="px-4 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-emerald-500 hover:to-green-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-angle-double-left"></i>
                </a>
            @endif

            @if ($codes->onFirstPage())
                <span class="px-4 py-3 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed select-none">
                    <i class="fas fa-angle-left"></i>
                </span>
            @else
                <a href="{{ $codes->previousPageUrl() }}" 
                   class="px-4 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-emerald-500 hover:to-green-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-angle-left"></i>
                </a>
            @endif

            @foreach ($codes->getUrlRange(max(1, $codes->currentPage() - 2), min($codes->lastPage(), $codes->currentPage() + 2)) as $page => $url)
                @if ($page == $codes->currentPage())
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

            @if($codes->currentPage() < $codes->lastPage() - 3)
                <span class="px-3 py-3 text-gray-400 select-none">...</span>
                <a href="{{ $codes->url($codes->lastPage()) }}" 
                   class="px-5 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-emerald-500 hover:to-green-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg font-medium">
                    {{ $codes->lastPage() }}
                </a>
            @endif

            @if ($codes->hasMorePages())
                <a href="{{ $codes->nextPageUrl() }}" 
                   class="px-4 py-3 text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gradient-to-r hover:from-emerald-500 hover:to-green-500 hover:text-white hover:border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-angle-right"></i>
                </a>
            @else
                <span class="px-4 py-3 text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed select-none">
                    <i class="fas fa-angle-right"></i>
                </span>
            @endif

            @if ($codes->hasMorePages())
                <a href="{{ $codes->url($codes->lastPage()) }}" 
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
                @for($i = 1; $i <= $codes->lastPage(); $i++)
                    <option value="{{ $codes->url($i) }}" {{ $i == $codes->currentPage() ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor
            </select>
        </div>

        <div class="flex flex-wrap justify-center gap-4 text-sm">
            <div class="flex items-center gap-2 bg-gradient-to-r from-emerald-50 to-green-50 px-4 py-2 rounded-xl border border-emerald-200 shadow-sm">
                <div class="w-3 h-3 bg-gradient-to-r from-emerald-500 to-green-500 rounded-full"></div>
                <span class="text-gray-600">Total códigos:</span>
                <span class="font-bold text-emerald-700">{{ $codes->total() }}</span>
            </div>
            <div class="flex items-center gap-2 bg-gradient-to-r from-green-50 to-emerald-50 px-4 py-2 rounded-xl border border-green-200 shadow-sm">
                <div class="w-3 h-3 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full"></div>
                <span class="text-gray-600">Códigos activos:</span>
                <span class="font-bold text-green-700">{{ $codes->where('is_active', true)->count() }}</span>
            </div>
            <div class="flex items-center gap-2 bg-gradient-to-r from-red-50 to-rose-50 px-4 py-2 rounded-xl border border-red-200 shadow-sm">
                <div class="w-3 h-3 bg-gradient-to-r from-red-500 to-rose-500 rounded-full"></div>
                <span class="text-gray-600">Códigos inactivos:</span>
                <span class="font-bold text-red-700">{{ $codes->where('is_active', false)->count() }}</span>
            </div>
        </div>

        
    </div>
</div>
@else
<div class="px-6 py-8 bg-gradient-to-br from-gray-50 via-white to-gray-50 border-t border-gray-200 rounded-b-2xl">
    <div class="text-center">
        <div class="w-16 h-16 mx-auto bg-gradient-to-br from-emerald-500 to-green-500 rounded-full flex items-center justify-center mb-4 shadow-lg">
            <i class="fas fa-tags text-white text-xl"></i>
        </div>
        <p class="text-gray-600 font-medium mb-4">Mostrando todos los {{ $codes->total() }} códigos promocionales</p>
        <div class="flex justify-center">
            <a href="{{ route('discount_codes.create') }}" 
               class="inline-flex items-center bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                <i class="fas fa-plus mr-2"></i>
                {{ __('nuevo_codigo') }}
            </a>
        </div>
    </div>
</div>
@endif
                </div>
            </div>
        </div>
    </div>
</body>
@endsection