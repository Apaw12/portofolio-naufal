<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Post Baru') }}
        </h2>
    </x-slot>

    <div class="admin-page">
        <div class="admin-card">
            <div class="admin-header" style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1rem;">
                <h2 style="font-size:1.5rem; font-weight:700; color:#fff;">Tambah Artikel/Post</h2>
                <a href="{{ route('admin.posts.index') }}" class="btn">Kembali</a>
            </div>

            <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <label for="category_id">Pilih Kategori</label>
                    <select id="category_id" name="category_id" required style="background: rgba(255,255,255,0.05); color: #fff; border: 1px solid #333; width: 100%; padding: 0.5rem;">
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="title">Judul Artikel</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required autofocus placeholder="Judul artikel...">
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="slug">Slug URL</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug') }}" required placeholder="judul-artikel-unik">
                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="excerpt">Ringkasan Singkat (Excerpt)</label>
                    <textarea id="excerpt" name="excerpt" rows="3" placeholder="Ringkasan yang muncul di halaman depan...">{{ old('excerpt') }}</textarea>
                    <x-input-error :messages="$errors->get('excerpt')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="body">Isi Artikel Lengkap</label>
                    <textarea id="body" name="body" rows="10" placeholder="Tulis konten lengkap di sini...">{{ old('body') }}</textarea>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="image">Gambar Sampul (Opsional)</label>
                    <input id="image" name="image" type="file" accept="image/*" style="padding: 10px; background: rgba(255,255,255,0.05); width: 100%;">
                    <p style="font-size: 0.8rem; color: #aaa; margin-top: 5px;">*Gambar akan disimpan di folder public/img/posts</p>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="form-row" style="display: flex; align-items: center; gap: 10px;">
                    <input type="hidden" name="is_published" value="0">
                    <input type="checkbox" name="is_published" value="1" id="is_published" {{ old('is_published') ? 'checked' : '' }} style="width: auto;">
                    <label for="is_published" style="margin-bottom: 0; cursor: pointer;">Langsung Terbitkan (Publish)</label>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn" style="cursor: pointer;">
                        {{ __('Simpan Post') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
