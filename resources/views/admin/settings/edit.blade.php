@extends('admin.layouts.app')
@section('title', 'Pengaturan Website')
@section('content')
<div class="card p-4">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Pengaturan Website & SEO</h6>
    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nama Website</label>
                <input type="text" name="site_name" class="form-control" value="{{ old('site_name', $settings['site_name'] ?? '') }}" required>
                @error('site_name')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Tagline</label>
                <input type="text" name="site_tagline" class="form-control" value="{{ old('site_tagline', $settings['site_tagline'] ?? '') }}">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Meta Title (SEO)</label>
            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $settings['meta_title'] ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Meta Description (SEO)</label>
            <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Favicon</label>
                <input type="file" name="favicon" class="form-control" accept="image/*">
                @error('favicon')<div class="text-danger small">{{ $message }}</div>@enderror
                @if (!empty($settings['favicon']))
                    <img src="{{ asset('storage/'.$settings['favicon']) }}" width="32" class="mt-2">
                @endif
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Open Graph Image</label>
                <input type="file" name="og_image" class="form-control" accept="image/*">
                @error('og_image')<div class="text-danger small">{{ $message }}</div>@enderror
                @if (!empty($settings['og_image']))
                    <img src="{{ asset('storage/'.$settings['og_image']) }}" width="80" class="mt-2 rounded">
                @endif
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Warna Utama Tema</label>
            <input type="color" name="primary_color" class="form-control form-control-color" value="{{ old('primary_color', $settings['primary_color'] ?? '#3E5F2B') }}">
        </div>
        <button type="submit" class="btn btn-coral">Simpan Pengaturan</button>
    </form>
</div>
@endsection