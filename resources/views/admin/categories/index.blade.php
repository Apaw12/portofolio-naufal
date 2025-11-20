<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Kategori') }}
        </h2>
    </x-slot>

    <div class="admin-page">
        @if (session('success'))
            <div class="mb-4 p-4" style="background:rgba(16,185,129,0.06); border:1px solid rgba(16,185,129,0.12); color:#9ae6b4; padding:0.75rem; border-radius:6px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="admin-card">
            <div class="admin-header" style="display:flex; align-items:center; justify-content:space-between; gap:1rem; margin-bottom:1rem;">
                <h2 style="font-size:1.75rem; font-weight:700; color:#fff;">Kelola Kategori</h2>
                <a href="{{ route('admin.categories.create') }}" class="btn">Tambah Kategori Baru</a>
            </div>

            <table class="admin-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Slug</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td class="actions" style="width:120px">
                        <a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                        <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}" class="inline-block" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>