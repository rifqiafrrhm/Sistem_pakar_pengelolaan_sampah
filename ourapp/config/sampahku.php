<?php
// ============================================
// KONFIGURASI APLIKASI SAMPAHKU - EDIT DI SINI
// ============================================

return [
    // Informasi Aplikasi
    'app_name' => "SampahKu",
    'app_tagline' => "Sistem Pakar Pengelolaan Sampah",

    // Hero Section
    'hero' => [
        'title' => "Sistem Pakar Pengelolaan Sampah",
        'subtitle' => "Dapatkan rekomendasi jenis sampah dan cara pengelolaan yang tepat.",
        'button_text' => "Mulai Konsultasi",
        'icon' => "🗑️♻️🌱"
    ],

    // Menu Navigasi
    'menu_items' => [
        ["name" => "Beranda", "link" => "/"],
        ["name" => "Konsultasi", "link" => "/konsultasi"],
        ["name" => "Edukasi Sampah", "link" => "/edukasi"],
        ["name" => "Tentang", "link" => "/tentang"],
        ["name" => "Kontak", "link" => "/kontak"]
    ],

    // Fitur Utama
    'features' => [
        [
            "icon" => "🔍",
            "title" => "Deteksi Jenis Sampah",
            "description" => "Identifikasi jenis sampah dengan mudah dan akurat"
        ],
        [
            "icon" => "♻️",
            "title" => "Rekomendasi Pengelolaan",
            "description" => "Panduan lengkap cara mengelola sampah dengan benar"
        ],
        [
            "icon" => "📚",
            "title" => "Edukasi Lingkungan",
            "description" => "Pelajari pentingnya pengelolaan sampah untuk lingkungan"
        ],
        [
            "icon" => "📋",
            "title" => "Riwayat Konsultasi",
            "description" => "Simpan dan lihat kembali hasil konsultasi Anda"
        ]
    ],

    // Edukasi Jenis Sampah
    'waste_types' => [
        [
            "icon" => "🍃",
            "type" => "Organik",
            "description" => "Sampah yang berasal dari makhluk hidup dan mudah terurai",
            "examples" => "Sisa makanan, daun, ranting"
        ],
        [
            "icon" => "🥤",
            "type" => "Anorganik",
            "description" => "Sampah yang sulit terurai dan dapat didaur ulang",
            "examples" => "Plastik, kaca, logam, kertas"
        ],
        [
            "icon" => "⚠️",
            "type" => "B3 (Berbahaya)",
            "description" => "Sampah yang mengandung bahan berbahaya dan beracun",
            "examples" => "Baterai, lampu neon, limbah medis"
        ]
    ],

    // Footer
    'footer' => [
        'text' => "© 2024 SampahKu - Sistem Pakar Pengelolaan Sampah. All rights reserved.",
        'email' => "info@sampahku.com",
        'github' => "https://github.com/yourusername/sampahku"
    ]
];
