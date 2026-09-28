@extends('layouts.app')
@section('title', 'Kontak')
@section('content')

{{-- HERO --}}
<section class="position-relative d-flex align-items-center rustic-texture" style="min-height: 55vh; overflow:hidden;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image:url('https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=1600&q=80'); background-size:cover; background-position:center;"></div>
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(46,71,32,0.55), rgba(62,95,43,0.9));"></div>
    <div class="container text-center text-white position-relative fade-up show" style="z-index:2; padding-top:60px; padding-bottom:70px;">
        <p class="handwritten fs-2 mb-1" style="color: var(--coral); transform: rotate(-2deg);">Kami siap mendengarkan</p>
        <h1 class="display-4 fw-bold" style="color: var(--cream);">Hubungi Kami</h1>
        <p class="fs-5" style="color: rgba(248,242,231,0.85);">Ada pertanyaan atau masukan? Jangan ragu untuk menyapa kami</p>
    </div>
    <div class="wave-divider"><svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0,40 C280,90 480,0 720,30 C960,60 1160,10 1440,50 L1440,100 L0,100 Z" fill="var(--cream)"></path></svg></div>
</section>

{{-- INFO KONTAK + FORM --}}
<section class="py-5" style="padding-top:4.5rem; position:relative; overflow:hidden;">
    <div class="container" style="padding-bottom: 5rem;">
        <div class="row g-4">
            {{-- INFORMASI KONTAK --}}
            <div class="col-lg-5 fade-up show">
                <div class="p-4 p-md-5 h-100" style="background:#fff; border-radius:20px; box-shadow: 0 10px 30px rgba(46,71,32,0.08);">
                    <p class="handwritten fs-3 mb-1" style="color: var(--coral); padding-bottom: 15px;">Datang & sapa kami</p>
                    <h5 class="fw-semibold mb-4" style="color: var(--dark-olive); font-family:'Fraunces',serif;">Informasi Kontak</h5>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0" style="width:44px; height:44px; border-radius:50%; background: var(--beige);">
                            <i class="bi bi-geo-alt-fill" style="color: var(--coral);"></i>
                        </div>
                        <div>
                            <p class="small text-uppercase fw-semibold mb-1" style="color: var(--olive); letter-spacing:.5px;">Alamat</p>
                            <p class="mb-0 text-muted">{{ $profile->address ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0" style="width:44px; height:44px; border-radius:50%; background: var(--beige);">
                            <i class="bi bi-instagram" style="color: var(--coral);"></i>
                        </div>
                        <div>
                            <p class="small text-uppercase fw-semibold mb-1" style="color: var(--olive); letter-spacing:.5px;">Instagram</p>
                            @if (!empty($profile->instagram))
                                <a href="{{ $profile->instagram }}" target="_blank" class="mb-0 text-decoration-none text-muted">{{ $profile->instagram }}</a>
                            @else
                                <p class="mb-0 text-muted">-</p>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0" style="width:44px; height:44px; border-radius:50%; background: var(--beige);">
                            <i class="bi bi-whatsapp" style="color: var(--coral);"></i>
                        </div>
                        <div>
                            <p class="small text-uppercase fw-semibold mb-1" style="color: var(--olive); letter-spacing:.5px;">WhatsApp</p>
                            <p class="mb-0 text-muted">{{ $profile->whatsapp ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0" style="width:44px; height:44px; border-radius:50%; background: var(--beige);">
                            <i class="bi bi-envelope-fill" style="color: var(--coral);"></i>
                        </div>
                        <div>
                            <p class="small text-uppercase fw-semibold mb-1" style="color: var(--olive); letter-spacing:.5px;">Email</p>
                            <p class="mb-0 text-muted">{{ $profile->email ?? '-' }}</p>
                        </div>
                    </div>

                    @if (!empty($profile->tiktok))
                        <div class="d-flex gap-2 mb-4">
                            <a href="{{ $profile->tiktok }}" target="_blank" class="d-flex align-items-center justify-content-center" style="width:40px; height:40px; border-radius:50%; background: var(--dark-olive); color:#fff;"><i class="bi bi-tiktok"></i></a>
                        </div>
                    @endif

                    <div class="rounded-4 overflow-hidden" style="height:200px; border:4px solid var(--beige);">
                        @if (!empty($profile->maps_embed_url))
                            <iframe src="{{ $profile->maps_embed_url }}" width="100%" height="100%" style="border:0;" loading="lazy"></iframe>
                        @else
                            <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: var(--beige);"><i class="bi bi-map fs-1" style="color: var(--olive);"></i></div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- FORM KIRIM PESAN --}}
            <div class="col-lg-7 fade-up show">
                <div class="p-4 p-md-5 h-100" style="background:#fff; border-radius:20px; box-shadow: 0 10px 30px rgba(46,71,32,0.08);">
                    <p class="handwritten fs-3 mb-1" style="color: var(--coral); padding-bottom: 15px;">Ada yang mau disampaikan?</p>
                    <h5 class="fw-semibold mb-4" style="color: var(--dark-olive); font-family:'Fraunces',serif;">Kirim Pesan</h5>

                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold small">Nama</label>
                                <input type="text" name="name" class="form-control" style="border-radius:12px; padding:.7rem 1rem; border-color: var(--beige);" value="{{ old('name') }}" required>
                                @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold small">Email</label>
                                <input type="email" name="email" class="form-control" style="border-radius:12px; padding:.7rem 1rem; border-color: var(--beige);" value="{{ old('email') }}" required>
                                @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Subjek</label>
                            <input type="text" name="subject" class="form-control" style="border-radius:12px; padding:.7rem 1rem; border-color: var(--beige);" value="{{ old('subject') }}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold small">Pesan</label>
                            <textarea name="message" class="form-control" rows="5" style="border-radius:12px; padding:.7rem 1rem; border-color: var(--beige);" required>{{ old('message') }}</textarea>
                            @error('message')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-coral btn-lg rounded-pill px-4">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="wave-divider"><svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0,40 C280,90 480,0 720,30 C960,60 1160,10 1440,50 L1440,100 L0,100 Z" fill="var(--dark-olive)"></path></svg></div>
</section>

@endsection