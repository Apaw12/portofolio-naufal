<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
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
            <a href="{{ route('home') }}#blog" class="back-link">&larr; Kembali ke Home</a>

            <h1 class="detail-title">{{ $post->title }}</h1>
            
            <div class="author-bio-large">
                <img src="{{ asset('images/ganteng.jpg') }}" alt="Foto Naufal" class="author-avatar-large">
                <div>
                    Ditulis oleh <span class_="author-name-large">{{ $post->user->name }}</span>
                    <br>
                    dalam Kategori <span class="author-name-large">{{ $post->category->name }}</span>
                </div>
            </div>

            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="detail-image">
            @endif

            <div class="detail-content">
                <p>{{ $post->body }}</p>
            </div>
        </div>
    </main>
</body>
</html>