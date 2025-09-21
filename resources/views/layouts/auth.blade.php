<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title ?? 'Authentication' }} - {{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Inter:400,500,600,700" rel="stylesheet">

  <!-- Scripts and Styles -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Additional head content -->
  @stack('head')
</head>

<body class="font-sans">
  <div
    class="flex min-h-screen items-center justify-center bg-gradient-to-br from-indigo-500 via-purple-500 to-indigo-600 p-4">
    <div class="w-full max-w-md">
      @yield('content')
    </div>
  </div>

  <!-- Scripts -->
  @stack('scripts')

  <script>
    // Add some interactive enhancements
    document.addEventListener('DOMContentLoaded', function() {
      // Form validation feedback
      const forms = document.querySelectorAll('form');
      forms.forEach(form => {
        form.addEventListener('submit', function(e) {
          const submitBtn = form.querySelector('button[type="submit"]');
          if (submitBtn) {
            submitBtn.classList.add('opacity-75', 'pointer-events-none');
            submitBtn.innerHTML = submitBtn.innerHTML +
              ' <div class="inline-block w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin ml-2"></div>';
          }
        });
      });

      // Enhanced focus states for inputs
      const inputs = document.querySelectorAll('input[type="email"], input[type="password"], input[type="text"]');
      inputs.forEach(input => {
        input.addEventListener('focus', function() {
          this.parentNode.classList.add('transform', 'scale-[1.01]');
        });

        input.addEventListener('blur', function() {
          this.parentNode.classList.remove('transform', 'scale-[1.01]');
        });
      });
    });
  </script>
</body>

</html>
