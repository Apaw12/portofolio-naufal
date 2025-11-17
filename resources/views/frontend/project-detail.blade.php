<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white">

    <header class="p-6 border-b border-gray-900">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-white-600">His Majesty's Project</a>
            <nav>
                <a href="{{ route('home') }}#projects" class="mx-3 hover:text-red-500">Projects</a>
                <a href="{{ route('home') }}#blog" class="mx-3 hover:text-red-500">Blog</a>
                <a href="{{ route('dashboard') }}" class="mx-3 text-sm border px-3 py-1 rounded hover:bg-red-700 border-red-700 transition">Admin Panel</a>
            </nav>
        </div>
    </header>

    <main class="max-w-4xl mx-auto p-6">
        
        <a href="{{ route('home') }}#projects" class="inline-block text-red-600 hover:text-red-500 mb-6">&larr; Kembali ke Home</a>

        <h1 class="text-4xl font-extrabold text-red-600 mb-4">{{ $project->title }}</h1>

        @if ($project->image)
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-auto object-cover rounded-lg mb-6 shadow-xl">
        @endif

        <div class="bg-gray-950 p-6 rounded-lg mb-6">
            <h3 class="text-xl font-semibold mb-4">Project Info</h3>
            <p class="mb-2"><strong>Teknologi:</strong> <span class="text-gray-300">{{ implode(', ', $project->technologies) }}</span></p>
            @if ($project->repo_url)
                <p class="mb-2"><strong>GitHub Repo:</strong> <a href="{{ $project->repo_url }}" target="_blank" class="text-red-500 hover:underline">Lihat Kode</a></p>
            @endif
            @if ($project->project_url)
                <p><strong>Demo Live:</strong> <a href="{{ $project->project_url }}" target="_blank" class="text-red-500 hover:underline">Lihat Demo</a></p>
            @endif
        </div>

        <div class="prose prose-invert max-w-none text-gray-300">
            <h3 class="text-xl font-semibold mb-4 text-white">Deskripsi Lengkap:</h3>
            <p>{{ $project->description }}</p>
        </div>

    </main>
</body>
</html>