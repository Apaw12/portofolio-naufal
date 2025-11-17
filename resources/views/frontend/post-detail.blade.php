<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white">

    <header class="p-6 border-b border-gray-900">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-red-600">POST & BLOG</a>
            <nav>
                <a href="{{ route('home') }}#projects" class="mx-3 hover:text-red-500">Projects</a>
                <a href="{{ route('home') }}#blog" class="mx-3 hover:text-red-500">Blog</a>
                <a href="{{ route('dashboard') }}" class="mx-3 text-sm border px-3 py-1 rounded hover:bg-red-700 border-red-700 transition">Admin Panel</a>
            </nav>
        </div>
    </header>

    <main class="max-w-4xl mx-auto p-6">
        
        <a href="{{ route('home') }}#blog" class="inline-block text-red-600 hover:text-red-500 mb-6">&larr; Kembali ke Home</a>

        <h1 class="text-4xl font-extrabold mb-4">{{ $post->title }}</h1>
        
        <div class="flex items-center text-gray-400 mb-6">
            <img src="{{ asset('images/ganteng.jpg') }}" alt="Foto Naufal" class="w-12 h-12 rounded-full mr-4 object-cover border-4 border-red-700 shadow-lg shadow-red-900/60">
            
            <div>
                Ditulis oleh <span class="font-semibold text-red-600">{{ $post->user->name }}</span> 
                <br>
                dalam Kategori <span class="font-semibold text-red-600">{{ $post->category->name }}</span>
            </div>
        </div>

        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover rounded-lg mb-6 shadow-xl">
        @endif

        <div class="mt-8 text-gray-300 text-lg leading-relaxed whitespace-pre-wrap">
            {{ $post->body }}
        </div>

    </main>
</body>
</html>