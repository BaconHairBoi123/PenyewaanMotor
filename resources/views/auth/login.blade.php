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
        @if ($errors->any())
            <div class="error-message">
                {{-- Mengambil error pertama dari 'username' atau error lain --}}
                <div><strong>Error:</strong> {{ $errors->first('username') ?? 'Kredensial tidak valid.' }}</div>
            </div>
        @endif

        {{-- BLADE: Form Login --}}
        <form method="POST" action="{{ url('/login') }}">
            @csrf

            {{-- Input Username/Email --}}
            <div class="input-group">
                <label for="username">Username:</label>
                <input id="username" type="text" name="username" placeholder="Email..." value="{{ old('username') }}" required autofocus>
            </div>

            {{-- Input Password --}}
            <div class="input-group">
                <label for="password">Password:</label>
                <input id="password" type="password" name="password" placeholder="password...." required>
            </div>

            {{-- Tombol Login --}}
            <div>
                <button type="submit" class="login-button">
                    Login Here <span class="arrow">→</span>
                </button>
            </div>
        </form>
    </div>
    
    {{--- Tautan Footer Bawah ---}}
    <div class="page-footer">
        {{-- BLADE: Tautan Daftar --}}
        <a href="{{ url('/register') }}">Create an Account</a>
        
        {{-- Placeholder Logo RIDE NUSA --}}
        <div class="logo-placeholder">
            <img src="{{ asset('img/logo/logo_ridenusa_white_BTG.png') }}" alt="Ride Nusa">
        </div>

        {{-- BLADE: Tautan Lupa Password --}}
        <a href="{{ url('/forgot-password') }}">Forget password</a>
    </div>

    {{-- Tautan Login Admin --}}
    <p class="admin-login-link">
        <small>Login untuk Admin: <a href="{{ url('/admin/login') }}">Masuk sebagai Admin</a></small>
    </p>

</body>
</html>