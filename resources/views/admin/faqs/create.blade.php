@extends('admin.layouts.app')
@section('title', 'Tambah FAQ')
@section('content')
<div class="card p-4" style="max-width:600px;">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Tambah FAQ</h6>
    <form method="POST" action="{{ route('admin.faq.store') }}">
        @csrf
        @include('admin.faqs._form')
        <button class="btn btn-coral mt-2">Simpan</button>
    </form>
</div>
@endsection
