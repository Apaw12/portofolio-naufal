<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Naufal</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="video-background">
        <video autoplay loop muted playsinline>
            <source src="{{ asset('videos/background.mp4') }}" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
    </div>

    <header class="main-header">
        <div class="container">
            <h1 class="logo">Naufal Portfolio</h1>
            <nav class="main-nav">
                <a href="#projects">Projects</a>
                <a href="#blog">Blog</a>
                <a href="{{ route('dashboard') }}" class="nav-button">Admin Panel</a>
            </nav>
        </div>
    </header>

    <main class="container">
        
        <section class="hero" id="hero">
            <div class="hero-text">
                <h2 class="hero-title">HI!, Selamat datang Teman!</h2>
                <p class="hero-subtitle">Ini adalah portofolio Naufal Atillah. Selamat datang di halaman saya, silakan lihat project dan baca tulisan saya di bawah.</p>
            </div>
            <div class="hero-image">
                <img src="{{ asset('images/ganteng.jpg') }}" alt="Foto Naufal">
            </div>
        </section>
        
        <section class="projects-section" id="projects">
            <h3 class="section-title">Featured Projects ({{ $featured_projects->count() }})</h3>
            <div class="grid-3-col">
                @forelse ($featured_projects as $project)
                    <div class="card">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="card-image">
                        @endif
                        <div class="card-content">
                            <h4 class="card-title">{{ $project->title }}</h4>
                            <p class="card-excerpt">{{ Str::limit($project->description, 80) }}</p>
                            <p class="card-tech">Tech: {{ implode(', ', $project->technologies) }}</p>
                            <a href="{{ route('project.show', $project->slug) }}" class="card-link">Lihat Detail &rarr;</a>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Belum ada Project yang ditandai sebagai featured.</p>
                @endforelse
            </div>
        </section>

        <section class="blog-section" id="blog">
            <h3 class="section-title">Postingan Terbaru ({{ $recent_posts->count() }})</h3>
            <div class="grid-3-col">
                @forelse ($recent_posts as $post)
                    <div class="card">
                        <div class="card-content">
                            <span class="card-category">{{ $post->category->name }}</span>
                            <h4 class="card-title">{{ $post->title }}</h4>
                            <p class="card-excerpt">{{ Str::limit($post->excerpt, 100) }}</p>
                            
                            <div class="author-bio">
                                <img src="{{ asset('images/ganteng.jpg') }}" alt="Foto Naufal" class="author-avatar">
                                <p class="author-name">Oleh: {{ $post->user->name }}</p>
                            </div>
                            
                            <a href="{{ route('post.show', $post->slug) }}" class="card-link">Baca Selengkapnya &rarr;</a>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Belum ada Postingan yang dipublikasikan.</p>
                @endforelse
            </div>
        </section>
        
    </main>
</body>
</html>