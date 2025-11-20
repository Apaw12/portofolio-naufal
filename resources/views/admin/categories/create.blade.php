<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Kategori Baru') }}
        </h2>
    </x-slot>

    <div class="admin-page">
        <div class="admin-card">
            <div class="admin-header" style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1rem;">
                <h2 style="font-size:1.5rem; font-weight:700; color:#fff;">Tambah Kategori Baru</h2>
                <a href="{{ route('admin.categories.index') }}" class="btn">Kembali</a>
            </div>

            <form method="POST" action="{{ route('admin.categories.store') }}">
                @csrf
                <div class="form-row">
                    <label for="name">Nama Kategori</label>
                    <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="slug">Slug (Contoh: web-development)</label>
                    <x-text-input id="slug" type="text" name="slug" :value="old('slug')" required />
                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                </div>

                <div class="form-actions">
                    <x-primary-button>{{ __('Simpan Kategori') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>