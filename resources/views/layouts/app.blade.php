<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $settings['meta_title'] ?? 'Ncek Joe Tie') - Cafe & Resto</title>
    <meta name="description" content="@yield('meta_description', $settings['meta_description'] ?? 'Ncek Joe Tie menghadirkan kopi dan hidangan hangat dengan suasana cafe yang elegan dan nyaman.')">
    <meta property="og:title" content="@yield('title', $settings['meta_title'] ?? 'Ncek Joe Tie')">
    <meta property="og:description" content="@yield('meta_description', $settings['meta_description'] ?? '')">
    <meta property="og:type" content="website">
    @if (!empty($settings['favicon']))
        <link rel="icon" href="{{ asset('storage/'.$settings['favicon']) }}">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Restaurant',
        'name' => $profile->name ?? 'Ncek Joe Tie',
        'servesCuisine' => 'Cafe & Resto',
        'address' => $profile->address ?? '',
        'telephone' => $profile->phone ?? '',
    ]) !!}
    </script>

    <style>
        :root {
            --olive: #3E5F2B;
            --cream: #F8F2E7;
            --coral: #E06A4B;
            --dark-olive: #2E4720;
            --beige: #EADFCF;
        }
        * { scroll-behavior: smooth; }
        body { font-family: 'Poppins', sans-serif; background: var(--cream); color: #3a3a3a; }
        h1, h2, h3, h4, .font-display { font-family: 'Playfair Display', serif; }

        /* Navbar */
        .navbar-custom {
            background: transparent; transition: 0.35s; padding: 1.2rem 0; position: fixed; width: 100%; top: 0; z-index: 1050;
        }
        .navbar-custom.scrolled { background: var(--dark-olive); padding: 0.7rem 0; box-shadow: 0 4px 20px rgba(0,0,0,0.15); }
        .navbar-custom .navbar-brand { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.5rem; color: var(--cream) !important; }
        .navbar-custom .nav-link { color: rgba(248,242,231,0.85) !important; font-weight: 500; margin: 0 .5rem; }
        .navbar-custom .nav-link:hover, .navbar-custom .nav-link.active { color: var(--coral) !important; }
        .btn-coral { background: var(--coral); color: #fff; border: none; border-radius: 30px; padding: .55rem 1.6rem; font-weight: 600; transition: .3s; }
        .btn-coral:hover { background: var(--dark-olive); color: #fff; transform: translateY(-2px); }
        .btn-outline-cream { border: 1.5px solid var(--cream); color: var(--cream); border-radius: 30px; padding: .5rem 1.5rem; }
        .btn-outline-cream:hover { background: var(--cream); color: var(--dark-olive); }

        /* Animations */
        .fade-up { opacity: 0; transform: translateY(30px); transition: opacity .7s ease, transform .7s ease; }
        .fade-up.show { opacity: 1; transform: translateY(0); }

        .section-title { color: var(--dark-olive); font-weight: 700; }
        .section-sub { color: var(--coral); text-transform: uppercase; letter-spacing: 2px; font-weight: 600; font-size: .85rem; }

        .card-menu { border: none; border-radius: 18px; overflow: hidden; box-shadow: 0 6px 20px rgba(0,0,0,0.06); transition: .35s; }
        .card-menu:hover { transform: translateY(-6px); box-shadow: 0 14px 30px rgba(0,0,0,0.12); }
        .card-menu img { height: 200px; object-fit: cover; transition: .4s; }
        .card-menu:hover img { transform: scale(1.06); }

        .badge-best { background: var(--coral); }
        .badge-new { background: var(--olive); }

        footer { background: var(--dark-olive); color: rgba(248,242,231,0.85); }
        footer a { color: rgba(248,242,231,0.75); text-decoration: none; }
        footer a:hover { color: var(--coral); }

        #backToTop {
            position: fixed; bottom: 25px; right: 25px; background: var(--coral); color: #fff; width: 46px; height: 46px;
            border-radius: 50%; display: none; align-items: center; justify-content: center; z-index: 1100; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.25);
        }

        #loadingSpinner {
            position: fixed; inset: 0; background: var(--cream); z-index: 2000; display: flex; align-items: center; justify-content: center;
        }
        .spinner-cup { font-size: 3rem; color: var(--olive); animation: bounce 1s infinite; }
        @keyframes bounce { 0%,100% { transform: translateY(0);} 50% { transform: translateY(-15px);} }
    </style>
    @stack('styles')
