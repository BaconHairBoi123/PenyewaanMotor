<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Penyewa Motor</title>

    @vite('resources/css/login.css')

    <link rel="icon" type="image/png" href="{{ asset('img/logo/logo_web_ridenusa_transparan.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
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

        .admin-login-link {
            position: relative;
            z-index: 10;
            margin-top: 20px;
        }
        
        .admin-login-link a {
            color: #FFB51D;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
        }
        .admin-login-link small {
            color: #fff;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
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
        <h1 class="main-header" style="margin-bottom: 30px; font-size: 2rem;">LOGIN HERE</h1>

        <div class="login-container">

            {{-- BLADE: Pesan Error --}}
            @if ($errors->any())
                <div class="error-message">
                    <div><strong>Error:</strong> {{ $errors->first('credential') }}</div>
                </div>
            @endif

            {{-- BLADE: Form Login --}}
            <form method="POST" action="{{ url('/login') }}">
                @csrf

                <div class="input-group">
                    <!-- Input ini akan menerima Email ATAU Username -->
                    <input id="credential" type="text" name="credential" placeholder="Email / Username..." required
                        autofocus>
                </div>

                <div class="input-group" style="position: relative;">
                    <input id="password" type="password" name="password" placeholder="Password..." required style="padding-right: 45px;">
                    <i class="fa fa-eye" id="togglePassword" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #aaa; z-index: 5;"></i>
                </div>

                {{-- Tombol Login --}}
                <div>
                    <button type="submit" class="login-button">
                        Login Here <span class="arrow">→</span>
                    </button>
                </div>
            </form>
        </div>

        {{-- - Tautan Footer Bawah - --}}
        <div class="page-footer" style="padding-bottom: 0px; margin-top: 30px; z-index: 10; position: relative;">
            {{-- BLADE: Tautan Daftar --}}
            <a href="{{ url('/register') }}" style="color: #fff; z-index: 10;">Create an Account</a>

            {{-- Placeholder Logo RIDE NUSA --}}
            <div class="logo-placeholder" style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);">
                <img src="{{ asset('img/logo/logo_ridenusa_white_BTG.png') }}" alt="Ride Nusa" style="height:70px; width: auto;">
            </div>

            {{-- BLADE: Tautan Lupa Password --}}
            <a href="{{ url('/forgot-password') }}" style="color: #fff; z-index: 10;">Forgot Password</a>
        </div>

        {{-- Tautan Login Admin --}}
        <p class="admin-login-link">
            <small>Login untuk Admin: <a href="{{ url('/admin/login') }}">Masuk sebagai Admin</a></small>
        </p>
    </div>
    
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        if (togglePassword && password) {
            togglePassword.addEventListener('click', function() {
                // Toggle type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                
                // Toggle icon
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        }
    </script>

</body>

</html>