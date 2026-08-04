<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Ncek Joe Tie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h3>Selamat datang, {{ auth()->user()->name }} 👋</h3>
    <p>Autentikasi admin berhasil. Dashboard lengkap (statistik, sidebar, CRUD) akan dibangun pada tahap "Dashboard Admin".</p>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button class="btn btn-danger btn-sm">Logout</button>
    </form>
</body>
</html>
