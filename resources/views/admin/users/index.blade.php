@extends('layouts.app')
@section('title', __('admin.usuarios'))

@section('content')
<body id="admin-page">
<!-- Header del Panel de Administración -->
<div class="bg-gradient-to-r from-blue-900 to-blue-700 shadow-lg">
    <div class="container mx-auto px-6 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="text-white mb-4 md:mb-0">
                <h1 class="text-3xl font-bold">{{ __('admin.gestion_usuarios') }}</h1>
                <p class="text-blue-100">{{ __('admin.bienvenido') }}, {{ Auth::user()->name }}</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('tienda') }}" class="bg-white hover:bg-gray-100 text-blue-800 font-semibold py-2 px-4 rounded-lg transition shadow">
                    <i class="fas fa-store mr-2"></i>{{ __('admin.ver_tienda') }}
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Contenido Principal -->
<div class="container mx-auto px-6 py-8">
    <!-- Resumen rápido -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Total usuarios -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">{{ __('admin.total_usuarios') }}</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $users->total() }}</h3>
                </div>
                <div class="rounded-full bg-blue-100 p-3">
                    <i class="fas fa-users text-blue-500 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Usuarios activos -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">{{ __('admin.usuarios_activos') }}</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalActivos }}</h3>
                </div>
                <div class="rounded-full bg-green-100 p-3">
                    <i class="fas fa-user-check text-green-500 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Usuarios inactivos -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-red-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">{{ __('admin.usuarios_inactivos') }}</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalInactivos }}</h3>
                </div>
                <div class="rounded-full bg-red-100 p-3">
                    <i class="fas fa-user-slash text-red-500 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Lista de usuarios -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">{{ __('admin.lista_usuarios') }}</h2>
            
            <!-- Filtros y búsqueda -->
            <div class="flex items-center">
                <div class="relative">
                <form method="GET" action="{{ route('admin.users.index') }}" class="relative">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="{{ __('admin.buscar_usuario') }}..." 
                        class="pl-8 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    >
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <i class="fas fa-search"></i>
                    </div>
                </form>

                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>
        </div>

        @if (session('status'))
            <div class="mx-6 mt-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="ml-3">
                        <p>{{ session('status') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('admin.nombre') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('admin.email') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('admin.registro') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('admin.verificado') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('admin.estado') }}
                        </th>
                        
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('admin.acciones') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-gray-500"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                        @if($user->role == 'admin')
                                            <div class="text-xs text-blue-600">{{ __('admin.administrador') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $user->created_at ? $user->created_at->format('d/m/Y') : __('admin.fecha_desconocida') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($user->email_verified_at)
                                    <span class="text-green-600 text-sm font-medium">{{ __('admin.verificado') }}</span>
                                @else
                                    <span class="text-red-600 text-sm font-medium">{{ __('admin.no_verificado') }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $user->active ? __('admin.activo') : __('admin.inactivo') }}
                                </span>
                            </td>
                            

                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex justify-center space-x-2">
                                    <form method="POST" action="{{ route('admin.users.toggle', $user) }}">
                                        @csrf
                                        <button type="submit" class="px-3 py-1 text-xs rounded text-white {{ $user->active ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700' }} transition">
                                            {{ $user->active ? __('admin.desactivar') : __('admin.activar') }}
                                        </button>
                                    </form>
                                </div>
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

<!-- Modal de confirmación de eliminación -->
<div id="deleteModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden justify-center items-center">
    <div class="bg-white w-11/12 max-w-md rounded-xl shadow-lg p-6">
        <div class="text-center">
            <i class="fas fa-exclamation-triangle text-yellow-500 text-5xl mb-4"></i>
            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ __('admin.confirmar_eliminacion') }}</h3>
            <p class="text-gray-600 mb-6">{{ __('admin.eliminar_usuario_advertencia') }}</p>
            
            <div class="flex justify-center space-x-4">
                <button onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400 transition">
                    {{ __('admin.cancelar') }}
                </button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                        {{ __('admin.eliminar') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        document.getElementById('deleteModal').classList.remove('flex');
    }
</script>
</body>
@endsection