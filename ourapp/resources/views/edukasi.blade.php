@extends('layouts.app')

@section('title', 'Edukasi Sampah')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-green-600 mb-8 text-center">📚 Edukasi Pengelolaan Sampah</h1>

    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Kategori Sampah</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-green-50 border border-green-200 rounded-lg p-6 shadow-sm">
                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mb-4">
                    <span class="text-white text-2xl">🍂</span>
                </div>
                <h3 class="text-xl font-semibold text-green-700 mb-3">Sampah Organik</h3>
                <p class="text-gray-600 mb-4">
                    Sampah yang berasal dari makhluk hidup dan dapat terurai secara alami.
                </p>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>• Sisa makanan</li>
                    <li>• Daun-daunan</li>
                    <li>• Kayu</li>
                    <li>• Kertas</li>
                </ul>
            </div>

            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 shadow-sm">
                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mb-4">
                    <span class="text-white text-2xl">🧴</span>
                </div>
                <h3 class="text-xl font-semibold text-blue-700 mb-3">Sampah Anorganik</h3>
                <p class="text-gray-600 mb-4">
                    Sampah yang tidak dapat terurai secara alami oleh mikroorganisme.
                </p>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>• Plastik</li>
                    <li>• Kaca</li>
                    <li>• Logam</li>
                    <li>• Karet</li>
                </ul>
            </div>

            <div class="bg-red-50 border border-red-200 rounded-lg p-6 shadow-sm">
                <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mb-4">
                    <span class="text-white text-2xl">⚠️</span>
                </div>
                <h3 class="text-xl font-semibold text-red-700 mb-3">Sampah B3</h3>
                <p class="text-gray-600 mb-4">
                    Sampah Berbahaya dan Beracun yang memerlukan penanganan khusus.
                </p>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>• Baterai</li>
                    <li>• Lampu neon</li>
                    <li>• Obat kadaluarsa</li>
                    <li>• Pestisida</li>
                </ul>
            </div>

            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 shadow-sm">
                <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center mb-4">
                    <span class="text-white text-2xl">♻️</span>
                </div>
                <h3 class="text-xl font-semibold text-yellow-700 mb-3">Daur Ulang</h3>
                <p class="text-gray-600 mb-4">
                    Proses mengolah kembali sampah menjadi produk yang bernilai.
                </p>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>• Plastik → produk baru</li>
                    <li>• Kertas → kertas daur ulang</li>
                    <li>• Kaca → wadah baru</li>
                    <li>• Logam → produk metal</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Diagram Jenis Sampah</h2>
        <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="mb-6 md:mb-0 md:w-1/3">
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-green-500 rounded mr-3"></div>
                            <span class="text-gray-700">Organik (45%)</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-blue-500 rounded mr-3"></div>
                            <span class="text-gray-700">Anorganik (35%)</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-red-500 rounded mr-3"></div>
                            <span class="text-gray-700">B3 (5%)</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-yellow-500 rounded mr-3"></div>
                            <span class="text-gray-700">Daur Ulang (15%)</span>
                        </div>
                    </div>
                </div>

                <div class="md:w-2/3">
                    <div class="bg-gray-100 rounded-lg p-4">
                        <div class="flex items-end justify-center h-32 space-x-2">
                            <div class="flex flex-col items-center">
                                <div class="w-8 bg-green-500 rounded-t" style="height: 80px;"></div>
                                <span class="text-xs mt-1">Organik</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="w-8 bg-blue-500 rounded-t" style="height: 60px;"></div>
                                <span class="text-xs mt-1">Anorganik</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="w-8 bg-yellow-500 rounded-t" style="height: 30px;"></div>
                                <span class="text-xs mt-1">Daur Ulang</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="w-8 bg-red-500 rounded-t" style="height: 15px;"></div>
                                <span class="text-xs mt-1">B3</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-12">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Artikel Edukasi</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <article class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm hover:shadow-md transition-shadow">
                <h3 class="text-xl font-semibold text-green-700 mb-3">Cara Memilah Sampah di Rumah</h3>
                <p class="text-gray-600 mb-4">
                    Memilah sampah di rumah adalah langkah pertama yang penting dalam pengelolaan sampah yang bertanggung jawab.
                </p>
                <div class="space-y-2 text-gray-700">
                    <p><strong>Langkah-langkah:</strong></p>
                    <ol class="list-decimal list-inside space-y-1 text-sm">
                        <li>Sediakan 3 tempat sampah terpisah</li>
                        <li>Pisahkan sampah organik dan anorganik</li>
                        <li>Bersihkan kemasan sebelum dibuang</li>
                        <li>Kumpulkan sampah B3 secara terpisah</li>
                        <li>Bawa ke bank sampah atau TPS terdekat</li>
                    </ol>
                </div>
            </article>

            <article class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm hover:shadow-md transition-shadow">
                <h3 class="text-xl font-semibold text-green-700 mb-3">Manfaat Daur Ulang untuk Lingkungan</h3>
                <p class="text-gray-600 mb-4">
                    Daur ulang tidak hanya mengurangi sampah, tetapi juga memberikan banyak manfaat bagi lingkungan dan ekonomi.
                </p>
                <div class="space-y-2 text-gray-700">
                    <p><strong>Manfaat Utama:</strong></p>
                    <ul class="list-disc list-inside space-y-1 text-sm">
                        <li>Mengurangi polusi udara dan air</li>
                        <li>Menghemat energi dan sumber daya alam</li>
                        <li>Mengurangi kebutuhan lahan TPA</li>
                        <li>Menciptakan lapangan kerja baru</li>
                        <li>Mengurangi emisi gas rumah kaca</li>
                    </ul>
                </div>
            </article>
        </div>
    </section>

    <section class="bg-green-50 border border-green-200 rounded-lg p-6">
        <h3 class="text-xl font-semibold text-green-700 mb-4">💡 Tips Praktis</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
            <div class="flex items-start">
                <span class="text-green-500 mr-2">•</span>
                <span>Gunakan kantong belanja reusable untuk mengurangi plastik</span>
            </div>
            <div class="flex items-start">
                <span class="text-green-500 mr-2">•</span>
                <span>Kompos sampah organik untuk pupuk tanaman</span>
            </div>
            <div class="flex items-start">
                <span class="text-green-500 mr-2">•</span>
                <span>Pilih produk dengan kemasan yang dapat didaur ulang</span>
            </div>
            <div class="flex items-start">
                <span class="text-green-500 mr-2">•</span>
                <span>Ikuti program bank sampah di lingkungan Anda</span>
            </div>
        </div>
    </section>
</div>
@endsection
