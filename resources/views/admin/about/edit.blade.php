@extends('admin.layouts.app')
@section('title', 'Kelola Tentang')
@section('content')
<div class="card p-4">
    <h8 class="fw-semibold mb-3" style="color: var(--dark-olive);">Konten Halaman Tentang Kami</h8>
    <form method="POST" action="{{ route('admin.tentang.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <hr class="my-4">
        <h6 class="fw-semibold mb-3" style="color: var(--olive);">Sejarah</h6>
        <div class="mb-3">
            <label class="form-label">Sejarah Restoran</label>
            <textarea name="history" class="form-control" rows="4">{{ old('history', $about->history) }}</textarea>
            @error('history')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Foto Sejarah</label>
            <input type="file" name="cover_photo" class="form-control" accept="image/*">
            @error('cover_photo')<div class="text-danger small">{{ $message }}</div>@enderror
            @if ($about->cover_photo_url)
                <img src="{{ $about->cover_photo_url }}" width="100" class="mt-2 rounded">
            @endif
        </div>

        <hr class="my-4">
        <h6 class="fw-semibold mb-3" style="color: var(--olive);">Visi, Misi & Nilai</h6>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Visi</label>
                <textarea name="vision" class="form-control" rows="3">{{ old('vision', $about->vision) }}</textarea>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Misi</label>
                <textarea name="mission" class="form-control" rows="3">{{ old('mission', $about->mission) }}</textarea>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Nilai Perusahaan</label>
                <textarea name="core_values" class="form-control" rows="3">{{ old('core_values', $about->core_values) }}</textarea>
            </div>
        </div>

        <hr class="my-4">
        <h6 class="fw-semibold mb-3" style="color: var(--olive);">Coffee Sourcing</h6>
        <div class="mb-3">
            <label class="form-label">Judul Section</label>
            <input type="text" name="coffee_sourcing_title" class="form-control" value="{{ old('coffee_sourcing_title', $about->coffee_sourcing_title) }}" placeholder="Coffee Sourcing">
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="coffee_sourcing_description" class="form-control" rows="4">{{ old('coffee_sourcing_description', $about->coffee_sourcing_description) }}</textarea>
        </div>
        <div class="mb-4">
            <label class="form-label">Foto Coffee Sourcing</label>
            <input type="file" name="coffee_sourcing_image" class="form-control" accept="image/*">
            @error('coffee_sourcing_image')<div class="text-danger small">{{ $message }}</div>@enderror
            @if ($about->coffee_sourcing_image_url)
                <img src="{{ $about->coffee_sourcing_image_url }}" width="100" class="mt-2 rounded">
            @endif
        </div>

        <button type="submit" class="btn btn-coral">Simpan Perubahan</button>
    </form>
</div>
@endsection