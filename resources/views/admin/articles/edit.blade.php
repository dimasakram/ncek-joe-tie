@extends('admin.layouts.app')
@section('title', 'Edit Artikel')
@section('content')
<div class="card p-4">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Edit Artikel</h6>
    <form method="POST" action="{{ route('admin.artikel.update', $article) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.articles._form')
        <button class="btn btn-coral mt-2">Update</button>
    </form>
</div>
@endsection
