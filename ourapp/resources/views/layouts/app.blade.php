<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('sampahku.app_name')) - {{ config('sampahku.app_tagline') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css'])
</head>
<body>

@include('partials.header')

    <main>
        @yield('content')
    </main>

@include('partials.footer')

    @vite(['resources/js/app.js'])
</body>
</html>
