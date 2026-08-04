@extends('admin.layouts.app')
@section('title', 'Tambah Kategori')
@section('content')
<div class="card p-4" style="max-width: 600px;">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Tambah Kategori</h6>
    <form method="POST" action="{{ route('admin.kategori.store') }}">
        @csrf
        @include('admin.categories._form')
        <button class="btn btn-coral mt-2">Simpan</button>
    </form>
</div>
@endsection
