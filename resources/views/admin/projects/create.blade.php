<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Project Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
                        @csrf 

                        <div>
                            <x-input-label for="title" :value="__('Judul')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="slug" :value="__('Slug (Contoh: judul-project-baru)')" />
                            <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" required />
                            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Deskripsi')" />
                            <textarea id="description" name="description" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="repo_url" :value="__('Link GitHub (Repo URL)')" />
                            <x-text-input id="repo_url" class="block mt-1 w-full" type="text" name="repo_url" :value="old('repo_url')" />
                            <x-input-error :messages="$errors->get('repo_url')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="project_url" :value="__('Link Demo (Opsional)')" />
                            <x-text-input id="project_url" class="block mt-1 w-full" type="text" name="project_url" :value="old('project_url')" />
                            <x-input-error :messages="$errors->get('project_url')" class="mt-2" />
                        </div>
                        
                        <div class="mt-4">
                            <x-input-label for="technologies" :value="__('Teknologi (Pisahkan dengan koma, misal: Laravel, React, Tailwind)')" />
                            <x-text-input id="technologies" class="block mt-1 w-full" type="text" name="technologies" :value="old('technologies')" />
                            <x-input-error :messages="$errors->get('technologies')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Gambar Project (Opsional)')" />
                            <input id="image" name="image" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="block mt-4">
                            <label for="is_featured" class="inline-flex items-center">
                                <input id="is_featured" type="checkbox" name="is_featured" value="1" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Tampilkan di Halaman Depan (Featured)') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('Simpan Project') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>