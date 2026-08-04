@extends('layouts.app')
@section('title', 'Artikel')
@section('content')

<section style="background: var(--dark-olive); padding: 140px 0 60px;">
    <div class="container text-center text-white">
        <h1 class="fw-bold" style="color: var(--cream);">Artikel & Berita</h1>
        <p style="color: rgba(248,242,231,0.8);">Cerita, tips, dan info terbaru dari kami</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <form method="GET" class="row g-2 mb-4 fade-up show justify-content-center">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control border-start-0" placeholder="Cari artikel..." value="{{ request('search') }}">
                    <button class="btn btn-coral">Cari</button>
                </div>
            </div>
        </form>

        <div class="row g-4">
            @forelse ($articles as $article)
                <div class="col-md-4 fade-up show">
                    <div class="card card-menu h-100">
                        @if ($article->image)
                            <img src="{{ asset('storage/'.$article->image) }}" class="card-img-top">
                        @else
                            <div class="d-flex align-items-center justify-content-center" style="height:200px; background: var(--beige);"><i class="bi bi-newspaper fs-1" style="color: var(--olive);"></i></div>
                        @endif
                        <div class="card-body">
                            <p class="small text-muted mb-1"><i class="bi bi-calendar3"></i> {{ $article->published_at?->format('d M Y') }}</p>
                            <h5 class="fw-semibold">{{ $article->title }}</h5>
                            <p class="text-muted small mb-2">{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 90) }}</p>
                            <a href="{{ route('article.show', $article->slug) }}" class="btn btn-sm btn-olive text-white">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">Belum ada artikel yang dipublikasikan.</div>
            @endforelse
        </div>
        <div class="mt-4">{{ $articles->links() }}</div>
    </div>
</section>

@endsection
