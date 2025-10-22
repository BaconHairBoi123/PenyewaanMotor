<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { max-width: 400px; margin: 50px auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; color: #333; }
        input[type="email"] { width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .alert-success { background-color: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #c3e6cb; }
        .alert-danger { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Lupa Kata Sandi (User)</h2>

        <!-- Menampilkan pesan sukses setelah pengiriman email -->
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- Menampilkan pesan error jika ada -->
        @if ($errors->any())
            <div class="alert-danger">
                {{ $errors->first('email') }}
            </div>
        @endif

        <p style="text-align: center; color: #666;">
            Masukkan alamat email yang terdaftar, dan kami akan mengirimkan link untuk mereset kata sandi Anda.
        </p>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            
            <div>
                <label for="email" style="display: block; margin-bottom: 5px;">Alamat Email:</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div>
                <button type="submit">KIRIM LINK RESET</button>
            </div>
        </form>
    </div>

</body>
</html>
