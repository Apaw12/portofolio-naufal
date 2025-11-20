<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelola Projects') }}
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
                <h2 style="font-size:1.75rem; font-weight:700; color:#fff;">Kelola Projects</h2>
                <a href="{{ route('admin.projects.create') }}" class="btn">Tambah Project Baru</a>
            </div>

            <table class="admin-table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Repo URL</th>
                    <th>Featured</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td class="wrap">@if($project->repo_url)<a href="{{ $project->repo_url }}" target="_blank" rel="noopener noreferrer">{{ $project->repo_url }}</a>@endif</td>
                    <td>{{ $project->is_featured ? 'Yes' : 'No' }}</td>
                    <td class="actions" style="width:140px">
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="action edit">Edit</a>
                        <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}" class="inline-block" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn action" onclick="return confirm('Yakin ingin menghapus project ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>