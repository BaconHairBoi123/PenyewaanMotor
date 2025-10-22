<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
</head>
<body>

    <h2 style="color: blue;">Login Area Admin</h2>

    @if ($errors->any())
        <div style="color: red;">
            <strong>Error:</strong> {{ $errors->first('username') }}
        </div>
    @endif

    <form method="POST" action="{{ url('/admin/login') }}">
        @csrf
        
        <div>
            <label for="username">Username Admin:</label>
            <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>
        </div>
        <br>

        <div>
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required>
        </div>
        <br>

        <div>
            <button type="submit" style="background-color: blue; color: white;">MASUK ADMIN</button>
        </div>
    </form>
    
    <p>
        <small>Login untuk User: <a href="{{ url('/login') }}">Kembali ke Login User</a></small>
    </p>

</body>
</html>