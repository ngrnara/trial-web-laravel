<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 380px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .card-header {
            background: transparent;
            border-bottom: none;
            text-align: center;
        }

        .card-header h1 {
            font-weight: 700;
            color: #333;
            font-size: 26px;
        }

        .input-group .form-control {
            border-radius: 0 8px 8px 0;
            height: 45px;
        }

        .input-group-text {
            border-radius: 8px 0 0 8px;
            background: #f7f7f7;
        }

        .btn-primary {
            background: #667eea;
            border: none;
            border-radius: 8px;
            height: 45px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: #5a67d8;
            transform: translateY(-2px);
            box-shadow: 0px 4px 12px rgba(102,126,234,0.4);
        }

        .form-check-label {
            font-size: 14px;
        }

        .links {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        .links a {
            color: #667eea;
            font-weight: 500;
            text-decoration: none;
        }
        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

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
        <div class="card-header">
            <h1><i class="fas fa-user-circle"></i> Login</h1>
            <p class="text-muted">Masuk untuk memulai sesi Anda</p>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">
                        Ingat sesi saya
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Masuk</button>
                </div>
            </form>

            <div class="links">
                <a href="{{ route('password.request') }}">Lupa password?</a><br>
                <a href="{{ route('register') }}">Belum mempunyai akun? Register</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
