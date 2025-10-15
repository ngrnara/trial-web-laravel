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

@extends('layouts.base_admin.base_auth') @section('judul', 'Halaman Lupa
Password') @section('content')
<div class="login-box">
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
        <div class="card-body login-card-body">
            <p class="login-box-msg">Anda lupa kata sandi Anda? Di sini Anda dapat dengan
                mudah mengambil kata sandi baru.</p>

            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input
                        id="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email"
                        name="email"
                        value="{{ old('email') }}"
                        required="required"
                        autocomplete="email"
                        autofocus="autofocus">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Minta kata sandi baru</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1">
                Sudah punya akun?
                <a href="{{ route('login') }}">Login</a>
            </p>
            <p class="mb-0">
                Baru pertama kali?
                <a href="{{ route('register') }}" class="text-center">Register</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection
</body>
</html>