</head>
<body>

<div id="loadingSpinner"><i class="bi bi-cup-hot-fill spinner-cup"></i></div>

<nav class="navbar navbar-expand-lg navbar-custom" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><i class="bi bi-cup-hot-fill" style="color: var(--coral);"></i> {{ $profile->name ?? 'Ncek Joe Tie' }}</a>
        <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <i class="bi bi-list fs-2 text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('menu.*') ? 'active' : '' }}" href="{{ route('menu.index') }}">Menu</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('promo.*') ? 'active' : '' }}" href="{{ route('promo.index') }}">Promo</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">Galeri</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('article.*') ? 'active' : '' }}" href="{{ route('article.index') }}">Artikel</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}" href="{{ route('contact.create') }}">Kontak</a></li>
                <li class="nav-item ms-lg-2"><a class="btn btn-coral btn-sm" href="{{ route('reservation.create') }}">Reservasi</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="pt-5 pb-3 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="font-display" style="color: var(--cream);"><i class="bi bi-cup-hot-fill" style="color: var(--coral);"></i> {{ $profile->name ?? 'Ncek Joe Tie' }}</h5>
                <p class="small">{{ $settings['site_tagline'] ?? 'Cafe & Resto Hangat Penuh Cita Rasa' }}</p>
                <div class="d-flex gap-2">
                    @if (!empty($profile->instagram))<a href="{{ $profile->instagram }}" target="_blank" class="fs-5"><i class="bi bi-instagram"></i></a>@endif
                    @if (!empty($profile->facebook))<a href="{{ $profile->facebook }}" target="_blank" class="fs-5"><i class="bi bi-facebook"></i></a>@endif
                    @if (!empty($profile->whatsapp))<a href="https://wa.me/{{ $profile->whatsapp }}" target="_blank" class="fs-5"><i class="bi bi-whatsapp"></i></a>@endif
                </div>
            </div>
            <div class="col-md-2">
                <h6 class="text-uppercase small fw-bold mb-3" style="color: var(--coral);">Menu</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ route('menu.index') }}">Semua Menu</a></li>
                    <li class="mb-2"><a href="{{ route('promo.index') }}">Promo</a></li>
                    <li class="mb-2"><a href="{{ route('gallery.index') }}">Galeri</a></li>
                    <li class="mb-2"><a href="{{ route('article.index') }}">Artikel</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="text-uppercase small fw-bold mb-3" style="color: var(--coral);">Kontak</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><i class="bi bi-geo-alt me-1"></i> {{ $profile->address ?? '-' }}</li>
                    <li class="mb-2"><i class="bi bi-telephone me-1"></i> {{ $profile->phone ?? '-' }}</li>
                    <li class="mb-2"><i class="bi bi-envelope me-1"></i> {{ $profile->email ?? '-' }}</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="text-uppercase small fw-bold mb-3" style="color: var(--coral);">Jam Buka</h6>
                <p class="small">{{ $profile->opening_hours ?? 'Setiap hari, 09.00 - 22.00 WIB' }}</p>
            </div>
        </div>
        <hr style="border-color: rgba(248,242,231,0.15);">
        <p class="text-center small mb-0">&copy; {{ date('Y') }} {{ $profile->name ?? 'Ncek Joe Tie' }}. Seluruh hak cipta dilindungi.</p>
    </div>
</footer>

<button id="backToTop"><i class="bi bi-arrow-up"></i></button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.addEventListener('load', () => {
        document.getElementById('loadingSpinner').style.display = 'none';
    });

    window.addEventListener('scroll', () => {
        document.getElementById('mainNav').classList.toggle('scrolled', window.scrollY > 60);
        document.getElementById('backToTop').style.display = window.scrollY > 400 ? 'flex' : 'none';
    });

    document.getElementById('backToTop').addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('show'); });
    }, { threshold: 0.15 });
    document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));

    @if (session('success'))
        Swal.fire({ icon: 'success', title: 'Berhasil', text: @json(session('success')), confirmButtonColor: '#3E5F2B' });
    @endif
    @if (session('error'))
        Swal.fire({ icon: 'error', title: 'Gagal', text: @json(session('error')), confirmButtonColor: '#E06A4B' });
    @endif
</script>
@stack('scripts')
</body>
</html>
