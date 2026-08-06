@extends('layouts.app')
@section('title', 'Beranda')
@section('content')

{{-- HERO --}}
<section class="position-relative rustic-texture" style="min-height: 100vh; display:flex; align-items:center; background: var(--cream); overflow:hidden;">
    <div class="container position-relative" style="z-index:2; padding-top:100px; padding-bottom:80px;">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 fade-up show">
                <p class="handwritten fs-2 mb-1" style="color: var(--coral); transform: rotate(-2deg);">Sejak dulu, hangat selalu</p>
                <h1 class="display-4 fw-bold mb-3" style="color: var(--dark-olive); line-height:1.15;">Setiap Tegukan, Cerita Kehangatan</h1>
                <p class="mb-4" style="color: #5c5548; max-width: 460px; line-height:1.85; font-size:1.05rem;">{{ $profile->name ?? 'Ncek Joe Tie' }} meracik kopi pilihan dan hidangan hangat dengan resep turun-temurun, disajikan di ruang yang dirancang untuk kamu bersantai lebih lama — tanpa terburu-buru.</p>
                <div class="d-flex gap-3 flex-wrap align-items-center">
                    <a href="{{ route('menu.index') }}" class="btn btn-coral btn-lg px-4">Jelajahi Menu</a>
                    <a href="{{ route('reservation.create') }}" class="btn btn-outline-olive btn-lg px-4">Reservasi Meja</a>
                </div>
            </div>
            <div class="col-lg-6 fade-up show">
                <div id="heroPolaroid" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="polaroid-stack">
                                <div class="polaroid polaroid-back">
                                    <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=700&q=80">
                                </div>
                                <div class="polaroid polaroid-front">
                                    <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=700&q=80">
                                    <p class="handwritten text-center mb-0 mt-2">Kopi Susu Gula Aren</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="polaroid-stack">
                                <div class="polaroid polaroid-back">
                                    <img src="https://images.unsplash.com/photo-1445116572660-236099ec97a0?auto=format&fit=crop&w=700&q=80">
                                </div>
                                <div class="polaroid polaroid-front">
                                    <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=700&q=80">
                                    <p class="handwritten text-center mb-0 mt-2">Ruang yang Hangat</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="polaroid-stack">
                                <div class="polaroid polaroid-back">
                                    <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=700&q=80">
                                </div>
                                <div class="polaroid polaroid-front">
                                    <img src="https://images.unsplash.com/photo-1481833761820-0509d3217039?auto=format&fit=crop&w=700&q=80">
                                    <p class="handwritten text-center mb-0 mt-2">Diracik dengan Hati</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wave-divider"><svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0,40 C280,90 480,0 720,30 C960,60 1160,10 1440,50 L1440,100 L0,100 Z" fill="var(--beige)"></path></svg></div>
</section>

{{-- TENTANG KAMI --}}
<section class="py-5" style="background: var(--beige); padding-top:6rem !important; padding-bottom:6rem !important;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 fade-up">
                <div class="polaroid polaroid-solo">
                    @if (!empty($profile->cover_photo))
                        <img src="{{ asset('storage/'.$profile->cover_photo) }}">
                    @else
                        <img src="https://images.unsplash.com/photo-1481833761820-0509d3217039?auto=format&fit=crop&w=900&q=80">
                    @endif
                </div>
            </div>
            <div class="col-lg-6 fade-up">
                <p class="handwritten fs-3 mb-1" style="color: var(--coral);">Kisah kami</p>
                <h2 class="section-title mb-3">Kehangatan di Setiap Cangkir</h2>
                <p class="text-muted mb-3" style="line-height:1.9;">{{ $profile->history ?? 'Ncek Joe Tie berawal dari kedai kecil yang menyajikan kopi dan hidangan hangat dengan resep turun-temurun.' }}</p>
                <p class="text-muted mb-4" style="line-height:1.9;">Kini, kami tumbuh menjadi ruang berkumpul bagi siapa saja yang ingin menikmati waktu tanpa terburu-buru — baik untuk secangkir kopi santai sendirian, obrolan hangat bersama teman, maupun momen spesial bersama keluarga. Setiap detail, dari racikan hingga suasana ruangan, kami rancang agar kunjunganmu terasa seperti pulang ke rumah.</p>
                <a href="{{ route('about') }}" class="btn btn-outline-olive">Selengkapnya</a>
            </div>
        </div>
    </div>
</section>

