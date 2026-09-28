<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Admin Ncek Joe Tie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@600;700&family=Manrope:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --olive: #3E5F2B;
            --cream: #F8F2E7;
            --coral: #E06A4B;
            --dark-olive: #2E4720;
            --beige: #EADFCF;
        }
        body { font-family: 'Manrope', sans-serif; background: var(--cream); }
        .sidebar {
            width: 260px; height: 100vh; overflow-y: auto; background: var(--dark-olive); color: var(--cream);
            position: fixed; top: 0; left: 0; padding-top: 1.5rem; padding-bottom: 1.5rem; transition: 0.3s; z-index: 1000;
        }
        .sidebar .brand { font-family: 'Fraunces', serif; font-weight: 700; font-size: 1.4rem; padding: 0 1.5rem 1.5rem; display:flex; align-items:center; gap:.6rem; color: var(--cream); }
        .sidebar .brand i { color: var(--coral); font-size: 1.6rem; }
        .sidebar a {
            display: flex; align-items: center; gap: .7rem; color: rgba(248,242,231,0.8);
            padding: .65rem 1.5rem; text-decoration: none; font-size: .93rem; transition: .2s;
        }
        .sidebar a:hover, .sidebar a.active { background: var(--olive); color: #fff; }
        .sidebar form button { display: flex; align-items: center; gap: .7rem; }
        .sidebar form button:hover { background: var(--olive) !important; color: #fff !important; }
        .sidebar hr { border-color: rgba(248,242,231,0.15); margin: .5rem 1.2rem; }
        .main-content { margin-left: 260px; padding: 1.8rem; }
        .topbar {
            display: flex; justify-content: space-between; align-items: center;
            background: #fff; border-radius: 12px; padding: 1rem 1.5rem; margin-bottom: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .card-stat { border: none; border-radius: 14px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); }
        .card-stat .icon-box {
            width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center;
            justify-content: center; font-size: 1.4rem; color: #fff;
        }
        .btn-olive { background: var(--olive); color: #fff; }
        .btn-olive:hover { background: var(--dark-olive); color: #fff; }
        .btn-coral { background: var(--coral); color: #fff; }
        .btn-coral:hover { background: #c85736; color: #fff; }
        .btn-outline-olive-sm { border: 1.5px solid var(--olive); color: var(--olive); background: transparent; border-radius: 8px; padding: .4rem .9rem; font-size: .875rem; font-weight: 600; transition: .2s; }
        .btn-outline-olive-sm:hover { background: var(--olive); color: #fff; }
        .table thead { background: var(--beige); }
        .badge-best { background: var(--coral); }
        .badge-new { background: var(--olive); }
        .card { border-radius: 14px; border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.06); }
        @media (max-width: 991px) {
            .sidebar { left: -260px; }
            .sidebar.show { left: 0; }
            .main-content { margin-left: 0; }
        }
    </style>
    @stack('styles')
</head>
<body>

<div class="sidebar" id="sidebar">
    <div class="brand"><i class="bi bi-cup-hot-fill"></i> Ncek Joe Tie</div>
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <hr>
    <a href="{{ route('admin.menu.index') }}" class="{{ request()->routeIs('admin.menu.*') ? 'active' : '' }}"><i class="bi bi-egg-fried"></i> Kelola Menu</a>
    <a href="{{ route('admin.kategori.index') }}" class="{{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}"><i class="bi bi-tags"></i> Kelola Kategori</a>
    <a href="{{ route('admin.tentang.edit') }}" class="{{ request()->routeIs('admin.tentang.*') ? 'active' : '' }}"><i class="bi bi-info-circle"></i> Kelola Tentang</a>
    <a href="{{ route('admin.promo.index') }}" class="{{ request()->routeIs('admin.promo.*') ? 'active' : '' }}"><i class="bi bi-percent"></i> Kelola Promo</a>
    <a href="{{ route('admin.galeri.index') }}" class="{{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}"><i class="bi bi-images"></i> Kelola Galeri</a>
    <a href="{{ route('admin.artikel.index') }}" class="{{ request()->routeIs('admin.artikel.*') ? 'active' : '' }}"><i class="bi bi-newspaper"></i> Kelola Artikel</a>
    <a href="{{ route('admin.reservasi.index') }}" class="{{ request()->routeIs('admin.reservasi.*') ? 'active' : '' }}"><i class="bi bi-calendar-check"></i> Kelola Reservasi</a>
    <a href="{{ route('admin.testimoni.index') }}" class="{{ request()->routeIs('admin.testimoni.*') ? 'active' : '' }}"><i class="bi bi-chat-quote"></i> Kelola Testimoni</a>
    <a href="{{ route('admin.faq.index') }}" class="{{ request()->routeIs('admin.faq.*') ? 'active' : '' }}"><i class="bi bi-question-circle"></i> Kelola FAQ</a>
    <a href="{{ route('admin.kontak.index') }}" class="{{ request()->routeIs('admin.kontak.*') ? 'active' : '' }}"><i class="bi bi-envelope"></i> Kelola Kontak</a>
    <hr>
    <a href="{{ route('admin.profil.edit') }}" class="{{ request()->routeIs('admin.profil.*') ? 'active' : '' }}"><i class="bi bi-shop"></i> Profil Restoran</a>
    <a href="{{ route('admin.settings.edit') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"><i class="bi bi-gear"></i> Pengaturan Website</a>
    @if (auth()->user()->role === 'super_admin')
        <a href="{{ route('admin.admin.index') }}" class="{{ request()->routeIs('admin.admin.*') ? 'active' : '' }}"><i class="bi bi-people"></i> Kelola Admin</a>
    @endif
    <hr>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" class="btn w-100 text-start" style="background:none;border:none;color:rgba(248,242,231,0.8);padding:.65rem 1.5rem;"><i class="bi bi-box-arrow-right"></i> Logout</button>
    </form>
</div>

<div class="main-content">
    <div class="topbar">
        <div class="d-flex align-items-center gap-2">
            <button class="btn d-lg-none" onclick="document.getElementById('sidebar').classList.toggle('show')"><i class="bi bi-list fs-4"></i></button>
            <h5 class="mb-0" style="color: var(--dark-olive); font-weight:600;">@yield('title', 'Dashboard')</h5>
        </div>
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('home') }}" target="_blank" class="btn-outline-olive-sm text-decoration-none">
                <i class="bi bi-box-arrow-up-right me-1"></i> Lihat Website
            </a>
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-person-circle fs-4" style="color: var(--olive);"></i>
                <span class="fw-semibold">{{ auth()->user()->name }}</span>
            </div>
        </div>
    </div>

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    @if (session('success'))
        Swal.fire({ icon: 'success', title: 'Berhasil', text: @json(session('success')), confirmButtonColor: '#3E5F2B' });
    @endif
    @if (session('error'))
        Swal.fire({ icon: 'error', title: 'Gagal', text: @json(session('error')), confirmButtonColor: '#E06A4B' });
    @endif

    function confirmDelete(formId) {
        Swal.fire({
            title: 'Yakin hapus data ini?',
            text: 'Data yang dihapus tidak bisa dikembalikan.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#E06A4B',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
</script>
@stack('scripts')
</body>
</html>