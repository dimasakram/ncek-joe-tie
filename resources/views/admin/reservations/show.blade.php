@extends('admin.layouts.app')
@section('title', 'Detail Reservasi')
@section('content')
<div class="card p-4" style="max-width:600px;">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Detail Reservasi</h6>
    <table class="table table-borderless">
        <tr><th width="160">Nama</th><td>{{ $reservation->name }}</td></tr>
        <tr><th>No. HP</th><td>{{ $reservation->phone }}</td></tr>
        <tr><th>Jumlah Orang</th><td>{{ $reservation->guests }}</td></tr>
        <tr><th>Tanggal</th><td>{{ $reservation->date->format('d M Y') }}</td></tr>
        <tr><th>Jam</th><td>{{ \Carbon\Carbon::parse($reservation->time)->format('H:i') }}</td></tr>
        <tr><th>Catatan</th><td>{{ $reservation->notes ?: '-' }}</td></tr>
    </table>
    <form method="POST" action="{{ route('admin.reservasi.update', $reservation) }}">
        @csrf @method('PUT')
        <label class="form-label">Ubah Status</label>
        <select name="status" class="form-select mb-3">
            @foreach (['pending' => 'Pending', 'confirmed' => 'Confirmed', 'cancelled' => 'Cancelled'] as $val => $label)
                <option value="{{ $val }}" {{ $reservation->status == $val ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        <button class="btn btn-coral">Update Status</button>
        <a href="{{ route('admin.reservasi.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div>
@endsection
