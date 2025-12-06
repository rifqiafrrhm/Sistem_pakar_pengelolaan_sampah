@extends('layouts.app')

@section('title', 'Tentang Aplikasi')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-green-600 mb-8 text-center">🧾 Tentang Aplikasi</h1>

    <section class="mb-12">
        <div class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                <span class="text-green-500 mr-3">🎯</span>
                Tujuan Aplikasi
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="bg-green-100 p-2 rounded-lg mr-4">
                            <span class="text-green-600 text-xl">🌱</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-2">Edukasi Pengelolaan Sampah</h3>
                            <p class="text-gray-600 text-sm">
                                Memberikan pengetahuan tentang klasifikasi sampah, cara pemilahan,
                                dan teknik pengelolaan yang benar kepada masyarakat.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="bg-blue-100 p-2 rounded-lg mr-4">
                            <span class="text-blue-600 text-xl">🤖</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-2">Sistem Pakar Konsultasi</h3>
                            <p class="text-gray-600 text-sm">
                                Menyediakan platform konsultasi cerdas untuk membantu pengguna
                                dalam mengidentifikasi jenis sampah dan solusi penanganannya.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="bg-yellow-100 p-2 rounded-lg mr-4">
                            <span class="text-yellow-600 text-xl">♻️</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-2">Promosi Daur Ulang</h3>
                            <p class="text-gray-600 text-sm">
                                Mendorong praktik daur ulang dan pengurangan sampah melalui
                                informasi yang mudah dipahami dan diterapkan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-12">
        <div class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                <span class="text-blue-500 mr-3">⚙️</span>
                Teknologi yang Digunakan
            </h2>

            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Backend Development</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-center">
                        <div class="text-3xl mb-2">🐘</div>
                        <h4 class="font-semibold text-gray-800">PHP</h4>
                        <p class="text-sm text-gray-600 mt-2">
                            Bahasa pemrograman server-side untuk logika bisnis dan pengolahan data.
                        </p>
                    </div>

                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-center">
                        <div class="text-3xl mb-2">🗃️</div>
                        <h4 class="font-semibold text-gray-800">MySQL</h4>
                        <p class="text-sm text-gray-600 mt-2">
                            Database management system untuk menyimpan data aturan, pengetahuan, dan pengguna.
                        </p>
                    </div>

                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-center">
                        <div class="text-3xl mb-2">🚀</div>
                        <h4 class="font-semibold text-gray-800">Laravel Framework</h4>
                        <p class="text-sm text-gray-600 mt-2">
                            PHP framework modern untuk pengembangan aplikasi web yang cepat dan aman.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Metode Sistem Pakar</h3>
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-lg mr-4">
                            <span class="text-blue-600 text-2xl">🔍</span>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-blue-800 mb-2">Forward Chaining</h4>
                            <p class="text-gray-700 mb-3">
                                Metode inferensi yang dimulai dari fakta-fakta yang diketahui menuju
                                kesimpulan menggunakan aturan-aturan (rules) yang telah ditetapkan.
                            </p>
                            <div class="bg-white rounded-lg p-4 border border-blue-100">
                                <h5 class="font-semibold text-gray-800 mb-2">Cara Kerja Forward Chaining:</h5>
                                <ol class="list-decimal list-inside space-y-1 text-sm text-gray-700">
                                    <li>Pengguna memasukkan gejala/fakta tentang sampah</li>
                                    <li>Sistem memeriksa aturan yang sesuai dengan fakta</li>
                                    <li>Menghasilkan kesimpulan berdasarkan aturan yang terpenuhi</li>
                                    <li>Memberikan rekomendasi penanganan yang tepat</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Frontend Development</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-center">
                        <div class="text-3xl mb-2">🎨</div>
                        <h4 class="font-semibold text-gray-800">Tailwind CSS</h4>
                        <p class="text-sm text-gray-600 mt-2">
                            CSS framework utility-first untuk desain yang responsif dan modern.
                        </p>
                    </div>

                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-center">
                        <div class="text-3xl mb-2">⚡</div>
                        <h4 class="font-semibold text-gray-800">JavaScript</h4>
                        <p class="text-sm text-gray-600 mt-2">
                            Untuk interaktivitas dan pengalaman pengguna yang lebih baik.
                        </p>
                    </div>

                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-center">
                        <div class="text-3xl mb-2">📱</div>
                        <h4 class="font-semibold text-gray-800">Responsive Design</h4>
                        <p class="text-sm text-gray-600 mt-2">
                            Desain yang optimal untuk desktop, tablet, dan mobile devices.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-12">
        <div class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                <span class="text-purple-500 mr-3">👥</span>
                Tim Pengembang
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Developer -->
                <div class="text-center bg-purple-50 rounded-lg p-6 border border-purple-200">
                    <div class="w-20 h-20 bg-purple-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <span class="text-white text-2xl">👨‍🏫</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Nama Developer</h3>
                    <p class="text-purple-600 text-sm mb-3">Full Stack Developer</p>
                    <p class="text-gray-600 text-sm mb-4">
                        Bertanggung jawab dalam pengembangan aplikasi, implementasi sistem pakar,
                        dan integrasi database.
                    </p>
                    <div class="flex justify-center space-x-3">
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs">PHP</span>
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs">Laravel</span>
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs">MySQL</span>
                    </div>
                </div>

                <!-- Dosen Pembimbing 1 -->
                <div class="text-center bg-green-50 rounded-lg p-6 border border-green-200">
                    <div class="w-20 h-20 bg-green-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <span class="text-white text-2xl">👨‍🏫</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Dr. Ahmad Rahman, M.Kom</h3>
                    <p class="text-green-600 text-sm mb-3">Dosen Pembimbing 1</p>
                    <p class="text-gray-600 text-sm mb-4">
                        Pembimbing dalam bidang kecerdasan buatan dan sistem pakar.
                        Memberikan guidance dalam implementasi forward chaining.
                    </p>
                    <div class="flex justify-center space-x-3">
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">AI Expert</span>
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">Research</span>
                    </div>
                </div>

                <!-- Dosen Pembimbing 2 -->
                <div class="text-center bg-blue-50 rounded-lg p-6 border border-blue-200">
                    <div class="w-20 h-20 bg-blue-500 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <span class="text-white text-2xl">👩‍🏫</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Prof. Siti Marlina, M.T</h3>
                    <p class="text-blue-600 text-sm mb-3">Dosen Pembimbing 2</p>
                    <p class="text-gray-600 text-sm mb-4">
                        Pembimbing dalam bidang rekayasa perangkat lunak dan manajemen proyek.
                        Memastikan kualitas dan metodologi pengembangan.
                    </p>
                    <div class="flex justify-center space-x-3">
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs">Software Eng</span>
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs">Project Mgmt</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="bg-gradient-to-r from-green-500 to-blue-500 rounded-lg p-8 text-white">
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-4">Sistem Pakar Pengelolaan Sampah</h2>
                <p class="text-lg mb-6 opacity-90">
                    Aplikasi ini dikembangkan sebagai bagian dari tugas akhir dalam mata kuliah
                    Pemprograman Web dan Kecerdasan Buatan untuk mendukung pengelolaan sampah yang berkelanjutan.
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-sm">
                    <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">📅 Tahun 2025</div>
                    <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">🎓 Program Studi Teknik Komputer</div>
                    <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">🏫 Universitas Negeri Makassar</div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
