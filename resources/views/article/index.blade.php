@extends('layouts.app')
@section('title', 'Artikel')
@section('content')

{{-- HERO --}}
<section class="position-relative d-flex align-items-center rustic-texture" style="min-height: 55vh; overflow:hidden;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image:url('https://images.unsplash.com/photo-1442512595331-e89e73853f31?auto=format&fit=crop&w=1600&q=80'); background-size:cover; background-position:center;"></div>
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(46,71,32,0.55), rgba(62,95,43,0.9));"></div>
    <div class="container text-center text-white position-relative fade-up show" style="z-index:2; padding-top:60px; padding-bottom:70px;">
        <p class="handwritten fs-2 mb-1" style="color: var(--coral); transform: rotate(-2deg);">Cerita & inspirasi</p>
        <h1 class="display-4 fw-bold" style="color: var(--cream);">Artikel & Berita</h1>
        <p class="fs-5" style="color: rgba(248,242,231,0.85);">Tips, cerita, dan info terbaru dari kami</p>
    </div>
    <div class="wave-divider"><svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0,40 C280,90 480,0 720,30 C960,60 1160,10 1440,50 L1440,100 L0,100 Z" fill="var(--cream)"></path></svg></div>
</section>

{{-- SEARCH BAR MENGAMBANG --}}
<div class="container position-relative fade-up show" style="z-index:5; margin-top: 1.75rem;">
    <form method="GET" class="d-flex align-items-center gap-2 p-2 mx-auto" style="max-width: 520px; background:#fff; border-radius:50px; box-shadow: 0 12px 30px rgba(46,71,32,0.18);">
        <span class="ps-2"><i class="bi bi-search" style="color: var(--coral);"></i></span>
        <input type="text" name="search" class="form-control border-0" placeholder="Cari artikel..." value="{{ request('search') }}" style="box-shadow:none;">
        <button class="btn btn-coral rounded-pill px-3">Cari</button>
    </form>
</div>

{{-- DAFTAR ARTIKEL --}}
<section class="py-5" style="padding-top:2.5rem; position:relative; overflow:hidden;">
    <div class="container" style="padding-bottom: 5rem;">
        <div class="row g-4">
            @forelse ($articles as $article)
                <div class="col-md-4 fade-up show">
                    <div class="card-rustic h-100">
                        <div class="card-rustic-img">
                            @if ($article->image_url)
                                <img src="{{ $article->image_url }}">
                            @else
                                <div class="d-flex align-items-center justify-content-center h-100" style="background: var(--beige);"><i class="bi bi-newspaper fs-1" style="color: var(--olive);"></i></div>
                            @endif
                        </div>
                        <div class="p-3">
                            <p class="small text-muted mb-1"><i class="bi bi-calendar3"></i> {{ $article->published_at?->format('d M Y') }}</p>
                            <h5 class="fw-semibold mb-1" style="color: var(--dark-olive);">{{ $article->title }}</h5>
                            <p class="text-muted small mb-2">{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 90) }}</p>
                            <a href="{{ route('article.show', $article->slug) }}" class="small fw-semibold text-decoration-none" style="color: var(--coral);">Baca Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">Belum ada artikel yang dipublikasikan.</div>
            @endforelse
        </div>
        <div class="mt-4">{{ $articles->links() }}</div>
    </div>
    <div class="wave-divider"><svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0,40 C280,90 480,0 720,30 C960,60 1160,10 1440,50 L1440,100 L0,100 Z" fill="var(--dark-olive)"></path></svg></div>
</section>

@endsection