@extends('layouts.app')
@section('title', 'Beranda')
@section('content')

{{-- HERO --}}
<section style="background: linear-gradient(135deg, var(--dark-olive), var(--olive)); min-height: 100vh; display:flex; align-items:center; position:relative; overflow:hidden;">
    <div class="container position-relative" style="z-index:2; padding-top:80px;">
        <div class="row align-items-center">
            <div class="col-lg-7 text-white fade-up show">
                <p class="section-sub" style="color: var(--coral);">Selamat Datang di</p>
                <h1 class="display-3 fw-bold mb-3" style="color: var(--cream);">{{ $profile->name ?? 'Ncek Joe Tie' }}</h1>
                <p class="lead mb-4" style="color: rgba(248,242,231,0.85); max-width: 550px;">{{ $settings['site_tagline'] ?? 'Cafe & Resto Hangat Penuh Cita Rasa' }}</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('menu.index') }}" class="btn btn-coral btn-lg">Lihat Menu <i class="bi bi-arrow-right"></i></a>
                    <a href="{{ route('reservation.create') }}" class="btn btn-outline-cream btn-lg">Reservasi Meja</a>
                </div>
            </div>
        </div>
    </div>
    <div style="position:absolute; bottom:-100px; right:-100px; width:400px; height:400px; background: var(--coral); opacity:.15; border-radius:50%;"></div>
</section>

{{-- TENTANG KAMI --}}
<section class="py-5 py-lg-6" style="padding-top:5rem;padding-bottom:5rem;">
    <div class="container">
        <div class="row align-items-center g-5">
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
                <p class="section-sub">Tentang Kami</p>
                <h2 class="section-title mb-3">Kehangatan di Setiap Cangkir</h2>
                <p class="text-muted mb-4">{{ $profile->history ?? 'Ncek Joe Tie berawal dari kedai kecil yang menyajikan kopi dan hidangan hangat dengan resep turun-temurun.' }}</p>
                <a href="{{ route('about') }}" class="btn btn-coral">Selengkapnya</a>
            </div>
        </div>
    </div>
</section>

{{-- MENU FAVORIT --}}
<section class="py-5" style="background: var(--beige);">
    <div class="container py-4">
        <div class="text-center mb-5 fade-up">
            <p class="section-sub">Pilihan Terbaik</p>
            <h2 class="section-title">Menu Favorit</h2>
        </div>
        <div class="row g-4">
            @forelse ($bestSellers as $menu)
                <div class="col-md-4 fade-up">
                    <div class="card card-menu h-100">
                        @if ($menu->image)
                            <img src="{{ asset('storage/'.$menu->image) }}" class="card-img-top">
                        @else
                            <div class="d-flex align-items-center justify-content-center" style="height:200px; background: var(--beige);"><i class="bi bi-cup-hot fs-1" style="color: var(--olive);"></i></div>
                        @endif
                        <div class="card-body">
                            <span class="badge badge-best mb-2">Best Seller</span>
                            <h5 class="fw-semibold">{{ $menu->name }}</h5>
                            <p class="text-muted small mb-2">{{ Str::limit($menu->description, 70) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold" style="color: var(--coral);">Rp{{ number_format($menu->price, 0, ',', '.') }}</span>
                                <a href="{{ route('menu.show', $menu->slug) }}" class="btn btn-sm btn-olive text-white">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Menu favorit belum tersedia.</p>
            @endforelse
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('menu.index') }}" class="btn btn-coral">Lihat Semua Menu</a>
        </div>
    </div>
</section>

{{-- PROMO --}}
@if ($promos->isNotEmpty())
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5 fade-up">
            <p class="section-sub">Jangan Lewatkan</p>
            <h2 class="section-title">Promo Spesial</h2>
        </div>
        <div class="row g-4">
            @foreach ($promos as $promo)
                <div class="col-md-4 fade-up">
                    <div class="card border-0 shadow-sm h-100" style="border-radius:16px; overflow:hidden;">
                        @if ($promo->image)
                            <img src="{{ asset('storage/'.$promo->image) }}" class="card-img-top" style="height:170px; object-fit:cover;">
                        @endif
                        <div class="card-body">
                            @if ($promo->discount_percent)<span class="badge" style="background: var(--coral);">Diskon {{ $promo->discount_percent }}%</span>@endif
                            <h5 class="fw-semibold mt-2">{{ $promo->title }}</h5>
                            <p class="text-muted small">{{ Str::limit($promo->description, 80) }}</p>
                            <p class="small text-muted mb-0"><i class="bi bi-calendar-event"></i> Berlaku s/d {{ $promo->end_date->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- KENAPA MEMILIH KAMI --}}
