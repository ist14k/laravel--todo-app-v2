@extends('layouts.auth')

@section('content')
  <div
    class="transform overflow-hidden rounded-2xl border border-white/20 bg-white/95 shadow-2xl backdrop-blur-sm transition-transform duration-300 hover:-translate-y-1">
    <!-- Header -->
    <div class="relative bg-gradient-to-r from-indigo-500 to-purple-600 px-8 py-6 text-center">
      <div class="absolute inset-0 bg-black/10"></div>
      <div class="relative z-10">
        <h1 class="text-2xl font-semibold text-white">{{ __('Verify Your Email') }}</h1>
        <p class="mt-1 text-indigo-100">{{ __('Check your inbox for verification link') }}</p>
      </div>
    </div>

    <!-- Body -->
    <div class="p-8">
      @if (session('resent'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4">
          <p class="text-sm text-green-700">{{ __('A fresh verification link has been sent to your email address.') }}</p>
        </div>
      @endif

      <div class="space-y-4 text-center">
        <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-indigo-100">
          <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
            </path>
          </svg>
        </div>

        <p class="mb-4 text-gray-600">
          {{ __('Before proceeding, please check your email for a verification link.') }}
        </p>

        <p class="mb-6 text-gray-600">
          {{ __('If you did not receive the email') }}, you can request a new one below.
        </p>

        <form method="POST" action="{{ route('verification.resend') }}">
          @csrf
          <button type="submit"
            class="w-full transform rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 px-4 py-3 font-medium text-white shadow-lg transition-all duration-200 hover:-translate-y-0.5 hover:from-indigo-600 hover:to-purple-700 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            {{ __('Resend Verification Email') }}
          </button>
        </form>
      </div>
    </div>

    <!-- Footer -->
    <div class="border-t border-gray-200 bg-gray-50 px-8 py-6 text-center">
      <p class="text-gray-600">
        {{ __('Need help?') }}
        <a href="{{ route('login') }}"
          class="font-medium text-indigo-600 transition-colors duration-200 hover:text-purple-600">
          {{ __('Back to login') }}
        </a>
      </p>
    </div>
  </div>
@endsection
