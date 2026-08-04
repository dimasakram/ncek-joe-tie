@extends('layouts.app')
@section('title', 'Tentang Kami')
@section('content')

<section style="background: var(--dark-olive); padding: 140px 0 60px;">
    <div class="container text-center text-white">
        <h1 class="fw-bold" style="color: var(--cream);">Tentang Kami</h1>
        <p style="color: rgba(248,242,231,0.8);">Mengenal lebih dekat {{ $profile->name ?? 'Ncek Joe Tie' }}</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-6 fade-up">
                <div class="ratio ratio-4x3 rounded-4 overflow-hidden shadow">
                    @if (!empty($profile->cover_photo))
                        <img src="{{ asset('storage/'.$profile->cover_photo) }}" class="w-100 h-100" style="object-fit:cover;">
                    @else
                        <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: var(--beige);"><i class="bi bi-shop display-1" style="color: var(--olive);"></i></div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 fade-up">
                <p class="section-sub">Sejarah Kami</p>
                <h2 class="section-title mb-3">Perjalanan {{ $profile->name ?? 'Ncek Joe Tie' }}</h2>
                <p class="text-muted">{{ $profile->history ?? 'Sejarah restoran belum tersedia.' }}</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4 fade-up">
                <div class="card h-100 border-0 shadow-sm p-4 text-center">
                    <i class="bi bi-eye fs-1 mb-3" style="color: var(--coral);"></i>
                    <h5 class="fw-semibold" style="color: var(--dark-olive);">Visi</h5>
                    <p class="text-muted small mb-0">{{ $profile->vision ?? '-' }}</p>
                </div>
            </div>
            <div class="col-md-4 fade-up">
                <div class="card h-100 border-0 shadow-sm p-4 text-center">
                    <i class="bi bi-bullseye fs-1 mb-3" style="color: var(--coral);"></i>
                    <h5 class="fw-semibold" style="color: var(--dark-olive);">Misi</h5>
                    <p class="text-muted small mb-0">{{ $profile->mission ?? '-' }}</p>
                </div>
            </div>
            <div class="col-md-4 fade-up">
                <div class="card h-100 border-0 shadow-sm p-4 text-center">
                    <i class="bi bi-heart fs-1 mb-3" style="color: var(--coral);"></i>
                    <h5 class="fw-semibold" style="color: var(--dark-olive);">Nilai Perusahaan</h5>
                    <p class="text-muted small mb-0">{{ $profile->core_values ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
