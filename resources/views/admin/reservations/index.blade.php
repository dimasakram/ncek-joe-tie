@extends('admin.layouts.app')
@section('title', 'Kelola Reservasi')
@section('content')
<div class="card p-3">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Daftar Reservasi</h6>
    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-5"><input type="text" name="search" class="form-control" placeholder="Cari nama pemesan..." value="{{ request('search') }}"></div>
        <div class="col-md-4">
            <select name="status" class="form-select">
                <option value="">Semua Status</option>
                @foreach (['pending' => 'Pending', 'confirmed' => 'Confirmed', 'cancelled' => 'Cancelled'] as $val => $label)
                    <option value="{{ $val }}" {{ request('status') == $val ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3"><button class="btn btn-olive w-100"><i class="bi bi-search"></i> Filter</button></div>
    </form>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Nama</th><th>No. HP</th><th>Tanggal & Jam</th><th>Jumlah Orang</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse ($reservations as $r)
                    <tr>
                        <td>{{ $r->name }}</td>
                        <td>{{ $r->phone }}</td>
                        <td>{{ $r->date->format('d M Y') }}, {{ \Carbon\Carbon::parse($r->time)->format('H:i') }}</td>
                        <td>{{ $r->guests }}</td>
                        <td><span class="badge bg-{{ $r->status === 'confirmed' ? 'success' : ($r->status === 'cancelled' ? 'danger' : 'warning') }}">{{ ucfirst($r->status) }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.reservasi.show', $r) }}" class="btn btn-sm btn-olive"><i class="bi bi-eye"></i></a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('delete-form-{{ $r->id }}')"><i class="bi bi-trash"></i></button>
                            <form id="delete-form-{{ $r->id }}" action="{{ route('admin.reservasi.destroy', $r) }}" method="POST" class="d-none">@csrf @method('DELETE')</form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted">Belum ada reservasi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $reservations->links() }}
</div>
@endsection
