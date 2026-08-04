@extends('admin.layouts.app')
@section('title', 'Edit Admin')
@section('content')
<div class="card p-4" style="max-width:600px;">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Edit Admin</h6>
    <form method="POST" action="{{ route('admin.admin.update', $admin) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.admins._form')
        <button class="btn btn-coral mt-2">Update</button>
    </form>
</div>
@endsection
