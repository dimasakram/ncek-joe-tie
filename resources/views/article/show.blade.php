@extends('layouts.app')
@section('title', $article->meta_title ?? $article->title)
@section('meta_description', $article->meta_description ?? Str::limit(strip_tags($article->content), 150))
@section('content')

<section style="background: var(--dark-olive); position: relative;  padding-top: 100px; padding-bottom: 4rem;">
    <div class="container" style="max-width: 800px;">
        <nav class="small" style="margin-left: -172px;">
            <a href="{{ route('home') }}" class="text-decoration-none" style="color: rgba(248,242,231,0.7);">Home</a> /
            <a href="{{ route('article.index') }}" class="text-decoration-none" style="color: rgba(248,242,231,0.7);">Artikel</a> /
            <span style="color: var(--coral);">{{ $article->title }}</span>
        </nav>
    </div>
    <div class="wave-divider"><svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0,40 C280,90 480,0 720,30 C960,60 1160,10 1440,50 L1440,100 L0,100 Z" fill="var(--cream)"></path></svg></div>
</section>

<section class="py-4" style="position: relative; overflow: hidden;">
    <div class="container py-4" style="max-width: 800px;">

        <div class="fade-up show">
            <p class="small text-muted mb-1"><i class="bi bi-calendar3"></i> {{ $article->published_at?->format('d M Y') }} &middot; {{ $article->user->name }}</p>
            <h1 class="fw-bold mb-4" style="color: var(--dark-olive);">{{ $article->title }}</h1>

            @if ($article->image)
                <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm mb-4">
                    <img src="{{ $article->image_url }}" style="object-fit:cover;">
                </div>
            @endif

            <div class="fs-6" style="line-height: 1.9; white-space: pre-line;">{{ $article->content }}</div>
        </div>

        @if ($latestArticles->isNotEmpty())
            <div class="mt-5 pt-4 border-top">
                <h5 class="section-title mb-4">Artikel Lainnya</h5>
                <div class="row g-3" style="padding-bottom: 3rem;">
                    @foreach ($latestArticles as $latest)
                        <div class="col-md-4">
                            <a href="{{ route('article.show', $latest->slug) }}" class="text-decoration-none">
                                <div class="card border-0 shadow-sm h-100">
                                    @if ($latest->image)<img src="{{ $latest->image_url }}" class="card-img-top" style="height:120px; object-fit:cover;">@endif
                                    <div class="card-body p-2">
                                        <div class="small fw-semibold" style="color: var(--dark-olive);">{{ Str::limit($latest->title, 50) }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="wave-divider"><svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0,40 C280,90 480,0 720,30 C960,60 1160,10 1440,50 L1440,100 L0,100 Z" fill="var(--dark-olive)"></path></svg></div>
            </div>
        @endif
    </div>
</section>

@endsection