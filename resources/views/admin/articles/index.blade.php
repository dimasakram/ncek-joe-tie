@extends('admin.layouts.app')
@section('title', 'Kelola Artikel')
@section('content')
<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h6 class="fw-semibold mb-0" style="color: var(--dark-olive);">Daftar Artikel</h6>
        <a href="{{ route('admin.artikel.create') }}" class="btn btn-coral btn-sm"><i class="bi bi-plus-lg"></i> Tulis Artikel</a>
    </div>
    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-6"><input type="text" name="search" class="form-control" placeholder="Cari judul artikel..." value="{{ request('search') }}"></div>
        <div class="col-md-2"><button class="btn btn-olive w-100"><i class="bi bi-search"></i></button></div>
    </form>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Judul</th><th>Penulis</th><th>Status</th><th>Tanggal Terbit</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse ($articles as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->user->name }}</td>
                        <td><span class="badge bg-{{ $article->is_published ? 'success' : 'secondary' }}">{{ $article->is_published ? 'Terbit' : 'Draft' }}</span></td>
                        <td>{{ $article->published_at?->format('d M Y') ?? '-' }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.artikel.edit', $article) }}" class="btn btn-sm btn-olive"><i class="bi bi-pencil"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('delete-form-{{ $article->id }}')"><i class="bi bi-trash"></i></button>
                            <form id="delete-form-{{ $article->id }}" action="{{ route('admin.artikel.destroy', $article) }}" method="POST" class="d-none">@csrf @method('DELETE')</form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">Belum ada artikel.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $articles->links() }}
</div>
@endsection
