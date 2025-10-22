<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User</title>
</head>
<body>

    <h1>Selamat Datang di Dashboard Penyewa!</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    
    <p>Anda login sebagai: <strong>{{ Auth::guard('web')->user()->name }}</strong></p>
    <p>Peran Anda: User/Penyewa</p>

    <form method="POST" action="{{ url('/logout') }}">
        @csrf
        <button type="submit" style="background-color: red; color: white;">LOGOUT</button>
    </form>

    <hr>
    
    <h2>Informasi Penyewaan</h2>
    <p>Di sini akan ditampilkan daftar motor yang tersedia, riwayat sewa, dan informasi akun.</p>

</body>
</html>