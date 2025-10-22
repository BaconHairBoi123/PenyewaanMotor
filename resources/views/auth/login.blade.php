<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login User</title>
</head>
<body>

    <h2>Login Penyewa Motor</h2>

    @if ($errors->any())
        <div style="color: red;">
            <strong>Error:</strong> {{ $errors->first('username') }}
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        
        <div>
            <label for="username">Username:</label>
            <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>
        </div>
        <br>

        <div>
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required>
        </div>
        <br>

        <div>
            <button type="submit">LOG IN</button>
        </div>
    </form>
    
    <p>Belum punya akun? <a href="{{ url('/register') }}">Daftar di sini</a></p>
    <p>forgot password? <a href="{{ url('/forgot-password') }}">forgot password</a></p>
    <p>
        <small>Login untuk Admin: <a href="{{ url('/admin/login') }}">Masuk sebagai Admin</a></small>
    </p>

</body>
</html>