<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('sampahku.app_name')) - {{ config('sampahku.app_tagline') }}</title>

    @vite(['resources/css/app.css'])
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container nav-container">
            <a href="{{ url('/') }}" class="logo">
                <span>♻️</span>
                <span>{{ config('sampahku.app_name') }}</span>
            </a>
            <ul class="nav-menu">
                @foreach(config('sampahku.menu_items') as $item)
                    <li><a href="{{ url($item['link']) }}">{{ $item['name'] }}</a></li>
                @endforeach
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <p>{{ config('sampahku.footer.text') }}</p>
            <div class="footer-links">
                <a href="mailto:{{ config('sampahku.footer.email') }}">📧 {{ config('sampahku.footer.email') }}</a>
                <a href="{{ config('sampahku.footer.github') }}" target="_blank">🔗 GitHub</a>
            </div>
        </div>
    </footer>

    @vite(['resources/js/app.js'])
</body>
</html>
