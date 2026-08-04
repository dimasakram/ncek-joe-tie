@extends('layouts.app')
@section('title', 'Kontak')
@section('content')

<section style="background: var(--dark-olive); padding: 140px 0 60px;">
    <div class="container text-center text-white">
        <h1 class="fw-bold" style="color: var(--cream);">Hubungi Kami</h1>
        <p style="color: rgba(248,242,231,0.8);">Ada pertanyaan atau masukan? Kami siap mendengarkan</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5 fade-up show">
                <div class="card border-0 shadow-sm p-4 h-100">
                    <h5 class="fw-semibold mb-4" style="color: var(--dark-olive);">Informasi Kontak</h5>
                    <p class="mb-3"><i class="bi bi-geo-alt-fill me-2" style="color: var(--coral);"></i> {{ $profile->address ?? '-' }}</p>
                    <p class="mb-3"><i class="bi bi-telephone-fill me-2" style="color: var(--coral);"></i> {{ $profile->phone ?? '-' }}</p>
                    <p class="mb-3"><i class="bi bi-whatsapp me-2" style="color: var(--coral);"></i> {{ $profile->whatsapp ?? '-' }}</p>
                    <p class="mb-4"><i class="bi bi-envelope-fill me-2" style="color: var(--coral);"></i> {{ $profile->email ?? '-' }}</p>
                    <div class="rounded-4 overflow-hidden" style="height:220px;">
                        @if (!empty($profile->maps_embed_url))
                            <iframe src="{{ $profile->maps_embed_url }}" width="100%" height="100%" style="border:0;" loading="lazy"></iframe>
                        @else
                            <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: var(--beige);"><i class="bi bi-map fs-1" style="color: var(--olive);"></i></div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-7 fade-up show">
                <div class="card border-0 shadow-sm p-4 p-md-5">
                    <h5 class="fw-semibold mb-4" style="color: var(--dark-olive);">Kirim Pesan</h5>
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Nama</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Subjek</label>
                            <input type="text" name="subject" class="form-control" value="{{ old('subject') }}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Pesan</label>
                            <textarea name="message" class="form-control" rows="5" required>{{ old('message') }}</textarea>
                            @error('message')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-coral btn-lg">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
