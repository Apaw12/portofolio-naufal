<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category; 
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // 1. Ambil semua data post dari database
    $posts = Post::with(['user', 'category'])->get();

    // 2. Tampilkan halaman view dan kirim data $posts ke dalamnya
    return view('admin.posts.index', compact('posts'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    // Ambil semua kategori untuk ditampilkan di dropdown formulir
    $categories = Category::all();

    // Tampilkan halaman view formulir, kirim data $categories
    return view('admin.posts.create', compact('categories'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // 1. Validasi data dan file
    $validated = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:posts',
        'excerpt' => 'required|string',
        'body' => 'required|string',
        'is_published' => 'nullable|boolean',
        // VALIDASI FILE GAMBAR
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Max 2MB
    ]);


    // 2. Tambahkan user_id secara otomatis
    $validated['user_id'] = auth()->id();

    // 3. Proses Status Publikasi (Checkbox)
    $validated['is_published'] = $request->has('is_published');

    // 4. Proses Upload Gambar
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images/posts', 'public');
        $validated['image'] = $path;
    }

    // 5. Simpan data ke database
    Post::create($validated);

    // 6. Kembali ke halaman daftar posts dengan pesan sukses
    return redirect()->route('admin.posts.index')->with('success', 'Post baru berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
{
    $post = Post::findOrFail($id);
    $categories = Category::all();
    return view('admin.posts.edit', compact('post', 'categories'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $post = Post::findOrFail($id);

    // 1. Validasi data dan file
    $validated = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'title' => 'required|string|max:255',
        // VALIDASI SLUG: Pastikan unik, tapi abaikan slug milik post yang sedang diedit
        'slug' => 'required|string|max:255|unique:posts,slug,' . $post->id,
        'excerpt' => 'required|string',
        'body' => 'required|string',
        'is_published' => 'nullable|boolean',
        // Jika ada gambar baru, validasi
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', 
    ]);

    // 2. Proses Status Publikasi
    $validated['is_published'] = $request->has('is_published');

    // 3. Proses Upload Gambar (Logika update gambar)
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        // Simpan gambar baru
        $path = $request->file('image')->store('images/posts', 'public');
        $validated['image'] = $path;
    }

    // 4. Update data ke database
    $post->update($validated);

    // 5. Kembali ke halaman daftar posts dengan pesan sukses
    return redirect()->route('admin.posts.index')->with('success', 'Post berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // GANTI FUNGSI KOSONG DENGAN INI
        
        // 1. Cari Post
        $post = Post::findOrFail($id);

        // 2. Hapus Gambar dari Storage (jika ada)
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        // 3. Hapus data Post dari database
        $post->delete();

        // 4. Redirect kembali dengan pesan sukses
        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil dihapus!');
    }
}

