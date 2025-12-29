<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Penyewa Motor</title>

    @vite('resources/css/login.css')



</head>

<body>

    <h1 class="main-header">LOGIN HERE</h1>

    <div class="login-container">

        {{-- BLADE: Pesan Error --}}
        {{-- Ganti bagian ini di login.blade.php --}}
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

            <div class="input-group">
                <input id="password" type="password" name="password" placeholder="Password..." required>
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
    <div class="page-footer">
        {{-- BLADE: Tautan Daftar --}}
        <a href="{{ url('/register') }}">Create an Account</a>

        {{-- Placeholder Logo RIDE NUSA --}}
        <div class="logo-placeholder">
            <img src="{{ asset('img/logo/logo_ridenusa_white_BTG.png') }}" alt="Ride Nusa">
        </div>

        {{-- BLADE: Tautan Lupa Password --}}
        <a href="{{ url('/forgot-password') }}">Forgot Password</a>
    </div>

    {{-- Tautan Login Admin --}}
    <p class="admin-login-link">
        <small>Login untuk Admin: <a href="{{ url('/admin/login') }}">Masuk sebagai Admin</a></small>
    </p>

</body>

</html>
