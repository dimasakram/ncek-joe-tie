<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Ncek Joe Tie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --olive: #3E5F2B;
            --cream: #F8F2E7;
            --coral: #E06A4B;
            --dark-olive: #2E4720;
            --beige: #EADFCF;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--dark-olive), var(--olive));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-card {
            background: var(--cream);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
        }
        .login-brand {
            background: var(--olive);
            color: var(--cream);
            padding: 3rem 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .login-brand h1 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2rem;
            margin-top: 1rem;
        }
        .login-brand i { font-size: 3rem; color: var(--coral); }
        .login-form { padding: 3rem 2.5rem; }
        .form-control {
            border-radius: 10px;
            padding: 0.7rem 1rem;
            border: 1px solid var(--beige);
        }
        .form-control:focus {
            border-color: var(--olive);
            box-shadow: 0 0 0 0.2rem rgba(62, 95, 43, 0.15);
        }
        .btn-login {
            background: var(--coral);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 0.7rem;
            font-weight: 600;
            width: 100%;
            transition: 0.3s;
        }
        .btn-login:hover { background: var(--dark-olive); color: #fff; }
        label { color: var(--dark-olive); font-weight: 500; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="row g-0">
            <div class="col-md-5 login-brand">
                <i class="bi bi-cup-hot-fill"></i>
                <h1>Ncek Joe Tie</h1>
                <p>Panel Admin Restoran</p>
            </div>
            <div class="col-md-7 login-form">
                <h4 class="mb-4" style="color: var(--dark-olive); font-weight:600;">Masuk ke Dashboard</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Ingat saya</label>
                    </div>
                    <button type="submit" class="btn btn-login">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
