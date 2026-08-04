@extends('admin.layouts.app')
@section('title', 'Edit Testimoni')
@section('content')
<div class="card p-4" style="max-width:600px;">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Edit Testimoni</h6>
    <form method="POST" action="{{ route('admin.testimoni.update', $testimonial) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.testimonials._form')
        <button class="btn btn-coral mt-2">Update</button>
    </form>
</div>
@endsection
