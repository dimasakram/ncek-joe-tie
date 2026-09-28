<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $settings['meta_title'] ?? 'Ncek Joe Tie') - Ncek Joe Tie </title>
    <meta name="description" content="@yield('meta_description', $settings['meta_description'] ?? 'Ncek Joe Tie menghadirkan kopi dan hidangan hangat dengan suasana cafe yang elegan dan nyaman.')">
    <meta property="og:title" content="@yield('title', $settings['meta_title'] ?? 'Ncek Joe Tie')">
    <meta property="og:description" content="@yield('meta_description', $settings['meta_description'] ?? '')">
    <meta property="og:type" content="website">
    @if (!empty($settings['favicon']))
        <link rel="icon" href="{{ asset('storage/'.$settings['favicon']) }}">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;1,9..144,500&family=Manrope:wght@400;500;600;700;800&family=Caveat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    {{-- Schema.org Restaurant --}}
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
        body { font-family: 'Manrope', sans-serif; background: var(--cream); color: #4a453f; letter-spacing: .1px; }
        h1, h2, h3, h4, .font-display { font-family: 'Fraunces', serif; letter-spacing: -.5px; }
        .italic-accent { font-family: 'Fraunces', serif; font-style: italic; font-weight: 500; }

        .handwritten { font-family: 'Caveat', cursive; font-weight: 600; }

        .rustic-texture { position: relative; }
        .rustic-texture::before {
            content: ""; position: absolute; inset: 0; pointer-events: none; opacity: .5;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.05'/%3E%3C/svg%3E");
        }

        .btn-outline-olive { border: 1.5px solid var(--olive); color: var(--olive); border-radius: 30px; padding: .55rem 1.6rem; font-weight: 600; background: transparent; transition: .3s; }
        .btn-outline-olive:hover { background: var(--olive); color: #fff; }

        .wave-divider { position: absolute; bottom: -1px; left: 0; width: 100%; line-height: 0; z-index: 1; }
        .wave-divider svg { width: 100%; height: 70px; display: block; }

        .polaroid-stack { position: relative; height: 420px; }
        .polaroid { background: #fff; padding: 14px 14px 18px; box-shadow: 0 12px 30px rgba(46,71,32,0.2); border-radius: 4px; }
        .polaroid img { width: 100%; height: 260px; object-fit: cover; display: block; }
        .polaroid-back { position: absolute; top: 30px; right: 0; width: 62%; transform: rotate(6deg); opacity: .85; }
        .polaroid-back img { height: 220px; }
        .polaroid-front { position: absolute; bottom: 10px; left: 0; width: 62%; transform: rotate(-4deg); }
        .polaroid-solo { display: inline-block; transform: rotate(-2deg); max-width: 100%; }
        .polaroid-solo img { width: 100%; height: 340px; object-fit: cover; }

        .card-rustic { background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 8px 24px rgba(46,71,32,0.08); border: 1px solid rgba(62,95,43,0.08); transition: .3s; }
        .card-rustic:hover { transform: translateY(-5px); box-shadow: 0 16px 32px rgba(46,71,32,0.14); }
        .card-rustic-img { position: relative; height: 190px; }
        .card-rustic-img img { width: 100%; height: 100%; object-fit: cover; }
        .price-tag { position: absolute; bottom: 10px; right: 10px; background: var(--olive); color: #fff; padding: .3rem .8rem; border-radius: 20px; font-size: .8rem; font-weight: 700; box-shadow: 0 3px 8px rgba(0,0,0,0.2); }

        .sketch-badge { width: 76px; height: 76px; border-radius: 50%; border: 2px dashed rgba(224,106,75,0.6); display:flex; align-items:center; justify-content:center; color: var(--coral); position: relative; }
        .sketch-badge::after { content:""; position:absolute; inset:8px; border-radius:50%; background: rgba(224,106,75,0.12); }
        .sketch-badge i { position: relative; z-index: 2; }

        .note-card { background: #fffdf8; border: 1px solid rgba(62,95,43,0.1); border-radius: 4px; padding: 1.3rem; height: 100%; box-shadow: 0 8px 20px rgba(46,71,32,0.1); }

        .testi-dots { position: static; margin: 1.5rem 0 0; }
        .testi-dots [data-bs-target] {
            width: 9px; height: 9px; border-radius: 50%; border: none;
            background: var(--beige); opacity: 1; margin: 0 4px;
            text-indent: -9999px; transition: background .25s, transform .25s;
        }
        .testi-dots [data-bs-target].active { background: var(--coral); transform: scale(1.15); }

        .testi-card { background: #fff; border-radius: 20px; padding: 2.5rem 2rem; box-shadow: 0 10px 30px rgba(46,71,32,0.1); }

        @keyframes bounceDown { 0%,100% { transform: translateY(0); opacity:.7; } 50% { transform: translateY(8px); opacity:1; } }

        /* Navbar */
        .navbar-custom {
            background: transparent; transition: 0.35s; padding: 1.2rem 0; position: fixed; width: 100%; top: 0; z-index: 1050;
        }
        .navbar-custom.scrolled { background: var(--dark-olive); padding: 0.7rem 0; box-shadow: 0 4px 20px rgba(0,0,0,0.15); }
        .navbar-custom .navbar-brand { font-family: 'Fraunces', serif; font-weight: 700; font-size: 1.5rem; color: var(--cream) !important; }
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

<footer class="pt-5 pb-4">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div style="width:56px;height:56px;border-radius:16px;background:var(--olive);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="bi bi-cup-hot-fill fs-3" style="color: var(--coral);"></i>
                    </div>
                    <h5 class="font-display mb-0" style="color: var(--cream); font-size:1.6rem;">{{ $profile->name ?? 'Ncek Joe Tie' }}</h5>
                </div>
                <p class="small mb-3" style="max-width: 380px; line-height:1.8;">{{ $settings['site_tagline'] ?? 'Cafe & Resto Hangat Penuh Cita Rasa' }}</p>
                <div class="d-flex gap-2">
                    @if (!empty($profile->instagram))<a href="{{ $profile->instagram }}" target="_blank" class="fs-5"><i class="bi bi-instagram"></i></a>@endif
                    @if (!empty($profile->tiktok))<a href="{{ $profile->tiktok }}" target="_blank" class="fs-5"><i class="bi bi-tiktok"></i></a>@endif
                    @if (!empty($profile->whatsapp))<a href="https://wa.me/{{ $profile->whatsapp }}" target="_blank" class="fs-5"><i class="bi bi-whatsapp"></i></a>@endif
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <h6 class="text-uppercase small fw-bold mb-3" style="color: var(--coral); letter-spacing:1px;">Customer Care</h6>
                <ul class="list-unstyled small" style="line-height:2.2;">
                    <li><a href="{{ route('reservation.create') }}">Reservasi</a></li>
                    <li><a href="{{ route('contact.create') }}">Hubungi Kami</a></li>
                    <li><a href="{{ route('article.index') }}">Artikel</a></li>
                    <li><a href="{{ route('home') }}#faq">FAQ</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-6">
                <h6 class="text-uppercase small fw-bold mb-3" style="color: var(--coral); letter-spacing:1px;">Jam Operasional</h6>
                <p class="small" style="line-height:1.8;">{{ $profile->opening_hours ?? 'Setiap hari, 09.00 - 22.00 WIB' }}</p>
                <p class="small mb-0"><i class="bi bi-envelope me-2"></i>{{ $profile->email ?? '-' }}</p>
            </div>
        </div>
        <hr style="border-color: rgba(248,242,231,0.15);" class="mt-5">
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