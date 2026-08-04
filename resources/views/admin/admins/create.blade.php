@extends('admin.layouts.app')
@section('title', 'Tambah Admin')
@section('content')
<div class="card p-4" style="max-width:600px;">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Tambah Admin</h6>
    <form method="POST" action="{{ route('admin.admin.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.admins._form')
        <button class="btn btn-coral mt-2">Simpan</button>
    </form>
</div>
@endsection
