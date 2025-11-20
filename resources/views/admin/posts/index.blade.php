<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Posts/Blog') }}
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
                <h2 style="font-size:1.75rem; font-weight:700; color:#fff;">Kelola Posts/Blog</h2>
                <a href="{{ route('admin.posts.create') }}" class="btn">Tambah Post Baru</a>
            </div>

            <div>
                <table class="admin-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>@if ($post->is_published) Published @else Draft @endif</td>
                        <td class="actions" style="width:140px">
                            <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}" class="inline-block" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Yakin ingin menghapus post ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>