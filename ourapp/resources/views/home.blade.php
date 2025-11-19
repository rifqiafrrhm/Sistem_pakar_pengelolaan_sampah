@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-icon">{{ config('sampahku.hero.icon') }}</div>
            <h1>{{ config('sampahku.hero.title') }}</h1>
            <p>{{ config('sampahku.hero.subtitle') }}</p>
            <a href="{{ url('/konsultasi') }}" class="btn-primary">{{ config('sampahku.hero.button_text') }}</a>
        </div>
    </section>

    <!-- Fitur Utama -->
    <section class="section">
        <h2 class="section-title">Fitur Utama</h2>
        <div class="features-grid">
            @foreach(config('sampahku.features') as $feature)
                <div class="feature-card">
                    <div class="feature-icon">{{ $feature['icon'] }}</div>
                    <h3>{{ $feature['title'] }}</h3>
                    <p>{{ $feature['description'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Edukasi Sampah -->
    <section class="section edukasi-section">
        <h2 class="section-title">Jenis-Jenis Sampah</h2>
        <div class="waste-types">
            @foreach(config('sampahku.waste_types') as $waste)
                <div class="waste-card">
                    <div class="waste-icon">{{ $waste['icon'] }}</div>
                    <h3>{{ $waste['type'] }}</h3>
                    <p class="description">{{ $waste['description'] }}</p>
                    <p class="examples"><strong>Contoh:</strong> {{ $waste['examples'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Tentang -->
    <section class="section">
        <h2 class="section-title">Tentang Sistem</h2>
        <div style="max-width: 800px; margin: 0 auto; text-align: center; color: var(--text-light);">
            <p style="font-size: 1.1rem; line-height: 1.8;">
                Sistem Pakar Pengelolaan Sampah adalah aplikasi berbasis web yang dirancang untuk membantu masyarakat
                dalam mengenali jenis sampah dan memberikan rekomendasi pengelolaan yang tepat. Dengan teknologi
                sistem pakar, kami berkomitmen untuk meningkatkan kesadaran lingkungan dan mendukung program
                pengelolaan sampah yang berkelanjutan.
            </p>
        </div>
    </section>
@endsection
