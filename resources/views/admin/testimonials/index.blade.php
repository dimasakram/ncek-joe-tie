@extends('admin.layouts.app')
@section('title', 'Kelola Testimoni')
@section('content')
<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-semibold mb-0" style="color: var(--dark-olive);">Daftar Testimoni</h6>
        <a href="{{ route('admin.testimoni.create') }}" class="btn btn-coral btn-sm"><i class="bi bi-plus-lg"></i> Tambah Testimoni</a>
    </div>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Nama</th><th>Rating</th><th>Pesan</th><th>Tampil di Home</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse ($testimonials as $t)
                    <tr>
                        <td>{{ $t->name }}</td>
                        <td>{{ str_repeat('⭐', $t->rating) }}</td>
                        <td>{{ Str::limit($t->message, 60) }}</td>
                        <td><span class="badge bg-{{ $t->is_featured ? 'success' : 'secondary' }}">{{ $t->is_featured ? 'Ya' : 'Tidak' }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.testimoni.edit', $t) }}" class="btn btn-sm btn-olive"><i class="bi bi-pencil"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('delete-form-{{ $t->id }}')"><i class="bi bi-trash"></i></button>
                            <form id="delete-form-{{ $t->id }}" action="{{ route('admin.testimoni.destroy', $t) }}" method="POST" class="d-none">@csrf @method('DELETE')</form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">Belum ada testimoni.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $testimonials->links() }}
</div>
@endsection
