@extends('layouts.app')
@section('title', 'Tentang Kami')
@section('content')

{{-- HERO --}}
<section class="position-relative d-flex align-items-center" style="min-height: 70vh; overflow:hidden;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image:url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=1600&q=80'); background-size:cover; background-position:center; filter: blur(2px) brightness(0.55); transform: scale(1.05);"></div>
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(46,71,32,0.4), rgba(46,71,32,0.75));"></div>
    <div class="container position-relative text-center text-white fade-up show" style="z-index:2; padding-top:60px;">
        <p class="italic-accent fs-4" style="color: var(--coral);">Our Story</p>
        <h1 class="display-4 fw-bold" style="color: var(--cream);">Tentang Kami</h1>
        <p class="fs-5" style="color: rgba(248,242,231,0.85);">Mengenal lebih dekat {{ $profile->name ?? 'Ncek Joe Tie' }}</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-6 fade-up">
                <div class="ratio ratio-4x3 rounded-4 overflow-hidden shadow">
                    @if (!empty($profile->cover_photo))
                        <img src="{{ asset('storage/'.$profile->cover_photo) }}" class="w-100 h-100" style="object-fit:cover;">
                    @else
                        <img src="https://images.unsplash.com/photo-1481833761820-0509d3217039?auto=format&fit=crop&w=900&q=80" class="w-100 h-100" style="object-fit:cover;">
                    @endif
                </div>
            </div>
            <div class="col-lg-6 fade-up">
                <p class="section-sub">Sejarah Kami</p>
                <h2 class="section-title mb-3">Perjalanan {{ $profile->name ?? 'Ncek Joe Tie' }}</h2>
                <p class="text-muted mb-3" style="line-height:1.9;">{{ $profile->history ?? 'Sejarah restoran belum tersedia.' }}</p>
                <p class="text-muted" style="line-height:1.9;">Dari sebuah kedai kecil yang menyajikan kopi seduhan sederhana, kami tumbuh berkat kepercayaan pelanggan yang datang kembali bukan hanya karena rasa, tapi juga karena suasana yang terasa seperti rumah kedua. Setiap resep yang kami sajikan hari ini masih membawa jejak resep pertama yang diracik penuh cinta bertahun-tahun lalu — dijaga konsistensinya, namun terus disempurnakan mengikuti selera generasi baru.</p>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-4 fade-up">
                <div class="card h-100 border-0 shadow-sm p-4 text-center">
                    <i class="bi bi-eye fs-1 mb-3" style="color: var(--coral);"></i>
                    <h5 class="fw-semibold" style="color: var(--dark-olive);">Visi</h5>
                    <p class="text-muted small mb-0">{{ $profile->vision ?? '-' }}</p>
                </div>
            </div>
            <div class="col-md-4 fade-up">
                <div class="card h-100 border-0 shadow-sm p-4 text-center">
                    <i class="bi bi-bullseye fs-1 mb-3" style="color: var(--coral);"></i>
                    <h5 class="fw-semibold" style="color: var(--dark-olive);">Misi</h5>
                    <p class="text-muted small mb-0">{{ $profile->mission ?? '-' }}</p>
                </div>
            </div>
            <div class="col-md-4 fade-up">
                <div class="card h-100 border-0 shadow-sm p-4 text-center">
                    <i class="bi bi-heart fs-1 mb-3" style="color: var(--coral);"></i>
                    <h5 class="fw-semibold" style="color: var(--dark-olive);">Nilai Perusahaan</h5>
                    <p class="text-muted small mb-0">{{ $profile->core_values ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- COFFEE SOURCING --}}
<section class="py-5" style="background: var(--beige);">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 order-lg-1 fade-up">
                <p class="section-sub">Dari Kebun ke Cangkir</p>
                <h2 class="section-title mb-3">Coffee Sourcing</h2>
                <p class="text-muted mb-3" style="line-height:1.9;">Kami percaya secangkir kopi yang enak dimulai jauh sebelum proses seduh. Biji kopi yang kami gunakan dipilih langsung dari petani lokal di dataran tinggi, dipanen pada waktu yang tepat untuk menjaga karakter rasa terbaiknya.</p>
                <p class="text-muted" style="line-height:1.9;">Setiap batch disangrai dalam jumlah kecil agar kualitas tetap terjaga, lalu diuji rasanya sebelum sampai ke cangkirmu. Dengan begitu, kami tidak hanya menyajikan kopi — kami menyajikan hasil kerja keras banyak tangan dari kebun hingga meja kamu.</p>
            </div>
            <div class="col-lg-6 order-lg-2 fade-up">
                <div class="ratio ratio-4x3 rounded-4 overflow-hidden shadow">
                    <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=900&q=80" class="w-100 h-100" style="object-fit:cover;">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection