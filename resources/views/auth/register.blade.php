<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun Baru</title>
</head>
<body>

    <h2>Registrasi Akun Penyewa Motor</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/register') }}">
        @csrf
        
        <div>
            <label for="name">Nama Lengkap:</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <br>

        <div>
            <label for="username">Username:</label>
            <input id="username" type="text" name="username" value="{{ old('username') }}" required>
        </div>
        <br>
        
        <div>
            <label for="email">Email:</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>
        <br>

        <div>
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required>
        </div>
        <br>
        
        <div>
            <label for="password_confirmation">Konfirmasi Password:</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>
        <br>

        <div>
            <label for="no_tlpn">Nomor Telepon:</label>
            <input id="no_tlpn" type="text" name="no_tlpn" value="{{ old('no_tlpn') }}">
        </div>
        <br>

        <div>
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat">{{ old('alamat') }}</textarea>
        </div>
        <br>

        <div>
            <button type="submit">DAFTAR SEKARANG</button>
        </div>
    </form>

    <p>Sudah punya akun? <a href="{{ url('/login') }}">Login di sini</a></p>

</body>
</html>