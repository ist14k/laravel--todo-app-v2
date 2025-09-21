@extends('layouts.auth')

@section('content')
  <div
    class="transform overflow-hidden rounded-2xl border border-white/20 bg-white/95 shadow-2xl backdrop-blur-sm transition-transform duration-300 hover:-translate-y-1">
    <!-- Header -->
    <div class="relative bg-gradient-to-r from-indigo-500 to-purple-600 px-8 py-6 text-center">
      <div class="absolute inset-0 bg-black/10"></div>
      <div class="relative z-10">
        <h1 class="text-2xl font-semibold text-white">{{ __('Welcome Back') }}</h1>
        <p class="mt-1 text-indigo-100">{{ __('Sign in to your account') }}</p>
      </div>
    </div>

    <!-- Body -->
    <div class="p-8">
      <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Field -->
        <div>
          <label for="email" class="mb-2 block text-sm font-medium text-gray-700">
            {{ __('Email Address') }}
          </label>
          <input id="email" type="email"
            class="@error('email')
              border-red-300 bg-red-50
            @else
              border-gray-200 bg-gray-50 focus:border-indigo-500
            @enderror w-full rounded-xl border-2 px-4 py-3 transition-colors duration-200 focus:bg-white focus:ring-0"
            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
            placeholder="Enter your email address">

          @error('email')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

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

        <!-- Remember Me -->
        <div class="flex items-center">
          <input type="checkbox" name="remember" id="remember"
            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-indigo-600 focus:ring-2 focus:ring-indigo-500"
            {{ old('remember') ? 'checked' : '' }}>
          <label for="remember" class="ml-2 text-sm text-gray-600">
            {{ __('Remember Me') }}
          </label>
        </div>

        <!-- Submit Button -->
        <button type="submit"
          class="w-full transform rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 px-4 py-3 font-medium text-white shadow-lg transition-all duration-200 hover:-translate-y-0.5 hover:from-indigo-600 hover:to-purple-700 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          {{ __('Sign In') }}
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

    <!-- Footer -->
    @if (Route::has('register'))
      <div class="border-t border-gray-200 bg-gray-50 px-8 py-6 text-center">
        <p class="text-gray-600">
          {{ __("Don't have an account?") }}
          <a href="{{ route('register') }}"
            class="font-medium text-indigo-600 transition-colors duration-200 hover:text-purple-600">
            {{ __('Sign up') }}
          </a>
        </p>
      </div>
    @endif
  </div>
@endsection
