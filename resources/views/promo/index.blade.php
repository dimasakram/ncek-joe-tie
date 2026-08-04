@extends('layouts.app')
@section('title', 'Promo')
@section('content')

<section style="background: var(--dark-olive); padding: 140px 0 60px;">
    <div class="container text-center text-white">
        <h1 class="fw-bold" style="color: var(--cream);">Promo Spesial</h1>
        <p style="color: rgba(248,242,231,0.8);">Nikmati penawaran menarik dari kami</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @forelse ($promos as $promo)
                <div class="col-md-4 fade-up show">
                    <div class="card border-0 shadow-sm h-100" style="border-radius:16px; overflow:hidden;">
                        @if ($promo->image)
                            <img src="{{ asset('storage/'.$promo->image) }}" class="card-img-top" style="height:180px; object-fit:cover;">
                        @else
                            <div class="d-flex align-items-center justify-content-center" style="height:180px; background: var(--beige);"><i class="bi bi-percent fs-1" style="color: var(--olive);"></i></div>
                        @endif
                        <div class="card-body">
                            @if ($promo->discount_percent)<span class="badge" style="background: var(--coral);">Diskon {{ $promo->discount_percent }}%</span>@endif
                            <h5 class="fw-semibold mt-2">{{ $promo->title }}</h5>
                            <p class="text-muted small">{{ $promo->description }}</p>
                            @if ($promo->menu)
                                <p class="small text-muted mb-1"><i class="bi bi-egg-fried"></i> Berlaku untuk: {{ $promo->menu->name }}</p>
                            @endif
                            <p class="small text-muted mb-0"><i class="bi bi-calendar-event"></i> {{ $promo->start_date->format('d M Y') }} - {{ $promo->end_date->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <i class="bi bi-percent fs-1 mb-2 d-block"></i>
                    Belum ada promo aktif saat ini.
                </div>
            @endforelse
        </div>
        <div class="mt-4">{{ $promos->links() }}</div>
    </div>
</section>

@endsection
