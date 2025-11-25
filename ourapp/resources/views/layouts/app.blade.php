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

    <main>
        @yield('content')
    </main>

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
