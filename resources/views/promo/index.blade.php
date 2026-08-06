@extends('layouts.app')
@section('title', 'Promo')
@section('content')

<section class="position-relative d-flex align-items-center" style="min-height: 55vh; overflow:hidden;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image:url('https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=1600&q=80'); background-size:cover; background-position:center;"></div>
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(46,71,32,0.55), rgba(62,95,43,0.85));"></div>
    <div class="container text-center text-white position-relative fade-up show" style="z-index:2; padding-top:60px;">
        <p class="italic-accent fs-4" style="color: var(--coral);">Jangan Lewatkan</p>
        <h1 class="display-4 fw-bold" style="color: var(--cream);">Promo Spesial</h1>
        <p class="fs-5" style="color: rgba(248,242,231,0.85);">Nikmati penawaran menarik dari kami</p>
    </div>
</section>

@if ($promos->isNotEmpty())
    @php $featured = $promos->first(); @endphp
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 fade-up show">
                    <div class="ratio ratio-4x3 rounded-4 overflow-hidden shadow">
                        <img src="{{ $featured->image_url }}" class="w-100 h-100" style="object-fit:cover;">
                    </div>
                </div>
                <div class="col-lg-6 fade-up show">
                    @if ($featured->discount_percent)<span class="badge mb-2" style="background: var(--coral);">Diskon {{ $featured->discount_percent }}%</span>@endif
                    <p class="section-sub">Promo Unggulan</p>
                    <h2 class="section-title mb-3">{{ $featured->title }}</h2>
                    <p class="text-muted mb-3" style="line-height:1.9;">{{ $featured->description }}</p>
                    <p class="small text-muted mb-4"><i class="bi bi-calendar-event"></i> Berlaku {{ $featured->start_date->format('d M Y') }} - {{ $featured->end_date->format('d M Y') }}</p>
                    <a href="{{ route('promo.show', $featured->slug) }}" class="btn btn-coral">Lihat Detail Promo</a>
                </div>
            </div>
        </div>
    </section>
@endif

<section class="py-5" style="background: var(--beige);">
    <div class="container py-4">
        <div class="text-center mb-5 fade-up">
            <p class="section-sub">Promo Lainnya</p>
            <h2 class="section-title">Semua Promo Aktif</h2>
        </div>
        <div class="row g-4">
            @forelse ($promos as $promo)
                <div class="col-md-4 fade-up">
                    <a href="{{ route('promo.show', $promo->slug) }}" class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100" style="border-radius:16px; overflow:hidden;">
                            @if ($promo->image_url)
                                <img src="{{ $promo->image_url }}" class="card-img-top" style="height:180px; object-fit:cover;">
                            @else
                                <div class="d-flex align-items-center justify-content-center" style="height:180px; background: #fff;"><i class="bi bi-percent fs-1" style="color: var(--olive);"></i></div>
                            @endif
                            <div class="card-body">
                                @if ($promo->discount_percent)<span class="badge" style="background: var(--coral);">Diskon {{ $promo->discount_percent }}%</span>@endif
                                <h5 class="fw-semibold mt-2" style="color: var(--dark-olive);">{{ $promo->title }}</h5>
                                <p class="text-muted small">{{ Str::limit($promo->description, 80) }}</p>
                                @if ($promo->menu)
                                    <p class="small text-muted mb-1"><i class="bi bi-egg-fried"></i> Berlaku untuk: {{ $promo->menu->name }}</p>
                                @endif
                                <p class="small text-muted mb-0"><i class="bi bi-calendar-event"></i> {{ $promo->start_date->format('d M Y') }} - {{ $promo->end_date->format('d M Y') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <i class="bi bi-percent fs-1 mb-2 d-block"></i>
                    Belum ada promo aktif saat ini.
                </div>
            @endforelse
        </div>
        <div class="mt-4">{{ $promos->links() }}</div>
    </div>
</section>

@endsection