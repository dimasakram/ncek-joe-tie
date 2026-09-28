@extends('layouts.app')
@section('title', 'Menu')
@section('content')

{{-- HERO --}}
<section class="position-relative d-flex align-items-center rustic-texture" style="min-height: 60vh; overflow:hidden;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image:url('https://images.unsplash.com/photo-1447933601403-0c6688de566e?auto=format&fit=crop&w=1600&q=80'); background-size:cover; background-position:center;"></div>
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(46,71,32,0.55), rgba(62,95,43,0.9));"></div>
    <div class="container text-center text-white position-relative fade-up show" style="z-index:2; padding-top:60px; padding-bottom:70px;">
        <p class="handwritten fs-2 mb-1" style="color: var(--coral); transform: rotate(-2deg);">Cita rasa pilihan</p>
        <h1 class="display-4 fw-bold" style="color: var(--cream);">Menu Kami</h1>
        <p class="fs-5" style="color: rgba(248,242,231,0.85);">Nikmati beragam pilihan kopi dan hidangan hangat</p>
    </div>
    <div class="wave-divider"><svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0,40 C280,90 480,0 720,30 C960,60 1160,10 1440,50 L1440,100 L0,100 Z" fill="var(--cream)"></path></svg></div>
</section>

{{-- SEARCH BAR MENGAMBANG --}}
<div class="container position-relative fade-up show" style="z-index:5; margin-top: -15px;">
    <form method="GET" class="d-flex align-items-center gap-2 p-2 mx-auto" style="max-width: 900px; background:#fff; border-radius:50px; box-shadow: 0 12px 30px rgba(46,71,32,0.18);">
        @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        <span class="ps-2"><i class="bi bi-search" style="color: var(--coral);"></i></span>
        <input type="text" name="search" class="form-control border-0" placeholder="Cari menu favoritmu..." value="{{ request('search') }}" style="box-shadow:none;">
        <button class="btn btn-coral rounded-pill px-3">Cari</button>
    </form>

    {{-- FILTER KATEGORI --}}
    <div class="d-flex flex-wrap justify-content-center gap-2 mt-3">
        @php
            $current = request('category');
            $pillStyle = fn ($active) => $active
                ? 'background: var(--coral); color:#fff; border-color: var(--coral);'
                : 'background:#fff; color: var(--dark-olive); border-color: var(--beige);';
        @endphp
        <a href="{{ route('menu.index', array_filter(['search' => request('search')])) }}" class="px-3 py-2 small fw-semibold text-decoration-none rounded-pill" style="border: 1.5px solid; {{ $pillStyle(!$current) }}">Semua</a>
        @foreach ($categories as $c)
            <a href="{{ route('menu.index', array_filter(['search' => request('search'), 'category' => $c->slug])) }}" class="px-3 py-2 small fw-semibold text-decoration-none rounded-pill" style="border: 1.5px solid; {{ $pillStyle($current === $c->slug) }}">{{ $c->name }}</a>
        @endforeach
    </div>
</div>

<section class="py-5" style="padding-top:3.5rem !important; position:relative; overflow:hidden;">
    <div class="container">
        <div class="row g-4">
            @forelse ($menus as $menu)
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
                            <div class="d-flex gap-1 mb-2">
                                @if ($menu->is_best_seller)<span class="badge badge-best">Best Seller</span>@endif
                                @if ($menu->is_new)<span class="badge badge-new">New</span>@endif
                            </div>
                            <span class="badge bg-light text-dark border mb-2">{{ $menu->category->name }}</span>
                            <h5 class="fw-semibold mb-1" style="color: var(--dark-olive);">{{ $menu->name }}</h5>
                            <p class="text-muted small mb-2">{{ Str::limit($menu->description, 70) }}</p>
                            <a href="{{ route('menu.show', $menu->slug) }}" class="small fw-semibold text-decoration-none" style="color: var(--coral);">Lihat Detail &rarr;</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <i class="bi bi-emoji-frown fs-1 mb-2 d-block"></i>
                    Menu tidak ditemukan.
                </div>
            @endforelse
        </div>
        <div class="mt-4">{{ $menus->links() }}</div>
    </div>
    <div class="wave-divider"><svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0,40 C280,90 480,0 720,30 C960,60 1160,10 1440,50 L1440,100 L0,100 Z" fill="var(--dark-olive)"></path></svg></div>
</section>

@endsection