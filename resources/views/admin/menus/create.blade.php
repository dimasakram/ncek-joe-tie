@extends('admin.layouts.app')
@section('title', 'Tambah Menu')
@section('content')
<div class="card p-4">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Tambah Menu</h6>
    <form method="POST" action="{{ route('admin.menu.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.menus._form')
        <button class="btn btn-coral mt-2">Simpan</button>
    </form>
</div>
@endsection
