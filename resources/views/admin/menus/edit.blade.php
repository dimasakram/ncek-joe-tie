@extends('admin.layouts.app')
@section('title', 'Edit Menu')
@section('content')
<div class="card p-4">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Edit Menu</h6>
    <form method="POST" action="{{ route('admin.menu.update', $menu) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.menus._form')
        <button class="btn btn-coral mt-2">Update</button>
    </form>
</div>
@endsection
