@extends('layouts.app')
@section('title', __('editar_codigo_descuento'))
@section('content')

<body id="discount-codes-edit">

    <div class="relative bg-gradient-to-br from-slate-900 via-purple-900 to-indigo-900 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-10 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute top-40 right-20 w-80 h-80 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
            <div class="absolute bottom-10 left-1/3 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
        </div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3csvg width=" 40" height="40" xmlns="http://www.w3.org/2000/svg" %3e%3cdefs%3e%3cpattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse" %3e%3cpath d="m 40 0 l 0 40 m -40 0 l 40 0" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1" /%3e%3c/pattern%3e%3c/defs%3e%3crect width="100%25" height="100%25" fill="url(%23grid)" /%3e%3c/svg%3e')] opacity-30"></div>
        <div class="container mx-auto px-4 py-20 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="w-24 h-24 mx-auto bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-3xl flex items-center justify-center mb-8 shadow-2xl animate-bounce-slow">
                    <i class="fas fa-edit text-white text-3xl"></i>
                </div>
                <h1 class="text-4xl md:text-6xl font-black mb-6 bg-gradient-to-r from-white via-yellow-200 to-yellow-300 bg-clip-text text-transparent animate__animated animate__fadeInUp">
                    {{ __('editar') }} <span class="bg-gradient-to-r from-yellow-300 to-yellow-500 bg-clip-text text-transparent">{{ __('codigo') }}</span>
                </h1>
                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed animate__animated animate__fadeInUp animate__delay-1s">
                    {{ __('modifica_los_datos_del_codigo_promocional') }}
                </p>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-gray-50 via-white to-gray-50 py-16">
        <div class="container mx-auto px-4 max-w-2xl">
            <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 border border-gray-100">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-2xl flex items-center justify-center mb-4 shadow-lg">
                        <i class="fas fa-pen text-white text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-black text-gray-800 mb-2 bg-gradient-to-r from-yellow-500 to-yellow-600 bg-clip-text text-transparent">
                        {{ __('editar_codigo') }}: {{ $discountCode->code }}
                    </h2>
                </div>

                <form method="POST" action="{{ route('discount_codes.update', $discountCode) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="group">
                        <label class="block text-sm font-bold text-gray-700 mb-2">{{ __('codigo') }} *</label>
                        <input name="code" value="{{ $discountCode->code }}" required
                            class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-6 py-4 text-gray-800 font-medium focus:border-yellow-500 focus:bg-white focus:outline-none transition-all duration-300">
                    </div>

                    <div class="group">
                        <label class="block text-sm font-bold text-gray-700 mb-2">% {{ __('descuento') }} *</label>
                        <input name="percentage" type="number" min="1" max="100" value="{{ $discountCode->percentage }}" required
                            class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-6 py-4 text-gray-800 font-medium focus:border-yellow-500 focus:bg-white focus:outline-none transition-all duration-300">
                    </div>

                    <div class="group">
                        <label class="block text-sm font-bold text-gray-700 mb-2">{{ __('fecha_de_expiracion') }}</label>
                        <input name="expires_at" type="date" value="{{ $discountCode->expires_at ? \Carbon\Carbon::parse($discountCode->expires_at)->format('Y-m-d') : '' }}"
                            class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-6 py-4 text-gray-800 font-medium focus:border-yellow-500 focus:bg-white focus:outline-none transition-all duration-300">
                    </div>

                    <div class="group">
                        <label class="block text-sm font-bold text-gray-700 mb-2">{{ __('usuarios_asignados') }}</label>
                        <select name="users[]" multiple
                            class="w-full bg-gray-50 border-2 border-gray-200 rounded-2xl px-6 py-4 text-gray-800 font-medium focus:border-yellow-500 focus:bg-white focus:outline-none transition-all duration-300 min-h-[120px]">
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $discountCode->users->contains($user->id) ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="group">
                        <label class="inline-flex items-center text-sm font-bold text-gray-700">
                            <input type="checkbox" name="is_active" value="1" {{ $discountCode->is_active ? 'checked' : '' }}
                                class="mr-2 rounded text-yellow-500 focus:ring-yellow-500">
                            {{ __('activo') }}
                        </label>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white font-bold py-3 px-6 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                            {{ __('guardar_cambios') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection