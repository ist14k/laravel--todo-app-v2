@extends('layouts.auth')

@section('content')
  <div
    class="transform overflow-hidden rounded-2xl border border-white/20 bg-white/95 shadow-2xl backdrop-blur-sm transition-transform duration-300 hover:-translate-y-1">
    <!-- Header -->
    <div class="relative bg-gradient-to-r from-indigo-500 to-purple-600 px-8 py-6 text-center">
      <div class="absolute inset-0 bg-black/10"></div>
      <div class="relative z-10">
        <h1 class="text-2xl font-semibold text-white">{{ __('Reset Password') }}</h1>
        <p class="mt-1 text-indigo-100">{{ __('Enter your new password') }}</p>
      </div>
    </div>

    <!-- Body -->
    <div class="p-8">
      <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

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
            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
            placeholder="Enter your email address">

          @error('email')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Password Field -->
        <div>
          <label for="password" class="mb-2 block text-sm font-medium text-gray-700">
            {{ __('New Password') }}
          </label>
          <input id="password" type="password"
            class="@error('password')
              border-red-300 bg-red-50
            @else
              border-gray-200 bg-gray-50 focus:border-indigo-500
            @enderror w-full rounded-xl border-2 px-4 py-3 transition-colors duration-200 focus:bg-white focus:ring-0"
            name="password" required autocomplete="new-password" placeholder="Enter your new password">

          @error('password')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Confirm Password Field -->
        <div>
          <label for="password-confirm" class="mb-2 block text-sm font-medium text-gray-700">
            {{ __('Confirm Password') }}
          </label>
          <input id="password-confirm" type="password"
            class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 transition-colors duration-200 focus:border-indigo-500 focus:bg-white focus:ring-0"
            name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your new password">
        </div>

        <!-- Submit Button -->
        <button type="submit"
          class="w-full transform rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 px-4 py-3 font-medium text-white shadow-lg transition-all duration-200 hover:-translate-y-0.5 hover:from-indigo-600 hover:to-purple-700 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          {{ __('Reset Password') }}
        </button>
      </form>
    </div>

    <!-- Footer -->
    <div class="border-t border-gray-200 bg-gray-50 px-8 py-6 text-center">
      <p class="text-gray-600">
        {{ __('Remember your password?') }}
        <a href="{{ route('login') }}"
          class="font-medium text-indigo-600 transition-colors duration-200 hover:text-purple-600">
          {{ __('Back to login') }}
        </a>
      </p>
    </div>
  </div>
@endsection
