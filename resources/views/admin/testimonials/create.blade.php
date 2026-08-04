@extends('admin.layouts.app')
@section('title', 'Tambah Testimoni')
@section('content')
<div class="card p-4" style="max-width:600px;">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Tambah Testimoni</h6>
    <form method="POST" action="{{ route('admin.testimoni.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.testimonials._form')
        <button class="btn btn-coral mt-2">Simpan</button>
    </form>
</div>
@endsection
