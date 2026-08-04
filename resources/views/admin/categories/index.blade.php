@extends('admin.layouts.app')
@section('title', 'Kelola Kategori')
@section('content')
<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-semibold mb-0" style="color: var(--dark-olive);">Daftar Kategori</h6>
        <a href="{{ route('admin.kategori.create') }}" class="btn btn-coral btn-sm"><i class="bi bi-plus-lg"></i> Tambah Kategori</a>
    </div>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>#</th><th>Nama</th><th>Slug</th><th>Jumlah Menu</th><th>Urutan</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse ($categories as $i => $category)
                    <tr>
                        <td>{{ $categories->firstItem() + $i }}</td>
                        <td>{{ $category->name }}</td>
                        <td><code>{{ $category->slug }}</code></td>
                        <td>{{ $category->menus_count }}</td>
                        <td>{{ $category->order }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.kategori.edit', $category) }}" class="btn btn-sm btn-olive"><i class="bi bi-pencil"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('delete-form-{{ $category->id }}')"><i class="bi bi-trash"></i></button>
                            <form id="delete-form-{{ $category->id }}" action="{{ route('admin.kategori.destroy', $category) }}" method="POST" class="d-none">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted">Belum ada kategori.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $categories->links() }}
</div>
@endsection
