@extends('admin.layouts.app')
@section('title', 'Profil Restoran')
@section('content')
<div class="card p-4">
    <h6 class="fw-semibold mb-3" style="color: var(--dark-olive);">Profil Restoran</h6>
    <form method="POST" action="{{ route('admin.profil.update') }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Restoran</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $profile->name) }}" required>
            @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Logo</label>
            <input type="file" name="logo" class="form-control" accept="image/*">
            @error('logo')<div class="text-danger small">{{ $message }}</div>@enderror
            @if ($profile->logo)<img src="{{ asset('storage/'.$profile->logo) }}" width="60" class="mt-2 rounded">@endif
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $profile->address) }}">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Telepon</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $profile->phone) }}">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">WhatsApp</label>
                <input type="text" name="whatsapp" class="form-control" value="{{ old('whatsapp', $profile->whatsapp) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $profile->email) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Jam Operasional</label>
                <input type="text" name="opening_hours" class="form-control" value="{{ old('opening_hours', $profile->opening_hours) }}">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">URL Embed Google Maps</label>
            <textarea name="maps_embed_url" class="form-control" rows="2">{{ old('maps_embed_url', $profile->maps_embed_url) }}</textarea>
            @error('maps_embed_url')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Instagram</label>
                <input type="text" name="instagram" class="form-control" value="{{ old('instagram', $profile->instagram) }}">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Facebook</label>
                <input type="text" name="facebook" class="form-control" value="{{ old('facebook', $profile->facebook) }}">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">TikTok</label>
                <input type="text" name="tiktok" class="form-control" value="{{ old('tiktok', $profile->tiktok) }}">
            </div>
        </div>
        <button class="btn btn-coral">Simpan Perubahan</button>
    </form>
</div>
@endsection