@extends('layouts.admin')

@section('title', 'Tambah Knowledge Base')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Tambah Data Knowledge Base</h1>
    <p class="text-gray-600">Tambahkan data jenis sampah baru</p>
</div>

<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <form action="{{ route('admin.knowledge.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Basic Information -->
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Sampah</label>
                    <input type="text" name="jenis_sampah" value="{{ old('jenis_sampah') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Icon</label>
                    <input type="text" name="icon" value="{{ old('icon') }}" placeholder="🍃"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                           required>
                    <p class="text-sm text-gray-500 mt-1">Gunakan emoji sebagai icon</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="kategori" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $key => $value)
                            <option value="{{ $key }}" {{ old('kategori') == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Ciri-ciri -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-800">Ciri-ciri</h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tekstur</label>
                    <input type="text" name="ciri_tekstur" value="{{ old('ciri_tekstur') }}" placeholder="Lembek/basah"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Bau</label>
                    <input type="text" name="ciri_bau" value="{{ old('ciri_bau') }}" placeholder="Berbau"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Asal</label>
                    <input type="text" name="ciri_asal" value="{{ old('ciri_asal') }}" placeholder="Sisa makanan/tumbuhan"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                           required>
                </div>
            </div>
        </div>

        <!-- Pengelolaan & Deskripsi -->
        <div class="mt-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Cara Pengelolaan</label>
                <input type="text" name="pengelolaan" value="{{ old('pengelolaan') }}" placeholder="Kompos atau biogas"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="3"
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                          required>{{ old('deskripsi') }}</textarea>
            </div>
        </div>

        <!-- Langkah-langkah -->
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Langkah-langkah Penanganan</label>
            <div id="steps-container" class="space-y-2">
                @if(old('langkah_langkah'))
                    @foreach(old('langkah_langkah') as $index => $step)
                        <div class="flex items-center">
                            <input type="text" name="langkah_langkah[]" value="{{ $step }}"
                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                   placeholder="Langkah penanganan...">
                            <button type="button" onclick="removeStep(this)" class="ml-2 text-red-500 hover:text-red-700">
                                ❌
                            </button>
                        </div>
                    @endforeach
                @else
                    <div class="flex items-center">
                        <input type="text" name="langkah_langkah[]"
                               class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                               placeholder="Langkah penanganan...">
                    </div>
                @endif
            </div>
            <button type="button" onclick="addStep()" class="mt-2 text-green-600 hover:text-green-800 font-medium">
                ➕ Tambah Langkah
            </button>
        </div>

        <!-- Submit Buttons -->
        <div class="mt-8 flex space-x-4">
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg font-medium">
                Simpan Data
            </button>
            <a href="{{ route('admin.knowledge.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg font-medium">
                Batal
            </a>
        </div>
    </form>
</div>

<script>
    function addStep() {
        const container = document.getElementById('steps-container');
        const div = document.createElement('div');
        div.className = 'flex items-center';
        div.innerHTML = `
            <input type="text" name="langkah_langkah[]"
                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                   placeholder="Langkah penanganan...">
            <button type="button" onclick="removeStep(this)" class="ml-2 text-red-500 hover:text-red-700">
                ❌
            </button>
        `;
        container.appendChild(div);
    }

    function removeStep(button) {
        button.parentElement.remove();
    }
</script>
@endsection
