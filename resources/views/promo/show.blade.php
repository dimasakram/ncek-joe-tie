@extends('layouts.app')
@section('title', $promo->title)
@section('meta_description', Str::limit($promo->description, 150))
@section('content')

<section style="background: var(--dark-olive); position:relative; overflow:hidden; padding-top: 100px; padding-bottom: 4rem;">
    <div class="container">
        <nav class="small">
            <a href="{{ route('home') }}" class="text-decoration-none" style="color: rgba(248,242,231,0.7);">Home</a> /
            <a href="{{ route('promo.index') }}" class="text-decoration-none" style="color: rgba(248,242,231,0.7);">Promo</a> /
            <span style="color: var(--coral);">{{ $promo->title }}</span>
        </nav>
    </div>
    <div class="wave-divider"><svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0,40 C280,90 480,0 720,30 C960,60 1160,10 1440,50 L1440,100 L0,100 Z" fill="var(--cream)"></path></svg></div>
</section>

<section class="py-4" style="position:relative; overflow:hidden; padding-bottom: 6rem;">
    <div class="container py-4">

        <div class="row g-5">
            <div class="col-lg-6 fade-up show">
                <div class="ratio ratio-4x3 rounded-4 overflow-hidden shadow-sm">
                    @if ($promo->image_url)
                        <img src="{{ $promo->image_url }}" class="w-100 h-100" style="object-fit:cover;">
                    @else
                        <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: var(--beige);"><i class="bi bi-percent display-1" style="color: var(--olive);"></i></div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 fade-up show">
                @if ($promo->discount_percent)<span class="badge mb-2" style="background: var(--coral);">Diskon {{ $promo->discount_percent }}%</span>@endif
                <h1 class="fw-bold mb-3" style="color: var(--dark-olive);">{{ $promo->title }}</h1>
                <p class="text-muted mb-4" style="line-height:1.9;">{{ $promo->description }}</p>

                <div class="card border-0 shadow-sm p-3 mb-3">
                    <p class="mb-2"><i class="bi bi-calendar-event me-2" style="color: var(--coral);"></i> Berlaku: {{ $promo->start_date->format('d M Y') }} - {{ $promo->end_date->format('d M Y') }}</p>
                    @if ($promo->menu)
                        <p class="mb-0"><i class="bi bi-egg-fried me-2" style="color: var(--coral);"></i> Berlaku untuk menu: <strong>{{ $promo->menu->name }}</strong></p>
                    @endif
                </div>

                <a href="{{ route('reservation.create') }}" class="btn btn-coral">Reservasi Sekarang</a>
                @if ($promo->menu)
                    <a href="{{ route('menu.show', $promo->menu->slug) }}" class="btn btn-outline-secondary">Lihat Menu Terkait</a>
                @endif
            </div>
        </div>

        @if ($otherPromos->isNotEmpty())
            <div class="mt-5 pt-4">
                <h4 class="section-title mb-4">Promo Lainnya</h4>
                <div class="row g-4" style="padding-bottom: 3rem;">
                    @foreach ($otherPromos as $other)
                        <div class="col-md-4 fade-up">
                            <a href="{{ route('promo.show', $other->slug) }}" class="text-decoration-none">
                                <div class="card border-0 shadow-sm h-100">
                                    @if ($other->image_url)<img src="{{ $other->image_url }}" class="card-img-top" style="height:150px; object-fit:cover;">@endif
                                    <div class="card-body p-2">
                                        <div class="small fw-semibold" style="color: var(--dark-olive);">{{ $other->title }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    <div class="wave-divider"><svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0,40 C280,90 480,0 720,30 C960,60 1160,10 1440,50 L1440,100 L0,100 Z" fill="var(--dark-olive)"></path></svg></div>
</section>

@endsection