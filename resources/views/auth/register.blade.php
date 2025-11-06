<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun Baru</title>

    {{-- Kita masih menggunakan style login.css untuk konsistensi --}}
    @vite('resources/css/login.css') 
    @vite('resources/css/register.css')
    
    {{-- CATATAN: Pastikan Anda menjalankan 'npm run dev' atau 'npm run build' --}}
</head>
<body>

    <h1 class="main-header">SIGN UP</h1>
    
    <div class="login-container">
        
        {{-- BLADE: Pesan Error (Menggunakan class yang sama dengan login) --}}
        @if ($errors->any())
            <div class="error-message">
                {{-- Anda mungkin ingin menyesuaikan pesan error ini --}}
                <div><strong>Error:</strong> {{ $errors->first() ?? 'Silakan periksa kembali data yang diisi.' }}</div>
            </div>
        @endif

        {{-- BLADE: Form Register --}}
        <form method="POST" action="{{ url('/register') }}">
            @csrf

            {{-- 1. Input Name --}}
            <div class="input-group">
                <input id="name" type="text" name="name" placeholder="Name..." value="{{ old('name') }}" required autofocus>
            </div>

            {{-- 2. Input Username --}}
            <div class="input-group">
                <input id="username" type="text" name="username" placeholder="Username..." value="{{ old('username') }}" required>
            </div>
            
            {{-- 3. Input Email --}}
            <div class="input-group">
                <input id="email" type="email" name="email" placeholder="Email..." value="{{ old('email') }}" required>
            </div>

            {{-- 4. Input Password --}}
            <div class="input-group">
                <input id="password" type="password" name="password" placeholder="Password..." required>
            </div>
            
            {{-- 5. Input Confirm Password --}}
            <div class="input-group">
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password..." required>
            </div>

            {{-- 6. Input Phone Number --}}
            <div class="input-group">
                <input id="phone" type="text" name="phone" placeholder="Phone Number..." value="{{ old('phone') }}" required>
            </div>

            {{-- 7. Input Address (Menggunakan text untuk kesederhanaan) --}}
            <div class="input-group">
                <input id="address" type="text" name="address" placeholder="Address..." value="{{ old('address') }}" required>
            </div>

            {{-- Tombol Sign Up --}}
            <div>
                <button type="submit" class="login-button">
                    Sign Up <span class="arrow">→</span>
                </button>
            </div>
        </form>
    </div>
    
    {{--- Tautan Footer Bawah ---}}
    <div class="page-footer">
        
        {{-- BLADE: Tautan Login (sesuai desain) --}}
        <p>Already have an account? <a href="{{ url('/login') }}" style="color: #FFB51D;">Login Here</a></p>
        
        {{-- Placeholder Logo RIDE NUSA (diletakkan di bawah sendiri sesuai desain) --}}
    </div>
    
    <div class="logo-placeholder">
        <img src="{{ asset('img/logo/logo_ridenusa_white_BTG.png') }}" alt="Ride Nusa">
    </div>

</body>
</html>