<section class="py-5" style="background: var(--dark-olive);">
    <div class="container py-4 text-white">
        <div class="text-center mb-5 fade-up">
            <p class="section-sub">Keunggulan Kami</p>
            <h2 style="color: var(--cream);" class="fw-bold">Kenapa Memilih Ncek Joe Tie</h2>
        </div>
        <div class="row g-4 text-center">
            @php
                $features = [
                    ['icon' => 'bi-cup-hot', 'title' => 'Kualitas Premium', 'desc' => 'Bahan pilihan dan racikan konsisten di setiap sajian.'],
                    ['icon' => 'bi-emoji-smile', 'title' => 'Suasana Hangat', 'desc' => 'Tempat nyaman untuk berkumpul bersama keluarga & teman.'],
                    ['icon' => 'bi-lightning-charge', 'title' => 'Pelayanan Cepat', 'desc' => 'Staf ramah dan sigap melayani setiap kunjungan.'],
                    ['icon' => 'bi-wallet2', 'title' => 'Harga Bersahabat', 'desc' => 'Kualitas terbaik dengan harga yang terjangkau.'],
                ];
            @endphp
            @foreach ($features as $f)
                <div class="col-md-3 fade-up">
                    <i class="bi {{ $f['icon'] }} display-4 mb-3" style="color: var(--coral);"></i>
                    <h5 style="color: var(--cream);">{{ $f['title'] }}</h5>
                    <p class="small" style="color: rgba(248,242,231,0.75);">{{ $f['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- GALERI --}}
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5 fade-up">
            <p class="section-sub">Momen Kami</p>
            <h2 class="section-title">Galeri</h2>
        </div>
        <div class="row g-2">
            @forelse ($galleries as $g)
                <div class="col-md-3 col-6 fade-up">
                    <a href="{{ asset('storage/'.$g->image) }}" data-lightbox="gallery" class="d-block rounded-3 overflow-hidden" style="height:180px;">
                        <img src="{{ asset('storage/'.$g->image) }}" class="w-100 h-100" style="object-fit:cover;">
                    </a>
                </div>
            @empty
                <p class="text-center text-muted">Galeri belum tersedia.</p>
            @endforelse
        </div>
        <div class="text-center mt-4"><a href="{{ route('gallery.index') }}" class="btn btn-coral">Lihat Semua Foto</a></div>
    </div>
</section>

{{-- TESTIMONI --}}
@if ($testimonials->isNotEmpty())
<section class="py-5" style="background: var(--beige);">
    <div class="container py-4">
        <div class="text-center mb-5 fade-up">
            <p class="section-sub">Kata Mereka</p>
            <h2 class="section-title">Testimoni Pelanggan</h2>
        </div>
        <div id="testiCarousel" class="carousel slide fade-up" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($testimonials->chunk(3) as $i => $group)
                    <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                        <div class="row g-4">
                            @foreach ($group as $t)
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm h-100 p-3">
                                        <div class="mb-2">{{ str_repeat('⭐', $t->rating) }}</div>
                                        <p class="small text-muted">"{{ $t->message }}"</p>
                                        <p class="fw-semibold mb-0">{{ $t->name }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            @if ($testimonials->count() > 3)
                <button class="carousel-control-prev" type="button" data-bs-target="#testiCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon" style="filter:invert(1) grayscale(1);"></span></button>
                <button class="carousel-control-next" type="button" data-bs-target="#testiCarousel" data-bs-slide="next"><span class="carousel-control-next-icon" style="filter:invert(1) grayscale(1);"></span></button>
            @endif
        </div>
    </div>
</section>
@endif

{{-- FAQ --}}
@if ($faqs->isNotEmpty())
<section class="py-5">
    <div class="container py-4" style="max-width: 800px;">
        <div class="text-center mb-5 fade-up">
            <p class="section-sub">Pertanyaan Umum</p>
            <h2 class="section-title">FAQ</h2>
        </div>
        <div class="accordion fade-up" id="faqAccordion">
            @foreach ($faqs as $i => $faq)
                <div class="accordion-item mb-2 border-0 shadow-sm rounded-3 overflow-hidden">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $i }}">
                            {{ $faq->question }}
                        </button>
                    </h2>
                    <div id="faq{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted">{{ $faq->answer }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- LOKASI --}}
<section class="py-5" style="background: var(--beige);">
    <div class="container py-4">
        <div class="text-center mb-5 fade-up">
            <p class="section-sub">Kunjungi Kami</p>
            <h2 class="section-title">Lokasi</h2>
        </div>
        <div class="row g-4 fade-up">
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <p><i class="bi bi-geo-alt-fill" style="color: var(--coral);"></i> {{ $profile->address ?? '-' }}</p>
                    <p><i class="bi bi-telephone-fill" style="color: var(--coral);"></i> {{ $profile->phone ?? '-' }}</p>
                    <p><i class="bi bi-whatsapp" style="color: var(--coral);"></i> {{ $profile->whatsapp ?? '-' }}</p>
                    <p class="mb-0"><i class="bi bi-clock-fill" style="color: var(--coral);"></i> {{ $profile->opening_hours ?? '-' }}</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="rounded-4 overflow-hidden shadow-sm" style="height:320px;">
                    @if (!empty($profile->maps_embed_url))
                        <iframe src="{{ $profile->maps_embed_url }}" width="100%" height="100%" style="border:0;" loading="lazy"></iframe>
                    @else
                        <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-white"><i class="bi bi-map fs-1 text-muted"></i></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
@endpush
@endsection
