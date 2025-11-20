<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Project Baru') }}
        </h2>
    </x-slot>

    <div class="admin-page">
            <div class="admin-card">
                <div class="admin-header" style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1rem;">
                    <h2 style="font-size:1.5rem; font-weight:700; color:#fff;">Tambah Project Baru</h2>
                    <a href="{{ route('admin.projects.index') }}" class="btn">Kembali</a>
                </div>

                <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
                <label for="title">Judul</label>
                <x-text-input id="title" class="" type="text" name="title" :value="old('title')" required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="form-row">
                <label for="slug">Slug (Contoh: judul-project-baru)</label>
                <x-text-input id="slug" class="" type="text" name="slug" :value="old('slug')" required />
                <x-input-error :messages="$errors->get('slug')" class="mt-2" />
            </div>

            <div class="form-row">
                <label for="description">Deskripsi</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="form-row">
                <label for="repo_url">Link GitHub (Repo URL)</label>
                <x-text-input id="repo_url" class="" type="text" name="repo_url" :value="old('repo_url')" />
                <x-input-error :messages="$errors->get('repo_url')" class="mt-2" />
            </div>

            <div class="form-row">
                <label for="project_url">Link Demo (Opsional)</label>
                <x-text-input id="project_url" class="" type="text" name="project_url" :value="old('project_url')" />
                <x-input-error :messages="$errors->get('project_url')" class="mt-2" />
            </div>

            <div class="form-row">
                <label for="technologies">Teknologi (Pisahkan dengan koma)</label>
                <x-text-input id="technologies" class="" type="text" name="technologies" :value="old('technologies')" />
                <x-input-error :messages="$errors->get('technologies')" class="mt-2" />
            </div>

            <div class="form-row">
                <label for="image">Gambar Project (Opsional)</label>
                <input id="image" name="image" type="file" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <div class="form-row">
                <label><input type="checkbox" name="is_featured" value="1" /> Tampilkan di Halaman Depan (Featured)</label>
            </div>

            <div class="form-actions">
                <x-primary-button>{{ __('Simpan Project') }}</x-primary-button>
            </div>
                </form>
            </div>
        </form>
    </div>
</x-app-layout>