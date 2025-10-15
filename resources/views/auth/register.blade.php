<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Register</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root{
            --primary:#667eea;
            --primary-dark:#5a67d8;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 32px;
        }

        .auth-box {
            width: 420px;
            max-width: calc(100% - 40px);
        }

        .card {
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 18px 40px rgba(0,0,0,0.25);
        }

        .card-header {
            background: transparent;
            border-bottom: none;
            padding-top: 26px;
            padding-bottom: 6px;
            text-align: center;
        }

        .brand {
            font-size: 26px;
            font-weight: 700;
            color: #111827;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .brand .fa-user-plus { color: var(--primary); }

        .lead {
            color: rgba(0,0,0,0.55);
            margin-bottom: 18px;
        }

        .card-body {
            padding: 26px;
            background: rgba(255,255,255,0.06);
        }

        .input-group .form-control {
            border-radius: 0 10px 10px 0;
            height: 46px;
        }

        .input-group-text {
            border-radius: 10px 0 0 10px;
            background: rgba(255,255,255,0.9);
            min-width: 48px;
            justify-content: center;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: rgba(102,126,234,0.8);
        }

        .btn-primary {
            background: var(--primary);
            border: none;
            border-radius: 10px;
            height: 46px;
            font-weight: 600;
            box-shadow: 0 6px 18px rgba(102,126,234,0.18);
            transition: transform .15s ease, box-shadow .15s ease;
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            background: var(--primary-dark);
            box-shadow: 0 10px 26px rgba(90,103,216,0.22);
        }

        .small-link {
            font-size: 14px;
            text-align: center;
            margin-top: 14px;
        }
        .small-link a { color: #eef2ff; font-weight: 500; text-decoration: none; opacity: 0.95; }
        .small-link a:hover { text-decoration: underline; opacity: 1; }

        /* Responsive tweak */
        @media (max-width: 480px) {
            .auth-box { width: 100%; }
            .card-body { padding: 18px; }
        }
    </style>
</head>
<body>

<div class="auth-box">
    <!-- Logo + Link ke Home -->
    <div class="login-logo mb-3 text-center">
        <a href="{{ url('/') }}" style="font-size: 26px; font-weight: bold; text-decoration: none; color: #fff;">
            <b>Admin</b>LTE
        </a>
    </div>

    @if (session('status'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="brand"><i class="fa-solid fa-user-plus"></i> <span>Register</span></div>
            <p class="lead">Buat akun baru untuk memulai</p>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') }}" placeholder="Nama lengkap" required autofocus>
                    </div>
                    @error('name')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" placeholder="Email" required>
                    </div>
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                               name="password" placeholder="Password" required autocomplete="new-password">
                    </div>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               placeholder="Konfirmasi password" required autocomplete="new-password">
                    </div>
                </div>

                <!-- checkbox minimal -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="agree" name="agree">
                    <label class="form-check-label" for="agree">
                        Saya menyetujui syarat & ketentuan
                    </label>
                </div>

                <!-- Submit -->
                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </div>

                <!-- Link to login  -->
                <div class="small-link" color="black">
                    Sudah punya akun? <a href="{{ route('login') }}" style="color: #6001dbff; font-weight: 700;">Masuk</a>
                    
                </div>
            </form>
        </div>
    </div>
</div>

<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
