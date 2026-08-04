@extends('layouts.app')
@section('title', $article->meta_title ?? $article->title)
@section('meta_description', $article->meta_description ?? Str::limit(strip_tags($article->content), 150))
@section('content')

<section style="padding-top:120px;">
    <div class="container py-4" style="max-width: 800px;">
        <nav class="mb-4 small">
            <a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a> /
            <a href="{{ route('article.index') }}" class="text-decoration-none text-muted">Artikel</a> /
            <span style="color: var(--dark-olive);">{{ $article->title }}</span>
        </nav>

        <div class="fade-up show">
            <p class="small text-muted mb-1"><i class="bi bi-calendar3"></i> {{ $article->published_at?->format('d M Y') }} &middot; {{ $article->user->name }}</p>
            <h1 class="fw-bold mb-4" style="color: var(--dark-olive);">{{ $article->title }}</h1>

            @if ($article->image)
                <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm mb-4">
                    <img src="{{ asset('storage/'.$article->image) }}" style="object-fit:cover;">
                </div>
            @endif

            <div class="fs-6" style="line-height: 1.9; white-space: pre-line;">{{ $article->content }}</div>
        </div>

        @if ($latestArticles->isNotEmpty())
            <div class="mt-5 pt-4 border-top">
                <h5 class="section-title mb-4">Artikel Lainnya</h5>
                <div class="row g-3">
                    @foreach ($latestArticles as $latest)
                        <div class="col-md-4">
                            <a href="{{ route('article.show', $latest->slug) }}" class="text-decoration-none">
                                <div class="card border-0 shadow-sm h-100">
                                    @if ($latest->image)<img src="{{ asset('storage/'.$latest->image) }}" class="card-img-top" style="height:120px; object-fit:cover;">@endif
                                    <div class="card-body p-2">
                                        <div class="small fw-semibold" style="color: var(--dark-olive);">{{ Str::limit($latest->title, 50) }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

@endsection
