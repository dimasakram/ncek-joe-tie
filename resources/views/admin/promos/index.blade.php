@extends('admin.layouts.app')
@section('title', 'Kelola Promo')
@section('content')
<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h6 class="fw-semibold mb-0" style="color: var(--dark-olive);">Daftar Promo</h6>
        <a href="{{ route('admin.promo.create') }}" class="btn btn-coral btn-sm"><i class="bi bi-plus-lg"></i> Tambah Promo</a>
    </div>
    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-6"><input type="text" name="search" class="form-control" placeholder="Cari judul promo..." value="{{ request('search') }}"></div>
        <div class="col-md-2"><button class="btn btn-olive w-100"><i class="bi bi-search"></i></button></div>
    </form>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Judul</th><th>Menu Terkait</th><th>Diskon</th><th>Periode</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse ($promos as $promo)
                    <tr>
                        <td>{{ $promo->title }}</td>
                        <td>{{ $promo->menu->name ?? '-' }}</td>
                        <td>{{ $promo->discount_percent ? $promo->discount_percent.'%' : '-' }}</td>
                        <td>{{ $promo->start_date->format('d M Y') }} - {{ $promo->end_date->format('d M Y') }}</td>
                        <td><span class="badge bg-{{ $promo->is_active ? 'success' : 'secondary' }}">{{ $promo->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.promo.edit', $promo) }}" class="btn btn-sm btn-olive"><i class="bi bi-pencil"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('delete-form-{{ $promo->id }}')"><i class="bi bi-trash"></i></button>
                            <form id="delete-form-{{ $promo->id }}" action="{{ route('admin.promo.destroy', $promo) }}" method="POST" class="d-none">@csrf @method('DELETE')</form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted">Belum ada promo.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $promos->links() }}
</div>
@endsection
