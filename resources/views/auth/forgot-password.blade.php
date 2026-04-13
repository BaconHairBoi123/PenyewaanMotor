<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <link rel="icon" type="image/png" href="{{ asset('img/logo/logo_web_ridenusa_transparan.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    @vite('resources/css/login.css')

    <style>
        .alert-success {
            background-color: rgba(40, 167, 69, 0.2);
            color: #28a745;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            border: 1px solid rgba(40, 167, 69, 0.3);
            text-align: center;
        }

        .alert-danger {
            background-color: rgba(220, 53, 69, 0.2);
            color: #dc3545;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            border: 1px solid rgba(220, 53, 69, 0.3);
            text-align: center;
        }

        body {
            box-sizing: border-box;
            height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0 20px;
            position: relative;
        }

        /* --- Fading Slideshow Background --- */
        .slideshow {
            position: fixed;
            width: 100vw;
            height: 100vh;
            top: 0;
            left: 0;
            z-index: -1;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .slideshow li span {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0;
            animation: fadeImage 18s linear infinite;
        }

        /* The 3 background images */
        .slideshow li:nth-child(1) span {
            background-image: url('{{ asset("assets/images/backgrounds/1680x550_booking-one-bg.jpg") }}');
            animation-delay: 0s;
        }

        .slideshow li:nth-child(2) span {
            background-image: url('{{ asset("assets/images/backgrounds/xsr155.jpeg") }}');
            animation-delay: 6s;
        }

        .slideshow li:nth-child(3) span {
            background-image: url('{{ asset("assets/images/backgrounds/nmaxturbo.jpeg") }}');
            animation-delay: 12s;
        }

        @keyframes fadeImage {
            0% { opacity: 0; transform: scale(1); }
            10% { opacity: 1; }
            33% { opacity: 1; }
            43% { opacity: 0; }
            100% { opacity: 0; transform: scale(1.05); }
        }

        /* Apply glassmorphism to the outer wrapper */
        .master-wrapper {
            background: rgba(30, 30, 30, 0.7);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 10;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.5);
        }

        /* Override login container to remove redundant glassmorphism */
        .login-container {
            background: transparent;
            backdrop-filter: none;
            box-shadow: none;
            padding: 0;
            width: 100%;
            position: relative;
            z-index: 10;
        }

        .main-header {
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
            position: relative;
            z-index: 10;
        }

        .page-footer {
            width: 100%;
            max-width: 400px;
            position: relative;
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-logo-wrapper {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>

    <!-- CSS Slideshow -->
    <ul class="slideshow">
        <li><span></span></li>
        <li><span></span></li>
        <li><span></span></li>
    </ul>

    <div class="master-wrapper">
        <h1 class="main-header" style="margin-bottom: 30px; font-size: 2rem;">FORGOT PASSWORD</h1>

    <div class="login-container">
    
        <div style="text-align: center; margin-bottom: 20px;">
            <i class="fas fa-lock" style="font-size: 3rem; color: #FFB51D;"></i>
        </div>

        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-danger">
                {{ $errors->first('email') }}
            </div>
        @endif

        <p style="text-align: center; color: #ccc; margin-bottom: 20px; font-size: 14px; line-height: 1.5;">
            Please enter your registered email address, and we will send you a password reset link.
        </p>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="input-group">
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email Address..."
                    required autofocus>
            </div>

            <div>
                <button type="submit" class="login-button">
                    Send Reset Link <span class="arrow">→</span>
                </button>
            </div>
        </form>
    </div>

        <div class="page-footer" style="padding-bottom: 0px; margin-top: 30px; z-index: 10; position: relative;">
            <a href="{{ route('login') }}" style="color: #fff; z-index: 10;">Back to Login</a>

            <div class="footer-logo-wrapper">
                <img src="{{ asset('img/logo/logo_ridenusa_white_BTG.png') }}" alt="Ride Nusa" style="height: 70px;">
            </div>

            <a href="{{ route('register') }}" style="color: #fff; z-index: 10;">Create Account</a>
        </div>
    </div>

</body>

</html>