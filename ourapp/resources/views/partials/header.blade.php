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
