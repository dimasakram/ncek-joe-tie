@extends('admin.layouts.app')
@section('title', 'Kelola Menu')
@section('content')
<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h6 class="fw-semibold mb-0" style="color: var(--dark-olive);">Daftar Menu</h6>
        <a href="{{ route('admin.menu.create') }}" class="btn btn-coral btn-sm"><i class="bi bi-plus-lg"></i> Tambah Menu</a>
    </div>

    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-5">
            <input type="text" name="search" class="form-control" placeholder="Cari nama menu..." value="{{ request('search') }}">
        </div>
        <div class="col-md-4">
            <select name="category_id" class="form-select">
                <option value="">Semua Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-olive w-100"><i class="bi bi-search"></i> Filter</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Foto</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Status</th><th>Badge</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse ($menus as $menu)
                    <tr>
                        <td>
                            @if ($menu->image)
                                <img src="{{ asset('storage/'.$menu->image) }}" width="50" height="50" style="object-fit:cover;border-radius:8px;">
                            @else
                                <div class="bg-light rounded" style="width:50px;height:50px;"></div>
                            @endif
                        </td>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->category->name }}</td>
                        <td>Rp{{ number_format($menu->price, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge bg-{{ $menu->is_available ? 'success' : 'secondary' }}">{{ $menu->is_available ? 'Tersedia' : 'Habis' }}</span>
                        </td>
                        <td>
                            @if ($menu->is_best_seller)<span class="badge badge-best">Best Seller</span>@endif
                            @if ($menu->is_new)<span class="badge badge-new">New</span>@endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.menu.edit', $menu) }}" class="btn btn-sm btn-olive"><i class="bi bi-pencil"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('delete-form-{{ $menu->id }}')"><i class="bi bi-trash"></i></button>
                            <form id="delete-form-{{ $menu->id }}" action="{{ route('admin.menu.destroy', $menu) }}" method="POST" class="d-none">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted">Belum ada menu.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $menus->links() }}
</div>
@endsection
