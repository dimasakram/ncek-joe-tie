@extends('admin.layouts.app')
@section('title', 'Detail Pesan')
@section('content')
<div class="card p-4" style="max-width:600px;">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Detail Pesan Kontak</h6>
    <table class="table table-borderless">
        <tr><th width="140">Nama</th><td>{{ $contact->name }}</td></tr>
        <tr><th>Email</th><td>{{ $contact->email }}</td></tr>
        <tr><th>Subjek</th><td>{{ $contact->subject ?: '-' }}</td></tr>
        <tr><th>Pesan</th><td>{{ $contact->message }}</td></tr>
        <tr><th>Tanggal</th><td>{{ $contact->created_at->format('d M Y H:i') }}</td></tr>
    </table>
    <a href="{{ route('admin.kontak.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>
@endsection
