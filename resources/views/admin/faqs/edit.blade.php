@extends('admin.layouts.app')
@section('title', 'Edit FAQ')
@section('content')
<div class="card p-4" style="max-width:600px;">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Edit FAQ</h6>
    <form method="POST" action="{{ route('admin.faq.update', $faq) }}">
        @csrf @method('PUT')
        @include('admin.faqs._form')
        <button class="btn btn-coral mt-2">Update</button>
    </form>
</div>
@endsection
