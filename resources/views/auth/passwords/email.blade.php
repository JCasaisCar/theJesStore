@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
  <div class="flex justify-center">
    <div class="w-full max-w-2xl">
      <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-3 border-b border-gray-200 font-bold">
          {{ __('Reset Password') }}
        </div>
        <div class="p-4">
          @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="flex flex-wrap mb-4">
              <label for="email" class="w-full md:w-1/3 text-right md:pr-4 text-sm font-medium text-gray-700">
                {{ __('Email Address') }}
              </label>
              <div class="w-full md:w-2/3">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                @error('email')
                  <span class="text-red-500 text-sm mt-1" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="flex justify-end">
              <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                {{ __('Send Password Reset Link') }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection