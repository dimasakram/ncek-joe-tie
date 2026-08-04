@extends('admin.layouts.app')
@section('title', 'Edit Promo')
@section('content')
<div class="card p-4">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Edit Promo</h6>
    <form method="POST" action="{{ route('admin.promo.update', $promo) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.promos._form')
        <button class="btn btn-coral mt-2">Update</button>
    </form>
</div>
@endsection
