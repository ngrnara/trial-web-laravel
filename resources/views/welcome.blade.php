<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        /* CSS basic */
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
        }

        /* Full-screen container dengan background gradient */
        .hero-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%);
            padding: 2rem;
            box-sizing: border-box;
            color: #333;
            text-align: center;
            position: relative; /* posisi nav */
        }

        /* navigasi login register kanan atas */
        .auth-links {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
        }

        .auth-links a {
            color: #2d374d;
            font-weight: 600;
            text-decoration: none;
            margin-left: 1.5rem;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .auth-links a:hover {
            color: #000;
        }
        
        /* Main Heading */
        h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #2c3e50;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        /* Subheading */
        p {
            font-size: 1.25rem;
            max-width: 650px;
            margin-bottom: 2.5rem;
            color: #34495e;
        }

        /* action button */
        .cta-button {
            display: inline-block;
            background-color: #3498db;
            color: #ffffff;
            padding: 1rem 2.5rem;
            border-radius: 50px; /* Pill shape */
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .cta-button:hover {
            background-color: #2980b9;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
        }
        
        /* responsive */
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }
            p {
                font-size: 1rem;
            }
            .auth-links {
                position: static; /* biarkan mengalir secara normal */
                margin-bottom: 2rem;
            }
            .hero-container {
                justify-content: center; /* center konten */
            }
        }
    </style>
</head>
<body class="antialiased">

    <div class="hero-container">

        @if (Route::has('login'))
            <div class="auth-links">
                @auth
                    <a href="{{ url('/dashboard/admin') }}">Dashboard</a>
                    <a href="{{ url('/logout') }}">Log out</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <h1>Selamat Datang</h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate aliquam consectetur, iste, commodi laborum alias sequi maxime repudiandae, sint nulla sit quidem ratione modi quae odit enim vel molestias ipsum.
        </p>
        <a href="#projects" class="cta-button">
            See More
        </a>

    </div>

</body>
</html>