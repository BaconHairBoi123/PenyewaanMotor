<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Area</title>

    {{-- CSS Login --}}
    @vite('resources/css/login.css') 
</head>

<body>

    {{-- Judul Halaman --}}
    <h1 class="main-header" style="color: #2f2f2f;">ADMIN ACCESS</h1>
    
    <div class="login-container">

        {{-- Pesan Error --}}
        @if ($errors->any())
            <div class="error-message">
                <strong>Akses Ditolak:</strong> 
                {{ $errors->first('credential') ?? 'Kredensial admin tidak valid.' }}
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
                    placeholder="Username / Email Admin..."
                    value="{{ old('credential') }}"
                    required 
                    autofocus
                >
            </div>

            {{-- Input Password --}}
            <div class="input-group">
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    placeholder="Password Admin..." 
                    required
                >
            </div>

            {{-- Tombol Login --}}
            <div>
                <button type="submit" class="login-button" style="background-color: #555; color: white;">
                    ACCESS ADMIN <span class="arrow">→</span>
                </button>
            </div>
        </form>
    </div>

    {{-- Link ke halaman login user biasa --}}
    <p class="admin-login-link" style="margin-top: 20px;">
        <small>
            Kembali ke Login User: 
            <a href="{{ url('/login') }}" style="color: #2f2f2f;">Login Penyewa</a>
        </small>
    </p>

    {{-- Logo --}}
    <div class="logo-placeholder" style="margin-top: 50px;">
        <img src="{{ asset('img/logo/logo_ridenusa_white_BTG.png') }}" alt="Ride Nusa">
    </div>

</body>
</html>
