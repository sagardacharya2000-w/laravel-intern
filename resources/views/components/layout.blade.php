<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'OES') — Online Exam System</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Geist"', '"SF Pro Text"', 'system-ui', 'sans-serif'],
          },
        }
      }
    }
  </script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600&display=swap" rel="stylesheet">

  @stack('styles')
</head>
<body class="font-sans text-base text-slate-900 bg-white antialiased flex flex-col">

  @include('components.header')

  <main class="flex-1">
    @yield('content')
  </main>

  @include('components.footer')

  @stack('scripts')
</body>
</html>
