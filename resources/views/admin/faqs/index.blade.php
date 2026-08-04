@extends('admin.layouts.app')
@section('title', 'Kelola FAQ')
@section('content')
<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-semibold mb-0" style="color: var(--dark-olive);">Daftar FAQ</h6>
        <a href="{{ route('admin.faq.create') }}" class="btn btn-coral btn-sm"><i class="bi bi-plus-lg"></i> Tambah FAQ</a>
    </div>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Pertanyaan</th><th>Urutan</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse ($faqs as $faq)
                    <tr>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->order }}</td>
                        <td><span class="badge bg-{{ $faq->is_active ? 'success' : 'secondary' }}">{{ $faq->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.faq.edit', $faq) }}" class="btn btn-sm btn-olive"><i class="bi bi-pencil"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('delete-form-{{ $faq->id }}')"><i class="bi bi-trash"></i></button>
                            <form id="delete-form-{{ $faq->id }}" action="{{ route('admin.faq.destroy', $faq) }}" method="POST" class="d-none">@csrf @method('DELETE')</form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted">Belum ada FAQ.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $faqs->links() }}
</div>
@endsection
