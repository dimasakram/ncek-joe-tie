@extends('layouts.app')
@section('title', 'Galeri')
@section('content')

<section style="background: var(--dark-olive); padding: 140px 0 60px;">
    <div class="container text-center text-white">
        <h1 class="fw-bold" style="color: var(--cream);">Galeri</h1>
        <p style="color: rgba(248,242,231,0.8);">Momen hangat di {{ $profile->name ?? 'Ncek Joe Tie' }}</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <form method="GET" class="mb-4 fade-up show d-flex gap-2 flex-wrap justify-content-center">
            <a href="{{ route('gallery.index') }}" class="btn btn-sm {{ !request('category') ? 'btn-coral' : 'btn-outline-secondary' }}">Semua</a>
            @foreach (['makanan' => 'Makanan', 'interior' => 'Interior', 'event' => 'Event'] as $val => $label)
                <a href="{{ route('gallery.index', ['category' => $val]) }}" class="btn btn-sm {{ request('category') == $val ? 'btn-coral' : 'btn-outline-secondary' }}">{{ $label }}</a>
            @endforeach
        </form>

        <div class="row g-3">
            @forelse ($galleries as $g)
                <div class="col-md-3 col-6 fade-up show">
                    <a href="{{ asset('storage/'.$g->image) }}" data-lightbox="gallery-page" data-title="{{ $g->title }}" class="d-block rounded-3 overflow-hidden shadow-sm" style="height:220px;">
                        <img src="{{ asset('storage/'.$g->image) }}" class="w-100 h-100" style="object-fit:cover;">
                    </a>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">Belum ada foto pada kategori ini.</div>
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
