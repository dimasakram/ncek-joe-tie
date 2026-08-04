@extends('admin.layouts.app')
@section('title', 'Tulis Artikel')
@section('content')
<div class="card p-4">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Tulis Artikel Baru</h6>
    <form method="POST" action="{{ route('admin.artikel.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.articles._form')
        <button class="btn btn-coral mt-2">Simpan</button>
    </form>
</div>
@endsection
