{{-- resources/views/kontak.blade.php --}}
@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-green-600 mb-8 text-center">☎ Hubungi Kami</h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Form Kontak -->
        <div class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                <span class="text-green-500 mr-3">📧</span>
                Kirim Pesan
            </h2>

            <form action="{{ url('/kontak') }}" method="POST">
                @csrf

                <!-- Nama -->
                <div class="mb-6">
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text"
                           id="nama"
                           name="nama"
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                           placeholder="Masukkan nama lengkap Anda">
                    @error('nama')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                    <input type="email"
                           id="email"
                           name="email"
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                           placeholder="nama@email.com">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subjek -->
                <div class="mb-6">
                    <label for="subjek" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                    <select id="subjek"
                            name="subjek"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
                        <option value="">Pilih subjek pesan</option>
                        <option value="konsultasi">Konsultasi Sampah</option>
                        <option value="teknisi">Masalah Teknis</option>
                        <option value="saran">Saran dan Kritik</option>
                        <option value="kerjasama">Peluang Kerjasama</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                    @error('subjek')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pesan -->
                <div class="mb-6">
                    <label for="pesan" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                    <textarea id="pesan"
                              name="pesan"
                              rows="6"
                              required
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                              placeholder="Tulis pesan Anda di sini..."></textarea>
                    @error('pesan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full bg-green-500 text-white py-3 px-6 rounded-lg hover:bg-green-600 transition duration-300 font-semibold">
                    📤 Kirim Pesan
                </button>
            </form>
        </div>

        <!-- Informasi Kontak -->
        <div class="space-y-8">
            <!-- Informasi Developer -->
            <div class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                    <span class="text-blue-500 mr-3">👨‍💻</span>
                    Informasi Developer
                </h2>

                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-lg mr-4">
                            <span class="text-blue-600 text-xl">📧</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Email Developer</h3>
                            <a href="mailto:developer@ecowaste.com" class="text-blue-600 hover:text-blue-700 transition">
                                developer@ecowaste.com
                            </a>
                            <p class="text-gray-600 text-sm mt-1">
                                Untuk pertanyaan teknis dan pengembangan aplikasi
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="bg-green-100 p-3 rounded-lg mr-4">
                            <span class="text-green-600 text-xl">🌐</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Website Project</h3>
                            <a href="https://github.com/ecowaste/sistem-pakar-sampah"
                               target="_blank"
                               class="text-green-600 hover:text-green-700 transition">
                                GitHub Repository
                            </a>
                            <p class="text-gray-600 text-sm mt-1">
                                Kode sumber dan dokumentasi proyek
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Media Sosial & GitHub -->
            <div class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                    <span class="text-purple-500 mr-3">🔗</span>
                    Media Sosial & GitHub
                </h2>

                <div class="grid grid-cols-2 gap-4">
                    <!-- GitHub -->
                    <a href="https://github.com/ecowaste"
                       target="_blank"
                       class="bg-gray-800 text-white p-4 rounded-lg hover:bg-gray-900 transition flex items-center justify-center group">
                        <div class="text-center">
                            <div class="text-2xl mb-2">🐙</div>
                            <span class="font-semibold group-hover:underline">GitHub</span>
                            <p class="text-gray-300 text-xs mt-1">@ecowaste</p>
                        </div>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://linkedin.com/company/ecowaste"
                       target="_blank"
                       class="bg-blue-600 text-white p-4 rounded-lg hover:bg-blue-700 transition flex items-center justify-center group">
                        <div class="text-center">
                            <div class="text-2xl mb-2">💼</div>
                            <span class="font-semibold group-hover:underline">LinkedIn</span>
                            <p class="text-blue-200 text-xs mt-1">EcoWaste</p>
                        </div>
                    </a>

                    <!-- Twitter -->
                    <a href="https://twitter.com/ecowaste"
                       target="_blank"
                       class="bg-sky-500 text-white p-4 rounded-lg hover:bg-sky-600 transition flex items-center justify-center group">
                        <div class="text-center">
                            <div class="text-2xl mb-2">🐦</div>
                            <span class="font-semibold group-hover:underline">Twitter</span>
                            <p class="text-sky-200 text-xs mt-1">@ecowaste</p>
                        </div>
                    </a>

                    <!-- Instagram -->
                    <a href="https://instagram.com/ecowaste"
                       target="_blank"
                       class="bg-pink-500 text-white p-4 rounded-lg hover:bg-pink-600 transition flex items-center justify-center group">
                        <div class="text-center">
                            <div class="text-2xl mb-2">📷</div>
                            <span class="font-semibold group-hover:underline">Instagram</span>
                            <p class="text-pink-200 text-xs mt-1">@ecowaste</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Informasi Cepat -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-green-800 mb-4 flex items-center">
                    <span class="text-green-600 mr-2">💡</span>
                    Informasi Cepat
                </h3>
                <div class="space-y-3 text-sm text-gray-700">
                    <div class="flex items-start">
                        <span class="text-green-500 mr-2">•</span>
                        <span>Response time: 1-2 hari kerja</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-green-500 mr-2">•</span>
                        <span>Untuk konsultasi teknis, sertakan screenshot jika ada</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-green-500 mr-2">•</span>
                        <span>Proyek open-source, kontribusi sangat diterima</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-green-500 mr-2">•</span>
                        <span>Dokumentasi lengkap tersedia di GitHub</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
@if(session('success'))
<div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-8 max-w-md mx-4">
        <div class="text-center">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="text-green-500 text-2xl">✅</span>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Pesan Terkirim!</h3>
            <p class="text-gray-600 mb-6">{{ session('success') }}</p>
            <button onclick="closeModal()"
                    class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
    function closeModal() {
        document.getElementById('successModal').style.display = 'none';
    }

    // Auto close modal after 5 seconds
    setTimeout(closeModal, 5000);
</script>
@endif
@endsection
