@extends('layouts.admin')

@section('title', 'Knowledge Base Management')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Knowledge Base Management</h1>
    <p class="text-gray-600">Kelola data pengetahuan sistem pakar</p>
</div>

<div class="bg-white rounded-lg shadow-sm border border-gray-200">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Daftar Jenis Sampah</h2>
            <a href="{{ route('admin.knowledge.create') }}"
               class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium">
                ➕ Tambah Data
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis Sampah</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pengelolaan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($knowledge as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <span class="text-2xl mr-3">{{ $item->icon }}</span>
                                <div>
                                    <div class="font-medium text-gray-900">{{ $item->jenis_sampah }}</div>
                                    <div class="text-sm text-gray-500">{{ Str::limit($item->deskripsi, 50) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $item->kategori == 'organik' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $item->kategori == 'anorganik' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $item->kategori == 'b3' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ ucfirst($item->kategori) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $item->pengelolaan }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $item->aktif ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $item->aktif ? 'Aktif' : 'Non-Aktif' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.knowledge.edit', $item->id) }}"
                                   class="text-blue-600 hover:text-blue-900 font-medium">Edit</a>
                                <form action="{{ route('admin.knowledge.toggle-status', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-orange-600 hover:text-orange-900 font-medium">
                                        {{ $item->aktif ? 'Non-Aktifkan' : 'Aktifkan' }}
                                    </button>
                                </form>
                                <form action="{{ route('admin.knowledge.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:text-red-900 font-medium"
                                            onclick="return confirm('Hapus data ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada data knowledge base
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
