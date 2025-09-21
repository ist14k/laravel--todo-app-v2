@extends('layouts.auth')

@section('content')
  <div
    class="transform overflow-hidden rounded-2xl border border-white/20 bg-white/95 shadow-2xl backdrop-blur-sm transition-transform duration-300 hover:-translate-y-1">
    <!-- Header -->
    <div class="relative bg-gradient-to-r from-indigo-500 to-purple-600 px-8 py-6 text-center">
      <div class="absolute inset-0 bg-black/10"></div>
      <div class="relative z-10">
        <h1 class="text-2xl font-semibold text-white">{{ __('Confirm Password') }}</h1>
        <p class="mt-1 text-indigo-100">{{ __('Please confirm your password to continue') }}</p>
      </div>
    </div>

    <!-- Body -->
    <div class="p-8">
      <div class="mb-6 rounded-lg border border-blue-200 bg-blue-50 p-4">
        <p class="text-sm text-blue-700">{{ __('Please confirm your password before continuing.') }}</p>
      </div>

      <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
        @csrf

        <!-- Password Field -->
        <div>
          <label for="password" class="mb-2 block text-sm font-medium text-gray-700">
            {{ __('Password') }}
          </label>
          <input id="password" type="password"
            class="@error('password')
              border-red-300 bg-red-50
            @else
              border-gray-200 bg-gray-50 focus:border-indigo-500
            @enderror w-full rounded-xl border-2 px-4 py-3 transition-colors duration-200 focus:bg-white focus:ring-0"
            name="password" required autocomplete="current-password" placeholder="Enter your password">

          @error('password')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit"
          class="w-full transform rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 px-4 py-3 font-medium text-white shadow-lg transition-all duration-200 hover:-translate-y-0.5 hover:from-indigo-600 hover:to-purple-700 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          {{ __('Confirm Password') }}
        </button>

        @if (Route::has('password.request'))
          <!-- Divider -->
          <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
              <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
              <span class="bg-white px-2 text-gray-500">{{ __('or') }}</span>
            </div>
          </div>

          <div class="text-center">
            <a href="{{ route('password.request') }}"
              class="font-medium text-indigo-600 transition-colors duration-200 hover:text-purple-600">
              {{ __('Forgot Your Password?') }}
            </a>
          </div>
        @endif
      </form>
    </div>
  </div>
@endsection