{{-- MENU FAVORIT --}}
<section class="py-5 rustic-texture" style="padding-top:6rem; padding-bottom:6rem;">
    <div class="container">
        <div class="text-center mb-5 fade-up">
            <p class="handwritten fs-3 mb-1" style="color: var(--coral);">Pilihan terbaik</p>
            <h2 class="section-title">Menu Favorit</h2>
        </div>
        <div class="row g-4">
            @forelse ($bestSellers as $menu)
                <div class="col-md-4 fade-up">
                    <div class="card-rustic h-100">
                        <div class="card-rustic-img">
                            @if ($menu->image_url)
                                <img src="{{ $menu->image_url }}">
                            @else
                                <div class="d-flex align-items-center justify-content-center h-100" style="background: var(--beige);"><i class="bi bi-cup-hot fs-1" style="color: var(--olive);"></i></div>
                            @endif
                            <span class="price-tag">Rp{{ number_format($menu->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="p-3">
                            <span class="badge bg-light text-dark border mb-2">{{ $menu->category->name }}</span>
                            @if ($menu->is_best_seller)<span class="badge badge-best mb-2">Best Seller</span>@endif
                            <h5 class="fw-semibold mb-1" style="color: var(--dark-olive);">{{ $menu->name }}</h5>
                            <p class="text-muted small mb-2">{{ Str::limit($menu->description, 65) }}</p>
                            <a href="{{ route('menu.show', $menu->slug) }}" class="small fw-semibold text-decoration-none" style="color: var(--coral);">Lihat Detail &rarr;</a>
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
    <div class="wave-divider"><svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0,40 C280,90 480,0 720,30 C960,60 1160,10 1440,50 L1440,100 L0,100 Z" fill="var(--beige)"></path></svg></div>
</section>

{{-- PROMO --}}
@if ($promos->isNotEmpty())
<section class="py-5" style="background: var(--beige); padding-top:6rem !important; padding-bottom:6rem !important;">
    <div class="container">
        <div class="text-center mb-5 fade-up">
            <p class="handwritten fs-3 mb-1" style="color: var(--coral);">Jangan lewatkan</p>
            <h2 class="section-title">Promo Spesial</h2>
        </div>
        <div class="row g-4">
            @foreach ($promos as $promo)
                <div class="col-md-4 fade-up">
                    <a href="{{ route('promo.show', $promo->slug) }}" class="text-decoration-none">
                        <div class="card-rustic h-100">
                            <div class="card-rustic-img" style="height:170px;">
                                @if ($promo->image_url)<img src="{{ $promo->image_url }}">@endif
                                @if ($promo->discount_percent)<span class="price-tag" style="background: var(--coral);">-{{ $promo->discount_percent }}%</span>@endif
                            </div>
                            <div class="p-3">
                                <h5 class="fw-semibold mb-1" style="color: var(--dark-olive);">{{ $promo->title }}</h5>
                                <p class="text-muted small mb-2">{{ Str::limit($promo->description, 75) }}</p>
                                <p class="small text-muted mb-0"><i class="bi bi-calendar-event"></i> s/d {{ $promo->end_date->format('d M Y') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- KENAPA MEMILIH KAMI --}}
<section class="py-5" style="background: var(--dark-olive); position:relative; overflow:hidden; padding-top:6rem !important; padding-bottom:6rem !important;">
    <div class="container text-white position-relative" style="z-index:2;">
        <div class="text-center mb-5 fade-up">
            <p class="handwritten fs-3 mb-1" style="color: var(--coral);">Kenapa kami?</p>
            <h2 style="color: var(--cream);" class="fw-bold">Alasan Kamu Akan Kembali Lagi</h2>
        </div>
        <div class="row g-4">
            @php
                $features = [
                    ['icon' => 'bi-award', 'title' => 'Kualitas Premium', 'desc' => 'Biji kopi & bahan pilihan, diracik konsisten oleh barista berpengalaman.'],
                    ['icon' => 'bi-cup-hot', 'title' => 'Suasana Hangat', 'desc' => 'Ruang yang dirancang untuk membuatmu betah, sendiri maupun ramai-ramai.'],
                    ['icon' => 'bi-stopwatch', 'title' => 'Pelayanan Cepat', 'desc' => 'Staf ramah dan sigap, karena waktu bersantaimu berharga.'],
                    ['icon' => 'bi-tags', 'title' => 'Harga Bersahabat', 'desc' => 'Kualitas terbaik tak harus mahal — harga tetap ramah di kantong.'],
                ];
            @endphp
            @foreach ($features as $i => $f)
                <div class="col-md-3 col-6 fade-up">
                    <div class="text-center px-2">
                        <div class="sketch-badge mx-auto mb-3">
                            <i class="bi {{ $f['icon'] }} fs-3"></i>
                        </div>
                        <h5 class="mb-2" style="color: var(--cream); font-family: 'Fraunces', serif;">{{ $f['title'] }}</h5>
                        <p class="small" style="color: rgba(248,242,231,0.7); line-height:1.7;">{{ $f['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- MOMEN KAMI --}}
<section class="py-5" style="padding-top:6rem; padding-bottom:6rem;">
    <div class="container">
        <div class="text-center mb-5 fade-up">
            <p class="handwritten fs-3 mb-1" style="color: var(--coral);">Momen kami</p>
            <h2 class="section-title">Setiap Sudut Punya Cerita</h2>
        </div>
        <div class="row g-2">
            @php $sizes = ['col-md-4 col-6', 'col-md-4 col-6', 'col-md-4 col-6', 'col-md-6 col-6', 'col-md-3 col-6', 'col-md-3 col-6']; @endphp
            @foreach ($galleries as $i => $g)
                <div class="{{ $sizes[$i] ?? 'col-md-3 col-6' }} fade-up">
                    <a href="{{ $g->image_url }}" data-lightbox="gallery" class="d-block rounded-3 overflow-hidden" style="height:{{ $i === 3 ? '260' : '200' }}px; border:4px solid #fff; box-shadow: 0 6px 18px rgba(46,71,32,0.15);">
                        <img src="{{ $g->image_url }}" class="w-100 h-100" style="object-fit:cover;">
                    </a>
                </div>
            @endforeach
        </div>
        @if ($galleries->isEmpty())
            <p class="text-center text-muted">Galeri belum tersedia.</p>
        @endif
        <div class="text-center mt-4"><a href="{{ route('gallery.index') }}" class="btn btn-outline-olive">Lihat Semua Foto</a></div>
    </div>
</section>

{{-- TESTIMONI --}}
@if ($testimonials->isNotEmpty())
<section class="py-5 rustic-texture" style="padding-top:6rem; padding-bottom:6rem;">
    <div class="container">
        <div class="text-center mb-5 fade-up">
            <p class="handwritten fs-3 mb-1" style="color: var(--coral);">Kata mereka</p>
            <h2 class="section-title">Testimoni Pelanggan</h2>
        </div>
        <div id="testiCarousel" class="carousel slide fade-up" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($testimonials->chunk(3) as $i => $group)
                    <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                        <div class="row g-4">
                            @foreach ($group as $j => $t)
                                <div class="col-md-4">
                                    <div class="note-card" style="transform: rotate({{ $j % 2 === 0 ? '-1.5deg' : '1.5deg' }});">
                                        <div class="mb-2">{{ str_repeat('⭐', $t->rating) }}</div>
                                        <p class="small text-muted">"{{ $t->message }}"</p>
                                        <p class="handwritten fs-4 mb-0" style="color: var(--dark-olive);">{{ $t->name }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            @if ($testimonials->count() > 3)
                <button class="carousel-control-prev" type="button" data-bs-target="#testiCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon" style="filter:invert(0.4) sepia(1) saturate(3) hue-rotate(90deg);"></span></button>
                <button class="carousel-control-next" type="button" data-bs-target="#testiCarousel" data-bs-slide="next"><span class="carousel-control-next-icon" style="filter:invert(0.4) sepia(1) saturate(3) hue-rotate(90deg);"></span></button>
            @endif
        </div>
    </div>
</section>
@endif

{{-- FAQ --}}
@if ($faqs->isNotEmpty())
<section class="py-5" id="faq" style="padding-top:6rem; padding-bottom:6rem;">
    <div class="container" style="max-width: 800px;">
        <div class="text-center mb-5 fade-up">
            <p class="handwritten fs-3 mb-1" style="color: var(--coral);">Sering ditanya</p>
            <h2 class="section-title">FAQ</h2>
        </div>
        <div class="accordion fade-up" id="faqAccordion">
            @foreach ($faqs as $i => $faq)
                <div class="accordion-item mb-3 border-0" style="border-radius:14px; overflow:hidden; box-shadow: 0 3px 12px rgba(46,71,32,0.08);">
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
<section class="py-5" style="background: var(--beige); padding-top:6rem !important; padding-bottom:6rem !important;">
    <div class="container">
        <div class="text-center mb-5 fade-up">
            <p class="handwritten fs-3 mb-1" style="color: var(--coral);">Kunjungi kami</p>
            <h2 class="section-title">Dimana Bisa Menemukan Kami?</h2>
        </div>
        <div class="row g-4 fade-up">
            <div class="col-lg-5">
                <div class="h-100 d-flex flex-column justify-content-center p-4" style="background: #fff; border-radius:18px; box-shadow: 0 6px 20px rgba(46,71,32,0.08);">
                    <p style="line-height:2.6;"><i class="bi bi-geo-alt-fill me-2" style="color: var(--coral);"></i> {{ $profile->address ?? '-' }}</p>
                    <p style="line-height:2.6;"><i class="bi bi-telephone-fill me-2" style="color: var(--coral);"></i> {{ $profile->phone ?? '-' }}</p>
                    <p style="line-height:2.6;"><i class="bi bi-whatsapp me-2" style="color: var(--coral);"></i> {{ $profile->whatsapp ?? '-' }}</p>
                    <p class="mb-0" style="line-height:2.6;"><i class="bi bi-clock-fill me-2" style="color: var(--coral);"></i> {{ $profile->opening_hours ?? '-' }}</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="rounded-4 overflow-hidden shadow-sm" style="height:320px; border:4px solid #fff;">
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
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600;700&display=swap" rel="stylesheet">
<style>
    .handwritten { font-family: 'Caveat', cursive; font-weight: 600; }

    .rustic-texture { position: relative; }
    .rustic-texture::before {
        content: ""; position: absolute; inset: 0; pointer-events: none; opacity: .5;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.05'/%3E%3C/svg%3E");
    }

    .btn-outline-olive { border: 1.5px solid var(--olive); color: var(--olive); border-radius: 30px; padding: .55rem 1.6rem; font-weight: 600; background: transparent; transition: .3s; }
    .btn-outline-olive:hover { background: var(--olive); color: #fff; }

    .wave-divider { position: absolute; bottom: -1px; left: 0; width: 100%; line-height: 0; z-index: 1; }
    .wave-divider svg { width: 100%; height: 70px; display: block; }

    .polaroid-stack { position: relative; height: 420px; }
    .polaroid { background: #fff; padding: 14px 14px 18px; box-shadow: 0 12px 30px rgba(46,71,32,0.2); border-radius: 4px; }
    .polaroid img { width: 100%; height: 260px; object-fit: cover; display: block; }
    .polaroid-back { position: absolute; top: 30px; right: 0; width: 62%; transform: rotate(6deg); opacity: .85; }
    .polaroid-back img { height: 220px; }
    .polaroid-front { position: absolute; bottom: 10px; left: 0; width: 62%; transform: rotate(-4deg); }
    .polaroid-solo { display: inline-block; transform: rotate(-2deg); max-width: 100%; }
    .polaroid-solo img { width: 100%; height: 340px; object-fit: cover; }

    .card-rustic { background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 8px 24px rgba(46,71,32,0.08); border: 1px solid rgba(62,95,43,0.08); transition: .3s; }
    .card-rustic:hover { transform: translateY(-5px); box-shadow: 0 16px 32px rgba(46,71,32,0.14); }
    .card-rustic-img { position: relative; height: 190px; }
    .card-rustic-img img { width: 100%; height: 100%; object-fit: cover; }
    .price-tag { position: absolute; bottom: 10px; right: 10px; background: var(--olive); color: #fff; padding: .3rem .8rem; border-radius: 20px; font-size: .8rem; font-weight: 700; box-shadow: 0 3px 8px rgba(0,0,0,0.2); }

    .sketch-badge { width: 76px; height: 76px; border-radius: 50%; border: 2px dashed rgba(224,106,75,0.6); display:flex; align-items:center; justify-content:center; color: var(--coral); position: relative; }
    .sketch-badge::after { content:""; position:absolute; inset:8px; border-radius:50%; background: rgba(224,106,75,0.12); }
    .sketch-badge i { position: relative; z-index: 2; }

    .note-card { background: #fffdf8; border: 1px solid rgba(62,95,43,0.1); border-radius: 4px; padding: 1.3rem; height: 100%; box-shadow: 0 8px 20px rgba(46,71,32,0.1); }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
@endpush
@endsection