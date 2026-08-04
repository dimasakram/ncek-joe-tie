@extends('admin.layouts.app')
@section('title', 'Kelola Kontak')
@section('content')
<div class="card p-3">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Pesan Masuk dari Form Kontak</h6>
    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-6"><input type="text" name="search" class="form-control" placeholder="Cari nama pengirim..." value="{{ request('search') }}"></div>
        <div class="col-md-2"><button class="btn btn-olive w-100"><i class="bi bi-search"></i></button></div>
    </form>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Nama</th><th>Email</th><th>Subjek</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse ($contacts as $c)
                    <tr class="{{ !$c->is_read ? 'fw-semibold' : '' }}">
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->subject ?: '-' }}</td>
                        <td><span class="badge bg-{{ $c->is_read ? 'secondary' : 'coral' }}" style="{{ !$c->is_read ? 'background:#E06A4B;' : '' }}">{{ $c->is_read ? 'Sudah Dibaca' : 'Belum Dibaca' }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.kontak.show', $c) }}" class="btn btn-sm btn-olive"><i class="bi bi-eye"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('delete-form-{{ $c->id }}')"><i class="bi bi-trash"></i></button>
                            <form id="delete-form-{{ $c->id }}" action="{{ route('admin.kontak.destroy', $c) }}" method="POST" class="d-none">@csrf @method('DELETE')</form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">Belum ada pesan kontak.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $contacts->links() }}
</div>
@endsection
