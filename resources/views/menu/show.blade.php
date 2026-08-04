@extends('layouts.app')
@section('title', $menu->name)
@section('meta_description', Str::limit($menu->description, 150))
@section('content')

<section style="padding-top:120px;">
    <div class="container py-4">
        <nav class="mb-4 small">
            <a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a> /
            <a href="{{ route('menu.index') }}" class="text-decoration-none text-muted">Menu</a> /
            <span style="color: var(--dark-olive);">{{ $menu->name }}</span>
        </nav>

        <div class="row g-5">
            <div class="col-lg-6 fade-up show">
                <div class="ratio ratio-1x1 rounded-4 overflow-hidden shadow-sm">
                    @if ($menu->image)
                        <img src="{{ asset('storage/'.$menu->image) }}" class="w-100 h-100" style="object-fit:cover;">
                    @else
                        <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: var(--beige);"><i class="bi bi-cup-hot display-1" style="color: var(--olive);"></i></div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 fade-up show">
                <div class="d-flex gap-1 mb-2">
                    @if ($menu->is_best_seller)<span class="badge badge-best">Best Seller</span>@endif
                    @if ($menu->is_new)<span class="badge badge-new">New</span>@endif
                    <span class="badge bg-{{ $menu->is_available ? 'success' : 'secondary' }}">{{ $menu->is_available ? 'Tersedia' : 'Habis' }}</span>
                </div>
                <span class="badge bg-light text-dark border mb-2">{{ $menu->category->name }}</span>
                <h1 class="fw-bold mb-2" style="color: var(--dark-olive);">{{ $menu->name }}</h1>
                <h3 class="mb-3" style="color: var(--coral);">Rp{{ number_format($menu->price, 0, ',', '.') }}</h3>
                <p class="text-muted">{{ $menu->description }}</p>

                @if ($menu->composition)
                    <h6 class="fw-semibold mt-4" style="color: var(--dark-olive);">Komposisi</h6>
                    <p class="text-muted">{{ $menu->composition }}</p>
                @endif

                <a href="{{ route('reservation.create') }}" class="btn btn-coral mt-3">Reservasi Sekarang</a>
            </div>
        </div>

        @if ($relatedMenus->isNotEmpty())
            <div class="mt-5 pt-4">
                <h4 class="section-title mb-4">Menu Terkait</h4>
                <div class="row g-4">
                    @foreach ($relatedMenus as $related)
                        <div class="col-md-3 col-6 fade-up">
                            <div class="card card-menu h-100">
                                @if ($related->image)
                                    <img src="{{ asset('storage/'.$related->image) }}" class="card-img-top" style="height:140px;">
                                @endif
                                <div class="card-body p-2">
                                    <div class="small fw-semibold">{{ $related->name }}</div>
                                    <div class="small" style="color: var(--coral);">Rp{{ number_format($related->price, 0, ',', '.') }}</div>
                                    <a href="{{ route('menu.show', $related->slug) }}" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

@endsection
