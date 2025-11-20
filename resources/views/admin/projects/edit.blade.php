<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Project: ' . $project->title) }}
        </h2>
    </x-slot>

    <div class="admin-page">
        <div class="admin-card">
            <div class="admin-header" style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1rem;">
                <h2 style="font-size:1.5rem; font-weight:700; color:#fff;">Edit Project: {{ $project->title }}</h2>
                <a href="{{ route('admin.projects.index') }}" class="btn">Kembali</a>
            </div>

            <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-row">
                <label for="title">Judul</label>
                <x-text-input id="title" type="text" name="title" :value="old('title', $project->title)" required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="form-row">
                <label for="slug">Slug (Contoh: judul-project-baru)</label>
                <x-text-input id="slug" type="text" name="slug" :value="old('slug', $project->slug)" required />
                <x-input-error :messages="$errors->get('slug')" class="mt-2" />
            </div>

            <div class="form-row">
                <label for="description">Deskripsi</label>
                <textarea id="description" name="description">{{ old('description', $project->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="form-row">
                <label for="repo_url">Link GitHub (Repo URL)</label>
                <x-text-input id="repo_url" type="text" name="repo_url" :value="old('repo_url', $project->repo_url)" />
                <x-input-error :messages="$errors->get('repo_url')" class="mt-2" />
            </div>

            <div class="form-row">
                <label for="project_url">Link Demo (Opsional)</label>
                <x-text-input id="project_url" type="text" name="project_url" :value="old('project_url', $project->project_url)" />
                <x-input-error :messages="$errors->get('project_url')" class="mt-2" />
            </div>

            <div class="form-row">
                <label for="technologies">Teknologi (Pisahkan dengan koma)</label>
                <x-text-input id="technologies" type="text" name="technologies" :value="old('technologies', is_array($project->technologies) ? implode(', ', $project->technologies) : $project->technologies)" />
                <x-input-error :messages="$errors->get('technologies')" class="mt-2" />
            </div>

            <div class="form-row">
                <label for="image">Gambar Project (Opsional - biarkan kosong jika tidak ingin ganti)</label>
                <input id="image" name="image" type="file" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />

                @if ($project->image)
                    <div class="mt-2">
                        <span class="block text-sm font-medium">Gambar Saat Ini:</span>
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-32 h-32 object-cover rounded mt-1">
                    </div>
                @endif
            </div>

            <div class="form-row">
                <label><input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $project->is_featured)) /> Tampilkan di Halaman Depan (Featured)</label>
            </div>

            <div class="form-actions">
                <x-primary-button>{{ __('Update Project') }}</x-primary-button>
            </div>
            </form>
        </div>
    </div>
</x-app-layout>