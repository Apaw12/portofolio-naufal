<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Naufal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white font-sans">
    <div class="fixed top-0 left-0 w-full h-full -z-10">
    
    <video autoplay loop muted playsinline class="w-full h-full object-cover hidden md:block">
        <source src="{{ asset('videos/vecteezy_red-color-glowing-red-color-bright-light-with-optical-lens_34769651.mp4') }}" type="video/mp4">
    </video>
    
    <div class="absolute top-0 left-0 w-full h-full bg-black md:bg-black/70"></div>
</div>

    <header class="p-6 border-b border-gray-900">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-red-900">This, MY ART!</h1>
            <nav>
                <a href="#projects" class="mx-3 hover:text-red-500">Projects</a>
                <a href="#blog" class="mx-3 hover:text-red-500">Blog</a>
                <a href="{{ route('dashboard') }}" class="mx-3 text-sm border px-3 py-1 rounded hover:bg-red-700 border-red-700 transition">Admin Panel</a>
            </nav>
        </div>
    </header>

    <main class="max-w-7xl mx-auto p-6">
        
        <section id="hero" class="mb-16 flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-2/3">
                <h2 class="text-4xl font-extrabold mb-4 font-orbitron">Welcome son!!</h2>
                <p class="text-xl text-gray-400">This is Naufal Atillah's portfolio. Welcome to my page. Please check out my projects and read my writing below.</p>
            </div>
            <div class="md:w-1/3 mt-6 md:mt-0 flex justify-center md:justify-end">
                <img src="{{ asset('images/ganteng.jpg') }}" alt="Foto Naufal" class="w-48 h-48 rounded-full object-cover shadow-xl border-4 border-red-700 shadow-lg shadow-red-900/60">
            </div>
        </section>
        
        <section id="projects" class="mb-16">
            <h3 class="text-3xl font-semibold border-b border-red-700 pb-2 mb-6 font-orbitron">Featured Projects (...)</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse ($featured_projects as $project)
                    <div class="bg-gray-950 p-4 rounded-lg shadow-xl shadow-red-950/30 transition-all hover:shadow-red-800/40 hover:scale-[1.02]">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-40 object-cover rounded mb-4">
                        @endif
                       <h4 class="text-xl font-bold text-red-600 font-orbitron">{{ $project->title }}</h4>
                        <p class="text-gray-400 mt-2">{{ Str::limit($project->description, 80) }}</p>
                        <p class="text-xs text-gray-500 mt-2">Tech: {{ implode(', ', $project->technologies) }}</p>
                        <a href="{{ route('project.show', $project->slug) }}" class="mt-3 inline-block text-sm text-red-500 hover:text-red-600">Lihat Detail &rarr;</a>
                    </div>
                @empty
                    <p class="col-span-3 text-gray-400">Belum ada Project yang ditandai sebagai featured.</p>
                @endforelse
            </div>
        </section>

        <section id="blog">
            <h3 class="text-3xl font-semibold border-b border-red-700 pb-2 mb-6">Latest Post ({{ $recent_posts->count() }})</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($recent_posts as $post)
                    <div class="bg-gray-950 p-4 rounded-lg shadow-xl shadow-red-950/30 transition-all hover:shadow-red-800/40 hover:scale-[1.02]">
                        <span class="text-xs text-red-600">{{ $post->category->name }}</span>
                        <h4 class="text-xl font-bold mt-1">{{ $post->title }}</h4>
                        <p class="text-gray-400 mt-2">{{ Str::limit($post->excerpt, 100) }}</p>
                        
                        <div class="flex items-center mt-3">
                            <img src="{{ asset('images/ganteng.jpg') }}" alt="Foto Naufal" class="w-8 h-8 rounded-full mr-2 object-cover">
                            <p class="text-xs text-gray-500">Oleh: {{ $post->user->name }}</p>
                        </div>
                        
                        <a href="{{ route('post.show', $post->slug) }}" class="mt-3 inline-block text-sm text-red-500 hover:text-red-600">Baca Selengkapnya &rarr;</a>
                    </div>
                @empty
                    <p class="text-gray-400">Belum ada Postingan yang dipublikasikan.</p>
                @endforelse
            </div>
        </section>
        
    </main>
</body>
</html>