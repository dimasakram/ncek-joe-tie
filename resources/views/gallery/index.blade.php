@extends('layouts.app')
@section('title', 'Galeri')
@section('content')

{{-- HERO --}}
<section class="position-relative d-flex align-items-center rustic-texture" style="min-height: 55vh; overflow:hidden;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image:url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=1600&q=80'); background-size:cover; background-position:center;"></div>
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(46,71,32,0.55), rgba(62,95,43,0.9));"></div>
    <div class="container text-center text-white position-relative fade-up show" style="z-index:2; padding-top:60px; padding-bottom:70px;">
        <p class="handwritten fs-2 mb-1" style="color: var(--coral); transform: rotate(-2deg);">Momen kami</p>
        <h1 class="display-4 fw-bold" style="color: var(--cream);">Galeri</h1>
        <p class="fs-5" style="color: rgba(248,242,231,0.85);">Cerita hangat di {{ $profile->name ?? 'Ncek Joe Tie' }}</p>
    </div>
    <div class="wave-divider"><svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0,40 C280,90 480,0 720,30 C960,60 1160,10 1440,50 L1440,100 L0,100 Z" fill="var(--cream)"></path></svg></div>
</section>

{{-- CERITA PENGANTAR + FOTO UNGGULAN --}}
<section class="pt-4 pb-2">
    <div class="container">
        @php
            $showFeatured = $featured->count() >= 4 && $galleries->currentPage() === 1 && !request('category');
        @endphp
        <div class="position-relative mx-auto fade-up show" style="max-width: 1100px; min-height: 340px;">

            @if ($showFeatured)
                {{-- KIRI ATAS --}}
                <div class="polaroid polaroid-solo polaroid-tone d-none d-lg-block position-absolute" style="width:175px; top:0; left:-18px; transform: rotate(-5deg); z-index:2;">
                    <img src="{{ $featured[0]->image_url }}" style="height:115px;">
                    <p class="handwritten text-center mb-0 mt-1" style="font-size:1.1rem;">{{ $featured[0]->title }}</p>
                </div>
                {{-- KIRI BAWAH (overlap dikit ke kiri atas) --}}
                <div class="polaroid polaroid-solo polaroid-tone d-none d-lg-block position-absolute" style="width:160px; top:148px; left:14px; transform: rotate(4deg); z-index:3;">
                    <img src="{{ $featured[1]->image_url }}" style="height:105px;">
                    <p class="handwritten text-center mb-0 mt-1" style="font-size:1.05rem;">{{ $featured[1]->title }}</p>
                </div>

                {{-- KANAN ATAS --}}
                <div class="polaroid polaroid-solo polaroid-tone d-none d-lg-block position-absolute" style="width:180px; top:8px; right:-14px; transform: rotate(4deg); z-index:2;">
                    <img src="{{ $featured[2]->image_url }}" style="height:118px;">
                    <p class="handwritten text-center mb-0 mt-1" style="font-size:1.1rem;">{{ $featured[2]->title }}</p>
                </div>
                {{-- KANAN BAWAH (overlap dikit ke kanan atas) --}}
                <div class="polaroid polaroid-solo polaroid-tone d-none d-lg-block position-absolute" style="width:162px; top:164px; right:22px; transform: rotate(-4deg); z-index:3;">
                    <img src="{{ $featured[3]->image_url }}" style="height:106px;">
                    <p class="handwritten text-center mb-0 mt-1" style="font-size:1.05rem;">{{ $featured[3]->title }}</p>
                </div>
            @endif

            {{-- KONTEN TENGAH --}}
            <div class="text-center mx-auto position-relative" style="max-width: 540px; z-index:5; padding-top: 4px;" >
                <p class="mb-0" style="font-family: 'Fraunces', serif; font-style: italic; font-weight: 500; font-size: clamp(1.2rem, 2.3vw, 1.55rem); line-height: 1.75; color: var(--dark-olive); letter-spacing: .2px;">Setiap sudut {{ $profile->name ?? 'Ncek Joe Tie' }} punya cerita — dari secangkir kopi pertama yang diseduh pagi hari, sampai obrolan hangat yang enggak ada habisnya. Ini sebagian momen yang sempat kami abadikan.</p>

                <div class="d-flex flex-wrap justify-content-center gap-2 mt-4">
                    @php
                        $current = request('category');
                        $pillStyle = fn ($active) => $active
                            ? 'background: var(--coral); color:#fff; border-color: var(--coral);'
                            : 'background:#fff; color: var(--dark-olive); border-color: var(--beige);';
                        $catLabels = ['makanan' => 'Makanan', 'interior' => 'Interior', 'event' => 'Event'];
                    @endphp
                    <a href="{{ route('gallery.index') }}" class="px-3 py-2 small fw-semibold text-decoration-none rounded-pill" style="border: 1.5px solid; {{ $pillStyle(!$current) }}">Semua</a>
                    @foreach ($catLabels as $slug => $label)
                        <a href="{{ route('gallery.index', ['category' => $slug]) }}" class="px-3 py-2 small fw-semibold text-decoration-none rounded-pill" style="border: 1.5px solid; {{ $pillStyle($current === $slug) }}">{{ $label }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- GRID GALERI (masonry variatif + hover caption) --}}
<section class="py-5 rustic-texture" style="padding-top:2rem; position:relative; overflow:hidden;">
    <div class="container" style="padding-bottom: 5rem;">
        <div class="gallery-masonry">
            @php $heights = [260, 340, 220, 300, 240, 320]; @endphp
            @forelse ($galleries as $i => $g)
                <div class="gallery-masonry-item fade-up show">
                    <a href="{{ $g->image_url }}" data-lightbox="gallery-page" data-title="{{ $g->title }}" class="gallery-tile d-block rounded-3 overflow-hidden shadow-sm position-relative" style="height:{{ $heights[$i % 6] }}px;">
                        <img src="{{ $g->image_url }}" class="w-100 h-100 gallery-tile-img" style="object-fit:cover;">
                        <div class="gallery-tile-overlay">
                            <span class="handwritten fs-4">{{ $g->title }}</span>
                        </div>
                    </a>
                </div>
            @empty
                <p class="text-center text-muted py-5">Belum ada foto galeri.</p>
            @endforelse
        </div>
        <div class="mt-4">{{ $galleries->links() }}</div>
    </div>
    <div class="wave-divider"><svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0,40 C280,90 480,0 720,30 C960,60 1160,10 1440,50 L1440,100 L0,100 Z" fill="var(--dark-olive)"></path></svg></div>
</section>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">
<style>
    .gallery-masonry { column-count: 3; column-gap: 1rem; }
    .gallery-masonry-item { break-inside: avoid; margin-bottom: 1rem; }
    @media (max-width: 768px) { .gallery-masonry { column-count: 2; } }
    @media (max-width: 480px) { .gallery-masonry { column-count: 1; } }

    .gallery-tile-img { transition: transform .5s ease; }
    .gallery-tile:hover .gallery-tile-img { transform: scale(1.08); }
    .gallery-tile-overlay {
        position: absolute; inset: 0; display: flex; align-items: flex-end; padding: 1rem;
        background: linear-gradient(to top, rgba(46,71,32,0.75), transparent 60%);
        color: var(--cream); opacity: 0; transition: opacity .35s ease;
    }
    .gallery-tile:hover .gallery-tile-overlay { opacity: 1; }

    .polaroid-tone img { filter: sepia(.15) saturate(1.2) contrast(1.02) brightness(1.02); }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
@endpush
@endsection