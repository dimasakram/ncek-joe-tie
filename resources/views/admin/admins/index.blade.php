@extends('admin.layouts.app')
@section('title', 'Kelola Admin')
@section('content')
<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-semibold mb-0" style="color: var(--dark-olive);">Daftar Admin</h6>
        <a href="{{ route('admin.admin.create') }}" class="btn btn-coral btn-sm"><i class="bi bi-plus-lg"></i> Tambah Admin</a>
    </div>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Nama</th><th>Email</th><th>Role</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse ($admins as $a)
                    <tr>
                        <td>{{ $a->name }}</td>
                        <td>{{ $a->email }}</td>
                        <td><span class="badge bg-{{ $a->role === 'super_admin' ? 'dark' : 'secondary' }}">{{ $a->role }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.admin.edit', $a) }}" class="btn btn-sm btn-olive"><i class="bi bi-pencil"></i></a>
                            @if ($a->id !== auth()->id())
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('delete-form-{{ $a->id }}')"><i class="bi bi-trash"></i></button>
                                <form id="delete-form-{{ $a->id }}" action="{{ route('admin.admin.destroy', $a) }}" method="POST" class="d-none">@csrf @method('DELETE')</form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted">Belum ada admin.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $admins->links() }}
</div>
@endsection
