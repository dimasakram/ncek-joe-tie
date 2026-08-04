@extends('admin.layouts.app')
@section('title', 'Edit Foto Galeri')
@section('content')
<div class="card p-4" style="max-width:600px;">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Edit Foto Galeri</h6>
    <form method="POST" action="{{ route('admin.galeri.update', $gallery) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.galleries._form')
        <button class="btn btn-coral mt-2">Update</button>
    </form>
</div>
@endsection
