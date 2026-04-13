<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Area</title>

    {{-- CSS Login --}}
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

        /* --- Fading Slideshow Background for Admin --- */
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

        /* 3 background images for Admin */
        .slideshow li:nth-child(1) span {
            background-image: url('{{ asset("assets/images/backgrounds/perusahaan.jpg") }}');
            animation-delay: 0s;
        }

        .slideshow li:nth-child(2) span {
            background-image: url('{{ asset("assets/images/backgrounds/harley.jpg") }}');
            animation-delay: 6s;
        }

        .slideshow li:nth-child(3) span {
            background-image: url('{{ asset("assets/images/backgrounds/kawasapi.jpg") }}');
            animation-delay: 12s;
        }

        @keyframes fadeImage {
            0% { opacity: 0; transform: scale(1); }
            10% { opacity: 1; }
            33% { opacity: 1; }
            43% { opacity: 0; }
            100% { opacity: 0; transform: scale(1.05); }
        }

        /* Master wrapper for glassmorphism */
        .master-wrapper {
            background: rgba(10, 10, 10, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 10;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.8);
        }

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
            color: #fff !important;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
            margin-bottom: 30px;
            font-size: 2rem;
            position: relative;
            z-index: 10;
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
        {{-- Judul Halaman --}}
        <h1 class="main-header">ADMIN ACCESS</h1>
        
        <div class="login-container">

            {{-- Pesan Error --}}
            @if ($errors->any())
                <div class="error-message">
                    <strong>Access Denied:</strong> 
                    {{ $errors->first('credential') ?? 'Invalid admin credentials.' }}
                </div>
            @endif

            {{-- Form Login --}}
            <form method="POST" action="{{ url('/admin/login') }}">
                @csrf

                {{-- Input Username/Email --}}
                <div class="input-group">
                    <input 
                        id="credential" 
                        type="text" 
                        name="credential" 
                        placeholder="Admin Username / Email..."
                        value="{{ old('credential') }}"
                        required 
                        autofocus
                    >
                </div>

                {{-- Input Password --}}
                <div class="input-group" style="position: relative;">
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        placeholder="Admin Password..." 
                        required
                        style="padding-right: 45px;"
                    >
                    <i class="fa fa-eye" id="togglePassword" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #aaa; z-index: 5;"></i>
                </div>

                {{-- Tombol Login --}}
                <div>
                    <button type="submit" class="login-button" style="background-color: #FFB51D; color: black; font-weight: bold; font-family: 'Outfit', sans-serif;">
                        ACCESS ADMIN <span class="arrow" style="color: black;">→</span>
                    </button>
                </div>
            </form>
        </div>

        {{-- Link ke halaman login user biasa --}}
        <p class="admin-login-link" style="margin-top: 20px; color: #ffffff;">
            <small>
                Back to User Login: 
                <a href="{{ url('/login') }}" style="color: #FFB51D; font-weight: bold;">User Login</a>
            </small>
        </p>

        {{-- Logo --}}
        <div class="logo-placeholder" style="margin-top: 30px; position: relative;">
            <img src="{{ asset('img/logo/logo_ridenusa_white_BTG.png') }}" alt="Ride Nusa" style="height:80px; width: auto;">
        </div>
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
