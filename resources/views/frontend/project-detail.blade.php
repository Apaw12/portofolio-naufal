<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="video-background">
        <video autoplay loop muted playsinline>
            <source src="{{ asset('videos/vecteezy_red-color-abstract-digital-background_23936261.mp4') }}" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
    </div>

    <header class="main-header">
        <div class="container">
            <a href="{{ route('home') }}" class="logo">Naufal Portfolio</a>
            <nav class="main-nav">
                <a href="{{ route('home') }}#projects">Projects</a>
                <a href="{{ route('home') }}#blog">Blog</a>
                <a href="{{ route('dashboard') }}" class="nav-button">Admin Panel</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="detail-page">
            <a href="{{ route('home') }}#projects" class="back-link">&larr; Kembali ke Home</a>

            <h1 class="detail-title">{{ $project->title }}</h1>

            @if ($project->image)
                <img src="{{ asset('img/' . $project->image) }}" alt="{{ $project->title }}" class="detail-image">
            @endif

            <div class="project-info card">
                <h3>Project Info</h3>
                <p><strong>Teknologi:</strong> {{ implode(', ', $project->technologies) }}</p>
                @if ($project->repo_url)
                    <p><strong>GitHub Repo:</strong> <a href="{{ $project->repo_url }}" target="_blank">Lihat Kode</a></p>
                @endif
                @if ($project->project_url)
                    <p><strong>Demo Live:</strong> <a href="{{ $project->project_url }}" target="_blank">Lihat Demo</a></p>
                @endif
            </div>

            <div class="detail-content">
                <h3>Deskripsi Lengkap:</h3>
                <p>{{ $project->description }}</p>
            </div>
        </div>
    </main>
</body>
</html>
