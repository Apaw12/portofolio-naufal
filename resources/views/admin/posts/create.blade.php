<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Post Baru') }}
        </h2>
    </x-slot>

    <div class="admin-page">
        <div class="admin-card">
            <div class="admin-header" style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1rem;">
                <h2 style="font-size:1.5rem; font-weight:700; color:#fff;">Tambah Post Baru</h2>
                <a href="{{ route('admin.posts.index') }}" class="btn">Kembali</a>
            </div>

            <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <label for="category_id">Kategori</label>
                    <select id="category_id" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="title">Judul</label>
                    <x-text-input id="title" type="text" name="title" :value="old('title')" required autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="slug">Slug (Contoh: judul-post-baru)</label>
                    <x-text-input id="slug" type="text" name="slug" :value="old('slug')" required />
                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="excerpt">Ringkasan (Excerpt)</label>
                    <textarea id="excerpt" name="excerpt">{{ old('excerpt') }}</textarea>
                    <x-input-error :messages="$errors->get('excerpt')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="body">Konten</label>
                    <textarea id="body" name="body">{{ old('body') }}</textarea>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="image">Gambar Post (Opsional)</label>
                    <input id="image" name="image" type="file" />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label><input type="checkbox" name="is_published" value="1" /> Terbitkan sekarang (Publish)</label>
                </div>

                <div class="form-actions">
                    <x-primary-button>{{ __('Simpan Post') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Post Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                        @csrf 

                        <div>
                            <x-input-label for="title" :value="__('Judul Post')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="slug" :value="__('Slug (URL Unik)')" />
                            <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" required />
                            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="category_id" :value="__('Kategori')" />
                            <select id="category_id" name="category_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="excerpt" :value="__('Ringkasan Singkat (Excerpt)')" />
                            <textarea id="excerpt" name="excerpt" rows="3" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>{{ old('excerpt') }}</textarea>
                            <x-input-error :messages="$errors->get('excerpt')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="body" :value="__('Isi Artikel Lengkap (Body)')" />
                            <textarea id="body" name="body" rows="10" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>{{ old('body') }}</textarea>
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Gambar Utama/Sampul (Max 2MB)')" />
                            <input id="image" class="block mt-1 w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" type="file" name="image" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="block mt-4">
                            <label for="is_published" class="inline-flex items-center">
                                <input id="is_published" type="checkbox" name="is_published" value="1" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" {{ old('is_published') ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Langsung Publikasikan (Published)') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-3">
                                <div class="admin-page">
                                    <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-row">
                                            <label for="category_id">Kategori</label>
                                            <select id="category_id" name="category_id">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                                        </div>

                                        <div class="form-row">
                                            <label for="title">Judul</label>
                                            <x-text-input id="title" type="text" name="title" :value="old('title')" required autofocus />
                                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                        </div>

                                        <div class="form-row">
                                            <label for="slug">Slug (Contoh: judul-post-baru)</label>
                                            <x-text-input id="slug" type="text" name="slug" :value="old('slug')" required />
                                            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                                        </div>

                                        <div class="form-row">
                                            <label for="excerpt">Ringkasan (Excerpt)</label>
                                            <textarea id="excerpt" name="excerpt">{{ old('excerpt') }}</textarea>
                                            <x-input-error :messages="$errors->get('excerpt')" class="mt-2" />
                                        </div>

                                        <div class="form-row">
                                            <label for="body">Konten</label>
                                            <textarea id="body" name="body">{{ old('body') }}</textarea>
                                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                                        </div>

                                        <div class="form-row">
                                            <label for="image">Gambar Post (Opsional)</label>
                                            <input id="image" name="image" type="file" />
                                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                        </div>

                                        <div class="form-row">
                                            <label><input type="checkbox" name="is_published" /> Terbitkan sekarang (Publish)</label>
                                        </div>

                                        <div class="form-actions">
                                            <x-primary-button>{{ __('Simpan Post') }}</x-primary-button>
                                        </div>
                                    </form>
                                </div>