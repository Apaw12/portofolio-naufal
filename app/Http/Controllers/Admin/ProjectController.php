<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Ambil semua data project dari database
    $projects = Project::all();

    // 2. Tampilkan halaman view dan kirim data $projects ke dalamnya
    return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    // Tampilkan halaman view formulir untuk membuat project baru
    return view('admin.projects.create');
    }


    public function store(Request $request)
{
    // 1. Validasi data (TERMASUK GAMBAR)
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:projects',
        'description' => 'required|string',
        'repo_url' => 'nullable|string|max:255',
        'project_url' => 'nullable|string|max:255',
        'technologies' => 'nullable|string',
        'is_featured' => 'nullable|boolean',
        // VALIDASI BARU UNTUK GAMBAR
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Maks 2MB
    ]);

    // 2. Proses string teknologi (Sama seperti sebelumnya)
    if ($request->filled('technologies')) {
        $validated['technologies'] = array_map('trim', explode(',', $request->technologies));
    }

    // 3. Proses 'is_featured' (Sama seperti sebelumnya)
    $validated['is_featured'] = $request->has('is_featured');

    // 4. LOGIKA BARU: Handle Upload Gambar
    if ($request->hasFile('image')) {
        // Simpan gambar ke 'storage/app/public/projects'
        // dan simpan path-nya ke $validated['image']
        $path = $request->file('image')->store('projects', 'public');
        $validated['image'] = $path;
    }

    // 5. Buat dan Simpan data ke database
    Project::create($validated);

    // 6. Kembali ke halaman daftar project
    return redirect()->route('admin.projects.index')->with('success', 'Project baru berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    // 1. Cari project berdasarkan ID
    $project = Project::findOrFail($id);

    // 2. Tampilkan view formulir 'edit' dan kirim data project ke dalamnya
    return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
// GANTI FUNGSI UPDATE ANDA DENGAN INI
    public function update(Request $request, string $id)
    {
        // 1. Cari project yang mau di-update
        $project = Project::findOrFail($id);

        // 2. Validasi data (TERMASUK GAMBAR)
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug,' . $project->id, // Abaikan slug ini sendiri
            'description' => 'required|string',
            'repo_url' => 'nullable|string|max:255',
            'project_url' => 'nullable|string|max:255',
            'technologies' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            // VALIDASI BARU UNTUK GAMBAR
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Maks 2MB
        ]);

        // 3. Proses string teknologi
        if ($request->filled('technologies')) {
            $validated['technologies'] = array_map('trim', explode(',', $request->technologies));
        } else {
            $validated['technologies'] = []; // Kosongkan jika dihapus
        }

        // 4. Proses 'is_featured'
        $validated['is_featured'] = $request->has('is_featured');

        // 5. LOGIKA BARU: Handle Upload Gambar (Jika ada gambar baru)
        if ($request->hasFile('image')) {
            
            // Hapus gambar lama (JIKA ADA)
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }

            // Simpan gambar baru
            $path = $request->file('image')->store('projects', 'public');
            $validated['image'] = $path;
        }

        // 6. Update data di database
        $project->update($validated);

        // 7. Redirect kembali ke halaman DAFTAR PROJECT (INDEX)
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil di-update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $project = Project::findOrFail($id);
    $project->delete();

    // 3. Redirect kembali dengan pesan sukses
    return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus!');
    }
}
