@extends('layouts.app')
@section('title', 'Menu')
@section('content')

<section class="position-relative d-flex align-items-center" style="min-height: 55vh; overflow:hidden;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image:url('https://images.unsplash.com/photo-1447933601403-0c6688de566e?auto=format&fit=crop&w=1600&q=80'); background-size:cover; background-position:center;"></div>
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(46,71,32,0.55), rgba(62,95,43,0.85));"></div>
    <div class="container text-center text-white position-relative fade-up show" style="z-index:2; padding-top:60px;">
        <p class="italic-accent fs-4" style="color: var(--coral);">Cita Rasa Pilihan</p>
        <h1 class="display-4 fw-bold" style="color: var(--cream);">Menu Kami</h1>
        <p class="fs-5" style="color: rgba(248,242,231,0.85);">Nikmati beragam pilihan kopi dan hidangan hangat</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <form method="GET" class="row g-2 mb-4 fade-up show">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control border-start-0" placeholder="Cari menu favoritmu..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-4">
                <select name="category" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $c)
                        <option value="{{ $c->slug }}" {{ request('category') == $c->slug ? 'selected' : '' }}>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2"><button class="btn btn-coral w-100">Cari</button></div>
        </form>

        <div class="row g-4">
            @forelse ($menus as $menu)
                <div class="col-md-4 fade-up">
                    <div class="card card-menu h-100">
                        @if ($menu->image)
                            <img src="{{ $menu->image_url }}" class="card-img-top">
                        @else
                            <div class="d-flex align-items-center justify-content-center" style="height:200px; background: var(--beige);"><i class="bi bi-cup-hot fs-1" style="color: var(--olive);"></i></div>
                        @endif
                        <div class="card-body">
                            <div class="d-flex gap-1 mb-2">
                                @if ($menu->is_best_seller)<span class="badge badge-best">Best Seller</span>@endif
                                @if ($menu->is_new)<span class="badge badge-new">New</span>@endif
                            </div>
                            <span class="badge bg-light text-dark border mb-2">{{ $menu->category->name }}</span>
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
                <div class="col-12 text-center text-muted py-5">
                    <i class="bi bi-emoji-frown fs-1 mb-2 d-block"></i>
                    Menu tidak ditemukan.
                </div>
            @endforelse
        </div>
        <div class="mt-4">{{ $menus->links() }}</div>
    </div>
</section>

@endsection