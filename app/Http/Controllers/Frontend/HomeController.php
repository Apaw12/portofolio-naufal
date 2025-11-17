<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project; 
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil Project Unggulan (Featured)
        $featured_projects = Project::where('is_featured', true)
                                    ->latest() // Project terbaru
                                    ->limit(3) // Batasi 3 saja
                                    ->get();

        // 2. Ambil Postingan Terbaru (Published)
        $recent_posts = Post::with('category', 'user') // Eager Loading
                                ->where('is_published', true)
                                ->latest()
                                ->limit(6)
                                ->get();

        // 3. Kirim data ke View
        return view('frontend.home', compact('featured_projects', 'recent_posts'));
    }

public function showProject(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('frontend.project-detail', compact('project'));
    }

public function showPost(string $slug)
    {
        $post = Post::with(['user', 'category'])
                    ->where('slug', $slug)
                    ->where('is_published', true) // Hanya tampilkan yg sudah publish
                    ->firstOrFail();

        return view('frontend.post-detail', compact('post'));
    }

}
