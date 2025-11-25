<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Admin Header -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('admin.knowledge.index') }}" class="text-xl font-bold text-green-600">
                    🌱 EcoWaste Admin
                </a>
                <nav class="flex space-x-6">
                    <a href="{{ route('admin.knowledge.index') }}"
                       class="text-gray-600 hover:text-green-600 font-medium">
                        Knowledge Base
                    </a>
                    <a href="{{ route('home') }}"
                       class="text-gray-600 hover:text-green-600 font-medium">
                        Kembali ke Site
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg">
            ❌ {{ $errors->first() }}
        </div>
    @endif
</body>
</html>
