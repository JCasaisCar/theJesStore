@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-3 border-b border-gray-200 font-bold text-lg">
                    {{ __('registrarse') }}
                </div>
                <div class="p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4 flex flex-wrap">
                            <label for="name" class="w-full md:w-1/3 text-right md:pr-4 text-sm font-medium text-gray-700">
                                {{ __('nombre') }}
                            </label>
                            <div class="w-full md:w-2/3">
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                                @error('name')
                                    <span class="text-red-500 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex flex-wrap">
                            <label for="email" class="w-full md:w-1/3 text-right md:pr-4 text-sm font-medium text-gray-700">
                                {{ __('correo_electronico') }}
                            </label>
                            <div class="w-full md:w-2/3">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                                @error('email')
                                    <span class="text-red-500 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex flex-wrap">
                            <label for="password" class="w-full md:w-1/3 text-right md:pr-4 text-sm font-medium text-gray-700">
                                {{ __('contrasena') }}
                            </label>
                            <div class="w-full md:w-2/3">
                                <input id="password" type="password" name="password" required autocomplete="new-password" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror">
                                @error('password')
                                    <span class="text-red-500 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex flex-wrap">
                            <label for="password-confirm" class="w-full md:w-1/3 text-right md:pr-4 text-sm font-medium text-gray-700">
                                {{ __('confirmar_contrasena') }}
                            </label>
                            <div class="w-full md:w-2/3">
                                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                {{ __('registrarse') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection