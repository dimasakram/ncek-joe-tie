@extends('admin.layouts.app')
@section('title', 'Kelola Galeri')
@section('content')
<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-semibold mb-0" style="color: var(--dark-olive);">Galeri Foto</h6>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-coral btn-sm"><i class="bi bi-plus-lg"></i> Tambah Foto</a>
    </div>
    <div class="row g-3">
        @forelse ($galleries as $gallery)
            <div class="col-md-3 col-6">
                <div class="card h-100">
                    <img src="{{ $gallery->image_url }}" class="card-img-top" style="height:150px;object-fit:cover;">
                    <div class="card-body p-2">
                        <div class="small fw-semibold">{{ $gallery->title }}</div>
                        <span class="badge bg-secondary text-capitalize">{{ $gallery->category }}</span>
                        <div class="d-flex justify-content-end gap-1 mt-2">
                            <a href="{{ route('admin.galeri.edit', $gallery) }}" class="btn btn-sm btn-olive"><i class="bi bi-pencil"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('delete-form-{{ $gallery->id }}')"><i class="bi bi-trash"></i></button>
                            <form id="delete-form-{{ $gallery->id }}" action="{{ route('admin.galeri.destroy', $gallery) }}" method="POST" class="d-none">@csrf @method('DELETE')</form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada foto galeri.</p>
        @endforelse
    </div>
    <div class="mt-3">{{ $galleries->links() }}</div>
</div>
@endsection