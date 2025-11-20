<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Kategori: ') }} {{ $category->name }}
        </h2>
    </x-slot>

    <div class="admin-page">
        <div class="admin-card">
            <div class="admin-header" style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1rem;">
                <h2 style="font-size:1.5rem; font-weight:700; color:#fff;">Edit Kategori: {{ $category->name }}</h2>
                <a href="{{ route('admin.categories.index') }}" class="btn">Kembali</a>
            </div>

            <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <label for="name">Nama Kategori</label>
                    <x-text-input id="name" type="text" name="name" :value="old('name', $category->name)" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="form-row">
                    <label for="slug">Slug (URL Unik)</label>
                    <x-text-input id="slug" type="text" name="slug" :value="old('slug', $category->slug)" required />
                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                </div>

                <div class="form-actions">
                    <x-primary-button>{{ __('Update Kategori') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>