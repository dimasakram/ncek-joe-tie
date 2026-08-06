@extends('layouts.app')
@section('title', 'Galeri')
@section('content')

<section class="position-relative d-flex align-items-center" style="min-height: 55vh; overflow:hidden;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image:url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=1600&q=80'); background-size:cover; background-position:center;"></div>
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(46,71,32,0.55), rgba(62,95,43,0.85));"></div>
    <div class="container text-center text-white position-relative fade-up show" style="z-index:2; padding-top:60px;">
        <p class="italic-accent fs-4" style="color: var(--coral);">Momen Kami</p>
        <h1 class="display-4 fw-bold" style="color: var(--cream);">Galeri</h1>
        <p class="fs-5" style="color: rgba(248,242,231,0.85);">Cerita hangat di {{ $profile->name ?? 'Ncek Joe Tie' }}</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-3">
            @forelse ($galleries as $g)
                <div class="col-md-3 col-6 fade-up show">
                    <a href="{{ $g->image_url }}" data-lightbox="gallery-page" data-title="{{ $g->title }}" class="d-block rounded-3 overflow-hidden shadow-sm" style="height:220px;">
                        <img src="{{ $g->image_url }}" class="w-100 h-100" style="object-fit:cover;">
                    </a>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">Belum ada foto galeri.</div>
            @endforelse
        </div>
        <div class="mt-4">{{ $galleries->links() }}</div>
    </div>
</section>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
@endpush
@endsection