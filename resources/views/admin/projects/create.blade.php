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
                    <label for="title">Judul Project</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required autofocus placeholder="Masukkan judul project...">
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="slug">Slug URL</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug') }}" required placeholder="contoh-judul-project">
                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="description">Deskripsi Lengkap</label>
                    <textarea id="description" name="description" rows="5">{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="technologies">Teknologi (Pisahkan dengan koma)</label>
                    <input type="text" id="technologies" name="technologies" value="{{ old('technologies') }}" placeholder="Contoh: Laravel, MySQL, Tailwind CSS">
                    <x-input-error :messages="$errors->get('technologies')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="repo_url">Link GitHub (Opsional)</label>
                    <input type="text" id="repo_url" name="repo_url" value="{{ old('repo_url') }}" placeholder="https://github.com/username/repo">
                    <x-input-error :messages="$errors->get('repo_url')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="project_url">Link Demo Live (Opsional)</label>
                    <input type="text" id="project_url" name="project_url" value="{{ old('project_url') }}" placeholder="https://website-saya.com">
                    <x-input-error :messages="$errors->get('project_url')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="image">Gambar Cover</label>
                    <input id="image" name="image" type="file" accept="image/*" style="padding: 10px; background: rgba(255,255,255,0.05);">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="form-row" style="display: flex; align-items: center; gap: 10px;">
                    <input type="hidden" name="is_featured" value="0">
                    <input type="checkbox" name="is_featured" value="1" id="is_featured" style="width: auto;">
                    <label for="is_featured" style="margin-bottom: 0; cursor: pointer;">Tampilkan di Halaman Depan (Featured)</label>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn" style="cursor: pointer;">
                        {{ __('Simpan Project') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
