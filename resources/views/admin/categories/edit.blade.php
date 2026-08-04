@extends('admin.layouts.app')
@section('title', 'Edit Kategori')
@section('content')
<div class="card p-4" style="max-width: 600px;">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Edit Kategori</h6>
    <form method="POST" action="{{ route('admin.kategori.update', $category) }}">
        @csrf @method('PUT')
        @include('admin.categories._form')
        <button class="btn btn-coral mt-2">Update</button>
    </form>
</div>
@endsection
