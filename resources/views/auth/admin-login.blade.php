<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Area</title>

    {{-- Menggunakan style login.css untuk konsistensi desain dasar --}}
    @vite('resources/css/login.css') 
</head>
<body>

    {{-- Judul tetap menggunakan class yang sama (Header) --}}
    <h1 class="main-header" style="color: #2f2f2f;">ADMIN ACCESS</h1> 
    
    {{-- Menggunakan Kontainer yang sama --}}
    <div class="login-container">
        
        {{-- BLADE: Pesan Error (Menggunakan class yang sudah dimodifikasi) --}}
        @if ($errors->any())
            <div class="error-message">
                {{-- Mengambil error pertama --}}
                <div><strong>Akses Ditolak:</strong> {{ $errors->first('username') ?? 'Kredensial Admin tidak valid.' }}</div>
            </div>
        @endif

        {{-- BLADE: Form Login Admin --}}
        <form method="POST" action="{{ url('/admin/login') }}">
            @csrf

            {{-- Input Username Admin --}}
            <div class="input-group">
                {{-- Label dihilangkan di CSS Anda, jadi cukup input saja --}}
                <input id="username" type="text" name="username" placeholder="Username Admin..." value="{{ old('username') }}" required autofocus>
            </div>

            {{-- Input Password --}}
            <div class="input-group">
                <input id="password" type="password" name="password" placeholder="Password Admin..." required>
            </div>

            {{-- Tombol Login (Kita ganti teks dan beri warna yang sama) --}}
            <div>
                <button type="submit" class="login-button" style="background-color: #555; color: white;">
                    ACCESS ADMIN <span class="arrow">→</span>
                </button>
            </div>
        </form>
    </div>
    
    {{--- Tautan Footer Bawah ---}}
    {{-- Hanya menampilkan tautan kembali ke login user --}}
    <p class="admin-login-link" style="margin-top: 20px;">
        <small>Kembali ke Login User: <a href="{{ url('/login') }}" style="color: #2f2f2f;">Login Penyewa</a></small>
    </p>

    {{-- Logo RIDE NUSA --}}
    <div class="logo-placeholder" style="margin-top: 50px;">
        <img src="{{ asset('img/logo/logo_ridenusa_white_BTG.png') }}" alt="Ride Nusa">
    </div>

</body>
</html>