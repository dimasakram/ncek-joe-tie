@extends('admin.layouts.app')
@section('title', 'Tambah Foto Galeri')
@section('content')
<div class="card p-4" style="max-width:600px;">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Tambah Foto Galeri</h6>
    <form method="POST" action="{{ route('admin.galeri.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.galleries._form')
        <button class="btn btn-coral mt-2">Simpan</button>
    </form>
</div>
@endsection
